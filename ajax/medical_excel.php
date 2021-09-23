
    <?php
	$con=mysqli_connect("localhost","root","","vokaface_db");
    /* File name : download_data_in_excel.php */
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
    
	
    if($con){
    	//GET THE STAFF RECPORDS
		$selQry="SELECT fst_name, lst_name, voka_id, staff_id FROM staff_rec";
		$selQryRun=mysqli_query($con,$selQry);
		echo "SUMMARY ATTENDANCE REPORT OF ALL STAFF FROM $prevmonth TO $currMonth \n";
    	echo "staff ID \t Name \t Clockin Difference \t Clockin Penalty \t Clockout Difference \t Clockout Penalty \t Total Penalty \n"; // prints header line with field names
    	if (mysqli_num_rows($selQryRun) > 0) {// output data of each row
			
			$cont=0;
			$accrPenalty=0;
			$accrTime=0;
			$totClockinTime=0;
			$totClockoutTime=0;
			$totClockPenalty=0;
			$overallPen=0;
    		while($row = mysqli_fetch_assoc($selQryRun)) {
				$staffId=$row['staff_id'];
				$name=$row['fst_name']."".$row['lst_name'];
				
				//GETTING THE CLOCK IN TOTALS
								$getQry="SELECT SUM(penalty) AS tot_penalty, SUM(time_diff) AS tot_time FROM clock_in WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
								$getQryRun=mysqli_query($con,$getQry);
								$getData=mysqli_fetch_assoc($getQryRun);
								$accrPenalty=$accrPenalty + $getData['tot_penalty'];
								$totClockinTime=$totClockinTime + $getData['tot_time'];//Total clockin time
								
								//GETTING THE CLOCK OUT TOTALS
								$getclockout="SELECT SUM(penalty) AS tot_pen, SUM(time_diff) AS tot_timeDiff FROM clockout WHERE staff_id='$staffId' AND date BETWEEN '" . $prevmonth . "' AND  '" . $currMonth . "'";
								$getclockoutRun=mysqli_query($con,$getclockout);
								$getclockoutData=mysqli_fetch_assoc($getclockoutRun);
								$totClockPenalty=$totClockPenalty + $getclockoutData['tot_pen'];
								$totClockoutTime=$totClockoutTime + $getclockoutData['tot_timeDiff'];
								
								//Overall
								$overall=$getData['tot_penalty'] + $getclockoutData['tot_pen']; 
								$overallPen= $overallPen + $overall; 
				
    			echo $row['voka_id']."\t".$name."\t".$totClockinTime."\t".number_format($getData['tot_penalty'],2)."\t".$totClockoutTime."\t".$getclockoutData['tot_pen']."\t".$overall."\n"; // prints each record with five fields in a row
				}
				echo ""."\t".""."\t"."Total"."\t".number_format($accrPenalty,2,'.',',')."\t".""."\t".number_format($totClockPenalty,2)."\t".number_format($overallPen,2)."\n"; 
    		} 
    	}
		
		}
    
    ?>