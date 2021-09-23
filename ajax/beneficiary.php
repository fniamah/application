<?php
include("../connection/conn.php");

if(isset($_POST['getStaffInfo'])){
	$stfid=$_POST['getStaffInfo'];
	$sel="SELECT * FROM staff_rec WHERE voka_id='$stfid'";
	$selrun=$conn->query($dbcon,$sel);
	$seldata=$conn->fetch($selrun);
	$dimg="";
	if($seldata['img']==""){
	    $dimg="assets/images/noimage.png";
    }else{
	    $dimg=$seldata['img'];
    }
	$response['fname']= $seldata['fst_name'];
	$response['lname']= $seldata['lst_name'];
	$response['company']= $seldata['company'];
	$response['stime']= $seldata['start_time'];
	$response['position']= $seldata['position'];
	$response['contact']= $seldata['contact'];
	$response['email']= $seldata['email'];
	$response['settings']= $seldata['settings'];
	$response['tutorial']= $seldata['tutorial'];
	$response['salcomp']= $seldata['salCompany'];
	$response['comp']= $seldata['comp'];
	$response['leave']= $seldata['leavemgt'];
	$response['medical']= $seldata['medical'];
	$response['permit']= $seldata['permission'];
	$response['staff']= $seldata['staff'];
	$response['attendance']= $seldata['attendance'];
	$response['status']= $seldata['status'];
	$response['finance']= $seldata['accounts'];
	$response['loans']= $seldata['loans'];
	$response['etime']= $seldata['end_time'];
	$response['img']= $dimg;
	$response['supervisor']= $seldata['supervisor'];
	
	print json_encode($response);
}

if(isset($_POST['expType'])){
	$exptype=$_POST['expType'];
	echo "<label>Beneficiary</label>";
	if($exptype=="other"){
		echo "<input type='text' name='supplier' class='form-control' required id='supp1' />";
	}
	elseif($exptype=="staff"){
		echo "<select name='supplier' class='form-control' required>
				<option value=''>Select Staff</option>";
				
					$getstf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE status IN ('Active','Inactive') ORDER BY fst_name DESC";
					$getStfRun=$conn->query($dbcon,$getstf);
					while($stfData=$conn->fetch($getStfRun)){
					
					echo "<option value='".$stfData['fst_name']." ".$stfData['lst_name'],"'>".$stfData['fst_name']." ".$stfData['lst_name']."</option>";
					 } 
					echo "</select>";
	}
	elseif($exptype=="facility"){
		echo "<select name='supplier' class='form-control' required>
				<option value=''>Select Facility</option>";
				
					$getstf="SELECT name FROM hospital WHERE status = 'Active'";
					$getStfRun=$conn->query($dbcon,$getstf);
					while($stfData=$conn->fetch($getStfRun)){
					
					echo "<option value='".$stfData['name']."'>".$stfData['name']."</option>";
					 } 
					echo "</select>";
	}
	else{
		echo "<input type='text' name='supplier' class='form-control' required id='supp1' readonly placeholder='Select PV Type' />";
	}
}

//GET THE DESKTOP NOTIFIER
if(isset($_POST['getNotify'])){
    $vokaId=$_POST['getNotify'];


    //GET THE TIME DIFFERENCE
    $seltime = "SELECT last_login FROM users WHERE userid = '$vokaId'";
    $seltimerun = $conn->query($dbcon,$seltime);
    $seltimedata = $conn->fetch($seltimerun);
    $lasttime = $seltimedata['last_login'];

    $tdiff = strtotime(date($dateTime)) - strtotime(date($lasttime));
    //UPDATE WITH THE CURRENT ACTIVITY COUNT
    $ct="SELECT * FROM message WHERE stfid='$vokaId' AND caption NOT LIKE '%MEMO%'";
    $ctrun=$conn->query($dbcon,$ct);
    $actCount= $conn->sqlnum($ctrun);

    $stfmsg="SELECT * FROM message WHERE stfid='$vokaId' AND caption NOT LIKE '%MEMO%' ORDER BY date DESC LIMIT 10";
    $stfrun=$conn->query($dbcon,$stfmsg);
    $actmsg="";
    while($items=$conn->fetch($stfrun)){
        $actmsg=$actmsg."<li class='media'>
            <div class='media-left'>
                <a href='#' class='btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm'><i class='icon-git-pull-request'></i></a>
            </div>
            <div class='media-body'>".$items['message']."
                <div class='media-annotation'>".date('d M, Y H:i:s A',strtotime(date($items['date'])))."</div>
            </div>
        </li>
        <hr/>";
    }

    //UPDATE THE CURRENT MEMO
    $msgc="SELECT * FROM memo WHERE stfid='$vokaId' AND status='Active' ORDER BY tstamp DESC LIMIT 20";
    $msgRun=$conn->query($dbcon,$msgc);
    $memocount= $conn->sqlnum($msgRun);

    $memqry="SELECT * FROM memo WHERE stfid='$vokaId' AND status='Active' ORDER BY tstamp DESC";
    $memqryrun=$conn->query($dbcon,$memqry);
    $memomsg="";
    if($conn->sqlnum($memqryrun) == 0){
        $memomsg = "<b>No Memo Available</b>";
    }else{
        while($data=$conn->fetch($memqryrun)) {
            $usr = $data['usr'];
            $getimg = "SELECT img FROM users WHERE userid='$vokaId'";
            $getrun = $conn->query($dbcon, $getimg);
            $getdata = $conn->fetch($getrun);
            $dimg="";
            if($getdata['img'] !=""){
                $dimg=$getdata['img'];
            }else{
                $dimg="assets/images/noimage.png";
            }
            $memomsg=$memomsg."<li class='media'>
                <div class='media-left'>
                    <img src='".$dimg."' class='img-circle img-sm' alt=''>
                </div>

                <div class='media-body'>
                    <!--<a href='dashboard.php?memochat=".$data['id']."' class='media-heading'>
                        <span class='text-semibold'>".$data['title']."</span>
                <span class='media-annotation pull-right'>".date('Y-m-d H:i:s A',strtotime(date($data['tstamp'])))."</span>
                </a>-->
                <a class='media-heading'>
                        <span class='text-semibold'>".$data['title']."</span>
                <span class='media-annotation pull-right'>".date('Y-m-d H:i:s A',strtotime(date($data['tstamp'])))."</span>
                </a>
                <span class='text-muted'>".substr($data['msg'],0,100)."</span>
                </div>
               </li>";
        }
    }

    //GET THE CURRENT MESSAGE AND DISPLAY TO THE USER

    $get="SELECT message, caption, id FROM message WHERE stfid='$vokaId' AND status='Active' ORDER BY date ASC LIMIT 1";
    $getrun=$conn->query($dbcon,$get);
    $getData=$conn->fetch($getrun);
    if($conn->sqlnum($getrun) != 0){
        $id=$getData['id'];
        $respond['title']=$getData['caption'];
        $respond['msg']=$getData['message'];
    }else{
        $id=0;
        $respond['title']="";
        $respond['msg']="";
    }

    $respond['actcount']=$actCount;
    $respond['actmsg']=$actmsg;
    $respond['memcount']=$memocount;
    $respond['memmsg']=$memomsg;
    $respond['lastlogin']=$tdiff;

    //DEACTIVATE THAT MESSAGE
    $upd="UPDATE message SET status='Inactive' WHERE id=$id";
    $conn->query($dbcon,$upd);
    print json_encode($respond);

}


if(isset($_POST['getattachees'])){
    $id=$_POST['getattachees'];
    $sel = "SELECT * FROM std_intern WHERE factid = $id AND status = 'Pending'";
    $selrun = $conn->query($dbcon,$sel);
    $msg = "<table class='table table-striped table-responsive'><thead><tr><th>Student Name</th><th>Facility</th><th>Start Date</th><th>End Date</th><th>Supervisor</th><th>Contact Of Supervisor</th></tr></thead><tbody>";
    while($data = $conn->fetch($selrun)){
        $msg=$msg."<tr><td>".getstudent($data['stdid'])."</td><td>".getfacility($id)."</td><td>".$data['start_date']."</td><td>".$data['end_date']."</td><td>".$data['supervisor']."</td><td>".$data['contact']."</td></tr>";
    }
    $msg = $msg."</tbody></table>";
    print $msg;
}

if(isset($_POST['getexchrate'])){
    $currency=$_POST['getexchrate'];
    $sel="SELECT drate FROM exch_rate WHERE currency='$currency'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);
    $drate=$seldata['drate'];

    print $drate;
}

if(isset($_POST['rate'])){
	$year=$_POST['year'];
	$rate=$_POST['rate'];
	$stfid=$_POST['stfid'];
	//checking the rating percentage
	$chk="SELECT SUM(rating) AS totrate FROM staff_target WHERE voka_id='$stfid' AND year=$year AND status='Active'";
	$chkrun=$conn->query($dbcon,$chk);
	$chkdata=$conn->fetch($chkrun);
	$exrate=$chkdata['totrate'];
	$newrate=$exrate + $rate;
	print $newrate;
}
//AUTHENTICATES STAFF REVIEW
if(isset($_POST['apprformyear'])){
	$year=$_POST['apprformyear'];
	$period=$_POST['period'];
	$voka=$_POST['stfid'];
	
	if($period=='mid_yr'){
		//CHECK IF TARGET HAS BEEN SET FOR STAFF
		$chkt="SELECT id AS tagcount FROM staff_target WHERE voka_id='$voka' AND year=$year AND status='Active'";
		$chktrun=$conn->query($dbcon,$chkt);
		if($conn->sqlnum($chktrun)==0){
			print "NoTgt";
		}
		else{
			$chk="SELECT * FROM targets WHERE year=$year AND voka_id='$voka' AND mid_yr='yes' AND status IN ('Approved','stfreview')";
			$chkrun=$conn->query($dbcon,$chk);
			if($conn->sqlnum($chkrun) == 0){
				print "OK";
			}
			else{
				print "MidDone";
			}
		}
	}
	else{
		//CHECK IF TARGET HAS BEEN SET FOR STAFF
		$chkt="SELECT id AS tagcount FROM staff_target WHERE voka_id='$voka' AND year=$year AND status='Active'";
		$chktrun=$conn->query($dbcon,$chkt);
		if($conn->sqlnum($chktrun)==0){
			print "NoTgt";
		}
		else{
			//check if mid year review has been done
		$mid="SELECT * FROM targets WHERE mid_yr='yes' AND end_yr='no' AND year='$year' AND status='Approved' AND status2='Accepted' AND voka_id='$voka'";
		$midrun=$conn->query($dbcon,$mid);
			if($conn->sqlnum($midrun) != 0){//mid year review has been done
				print "OK";
			}
			else{
				print "NomYear";
			}
		}
	}
}

if(isset($_POST['supappryear'])){
	$year=$_POST['supappryear'];
	$period=$_POST['period'];
	$voka=$_POST['stfid'];


    //check if target is set
    $tgtchk="SELECT * FROM targets WHERE year='$year' AND voka_id='$voka'";
    $tgtrun=$conn->query($dbcon,$tgtchk);

    if($conn->sqlnum($tgtrun) == 0){
        print "NoTgt";
    }else
    {
        if ($period == 'mid_yr') {
            $chkend = "SELECT * FROM targets WHERE voka_id='$voka' AND year=$year AND status ='stfreview'";//CHECK IF MID YEAR APPRAISAL HAS BEEN DONE
            $chkendrun = $conn->query($dbcon, $chkend);
            if ($conn->sqlnum($chkendrun) == 0) {//mid year review is not ready
                print "no_mid";
            }
            else{
                print "mid";
            }

        }
        else{
            $chkend = "SELECT * FROM targets WHERE voka_id='$voka' AND year=$year AND mid_yr='yes'";//CHECK IF MID YEAR APPRAISAL HAS BEEN DONE
            $chkendrun = $conn->query($dbcon, $chkend);
            if ($conn->sqlnum($chkendrun) == 0) {//mid year review is not done
                print "nomidDone";
            }else{
                print "end";
            }
        }
    }
}

if(isset($_POST['companyid'])){
	$company=$_POST['companyid'];
	echo "<td><label>Staff:</label><select name='staff' class='form-control select' required onchange='tuttargets(this.value)'>
			<option value='All'>All</option>";
	$sel="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE company='$company' ORDER BY fst_name DESC";
	$selrun=$conn->query($dbcon,$sel);
	while($items=$conn->fetch($selrun)){
		echo "<option value='".$items['voka_id']."'>".$items['fst_name'].$items['lst_name']."</option>";
	}
	echo "</select></td>";
}

if(isset($_POST['companytargetdate'])){
	$ddate=$_POST['companytargetdate'];
	$sel="SELECT * FROM staff_rec WHERE company='$company' ORDER BY fst_name DESC";
	$selrun=$conn->query($dbcon,$sel);
}

if(isset($_POST['checkapprstat'])){
    //CHECK IF STAFF TARGET HAS ALREADY BEEN SET FOR THE YEAR
	$year=$_POST['checkapprstat'];
	$voka=$_POST['voka'];
	$sel="SELECT * FROM staff_target WHERE year='$year' AND voka_id='$voka'";
	$selrun=$conn->query($dbcon,$sel);
	if($conn->sqlnum($selrun)==0){
		print "yes";
	}
	else{
		print "no";
	}
}

if(isset($_POST['getLeave'])) {
    $lvid = $_POST['getLeave'];
    $sel="SELECT * FROM staff_leave WHERE leaveID='$lvid'";
    $selrun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selrun);

    $respond['repby']=checkName($selData['replacedBy']);
    $respond['app']=checkName($selData['voka_id']);
    $respond['appid']=$selData['voka_id'];
    $respond['ltype']=$selData['leaveType'];
    $respond['sdate']=date("d, M, Y", strtotime(date($selData['startDate'])));
    $respond['edate']=date("d, M, Y", strtotime(date($selData['endDate'])));
    $respond['rdate']=date("d, M, Y", strtotime(date($selData['resumedDate'])));
    $respond['note']=$selData['note'];
    $respond['status']=$selData['status'];
    $respond['ldays']=$selData['leavesTaken'];
    $respond['doreg']=date("d, M, Y H:i:s A", strtotime(date($selData['doreg'])));

    print json_encode($respond);
}

if(isset($_POST['getList'])) {
    $lvid = $_POST['getList'];
    if($lvid=="dept"){
        echo "<td>Select Department</td><td><select class='form-control' name='reclist'>";
        $selcom="SELECT name FROM company WHERE status='Active' ORDER BY name DESC";
        $selcomrun=$conn->query($dbcon,$selcom);
        while($compdata=$conn->fetch($selcomrun)){
            echo "<option value='".$compdata['name']."'>".$compdata['name']."</option>";
        }
        echo "</select></td>";
    }
    elseif($lvid=="Individual"){
        echo "<td>Select Staff</td><td><table>";
        $selcom="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE status !='Detached' ORDER BY fst_name DESC";
        $selcomrun=$conn->query($dbcon,$selcom);
        while($compdata=$conn->fetch($selcomrun)){
            echo "<tr><td><input type='checkbox' class='checkbox' name='reclist[]' value='".$compdata['voka_id']."' /></td><td>".$compdata['fst_name']." ".$compdata['lst_name']."</td></tr>";
        }
        echo "</table></td>";
    }else{
        echo "<input type='hidden' name='reclist' value='All' />";
    }
}

//CHEQUE LOG
if(isset($_POST['checknum'])) {
    $chk=$_POST['checknum'];

    //check if check number exists
    $sel="SELECT * FROM pv_detail WHERE chekno='$chk' AND status='Complete'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);
    $tot=$seldata['total'];
    $tax=$seldata['taxamount'];
    $diff=0;
    if($tax < 0){
        $diff=$tot + $tax;
    }else{
        $diff=$tot - $tax;
    }
    if($conn->sqlnum($selrun)==0){
        echo "NO";
    }else{
        //CHECK IF CHEQUE HAS ALREADY BEEN ISSUED OUT
        $check="SELECT id FROM cheque WHERE chekno='$chk'";
        $checkrun=$conn->query($dbcon,$check);
        if($conn->sqlnum($checkrun)==0) {
            echo "<div class='panel panel-body login-form'>
                <h5 class='content-group text-center'><small class='display-block'>PV Details Of Check Number " . $chk . "</small></h5>
                <div class='row'>
                    <div class='col-md-12'>
                        <table class='table table-striped'><tr><th>PV #</th><td>" . $seldata['pv_id'] . "</td></tr><tr><th>Supplier</th><td>" . $seldata['supplier'] . "</td></tr><tr><th>Total Amount</th><td>" . $tot . "</td></tr><tr><th>Total Tax</th><td>" . $tax . "</td></tr><tr><th>Net Amount</th><td>" . $diff . " " . $seldata['curr'] . "</td></tr></table>
                    </div>
                </div>
            </div>";
        }
        else{
            echo "exists";
        }
    }
}

if(isset($_POST["type"])){
    $param = (object)$_POST;
    $chequeNum = $param->checknumber;
    $template = $param->template;
    $date = date("d m Y", strtotime($param->date));

    //check if check number exists
    $sel="SELECT * FROM `pv_detail` WHERE chekno='$chequeNum' AND status='Complete' AND issued = 'no'";
    $chequeAvailable = $conn->query($dbcon,$sel);

    if($conn->sqlnum($chequeAvailable) < 1) {
        echo json_encode(array(
            "success" => false,
            "message" => "The check number does not exist or it has been issued out",
        ));
        exit();
    }
    else{
        $chequeData = $conn->fetch($chequeAvailable);
        $supplier = $chequeData['supplier'];
        $tot=$chequeData['total'];
        $tax=$chequeData['taxamount'];
        $diff=0;
        if($tax < 0){
            $diff=$tot + $tax;
        }else{
            $diff=$tot - $tax;
        }

        $bankCode = $chequeData['bankCode'];
        $company = $chequeData['company'];
        $company = $chequeData['company'];
        $img="background: url('assets/images/hfc.jpg')";

        $display="<div class='row' style='".$img."'><div class='col-md-12'> ".

                 "</div></div>";

        echo json_encode(array(
            "success" => true,
            "amount" => $diff,
            "supplier" => $supplier,
            "chequetype" => $template,
            "date" => $date,
            "display" => $display

        ));
    }

}

//CAREER EDIT API
if(isset($_POST['editcareer'])){
    $id=$_POST['editcareer'];
    $sel="SELECT * FROM careers WHERE id=$id";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);
    $result['title']=$seldata['title'];
    $result['company']=$seldata['company'];
    $result['description']=$seldata['description'];
    $result['deadline']=$seldata['deadline'];
    $result['type']=$seldata['jobtype'];

    print json_encode($result);
}

if(isset($_POST['searchcrit'])){
    $crit=$_POST['searchcrit'];
    $val=$_POST['searchval'];
    $sel="";
    $response="";
    if($crit=="phone"){
        $sel="SELECT * FROM visitors WHERE phone LIKE '%$val%' AND status='active'";
    }else{
        $sel="SELECT * FROM visitors WHERE name LIKE '%$val%' AND status='active'";
    }
    $selrun=$conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun)==0){
        print "No Records Found";
    }else{
        $count=0;
        print "<table class='table table-bordered table-striped'><thead style='color: #8e080d; background-color: #b8dbe6'><td>#</td><td>Visitor</td><td>Phone Number</td><td>Action</td></thead><tbody>";
        while($rows=$conn->fetch($selrun)){
            $count++;
            print "<tr><td>".$count."</td><td>".$rows['name']."</td><td>".$rows['phone']."</td><td><button class='btn btn-sm btn-primary' onclick='addlodge(".$rows['id'].")'>Lodge Visitor</button> </td></tr>";
        }
        print "</tbody></table>";
    }
}

if(isset($_POST['dailyvisits'])){
    $sel="SELECT * FROM visits WHERE timestamp BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date("Y-m-d 23:59:59")."'";
    $selrun=$conn->query($dbcon,$sel);
    echo "<div class='row'><div class='col-md-6' style='margin-bottom: 1%'><h5 class='text-left'><small class='display-block'>VISITORS LODGED ".date('l, d M, Y')."</small></h5> </div><div class='col-md-6' align='right'><button class='btn btn-lg btn-primary' onclick='addvisitor()'>ADD VISITOR</button></div> </div> <table class='table table-bordered table-striped'><thead style='color: #FD550F; background-color: #f3ffb0'><td>#</td><td>Visitor</td><td>Phone Number</td><td>Purpose</td><td>Host</td><td>Time In</td><td>Time Out</td><td>Signature</td><td>Status</td><td>Administrator</td><td>Action</td></thead><tbody>";
    if($conn->sqlnum($selrun)==0){
        echo "<tr><td colspan='9'>NO RECORDS AVAILABLE</td></tr>";
    }else{
        $count=0;
        while($rows=$conn->fetch($selrun)){
            $count++;
            $status=$rows['status'];
            $id=$rows['visitorid'];
            //GET THE BASIC DETAILS OF THE STAFF
            $get="SELECT * FROM visitors WHERE visitorid='$id'";
            $getrun=$conn->query($dbcon,$get);
            $getdata=$conn->fetch($getrun);
            $btn="";
            if($status !="signed out"){
                $btn="<button class='btn btn-sm btn-primary' onclick='signout(".$rows['id'].")'>Sign Out</button> ";
            }
            print "<tr><td>".$count."</td><td>".$getdata['name']."</td><td>".$getdata['phone']."</td><td>".$rows['purpose']."</td><td>".checkName($rows['voka_id'])."</td><td>".$rows['intime']."</td><td>".$rows['outtime']."</td><td><img src='".$rows['img']."' class='img-responsive' width='50%'/></td><td>".$rows['status']."</td><td>".checkName($rows['user'])."</td><td>".$btn."</td></tr>";
        }
    }
    echo "</tbody></table>";
}

if(isset($_POST['signout'])){
    $id=$_POST['signout'];
    $otime=date("H:i:s");
    $upd="UPDATE visits SET status='signed out', outtime='$otime' WHERE id=$id";
    $conn->query($dbcon,$upd);
    $sel="SELECT * FROM visits WHERE timestamp BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date("Y-m-d 23:59:59")."'";
    $selrun=$conn->query($dbcon,$sel);
    echo "<div class='row'><div class='col-md-6' style='margin-bottom: 1%'><h5 class='text-left'><small class='display-block'>VISITORS LODGED ".date('l, d M, Y')."</small></h5> </div><div class='col-md-6' align='right'><button class='btn btn-lg btn-primary' onclick='addvisitor()'>ADD VISITOR</button></div> </div> <table class='table table-bordered table-striped'><thead style='color: #FD550F; background-color: #f3ffb0'><td>#</td><td>Visitor</td><td>Phone Number</td><td>Purpose</td><td>Host</td><td>Time In</td><td>Time Out</td><td>Signature</td><td>Status</td><td>Administrator</td><td>Action</td></thead><tbody>";
    if($conn->sqlnum($selrun)==0){
        echo "<tr><td colspan='9'>NO RECORDS AVAILABLE</td></tr>";
    }else{
        $count=0;
        while($rows=$conn->fetch($selrun)){
            $count++;
            $status=$rows['status'];
            $id=$rows['visitorid'];
            //GET THE BASIC DETAILS OF THE STAFF
            $get="SELECT * FROM visitors WHERE visitorid='$id'";
            $getrun=$conn->query($dbcon,$get);
            $getdata=$conn->fetch($getrun);
            $btn="";
            if($status !="signed out"){
                $btn="<button class='btn btn-sm btn-primary' onclick='signout(".$rows['id'].")'>Sign Out</button> ";
            }
            print "<tr><td>".$count."</td><td>".$getdata['name']."</td><td>".$getdata['phone']."</td><td>".$rows['purpose']."</td><td>".checkName($rows['voka_id'])."</td><td>".$rows['intime']."</td><td>".$rows['outtime']."</td><td><img src='".$rows['img']."' class='img-responsive' width='50%'/></td><td>".$rows['status']."</td><td>".checkName($rows['user'])."</td><td>".$btn."</td></tr>";
        }
    }
    echo "</tbody></table>";
}

if(isset($_POST['getvisitor'])){
    $id=$_POST['getvisitor'];
    //GET THE VISITOR BASIC RECORDS
    $sel="SELECT * FROM visitors WHERE id=$id";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);

    $result['name']=$seldata['name'];
    $result['phone']=$seldata['phone'];
    $result['visid']=$seldata['visitorid'];

    print json_encode($result);
}

if(isset($_POST['getuat'])){
    $id=$_POST['getuat'];
    //GET THE VISITOR BASIC RECORDS
    $sel="SELECT * FROM test_proj WHERE pj_id='$id'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);

    $result['title']=$seldata['title'];
    $result['desc']=$seldata['descr'];

    print json_encode($result);
}

if(isset($_POST['getuatfback'])){
    $id=$_POST['getuatfback'];
    //GET THE VISITOR BASIC RECORDS
    $sel = "SELECT M.title, M.descr, S.fback, S.rev_date FROM test_proj M INNER JOIN proj_st_test S ON M.pj_id = S.pj_id WHERE S.pj_id='$id' AND S.status='DONE'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);

    $result['title']=$seldata['title'];
    $result['desc']=$seldata['descr'];
    $result['fback']=$seldata['fback'];

    print json_encode($result);
}

if(isset($_POST['updatedob'])){
    $dob=$_POST['updatedob'];
    $voka=$_POST['voka'];
    //GET THE VISITOR BASIC RECORDS
    $upd = "UPDATE biodata SET dob = '$dob' WHERE voka_id='$voka'";
    if($conn->query($dbcon,$upd)){
        print "OK";
    }
    else{
        print "NOT";
    }
}

if(isset($_POST['getBday'])){
    $vokaId = $_POST['getBday'];
    $ddate=date("Y-m-d");
    //CHECK IF STAFF HAS A BDAY
    $sel="SELECT tone FROM bdayrec WHERE voka_id='$vokaId' AND bdate = '$ddate'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);

    print $seldata['tone'];
}
?>