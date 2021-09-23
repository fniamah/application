
    <?php
	include('../connection/functions.php');
    /* File name : download_data_in_excel.php */
	/*if(isset($_GET['id'])){
		 $month=$_GET['id'];
		 $dyear=$_GET['year'];
		$year="";
		if($month == 1){
			 $year=$dyear-1;
		}
		else{
			 $year=$dyear;
		}
		
		$prevMonth= date('m', strtotime(date("$year-$month")." -1 month"));
		$prevmonth=date("$year-$prevMonth-25");
		$currMonth=date("Y-$month-24");
						
		$fname=date("Ydmhis");  
    $filename =$fname.".xls";//file name
    header('Content-type: application/ms-excel');
    header('Content-Disposition: attachment;filename='.$filename);

    	//GET THE STAFF RECPORDS
		$selQry="SELECT fst_name, lst_name, voka_id, staff_id FROM staff_rec WHERE status !='Detached'";
		$selQryRun=$conn->query($dbconnection,$selQry);
		echo "SUMMARY ATTENDANCE REPORT OF ALL STAFF FROM $prevmonth TO $currMonth \n";
    	echo "staff ID \t Name \t Clockin Difference \t Clockin Penalty \t Clockout Difference \t Clockout Penalty \t Total Penalty \n"; // prints header line with field names
    	if ($conn->sqlnum($selQryRun) > 0) {// output data of each row
			
			$cont=0;
			$accrPenalty=0;
			$accrTime=0;
			$totClockinTime=0;
			$totClockoutTime=0;
			$totClockPenalty=0;
			$overallPen=0;
    		while($row = $conn->fetch($selQryRun)) {
				$staffId=$row['staff_id'];
				$name=$row['fst_name']."".$row['lst_name'];
				
				//GETTING THE CLOCK IN TOTALS
								$getQry="SELECT SUM(penalty) AS tot_penalty, SUM(time_diff) AS tot_time FROM clock_in WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
								$getQryRun=$conn->query($dbconnection,$getQry);
								$getData=$conn->fetch($getQryRun);
								$accrPenalty=$accrPenalty + $getData['tot_penalty'];
								$totClockinTime=$totClockinTime + $getData['tot_time'];//Total clockin time
								
								//GETTING THE CLOCK OUT TOTALS
								$getclockout="SELECT SUM(penalty) AS tot_pen, SUM(time_diff) AS tot_timeDiff FROM clockout WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
								$getclockoutRun=$conn->query($dbconnection,$getclockout);
								$getclockoutData=$conn->fetch($getclockoutRun);
								$totClockPenalty=$totClockPenalty + $getclockoutData['tot_pen'];
								$totClockoutTime=$totClockoutTime + $getclockoutData['tot_timeDiff'];
								
								//Overall
								$overall=$getData['tot_penalty'] + $getclockoutData['tot_pen']; 
								$overallPen= $overallPen + $overall; 
				
    			echo $row['voka_id']."\t".$name."\t".$totClockinTime."\t".number_format($getData['tot_penalty'],2)."\t".$totClockoutTime."\t".$getclockoutData['tot_pen']."\t".$overall."\n"; // prints each record with five fields in a row
				}
				echo ""."\t".""."\t"."Total"."\t".number_format($accrPenalty,2,'.',',')."\t".""."\t".number_format($totClockPenalty,2)."\t".number_format($overallPen,2)."\n"; 
    		} 

		
		}*/
    
	//NEW ONE
	if(isset($_GET['id'])){
		 $month=$_GET['id'];
		 $dyear=$_GET['year'];
		$year="";
		if($month == 1){
			 $year=$dyear-1;
		}
		else{
			 $year=$dyear;
		}
		
		$prevMonth= date('m', strtotime(date("$year-$month")." -1 month"));
		$prevmonth=date("$year-$prevMonth-25");
		$currMonth=date("Y-$month-24");
						
		$fname=date("Ydmhis");  
    $filename =$fname.".xls";//file name
    header('Content-type: application/ms-excel');
    header('Content-Disposition: attachment;filename='.$filename);

    	//GET THE STAFF RECPORDS
		$selQry="SELECT DISTINCT staff_id FROM clock_in WHERE date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
		$selQryRun=$conn->query($dbconnection,$selQry);
		echo "SUMMARY ATTENDANCE REPORT OF STAFF FROM $prevmonth TO $currMonth \n";
    	echo "Name \t Clockin Penalty \t Clockout Penalty \t Total Penalty \n"; // prints header line with field names
    	if ($conn->sqlnum($selQryRun) > 0) {// output data of each row
			
			$cont=0;
			$accrPenalty=0;//total clockin penalty
			$totClockPenalty=0;//total clock out penalty
			$overallPen=0; //Grand total
			$overall=0; //Grand total
    		while($row = $conn->fetch($selQryRun)) {
				$staffId=$row['staff_id'];
				
				//GETTING THE CLOCK IN TOTALS
				$getQry="SELECT SUM(penalty) AS tot_penalty FROM clock_in WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
				$getQryRun=$conn->query($dbconnection,$getQry);
				$getData=$conn->fetch($getQryRun);
				$accrPenalty=$accrPenalty + $getData['tot_penalty'];
				
				//GETTING THE CLOCK OUT TOTALS
				$getclockout="SELECT SUM(penalty) AS tot_pen FROM clockout WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
				$getclockoutRun=$conn->query($dbconnection,$getclockout);
				$getclockoutData=$conn->fetch($getclockoutRun);
				$totClockPenalty=$totClockPenalty + $getclockoutData['tot_pen'];
				
				//Overall
				$overall=$getData['tot_penalty'] + $getclockoutData['tot_pen']; 
				$overallPen= $overallPen +$overall; 

    			echo convertName($staffId)."\t".number_format($getData['tot_penalty'],2)."\t".$getclockoutData['tot_pen']."\t".$overall."\n"; // prints each record with five fields in a row
				}
				echo "Total"."\t".number_format($accrPenalty,2,'.',',')."\t".number_format($totClockPenalty,2)."\t".number_format($overallPen,2)."\n"; 
    		} 

		
		}
	//MEDICAL REPORT EXPORT TO EXCEL
if(isset($_GET['qry'])){
     $qry=$_GET['qry'];
     $msg=$_GET['msg'];
						
		$fname=date("Ydmhis");  
    $filename =$fname.".xls";//file name
    header('Content-type: application/ms-excel');
    header('Content-Disposition: attachment;filename='.$filename);

    //GET THE STAFF RECPORDS
    $selQryRun=$conn->query($dbconnection,$qry);
    echo $msg." \n";
    echo "Name \t Expense Type \t User Type \t Date \t Hospital \t Expenses \t Balance \n"; // prints header line with field names
    while($row = $conn->fetch($selQryRun)) {
        $staffId=$row['voka_id'];
        $sel="SELECT fst_name, lst_name FROM staff_rec WHERE voka_id='$staffId'";
        $selRun=$conn->query($dbconnection,$sel);
        $selData=$conn->fetch($selRun);
        $name=$selData['fst_name']." ".$selData['lst_name'];
        echo $name."\t".$row['type']."\t".$row['user']."\t".$row['date']."\t".$row['hospital']."\t".$row['amount']."\t".$row['bal']."\n"; // prints each record with five fields in a row
    }
            //echo ""."\t".""."\t"."Total"."\t".number_format($accrPenalty,2,'.',',')."\t".""."\t".number_format($totClockPenalty,2)."\t".number_format($overallPen,2)."\n";

}

    if(isset($_GET['generalpvreport'])){
        $sdate=$_GET['pvrepsd'];
        $edate=$_GET['pvreped'];
        $comp=$_GET['expacct'];
       // $msg="Report Of Payment Vouchers From ".date("l, d M, Y",strtotime(date($sdate)))." To ".date("l, d M, Y",strtotime(date($edate)));
        $fname=date("Ydmhis");
        $filename =$fname.".xls";//file name
        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment;filename='.$filename);
		$qry="";
		if($comp=="All"){
			$qry="SELECT * FROM pv_detail WHERE status IN ('Complete','Approved') AND finDate BETWEEN '$sdate' AND '$edate' ORDER BY finDate DESC";
		}else{
			$qry="SELECT * FROM pv_detail WHERE compExp='$comp' AND status IN ('Complete','Approved') AND finDate BETWEEN '$sdate' AND '$edate' ORDER BY finDate DESC";

		}
        $qryRun=$conn->query($dbconnection,$qry);
        //echo $msg." \n";
        echo "PV Date \t PV # \t Expense Account \t  Supplier \t Status \t Director \t Director Approval Date \t Total Amount \t Total Tax \t Net Amount \n"; // prints header line with field names

        while($items = $conn->fetch($qryRun)) {
            $pvid=$items['pv_id'];
            $docdate=date('d-M-Y',strtotime(date($items['app_date'])));
            $supplier=$items['supplier'];
            $status=$items['status'];
            $dir=checkName($items['finDir']);
            $dirdate=$items['finDate'];
            $expacct=$items['compExp'];

            $tax=($items['taxamount'] * $items['exchrate']);
            $amount=($items['total'] * $items['exchrate']);
            $netamount=$amount - $tax;
			echo $docdate."\t".$pvid."\t".$expacct."\t".$supplier."\t".$status."\t".$dir."\t".$dirdate."\t".$amount."\t".$tax."\t".$netamount."\n"; // prints each record with five fields in a row
			echo "\t \t \t \t \t Details \n"; // prints each record with five fields in a row
			
			/*GETTING THE DETAILS OF THE PV AS WELL AS THE TAX COMPONENTS
			$seldet="SELECT d.pv_id, d.id, d.description, d.total, t.itemid, t.percentage, t.amount, t.pv_id FROM pv d INNER JOIN pvtax t  WHERE d.pv_id=t.pv_id AND d.pv_id='$pvid'";
			$selrun=$conn->query($dbconnection,$seldet);
			while($data=$conn->fetch($selrun)){
				echo " \t \t \t \t \t".$data['description']."\t".$data['total']."\t".$data['amount']."\t".($data['total'] - $data['amount'])."\n";
			}*/
			$seldet="SELECT * FROM pv WHERE pv_id='$pvid'";
			$seldata=$conn->query($dbconnection,$seldet);
			while($data=$conn->fetch($seldata)){
				$itemid=$data['id'];
				//Get the corresponding tax component
				$seltax="SELECT * FROM pvtax WHERE itemid=$itemid";
				$seltaxrun=$conn->query($dbconnection,$seltax);
				$seltaxdata=$conn->fetch($seltaxrun);
				$taxamount=$seltaxdata['amount'];
				$taxdiff=0;
				if($taxamount < 0){
					$taxdiff=$data['total']+$taxamount;
				}
				elseif($taxamount > 0){
					$taxdiff=$data['total'] - $taxamount;
				}elseif(empty($taxamount)){
					$taxdiff=0;
					$taxamount=0;
				}
				
				echo " \t \t \t \t \t".$data['description']."\t".$data['total']."\t".$taxamount."\t".$taxdiff."\n";
			}
			echo "\n \n";
        }
        //echo ""."\t".""."\t"."Total"."\t".number_format($accrPenalty,2,'.',',')."\t".""."\t".number_format($totClockPenalty,2)."\t".number_format($overallPen,2)."\n";

    }
//EXPORT THE GENERAL PV REPORT
    ?>