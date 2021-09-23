<?php
include 'phpexcel/PHPExcel/IOFactory.php';//PHP EXCEL PLUGIN
/* STUDENT REGISTRATION */
if(isset($_POST['addnewstudent'])){
    $img=$_FILES['stdimg']['tmp_name'];
    $newname="assets/images/defaults/avatar.png";//URL of the image location

    $fname=mysqli_real_escape_string($dbcon,$_POST['fname']);
    $lname=mysqli_real_escape_string($dbcon,$_POST['lname']);
    $cont=mysqli_real_escape_string($dbcon,$_POST['contact']);
    $mail=mysqli_real_escape_string($dbcon,$_POST['email']);
    $sttype=mysqli_real_escape_string($dbcon,$_POST['sttype']);
    $program=mysqli_real_escape_string($dbcon,$_POST['program']);
    $stres=mysqli_real_escape_string($dbcon,$_POST['stres']);
    $admitdate=mysqli_real_escape_string($dbcon,$_POST['admitdate']);
    $stsex=mysqli_real_escape_string($dbcon,$_POST['stsex']);
    $resaddr=mysqli_real_escape_string($dbcon,$_POST['resaddr']);
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);
    $batchno=mysqli_real_escape_string($dbcon,$_POST['batchno']);
    $stsession=mysqli_real_escape_string($dbcon,$_POST['stsession']);

    $yr = date("Y",strtotime(date($admitdate)));
    $mnt = date("m",strtotime(date($admitdate)));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT fname FROM students WHERE styr = '$yr' AND program = '$program'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    //GENERATE STUDENT ID
    $stdid = "MHC/".$program."/".$yr."/".$mnt."/".str_pad(($selnum + 1),4,"0",STR_PAD_LEFT);

    if(!empty($img)){
        $newname="assets/data/students/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO students (stdid, img, fname, lname, contact, email, sttype, program, stres, admitdate, status, sex, dob, resaddr,fees, batchno, styr, stsession) VALUES ('$stdid','$newname','$fname','$lname','$cont','$mail','$sttype','$program','$stres','$admitdate','Pending','$stsex','$dob','$resaddr',0.00,'$batchno','$yr','$stsession')";
    $conn->query($dbcon,$ins);

    //CREATE USER BY CALLING THE FUNCTION
    addUser($stdid,'admin123','student',$fname,$lname,'student',$newname);

    $test = "yes";
    $msg = "Student Details Has Been Added Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;
    $msg2 = "Student Basic Details Saved. Proceed To Add More Details";

    //AUDIT TRAIL
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Student Creation', event='$msg', ip='$usrIP'";
    $conn->query($dbcon,$aud);

}
if(isset($_GET['deactivate_apt'])){
    $qxtn=mysqli_real_escape_string($dbcon,$_GET['deactivate_apt']);
    $deact = "UPDATE exam_qxtns SET status = 'Inactive' WHERE id = $qxtn";
    $conn->query($dbcon,$deact);

    $test="yes";
    $msg="Examination Question Deactivated";
}
if(isset($_GET['activate_apt'])){
    $qxtn=mysqli_real_escape_string($dbcon,$_GET['activate_apt']);
    $deact = "UPDATE exam_qxtns SET status = 'Active' WHERE id = $qxtn";
    $conn->query($dbcon,$deact);

    $test="yes";
    $msg="Examination Question Activated";
}
if(isset($_POST['create_qxtn'])){
    $qxtn=mysqli_real_escape_string($dbcon,$_POST['qxtn']);
    $sbjid=mysqli_real_escape_string($dbcon,$_POST['sbjid']);
    $answer=mysqli_real_escape_string($dbcon,$_POST['answer']);
    $section=mysqli_real_escape_string($dbcon,$_POST['section']);
    $dimgurl="assets/data/questions/".date("YmdHis").".jpg";
    $file=$_FILES['dqxtnimg']['tmp_name'];
    $upd="";
    $ans="";
    if($section == "Objectives"){
        $ans = $answer;
    }else{
        $ans = $section;
    }
    if(empty($file)){
        $ins="INSERT INTO exam_qxtns (sbjid,qxtn,status,answer,sectiontype) VALUES('$sbjid','$qxtn','Active','$ans','$section')";
        $conn->query($dbcon,$ins);
    }
    else {
        $file = file_put_contents($dimgurl, file_get_contents($file));
        $ins="INSERT INTO exam_qxtns (sbjid,qxtn,status,answer,imgurl,sectiontype) VALUES('$sbjid','$qxtn','Active','$ans','$dimgurl','$section')";
        $conn->query($dbcon,$ins);
    }


    $test="yes";
    $msg="Aptitude Test Question Added";
}
if(isset($_POST['proceednewstudent'])){
    $img=$_FILES['stdimg']['tmp_name'];
    $newname="assets/images/defaults/avatar.png";//URL of the image location

    $fname=mysqli_real_escape_string($dbcon,$_POST['fname']);
    $lname=mysqli_real_escape_string($dbcon,$_POST['lname']);
    $cont=mysqli_real_escape_string($dbcon,$_POST['contact']);
    $mail=mysqli_real_escape_string($dbcon,$_POST['email']);
    $sttype=mysqli_real_escape_string($dbcon,$_POST['sttype']);
    $program=mysqli_real_escape_string($dbcon,$_POST['program']);
    $stres=mysqli_real_escape_string($dbcon,$_POST['stres']);
    $admitdate=mysqli_real_escape_string($dbcon,$_POST['admitdate']);
    $stsex=mysqli_real_escape_string($dbcon,$_POST['stsex']);
    $resaddr=mysqli_real_escape_string($dbcon,$_POST['resaddr']);
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);
    $batchno=mysqli_real_escape_string($dbcon,$_POST['batchno']);
    $stsession=mysqli_real_escape_string($dbcon,$_POST['stsession']);

    $yr = date("Y",strtotime(date($admitdate)));
    $mnt = date("m",strtotime(date($admitdate)));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT fname FROM students WHERE styr = '$yr' AND program = '$program'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    //GENERATE STUDENT ID
    $stdid = "MHC/".$program."/".$yr."/".$mnt."/".str_pad(($selnum + 1),4,"0",STR_PAD_LEFT);

    //GET THE INVOICE ID
    $invchk = "SELECT invoiceid FROM student_invoices";
    $invchkrun = $conn->query($dbcon,$invchk);
    $invnum = $conn->sqlnum($invchkrun);
    $invid = "INV/".$yr."/".str_pad(($invnum + 1),4,"0",STR_PAD_LEFT);

    //CREATE THE STUDENT EXAMS RECORDS
    $insexams = "INSERT INTO std_exams (sbjid, stdid,status)SELECT sbjid, '$stdid', 'Pending' FROM sbj_course WHERE cid = '$program'";
    $conn->query($dbcon,$insexams);

    //GET THE SCHOOL FEES
    $fees = getfees($program);

    if(!empty($img)){
        $newname="assets/data/students/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO students (stdid, img, fname, lname, contact, email, sttype, program, stres, admitdate, status, sex, dob, resaddr,fees, batchno, styr, stsession) VALUES ('$stdid','$newname','$fname','$lname','$cont','$mail','$sttype','$program','$stres','$admitdate','Active','$stsex','$dob','$resaddr',($fees + 100),'$batchno','$yr','$stsession')";
    $conn->query($dbcon,$ins);

    //ADD NEW INVOICE
    //ADD NEW STUDENT
    $inv = "INSERT INTO student_invoices (invoiceid, stdid, invdate, totalamount, paid, status, created_date, yr) VALUES ('$invid','$stdid','$admitdate',($fees + 100),0.00,'Pending','$dateTime','$yr')";
    $conn->query($dbcon,$inv);

    //CREATE USER BY CALLING THE FUNCTION
    addUser($stdid,'admin123','student',$fname,$lname,'student',$newname);

    $test = "yes";
    $msg = "Student Has Been Registered Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;
    $msg2 = "Student Basic Details Saved. Proceed To Add More Details";

    header("Location: dashboard.php?student_details=$stdid");

    //AUDIT TRAIL
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Student Creation', event='$msg', ip='$usrIP'";
    $conn->query($dbcon,$aud);
}

if(isset($_GET['activate_student'])){

    $stdid=mysqli_real_escape_string($dbcon,$_GET['activate_student']);

    //GET THE STUDENT DETAILS
    $selchk = "SELECT styr, program, admitdate FROM students WHERE stdid = '$stdid'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $seldata = $conn->fetch($selchkrun);

    $yr = date("Y",strtotime(date($seldata['styr'])));
    $program = $seldata['program'];
    $admitdate = $seldata['admitdate'];

    //GET THE INVOICE ID
    $invchk = "SELECT invoiceid FROM student_invoices";
    $invchkrun = $conn->query($dbcon,$invchk);
    $invnum = $conn->sqlnum($invchkrun);
    $invid = "INV/".$yr."/".str_pad(($invnum + 1),4,"0",STR_PAD_LEFT);

    //CREATE THE STUDENT EXAMS RECORDS
    $insexams = "INSERT INTO std_exams (sbjid, stdid,status)SELECT sbjid, '$stdid', 'Pending' FROM sbj_course WHERE cid = '$program'";
    $conn->query($dbcon,$insexams);

    //GET THE SCHOOL FEES
    $fees = getfees($program);

    //ACTIVATE THE STUDENT STATUS
    $upd = "UPDATE students SET status = 'Active', fees = ($fees + 100) WHERE stdid = '$stdid'";
    $conn->query($dbcon,$upd);

    //ADD NEW INVOICE
    $inv = "INSERT INTO student_invoices (invoiceid, stdid, invdate, totalamount, paid, status, created_date, yr) VALUES ('$invid','$stdid','$admitdate',($fees + 100),0.00,'Pending','$dateTime','$yr')";
    $conn->query($dbcon,$inv);

    $msg = "Student Has Been Activated Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;

    header("Location: dashboard.php?student_details=$stdid");

    //AUDIT TRAIL
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Student Creation', event='$msg', ip='$usrIP'";
    $conn->query($dbcon,$aud);
}
//BANK DEPOSIT
if(isset($_POST['bankdeposit'])){
    $img=$_FILES['bankimg']['tmp_name'];
    $newname="assets/images/defaults/noimage.jpg";//URL of the image location

    $bankcode=mysqli_real_escape_string($dbcon,$_POST['bankid']);
    $chq=mysqli_real_escape_string($dbcon,$_POST['chqno']);
    $amount=mysqli_real_escape_string($dbcon,$_POST['chqamount']);
    $dod=mysqli_real_escape_string($dbcon,$_POST['dod']);
    $desc=mysqli_real_escape_string($dbcon,$_POST['chqdesc']);

    if(!empty($img)){
        $newname="assets/data/deposits/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO bank_deposits (bankcode, chq, chqamount, dod, slip, description) VALUES ('$bankcode','$chq',$amount,'$dod', '$newname','$desc')";
    $conn->query($dbcon,$ins);

    $test = "yes";
    $msg = "Bank Deposit Made Successfully";

    //AUDIT TRAIL
    $event="Amount ".$amount." Deposited Into Bank ".getbank($bankcode)." With Cheque Number ".$chq;
    auditTrail($event,$stfID,'Bank Deposit',$usrIP);

    //SEND NOTIFICATION TO THOSE WITH ACCESS RIGHTS
    $dep = "SELECT stfid FROM staff WHERE bank = 'Manager'";
    $deprun = $conn->query($dbcon,$dep);
    while($depdata=$conn->fetch($deprun)){
        $stfid = $depdata['stfid'];
        notifyStaff($event,"Bank Deposit",$stfid);
    }

}
//END OF BANK DEPOSIT
//HOSTEL
if(isset($_POST['hosteloccupant'])){

    $stdid=mysqli_real_escape_string($dbcon,$_POST['stdid']);
    $room=mysqli_real_escape_string($dbcon,$_POST['room']);
    $amount=mysqli_real_escape_string($dbcon,$_POST['amount']);
    $sdate=mysqli_real_escape_string($dbcon,$_POST['sdate']);
    $edate=mysqli_real_escape_string($dbcon,$_POST['edate']);

    $yr = date("Y",strtotime(date($sdate)));
    $mnt = date("m",strtotime(date($sdate)));

    //GET THE INVOICE ID
    $invchk = "SELECT invoiceid FROM hostel_invoices WHERE yr = '$yr'";
    $invchkrun = $conn->query($dbcon,$invchk);
    $invnum = $conn->sqlnum($invchkrun);
    $invid = "HST/".$yr."/".str_pad(($invnum + 1),4,"0",STR_PAD_LEFT);

    //ADD NEW INVOICE
    $inv = "INSERT INTO hostel_invoices (invoiceid, stdid, invdate, totalamount, paid, status, created_date, yr, sdate, edate, room) VALUES ('$invid','$stdid','$sdate',$amount,0.00,'Pending','$dateTime','$yr','$sdate','$edate','$room')";
    $conn->query($dbcon,$inv);

    $test = "yes";
    $msg = "Student Admitted Into Hostel Successfully";

    //AUDIT TRAIL
    $event="Student ".$stdid." Admitted Into Hostel";
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Hostel Occupant', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);
}
//END OF HOSTEL

//ADD BANK
if(isset($_POST['bankname'])){
    $name=$_POST['bankname'];
    $code=$_POST['bankCode'];
    $branch=$_POST['branch'];
    $accountnumber=$_POST['accountnumber'];

    //checkk if account number exists
    $chk="SELECT name FROM banks WHERE account='$accountnumber'";
    $chkrun=$conn->query($dbcon,$chk);

    if($conn->sqlnum($chkrun) > 0){
        $test="no";
        $msg="Bank Account Exists";
    }
    else{
        $ins="INSERT INTO banks SET bankcode='$code', name='$name', branch='$branch', account='$accountnumber', status='Active'";
        $conn->query($dbcon,$ins);

        $test="yes";
        $msg="Bank Added Successfully";
    }
}

if(isset($_POST['addexams'])){

    $examid=mysqli_real_escape_string($dbcon,$_POST['examid']);
    $score=mysqli_real_escape_string($dbcon,$_POST['score']);

    //UPDATE THE EXAMS RECORD
    $upd = "UPDATE std_exams SET exam_score= $score WHERE id='$examid'";
    $conn->query($dbcon,$upd);

    $test = "yes";
    $msg = "Examination Record Has Been Updated";
}

if(isset($_POST['updatestudent'])){

    $fname=mysqli_real_escape_string($dbcon,$_POST['fname']);
    $lname=mysqli_real_escape_string($dbcon,$_POST['lname']);
    $cont=mysqli_real_escape_string($dbcon,$_POST['contact']);
    $mail=mysqli_real_escape_string($dbcon,$_POST['email']);
    $sttype=mysqli_real_escape_string($dbcon,$_POST['sttype']);
    $program=mysqli_real_escape_string($dbcon,$_POST['prog']);
    $stres=mysqli_real_escape_string($dbcon,$_POST['stdres']);
    $stsex=mysqli_real_escape_string($dbcon,$_POST['gender']);
    $resaddr=mysqli_real_escape_string($dbcon,$_POST['resaddr']);
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);
    $batchno=mysqli_real_escape_string($dbcon,$_POST['batchno']);
    $status=mysqli_real_escape_string($dbcon,$_POST['ststatus']);
    $stdid=mysqli_real_escape_string($dbcon,$_POST['stdid']);

    //UPDATE THE STUDENT RECORD
    $upd = "UPDATE students SET fname='$fname',lname='$lname',contact='$cont',email='$mail',sttype='$sttype',program='$program',stres='$stres',status='$status',sex='$stsex',dob='$dob',resaddr='$resaddr',batchno='$batchno' WHERE stdid='$stdid'";
    $conn->query($dbcon,$upd);

    $test = "yes";
    $msg = "Student Record Has Been Updated Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;
}
if(isset($_POST['proceednewstaff']) || isset($_POST['addnewstaff'])){
    $img=$_FILES['stfimg']['tmp_name'];
    $newname="assets/images/defaults/avatar.png";//URL of the image location

    $fname=mysqli_real_escape_string($dbcon,$_POST['fname']);
    $lname=mysqli_real_escape_string($dbcon,$_POST['lname']);
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);

    $cont=mysqli_real_escape_string($dbcon,$_POST['contact']);
    $mail=mysqli_real_escape_string($dbcon,$_POST['email']);
    $position=mysqli_real_escape_string($dbcon,$_POST['post']);
    $admitdate=mysqli_real_escape_string($dbcon,$_POST['admitdate']);
    $stsex=mysqli_real_escape_string($dbcon,$_POST['stsex']);
    $resaddr=mysqli_real_escape_string($dbcon,$_POST['resaddr']);
    $sttitle=mysqli_real_escape_string($dbcon,$_POST['sttitle']);

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT fname FROM staff";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    //GENERATE STUDENT ID
    $yr = date("Y",strtotime(date($admitdate)));
    $stfid = "MHC/STF/".$yr."/".str_pad(($selnum + 1),4,"0",STR_PAD_LEFT);

    if(!empty($img)){
        $newname="assets/data/staff/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO staff (stfid, img, fname, lname, contact, email, post, admitdate, status, sex, dob, resaddr,sttitle) VALUES ('$stfid','$newname','$fname','$lname','$cont','$mail','$position','$admitdate','Active','$stsex','$dob','$resaddr','$sttitle')";
    $conn->query($dbcon,$ins);

    //CREATE USER BY CALLING THE FUNCTION
    addUser($stfid,'admin123','staff',$fname,$lname,'staff',$newname);

    $test = "yes";
    $msg = "Staff Has Been Registered Successfully. \n"."<b>STAFF NAME:</b> ".$fname." ".$lname."\n <b>STAFF ID:</b> ".$stfid;

    if(isset($_POST['proceednewstaff'])){
        header("Location: dashboard.php?staff_details=$stfid");
    }
}

if(isset($_POST['attachsbj'])){
    $sbj = $_POST['sbjid'];
    $stfid = $_POST['stfid'];
    //CHECK IF SUBJECT ALREADY EXISTS FOR THE STAFF
    $chk = "SELECT status FROM stf_sbj WHERE stfid = '$stfid' AND sbjid = '$sbj'";
    $chkrun = $conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $ins = "INSERT INTO stf_sbj(sbjid, stfid, status) VALUES('$sbj','$stfid','Active')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Subject, ".getSubject($sbj)." Has Been Attached To Staff";
    }else{
        //ATTACHMENT EXISTS
        //GET THE STATUS OF THE ATTACHEMENT
        $sbjdata = $conn->fetch($chkrun);
        $status = $sbjdata['status'];
        if($status == 'Active'){
            $test = "yes";
            $msg = "Subject, ".getSubject($sbj)." Already Attached To Staff";
        }else{
            $upd = "UPDATE stf_sbj SET status = 'Active' WHERE sbjid = '$sbj' AND stfid = '$stfid'";
            $conn->query($dbcon,$upd);
            $test = "yes";
            $msg = "Subject, ".getSubject($sbj)." Has Been Attached To Staff";
        }
    }
}

//DETACH SUBJECT FROM STAFF
if(isset($_GET['detachsbj'])){
    $id = $_GET['detachsbj'];
    $upd = "UPDATE stf_sbj SET status = 'Inactive' WHERE id = $id";
    $conn->query($dbcon,$upd);

    $test="yes";
    $msg="Subject Has Been Detached";
}

//SENDING MEMO
if(isset($_POST['anmsg'])) {
    $anmsg = mysqli_real_escape_string($dbcon,$_POST['anmsg']);
    $title= mysqli_real_escape_string($dbcon,$_POST['title']);
    $rectype= $_POST['rectype']; // STAFF SELECTION
    if($rectype=="All"){
        $sel="SELECT stfid FROM staff WHERE status ='Active'";
        $selrun=$conn->query($dbcon,$sel);
        while($data=$conn->fetch($selrun)){
            $stfid=$data['stfid'];
            //Send the message to the notifier
            $msgqry="INSERT INTO message SET stfid='$stfid', message='$anmsg', caption='MEMO: $title', status='Active'";
            $conn->query($dbcon,$msgqry);

            //Keep Record Of The Memo
            $memo="INSERT INTO memo SET stfid='$stfid', usr='$stfID', title='$title', msg='$anmsg', status='Active'";
            $conn->query($dbcon,$memo);
        }
        $test="yes";
        $msg="Memo Has Been Sent To All Staff";

        //AUDIT TRAIL
        $event="Memo Sent To All Staff";
        $aud="INSERT INTO atrails SET stfid='$stfID', module='MEMO', event='$event', ip='$usrIP'";
        $conn->query($dbcon,$aud);
    }
    else{
        $msgqry="INSERT INTO message SET stfid='$rectype', message='$anmsg', caption='MEMO: $title', status='Active'";
        $conn->query($dbcon,$msgqry);

        //Keep Record Of The Memo
        $memo="INSERT INTO memo SET stfid='$rectype', usr='$stfID', title='$title', msg='$anmsg', status='Active'";
        $conn->query($dbcon,$memo);

        //AUDIT TRAIL
        $event="Memo Sent To ".checkName($rectype);
        $aud="INSERT INTO atrails SET stfid='$stfID', module='MEMO', event='$event', ip='$usrIP'";
        $conn->query($dbcon,$aud);

        $test="yes";
        $msg="Memo Has Been Sent To ".checkName($rectype);
    }
}

if(isset($_POST['currencyadd'])){
    $currency =$_POST['currencyadd'];
    $rate=$_POST['exchrate'];

    //Check If the current password entered is correc
    $chk="SELECT * FROM exch_rate WHERE currency='$currency'";
    $chkrun=$conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $upd="INSERT INTO exch_rate (currency, drate) VALUES ('$currency',$rate)";
        $conn->query($dbcon,$upd);
        $test="yes";
        $msg="Currency Exchange Rate Added Successfully";

    }else{
        $test="no";
        $msg="Exchange Rate ".$currency." Already Exists";
    }

}

if(isset($_POST['currencynew'])){
    $currency =$_POST['currencynew'];
    $rate=$_POST['exchrate'];
    $rate_id=$_POST['exchrate_id'];

    //Check If the current password entered is correc
    $chk="UPDATE exch_rate SET drate = $rate WHERE id = $rate_id";
    $chkrun=$conn->query($dbcon,$chk);
    $test="yes";
    $msg="Currency Exchange Rate For $currency Updated Successfully";

}

//PAYMENT VOUCHER GENERATION
//PV 
if(isset($_POST['genpv'])){
    $expType=mysqli_real_escape_string($dbcon,$_POST['expType']);
    $curr=mysqli_real_escape_string($dbcon,$_POST['currency']);
    $exch=mysqli_real_escape_string($dbcon,$_POST['exchgrate']);
    $expdate=$_POST['expdate'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];
    $supplier=mysqli_real_escape_string($dbcon,$_POST['supplier']);
    $dept=mysqli_real_escape_string($dbcon,$_POST['dept']);
    $bank=mysqli_real_escape_string($dbcon,$_POST['bk_code']);
    $expcls=mysqli_real_escape_string($dbcon,$_POST['exp_cls']);
    $pvId=date("YmdHis");

    $array3 = explode("*", $dept);//Expense account details
    $department=$array3[0];
    $supervisor=$array3[1];

    $count=COUNT($amount);
    $failed=0;
    $success=0;
    $totAmount=0;
    for($i=0; $i < $count; $i++){
        if(!empty($amount[$i]) || !empty($description[$i])){
            $desc=mysqli_real_escape_string($dbcon,$description[$i]);
            $totAmount+=$amount[$i];
            $qry="INSERT INTO pv SET exp_date='$expdate[$i]', total=$amount[$i], pv_id='$pvId', description='$desc'";
            $conn->query($dbcon,$qry);
            $success++;
        }
        else{
            $failed++;
        }
    }
    if($success > 0){
        $qry2="INSERT INTO pv_detail SET expense_class='$expcls', bankcode='$bank', curr='$curr', exchrate=$exch, expType='$expType',  dept='$department',total=$totAmount, pv_id='$pvId', stfid='$stfID', supervisor='$supervisor', supplier='$supplier', status='Pending'";
        $conn->query($dbcon,$qry2);
        $test="yes";
        $msg="PV generated successfully.";
        header("Location: dashboard.php?showPV=$pvId");
    }

}

//PV TYPE
if(isset($_POST['super'])){
    $name=mysqli_real_escape_string($dbcon,$_POST['pvtypes']);
    $sup=mysqli_real_escape_string($dbcon,$_POST['super']);
    $selchk="SELECT name FROM pvtype WHERE name='$name'";
    $selRun=$conn->query($dbcon,$selchk);
    if($conn->sqlnum($selRun) == 0){
        $ins="INSERT INTO pvtype SET name='$name', sup='$sup',  status='Active'";
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg="PV Type Created Successfully";
    }else{
        $test="no";
        $msg="PV Type, <b>$name</b> , Exists Already";
    }
}

if(isset($_POST['updatestaff'])){
    $fname=mysqli_real_escape_string($dbcon,$_POST['fname']);
    $lname=mysqli_real_escape_string($dbcon,$_POST['lname']);
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);

    $cont=mysqli_real_escape_string($dbcon,$_POST['cont']);
    $stfid=mysqli_real_escape_string($dbcon,$_POST['stfid']);
    $mail=mysqli_real_escape_string($dbcon,$_POST['email']);
    $position=mysqli_real_escape_string($dbcon,$_POST['position']);
    $admitdate=mysqli_real_escape_string($dbcon,$_POST['empdate']);
    $stsex=mysqli_real_escape_string($dbcon,$_POST['sex']);
    $resaddr=mysqli_real_escape_string($dbcon,$_POST['resaddr']);
    $sttitle=mysqli_real_escape_string($dbcon,$_POST['sttitle']);
    $ststatus=mysqli_real_escape_string($dbcon,$_POST['ststatus']);


    //UPDATE THE STAFF RECORDS
    $upd = "UPDATE staff SET sttitle ='$sttitle', status='$ststatus', fname='$fname', lname='$lname', sex='$stsex', contact = '$cont', email='$mail', post='$position', admitdate='$admitdate', dob='$dob', resaddr = '$resaddr' WHERE stfid='$stfid'";
    $conn->query($dbcon,$upd);
    $test = "yes";
    $msg = "Staff Record Has Been Updated";
}

if(isset($_POST['addcourse'])){
    $cseid=mysqli_real_escape_string($dbcon,strtoupper($_POST['cseid']));
    $cname=mysqli_real_escape_string($dbcon,strtoupper($_POST['cname']));
    $fees=mysqli_real_escape_string($dbcon,strtoupper($_POST['fees']));
    $subjects=$_POST['subjects'];

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT cid FROM course WHERE cid = '$cseid'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO course (cid, cname, status, fees) VALUES ('$cseid','$cname','Active',$fees)";
        $conn->query($dbcon,$ins);

        $count= COUNT($subjects);
        for($i=0;$i < $count; $i++){
            $sbjid=$subjects[$i];
            $msgqry="INSERT INTO sbj_course(sbjid, cid) VALUES ('$sbjid','$cseid')";
            $conn->query($dbcon,$msgqry);
        }

        $test = "yes";
        $msg = "Course Has Been Added Successfully";
    }else{
        $test = "no";
        $msg = "Course ID ".$cseid." Already Exists";
    }
}

if(isset($_POST['addpharmacy'])){
    $pname=mysqli_real_escape_string($dbcon,strtoupper($_POST['pname']));
    $paddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['paddr']));
    $pcont=mysqli_real_escape_string($dbcon,strtoupper($_POST['pcont']));
    $pmail=mysqli_real_escape_string($dbcon,strtoupper($_POST['pmail']));
    $ploc=mysqli_real_escape_string($dbcon,strtoupper($_POST['ploc']));
    $ptype=mysqli_real_escape_string($dbcon,strtoupper($_POST['ptype']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT pname FROM facilities WHERE pname = '$pname' AND ploc = '$ploc'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO facilities (pname, paddr, pcont, pmail, ploc,ptype, status) VALUES ('$pname','$paddr','$pcont','$pmail','$ploc','$ptype','Active')";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Facility Has Been Added Successfully";
    }else{
        $test = "no";
        $msg = "Facility Already Exists";
    }

    //AUDIT TRAIL
    $event="Pharmacy Or Facility, ".$pname." Created";
    auditTrail($event,$stfID,'Internship Facility',$usrIP);
}

if(isset($_POST['addinternship'])){
    $id=mysqli_real_escape_string($dbcon,strtoupper($_POST['pname']));
    $stdid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stdid']));
    $sdate=mysqli_real_escape_string($dbcon,strtoupper($_POST['psdate']));
    $edate=mysqli_real_escape_string($dbcon,strtoupper($_POST['pedate']));
    $supervisor=mysqli_real_escape_string($dbcon,strtoupper($_POST['supname']));
    $contact=mysqli_real_escape_string($dbcon,strtoupper($_POST['supcont']));

    $ins = "INSERT INTO std_intern (stdid, factid, start_date, end_date, supervisor, contact, status) VALUES ('$stdid',$id,'$sdate','$edate','$supervisor','$contact','Pending')";
    $conn->query($dbcon,$ins);

    $test = "yes";
    $msg = "Internship Record Has Been Added Successfully";
}

if(isset($_POST['addsubject'])){
    $sbjid=mysqli_real_escape_string($dbcon,strtoupper($_POST['sbjid']));
    $sbj=mysqli_real_escape_string($dbcon,strtoupper($_POST['sbj']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT sbjid FROM subject WHERE sbjid = '$sbjid'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO subject (sbjid, sbj, status) VALUES ('$sbjid','$sbj','Active')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Subject Has Been Added Successfully";
    }else{
        $test = "no";
        $msg = "Subject ID ".$sbjid." Already Exists";
    }
}

if(isset($_POST['addguardian'])){
    $stdid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stdid']));
    $fname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $lname=mysqli_real_escape_string($dbcon,strtoupper($_POST['lname']));
    $contact=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));

    $ins = "INSERT INTO std_par (stdid, fname, lname, contact) VALUES ('$stdid','$fname','$lname','$contact')";
    $conn->query($dbcon,$ins);
    $test = "yes";
    $msg = "Guardian Information Has Been Added Successfully";
}

//INVOICE PAYMENT
if(isset($_POST['makepayment'])){
    $payamount = mysqli_real_escape_string($dbcon,strtoupper($_POST['payamount']));
    $paydate = mysqli_real_escape_string($dbcon,strtoupper($_POST['paydate']));
    $invid = mysqli_real_escape_string($dbcon,strtoupper($_POST['viewinvoice']));
    //CHECK IF CATEGORY EXISTS

    //GET THE BALANCE
    $bal = "SELECT (totalamount - paid) AS balance FROM student_invoices WHERE invoiceid = '$invid'";
    $balrun = $conn->query($dbcon,$bal);
    $baldata =$conn->fetch($balrun);
    $balance = $baldata['balance'];

    $newbalance = ($balance - $payamount);

    if(($balance - $payamount) == 0){
        $chk = "UPDATE student_invoices SET paid = (paid + $payamount), status='PAID' WHERE invoiceid='$invid'";
        $chkrun = $conn->query($dbcon,$chk);

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance) VALUE ('$invid',$payamount,$newbalance)";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Payment Has Been Completed";
    }elseif(($balance - $payamount) < 0){
        $test = "no";
        $msg = "Payment Amount Is Greater Than Student's Balance";
    }
    else{
        $chk = "UPDATE student_invoices SET paid = (paid + $payamount) WHERE invoiceid='$invid'";
        $chkrun = $conn->query($dbcon,$chk);

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance) VALUE ('$invid',$payamount,$newbalance)";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Part Payment Has Been Completed";
    }

    //AUDIT TRAIL
    $event="Amount Of GHS".$payamount." Paid For School Fees";
    auditTrail($event,$stfID,'School Fees',$usrIP);
}
if(isset($_POST['makepaymenthostel'])){
    $payamount = mysqli_real_escape_string($dbcon,strtoupper($_POST['payamount']));
    $paydate = mysqli_real_escape_string($dbcon,strtoupper($_POST['paydate']));
    $invid = mysqli_real_escape_string($dbcon,strtoupper($_POST['viewinvoice']));
    //CHECK IF CATEGORY EXISTS

    //GET THE BALANCE
    $bal = "SELECT (totalamount - paid) AS balance FROM hostel_invoices WHERE invoiceid = '$invid'";
    $balrun = $conn->query($dbcon,$bal);
    $baldata =$conn->fetch($balrun);
    $balance = $baldata['balance'];

    if(($balance - $payamount) == 0){
        $chk = "UPDATE hostel_invoices SET paid = (paid + $payamount), status='PAID' WHERE invoiceid='$invid'";
        $chkrun = $conn->query($dbcon,$chk);

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance) VALUE ('$invid',$payamount,$balance)";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Hostel Payment Has Been Completed";
    }elseif(($balance - $payamount) < 0){
        $test = "no";
        $msg = "Hostel Payment Amount Is Greater Than Student's Balance";
    }
    else{
        $chk = "UPDATE hostel_invoices SET paid = (paid + $payamount) WHERE invoiceid='$invid'";
        $chkrun = $conn->query($dbcon,$chk);

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance) VALUE ('$invid',$payamount,$balance)";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Part Payment Of Hostel Fees Has Been Completed";
    }

}
if(isset($_POST['addpost'])){
    $post=mysqli_real_escape_string($dbcon,$_POST['dpost']);

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT post FROM positions WHERE post = '$post'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO positions (post, status) VALUES ('$post','Active')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Position Has Been Added Successfully";
    }else{
        $test = "no";
        $msg = "Position,<b> ".$post."</b> , Already Exists";
    }
}

if(isset($_FILES['clogo']['tmp_name'])){
    $img=$_FILES['clogo']['tmp_name'];
    $newname="assets/data/logo/logo.png";//URL of the image location

    $cname=mysqli_real_escape_string($dbcon,strtoupper($_POST['cname']));
    $ccont=mysqli_real_escape_string($dbcon,strtoupper($_POST['ccont']));
    $cmail=mysqli_real_escape_string($dbcon,strtoupper($_POST['cmail']));
    $cloc=mysqli_real_escape_string($dbcon,$_POST['cloc']);
    $caddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['caddr']));
    $tag=mysqli_real_escape_string($dbcon,$_POST['tag']);

    if(!empty($img)){
        $newname="assets/data/logo/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //CHECK IF COMPANY DETAILS EXISTS
    $chk = "SELECT cname FROM company";
    $chkrun = $conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $ins = "INSERT INTO company(cname, ccont, cmail, cloc, caddr, clogo, tag) VALUES ('$cname','$ccont','$cmail','$cloc','$caddr','$newname','$tag')";
        $conn->query($dbcon,$ins);
    }else{
        $sql="UPDATE company SET tag = '$tag', cname = '$cname', ccont = '$ccont', cmail = '$cmail', cloc = '$cloc', caddr = '$caddr', clogo = '$newname'";
        $conn->query($dbcon,$sql);
    }
    $test = "yes";
    $msg = "Company Information Updated Successfully";
}

//Add tax component to item
if(isset($_POST['itemid'])){
    $pvid=$_POST['pvvid'];
    $tax=$_POST['tax'];
    $item=$_POST['itemid'];
    $array = explode("*", $item);
    $itemid=$array[0];
    $amount=$array[1];
    $calamt=$amount * $tax;
    $ins="INSERT INTO pvtax SET itemid='$itemid', pv_id='$pvid',percentage='$tax', amount='$calamt'";
    $conn->query($dbcon,$ins);

    //UPDATE TAX IN PV_DETAIL
    $updtax="UPDATE pv_detail SET taxamount=(taxamount + $calamt) WHERE pv_id='$pvid'";
    $conn->query($dbcon,$updtax);
    $test="yes";
    $msg="Tax Component Attached Successfully";
}

if(isset($_POST['salary_rules'])){
    $name=$_POST['salary_rules'];
    $type=$_POST['ruletype'];
    $baseval=$_POST['baseval'];
    //checkk if account number exists
    $chk="SELECT name FROM sal_rules WHERE name='$name'";
    $chkrun=$conn->query($dbcon,$chk);

    if($conn->sqlnum($chkrun) > 0){
        $test="no";
        $msg="Salary Rule Exists";
    }
    else{
        $ins="INSERT INTO sal_rules SET name='$name', type='$type', baseval=$baseval, status='Active'";
        $conn->query($dbcon,$ins);

        $test="yes";
        $msg="Salary Rule Added Successfully";
    }
}

if(isset($_GET['remrule'])){
    $id=$_GET['remrule'];

    $del="DELETE FROM sal_rules WHERE id='$id'";
    $conn->query($dbcon,$del);

    $test="yes";
    $msg="Salary Rule Removed";
}

//ADDING STAFF EARNING SALARY
if(isset($_POST['addearning'])){
    $name=$_POST['earningname'];
    $array=explode("*",$name);
    $dname=$array[0];//Item NAME
    $baseval=$array[1];//BASIC PERCENTAGE

    $stfid=$_POST['stfid'];
    $amount=$_POST['amount'];

    //AVOIDING DUPLICATE PAYSLIP ADDITION
    $dup="SELECT * FROM payslip WHERE name='$dname' AND type='Earning' AND stfid='$stfid'";
    $duprun=$conn->query($dbcon,$dup);
    if($conn->sqlnum($duprun) == 0){
        //GET THE BASIC SALARY OF THE STAFF
        $getbasic="SELECT dvalue FROM payslip WHERE type='Basic' AND stfid='$stfid'";
        $getqry=$conn->query($dbcon,$getbasic);
        $getdata=$conn->fetch($getqry);
        $basicamnt=$getdata['dvalue'];
        $ins="";

        if($amount != 0){
            $ins="INSERT INTO payslip SET name='$dname', type='Earning', dvalue=$amount, status='Active',stfid='$stfid'";
        }
        else{
            $namount=(($baseval/100) * $basicamnt);
            $ins="INSERT INTO payslip SET name='$dname', type='Earning', dvalue=$namount, status='Active',stfid='$stfid'";
        }
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg=$dname." Added Successfully";
    }
    else{
        $test="no";
        $msg=$dname." Exists For The Staff";
    }
}

//ADDING STAFF EARNING SALARY
if(isset($_POST['reimburse'])){
    $name=$_POST['reimbname'];
    $array=explode("*",$name);
    $dname=$array[0];//Item NAME
    $baseval=$array[1];//BASIC PERCENTAGE

    $stfid=$_POST['stfid'];
    $amount=$_POST['amount'];

    //AVOIDING DUPLICATE PAYSLIP ADDITION
    $dup="SELECT * FROM payslip WHERE name='$dname' AND type='Reimbursement' AND stfid='$stfid'";
    $duprun=$conn->query($dbcon,$dup);
    if($conn->sqlnum($duprun) == 0){
        //GET THE BASIC SALARY OF THE STAFF
        $getbasic="SELECT dvalue FROM payslip WHERE type='Basic' AND stfid='$stfid'";
        $getqry=$conn->query($dbcon,$getbasic);
        $getdata=$conn->fetch($getqry);
        $basicamnt=$getdata['dvalue'];
        $ins="";

        if($amount != 0){
            $ins="INSERT INTO payslip SET name='$dname', type='Reimbursement', dvalue=$amount, status='Active',stfid='$stfid'";
        }
        else{
            $namount=(($baseval/100) * $basicamnt);
            $ins="INSERT INTO payslip SET name='$dname', type='Reimbursement', dvalue=$namount, status='Active',stfid='$stfid'";
        }
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg=$dname." Added Successfully";
    }
    else{
        $test="no";
        $msg=$dname." Exists For The Staff";
    }
}

//ADDING STAFF DEDUCTION SALARY
if(isset($_POST['adddeduct'])){
    $name=$_POST['deductname'];
    $array=explode("*",$name);
    $dname=$array[0];//Item NAME
    $baseval=$array[1];//BASIC PERCENTAGE

    $stfid=$_POST['stfid'];
    $amount=$_POST['amount'];

    //AVOIDING DUPLICATE PAYSLIP ADDITION
    $dup="SELECT * FROM payslip WHERE name='$dname' AND type='Deduction' AND stfid='$stfid'";
    $duprun=$conn->query($dbcon,$dup);
    if($conn->sqlnum($duprun) == 0){
        //GET THE BASIC SALARY OF THE STAFF
        $getbasic="SELECT dvalue FROM payslip WHERE type='Basic' AND stfid='$stfid'";
        $getqry=$conn->query($dbcon,$getbasic);
        $getdata=$conn->fetch($getqry);
        $basicamnt=$getdata['dvalue'];
        $ins="";

        if($amount != 0){
            $ins="INSERT INTO payslip SET name='$dname', type='Deduction', dvalue=$amount, status='Active',stfid='$stfid'";
        }
        else{
            $namount=(($baseval/100) * $basicamnt);
            $ins="INSERT INTO payslip SET name='$dname', type='Deduction', dvalue=$namount, status='Active',stfid='$stfid'";
        }
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg=$dname." Added Successfully";
    }
    else{
        $test="no";
        $msg= $dname." Exists For The Staff";
    }
}

//ADDING STAFF BASIC SALARY
if(isset($_POST['addbasic'])){
    $amount=$_POST['basicamount'];
    $stfid=$_POST['stfid'];
    $ins="INSERT INTO payslip SET name='Basic', type='Basic', dvalue=$amount, status='Active',stfid='$stfid'";
    $conn->query($dbcon,$ins);

    $test="yes";
    $msg="Basic Salary Added Successfully";
}

if(isset($_GET['slipremuvid'])){
    $id=$_GET['slipremuvid'];
    $remuv="DELETE FROM payslip WHERE id=$id";
    $conn->query($dbcon,$remuv);
    $test="yes";
    $msg="Salary Component Removed Successfully";
}

//CHANGE PASSWORDS
if(isset($_POST['chvoka'])){
    $stfid=$_POST['chvoka'];
    $currPass=$_POST['currPass'];
    $newPass=$_POST['newPass'];
    $repPass=$_POST['repPass'];

    $newhash = password_hash($newPass, PASSWORD_ARGON2I);
    //Check If the current password entered is correct
    $chk="SELECT pword FROM users WHERE userid='$stfid'";
    $chkrun=$conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) > 0){
        $chkdata = $conn->fetch($chkrun);
        $hash = $chkdata['pword'];
        if(password_verify($currPass, $hash)){
            $update = "UPDATE users SET pword = '$newhash' WHERE userid='$stfid'";
            $conn->query($dbcon,$update);

            $test="yes";
            $msg="Password Has Been Changed";
        }else{
            $test="no";
            $msg="Password not verified";
        }
    }else{
        $test="no";
        $msg="Password Could Not Be Changed. This is because the old password you entered is wrong";
    }

}

//CHANGE PASSWORDS
if(isset($_POST['addbatch'])){
    $bname=mysqli_real_escape_string($dbcon,strtoupper($_POST['bname']));
    $bdesc=mysqli_real_escape_string($dbcon,strtoupper($_POST['bdesc']));
    $sdate=mysqli_real_escape_string($dbcon,strtoupper($_POST['sdate']));
    $edate=mysqli_real_escape_string($dbcon,strtoupper($_POST['edate']));
    $byear=mysqli_real_escape_string($dbcon,strtoupper($_POST['byear']));

    $bno = "BT/".str_replace("-","",$sdate)."/".str_replace("-","",$edate);
    //CHECK FOR DUPLICATE BATCHES
    $chk="SELECT bname FROM batches WHERE dyear='$byear' AND sdate = '$sdate' AND edate = '$edate'";
    $chkrun=$conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $chkdata = $conn->fetch($chkrun);
        $ins = "INSERT INTO batches (batchno, bname, bdesc, dyear, sdate, edate, status) VALUES ('$bno', '$bname', '$bdesc', '$byear', '$sdate', '$edate', 'Active')";
        $conn->query($dbcon, $ins);
        $test="yes";
        $msg="Batch Has Been Created Successfully";
    }else{
        $test="no";
        $msg="Batch Exists For The Year, Start Date And End Date. Please Check";
    }

}

//COMPANY REGIUSTRATION
if(isset($_POST['deptsup'])){
    $name=mysqli_real_escape_string($dbcon,$_POST['deptname']);
    $sup=mysqli_real_escape_string($dbcon,$_POST['deptsup']);

    //checking for multiple company registrations
    $sel="SELECT * FROM departments WHERE name='$name'";
    $selrun=$conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $test="no";
        $msg="Company Already Registered";
    }
    else{

        $ins="INSERT INTO departments SET name='$name', status='Active', stfid='$sup'";
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg="Company, ".$name." created successfully";
    }
}



if(isset($_POST['attendance'])){
    //Personal Data
    $img=$_FILES['stimg']['tmp_name'];
    $fst_name=mysqli_real_escape_string($dbcon,$_POST['fst_name']);
    $lst_name=mysqli_real_escape_string($dbcon,$_POST['lst_name']);
    $companyStr=mysqli_real_escape_string($dbcon,$_POST['company']);
    $start_time=$_POST['stTym'];
    $position=$_POST['position'];
    $contact=mysqli_real_escape_string($dbcon,$_POST['contact']);
    $jobtitle=mysqli_real_escape_string($dbcon,$_POST['jobtitle']);
    $email=mysqli_real_escape_string($dbcon,$_POST['email']);
    //Access rights
    $settings=$_POST['settings'];
    $tutorial=$_POST['tutorial'];
    $comp=$_POST['comp'];
    $leave=$_POST['leave'];
    $medical=$_POST['medical'];
    $permit=$_POST['permit'];
    $staff=$_POST['staff'];
    $attendance=$_POST['attendance'];
    $accounts=$_POST['accounts'];
    $loans=$_POST['loans'];
    $projectmgt=$_POST['projectmgt'];
    //Exploding Company To Get supervisor and name
    $compArray=explode("*",$companyStr);
    $company=$compArray[1];//company
    $supervisor=$compArray[0];
    $newname="assets/registered/".$currDateTime.".jpg";//URL of the image location
    $end_time="";
    switch ($start_time) {
        case "07:00:00":
            $end_time="16:00:00";
            break;
        case "08:00:00":
            $end_time="17:00:00";
            break;
        case "09:00:00":
            $end_time="18:00:00";
        default:
            echo "";
    }
    if(!empty($img)){
        //GENERATING THE SYSTEM AND EMPLOYEE ID
        $getNum="SELECT id FROM staff_rec ORDER BY id DESC LIMIT 1";
        $getNumRun=$conn->query($dbcon,$getNum);
        $getNumData=$conn->fetch($getNumRun);
        $rolenum=$getNumData['id'];
        $staff_id="VK".date("Y").str_pad(($rolenum + 1),3,"0",STR_PAD_LEFT);
        $staff_id2="VK".date("Y").str_pad(($rolenum + 1),3,"0",STR_PAD_LEFT)."2";
        $staff_id3="VK".date("Y").str_pad(($rolenum + 1),3,"0",STR_PAD_LEFT)."3";
        $empID="VK"."/".date("Y")."/".str_pad(($rolenum + 1),3,"0",STR_PAD_LEFT);


        //CHECKING IF STAFF HAS REGISTERED ALREADY
        $multqry="SELECT * FROM staff_rec WHERE fst_name='$fst_name' AND lst_name='$lst_name' AND contact='$contact'";
        $multrun=$conn->query($dbcon,$multqry);
        $multnum=$conn->sqlnum($multrun);
        if($multnum == 0){
            $dImage=file_get_contents($img);
            $newname="assets/data/registered/".$currDateTime.".jpg";//URL of the image location
            //GETTING THE COMPANY NAME
            $compName="SELECT voka_id FROM company WHERE name='$company'";
            $compNameQry=$conn->query($dbcon,$compName);
            $compNameData=$conn->fetch($compNameQry);
            $supervisor=$compNameData['voka_id'];

            //CREATE USER ACCOUNT FOR STAFF
            $usr="INSERT INTO users SET staff_id='$staff_id', password='admin123',status='Active'";
            $conn->query($dbcon,$usr);

            //insert staff information
            $file = file_put_contents( $newname, file_get_contents($img));
            //If image is uploaded successfully, the local database information is then updated else no
            $sql="INSERT INTO staff_rec SET loans='$loans', voka_id='$empID', staff_id='$staff_id', fst_name='$fst_name', 
					lst_name='$lst_name', supervisor='$supervisor', company='$company', img='$newname', email='$email', 
					contact='$contact', start_time='$start_time', end_time='$end_time', position='$position', leave_days=24,
					leavemgt='$leave', attendance='$attendance', staff='$staff', permission='$permit', medical='$medical',
					comp='$comp', tutorial='$tutorial', settings='$settings', status='Active', accounts='$accounts', jobtitle='$jobtitle', projectmgt='$projectmgt'";
            $result=$conn->query($dbcon,$sql) or die("error in query");

            $sql2="INSERT INTO stfidchk SET staff_id='$staff_id', chk1='$staff_id', chk2='$staff_id2', chk3='$staff_id3'";
            $result=$conn->query($dbcon,$sql2) or die("error in query");

            //AUDIT TRAIL
            $event="Registered Staff With Staff ID ".$staff_id;
            $aud="INSERT INTO atrails SET usr='$vokaId', module='Staff Record', event='$event', ip='$usrIP'";
            $conn->query($dbcon,$aud);

            $myear=date("Y");
            //Create medical record for the staff
            $inpatient="INSERT INTO medpolicy SET user='staff', voka_id='$empID', year='$myear', init_amount=70000.00, balance=70000.00, type='In Patient', status='Active'";
            $conn->query($dbcon,$inpatient);

            $outpatient="INSERT INTO medpolicy SET user='staff', voka_id='$empID', year='$myear', init_amount=5000.00, balance=5000.00, type='Out Patient', status='Active'";
            $conn->query($dbcon,$outpatient);

            $depinpatient="INSERT INTO medpolicy SET user='dependant', voka_id='$empID', year='$myear', init_amount=70000.00, balance=70000.00, type='In Patient', status='Active'";
            $conn->query($dbcon,$depinpatient);

            $depoutpatient="INSERT INTO medpolicy SET user='dependant', voka_id='$empID', year='$myear', init_amount=5000.00, balance=5000.00, type='Out Patient', status='Active'";
            $conn->query($dbcon,$depoutpatient);

            //ADDING THE USER ACCOUNT FOR THE STAFF
            $usr="INSERT INTO users SET staff_id='$staff_id', password='admin123', status='Active'";
            $test="yes";
            $errorMsg="Staff Registration Has Been Successful";
        }
        else{
            $test="no";
            $errorMsg="Staff Information Already Exists";
        }
    }
}
//////EDIT STAFF REGISTRATION
if(isset($_POST['staffeditid'])){
	//Personal Data
	$vokaid=$_POST['staffeditid'];
	$status=$_POST['status'];
	$fst_name=mysqli_real_escape_string($dbcon,$_POST['fst_name']);
	$lst_name=mysqli_real_escape_string($dbcon,$_POST['lst_name']);
	$companyStr=mysqli_real_escape_string($dbcon,$_POST['company']);
	$start_time=$_POST['stTym'];
	$etime=$_POST['endTym'];
	$position=$_POST['position'];
	$contact=mysqli_real_escape_string($dbcon,$_POST['contact']);
	$email=mysqli_real_escape_string($dbcon,$_POST['email']);
	//Access rights
	$settings=$_POST['settings'];
	$finance=$_POST['finance'];
	$tutorial=$_POST['tutorial'];
	$comp=$_POST['comp'];
	$leave=$_POST['leave'];
	$medical=$_POST['medical'];
	$permit=$_POST['permit'];
	$loans=$_POST['loans'];
	$staff=$_POST['staff'];
	$attendance=$_POST['stattendance'];
    $projectmgt=$_POST['projectmgt'];
	
	//Exploding Company To Get supervisor and name
	$compArray=explode("*",$companyStr);
	$company=$compArray[1];//company
	$supervisor=$compArray[0];
	$end_time="";

	if($status=="Detached"){
	    $upd="UPDATE biodata SET status='Detached' WHERE voka_id='$vokaid'";
	    $conn->query($dbcon,$upd);
    }
    //AUDIT TRAIL
    $event="Updated Staff Records Of ".$fst_name." ".$lst_name;
    $aud="INSERT INTO atrails SET usr='$stfID', module='Staff Records', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

    $sql="UPDATE staff_rec SET loans='$loans', fst_name='$fst_name', accounts='$finance',  
	lst_name='$lst_name', supervisor='$supervisor', company='$company', email='$email', 
	contact='$contact', start_time='$start_time', end_time='$etime', position='$position', leave_days=24,
	leavemgt='$leave', attendance='$attendance', staff='$staff', permission='$permit', medical='$medical',
	comp='$comp', tutorial='$tutorial', settings='$settings', status='$status', projectmgt='$projectmgt' WHERE voka_id='$vokaid'";
	$conn->query($dbcon,$sql) or die("error in query");
	$test="yes";
	$errorMsg="Staff Information Has Been Updated Successfully";
}

/////EDITING COMPANY DATA
if(isset($_POST['compnameed'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['compnameed']);
	$sup=$_POST['supervisored'];
	$id=$_POST['companyID'];
	$status=$_POST['statused'];
	$upd="UPDATE company SET name='$name', voka_id='$sup', status='$status' WHERE id='$id'";
	$conn->query($dbcon,$upd);
	
	
	//UPDATING THE SUPERVISOR FOR ALL STAFF IN THAT COMPANY
	$updAllStf="UPDATE staff_rec SET supervisor='$sup' WHERE company='$name'";
	$conn->query($dbcon,$updAllStf);
	
	$test="yes";
	$errorMsg="Company, ".$name." Updated successfully";
}
/////EDITING POSITION DATA
if(isset($_POST['positionadd'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['positionadd']);
	$upd="INSERT INTO position SET post='$name', status='Active'";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Position, ".$name." created successfully";
}
if(isset($_POST['posted'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['posted']);
	$status=$_POST['statused'];
	$id=$_POST['positionID'];
	$upd="UPDATE position SET post='$name', status='$status' WHERE id='$id'";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Position, ".$name." created successfully";
}


//BIODATA UPLOAD
$uploadedStatus = 0;


//UPLOADING STAFF BIO DataTable
if(isset($_FILES['biodata']['tmp_name'])){
	$file=$_FILES['biodata']['tmp_name'];
	//if there was an error uploading the file
	$storagename = date("ymdHis").".xlsx";
	$newname="assets/data/biodata/".$storagename;//URL of the image location
	$file = file_put_contents($newname, file_get_contents($file));
	//Uploading the excel
	try {
		 $objPHPExcel = PHPExcel_IOFactory::load($newname);
	} catch(Exception $e) {
	    die('Error loading file "'.pathinfo($storagename,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
	
	 $col1=mysqli_real_escape_string($dbcon,$allDataInSheet[2]['A']);
	 $col2=mysqli_real_escape_string($dbcon,$allDataInSheet[2]['D']);
	 $col3=mysqli_real_escape_string($dbcon,$allDataInSheet[19]['A']);
	 $col4=mysqli_real_escape_string($dbcon,$allDataInSheet[28]['A']);
	 
	
	
		//EMPLOYEE DETAILS
	 $lst_name=mysqli_real_escape_string($dbcon,$allDataInSheet[3]['B']);
	 $fst_name=mysqli_real_escape_string($dbcon,$allDataInSheet[4]['B']);
	 $oth_name=mysqli_real_escape_string($dbcon,$allDataInSheet[5]['B']);
	 $prev_name=mysqli_real_escape_string($dbcon,$allDataInSheet[6]['B']);
	 $title=mysqli_real_escape_string($dbcon,$allDataInSheet[7]['B']);
	 $dob=mysqli_real_escape_string($dbcon,$allDataInSheet[8]['B']);
	 $gender=mysqli_real_escape_string($dbcon,$allDataInSheet[9]['B']);
	 $mar_status=mysqli_real_escape_string($dbcon,$allDataInSheet[10]['B']);
	 $spouse=mysqli_real_escape_string($dbcon,$allDataInSheet[11]['B']);
	 $spouse_dob=mysqli_real_escape_string($dbcon,$allDataInSheet[12]['B']);
	 $pob=mysqli_real_escape_string($dbcon,$allDataInSheet[13]['B']);
	 $religion=mysqli_real_escape_string($dbcon,$allDataInSheet[14]['B']);
	 $ssnit=mysqli_real_escape_string($dbcon,$allDataInSheet[15]['B']);
	 $bankacct=mysqli_real_escape_string($dbcon,$allDataInSheet[16]['B']);
	 $bankname=mysqli_real_escape_string($dbcon,$allDataInSheet[17]['B']);
	 
	 //CONTACT DETAILS
	 $addrs=mysqli_real_escape_string($dbcon,$allDataInSheet[20]['B']);
	 $town=mysqli_real_escape_string($dbcon,$allDataInSheet[21]['B']);
	 $region=mysqli_real_escape_string($dbcon,$allDataInSheet[22]['B']);
	 $country=mysqli_real_escape_string($dbcon,$allDataInSheet[23]['B']);
	 $phone=mysqli_real_escape_string($dbcon,$allDataInSheet[24]['B']);
	 $mobile=mysqli_real_escape_string($dbcon,$allDataInSheet[25]['B']);
	 $email=mysqli_real_escape_string($dbcon,$allDataInSheet[26]['B']);
	 
	 //FAMILY DETAILS
	 $father=mysqli_real_escape_string($dbcon,$allDataInSheet[29]['B']);
	 $fatherDob=mysqli_real_escape_string($dbcon,$allDataInSheet[30]['B']);
	 $mother=mysqli_real_escape_string($dbcon,$allDataInSheet[31]['B']);
	 $motherDob=mysqli_real_escape_string($dbcon,$allDataInSheet[32]['B']);
	 
	 //NEXT OF KIN
	 $kinName=mysqli_real_escape_string($dbcon,$allDataInSheet[35]['B']);
	 $kinRel=mysqli_real_escape_string($dbcon,$allDataInSheet[36]['B']);
	 $kinRes=mysqli_real_escape_string($dbcon,$allDataInSheet[37]['B']);
	 $kinBus=mysqli_real_escape_string($dbcon,$allDataInSheet[38]['B']);
	 $kinphone=mysqli_real_escape_string($dbcon,$allDataInSheet[39]['B']);
	 $kinmob1=mysqli_real_escape_string($dbcon,$allDataInSheet[40]['B']);
	 $kinmob2=mysqli_real_escape_string($dbcon,$allDataInSheet[41]['B']);
	 $kinemail=mysqli_real_escape_string($dbcon,$allDataInSheet[42]['B']);
	 
	 //EMERGENCY CONTACT$father=$allDataInSheet[29]['B'];
	 $emgName=mysqli_real_escape_string($dbcon,$allDataInSheet[3]['E']);
	 $emgRel=mysqli_real_escape_string($dbcon,$allDataInSheet[4]['E']);
	 $emgRes=mysqli_real_escape_string($dbcon,$allDataInSheet[5]['E']);
	 $emgBus=mysqli_real_escape_string($dbcon,$allDataInSheet[6]['E']);
	 $emgphone=mysqli_real_escape_string($dbcon,$allDataInSheet[7]['E']);
	 $emgmob1=mysqli_real_escape_string($dbcon,$allDataInSheet[8]['E']);
	 $emgmob2=mysqli_real_escape_string($dbcon,$allDataInSheet[9]['E']);
	 $emgPermail=mysqli_real_escape_string($dbcon,$allDataInSheet[10]['E']);
	 $emgWorkMail=mysqli_real_escape_string($dbcon,$allDataInSheet[11]['E']);
	 
	 //EDUCATIONAL DETAILS
	 $hqual=mysqli_real_escape_string($dbcon,$allDataInSheet[19]['E']);
	 $hinst=mysqli_real_escape_string($dbcon,$allDataInSheet[20]['E']);
	 $hcompl=mysqli_real_escape_string($dbcon,$allDataInSheet[21]['E']);
	 $hdur=mysqli_real_escape_string($dbcon,$allDataInSheet[22]['E']);
	 $hprof=mysqli_real_escape_string($dbcon,$allDataInSheet[23]['E']);
	 
	 $mqual=mysqli_real_escape_string($dbcon,$allDataInSheet[25]['E']);
	 $minst=mysqli_real_escape_string($dbcon,$allDataInSheet[26]['E']);
	 $mcompl=mysqli_real_escape_string($dbcon,$allDataInSheet[27]['E']);
	 $mdur=mysqli_real_escape_string($dbcon,$allDataInSheet[28]['E']);
	 
	 $lqual=mysqli_real_escape_string($dbcon,$allDataInSheet[30]['E']);
	 $linst=mysqli_real_escape_string($dbcon,$allDataInSheet[31]['E']);
	 $lcompl=mysqli_real_escape_string($dbcon,$allDataInSheet[32]['E']);
	 $ldur=mysqli_real_escape_string($dbcon,$allDataInSheet[33]['E']);
	 
	 //DEPENDANT
	 $depName=mysqli_real_escape_string($dbcon,$allDataInSheet[36]['E']);
	 $depRel=mysqli_real_escape_string($dbcon,$allDataInSheet[37]['E']);
	 $depDob=mysqli_real_escape_string($dbcon,$allDataInSheet[38]['E']);
	 $depAddr=mysqli_real_escape_string($dbcon,$allDataInSheet[39]['E']);
	 $depPhone=mysqli_real_escape_string($dbcon,$allDataInSheet[40]['E']);
	
	$insertTable="INSERT INTO biodata SET voka_id='$vokaId', lst_name='$lst_name', fst_name='$fst_name', oname='$oth_name', prevname='$prev_name', title='$title', dob='$dob', gender='$gender', marStat='$mar_status', spouse='$spouse', spousedob='$spouse_dob', pob='$pob', religion='$religion', 
	ssnit='$ssnit', bankacc='$bankacct', bankname='$bankname', addr='$addrs', town='$town', region='$region', country='$country', phone='$phone', mobile='$mobile', email='$email', father='$father', fatherdob='$fatherDob', mother='$mother', motherdob='$motherDob', kinname='$kinName', kinrel='$kinRel', kinaddr='$kinRes', kinbus='$kinBus',
	kinphone='$kinphone', kinmob1='$kinmob1', kinmob2='$kinmob2', kinmail='$kinemail', emgname='$emgName', emgrel='$emgRel', emgaddr='$emgRes', emgbus='$emgBus', emgphone='$emgphone', emgmob1='$emgmob1', emgmob2='$emgmob2', emgmail='$emgPermail', emgworkmail='$emgWorkMail', hqual='$hqual', hinst='$hinst', hcompl='$hcompl',hdur='$hdur', 
	hprof='$hprof', mqual='$mqual', minst='$minst', mcompl='$mcompl', mdur='$mdur', lqual='$lqual', linst='$linst', lcompl='$lcompl', ldur='$ldur', depname='$depName', deprel='$depRel', depdob='$depDob', depaddr='$depAddr', depphone='$depPhone', status='Active'";
	$conn->query($dbcon,$insertTable);

    //AUDIT TRAIL
    $event="Uploaded Biodata";
    $aud="INSERT INTO atrails SET usr='$stfID', module='Biodata', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);
    $test="yes";
	$errorMsg="Bio Data Has Been Uploaded Successfully";
}


//UPLOADING COMPANY DataTable
if(isset($_FILES['compdoc']['tmp_name'])){
	$file=$_FILES['compdoc']['tmp_name'];
	$title=$_POST['title'];
	//if there was an error uploading the file
	$storagename = date("ymdHis").".pdf";
	$newname="assets/data/companydocs/".$storagename;//URL of the image location
	$file = file_put_contents($newname, file_get_contents($file));
	
	$insertTable="INSERT INTO policydocs SET name='$title', url='$storagename', status='Active'";
	$conn->query($dbcon,$insertTable);
	$test="yes";
	$errorMsg="Document Has Been Uploaded Successfully";
}//END OF COMPANY DOCUMENT UPLOAD
//EDITING COMPANY DOCUMENT
if(isset($_POST['docstatus'])){
	$file=$_FILES['compeditdoc']['tmp_name'];
	$title=$_POST['title'];
	$status=$_POST['docstatus'];
	$id=$_POST['docid'];
	//if there was an error uploading the file
	$upd="";
	if(empty($file)){
		 $upd="UPDATE policydocs SET name='$title',status='$status' WHERE id='$id'";
	}
	else{
	$storagename = date("ymdHis").".pdf";
	$newname="assets/data/companydocs/".$storagename;//URL of the image location
	$file = file_put_contents($newname, file_get_contents($file));
	 $upd="UPDATE policydocs SET name='$title', url='$storagename', status='$status' WHERE id='$id'";
	}
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Document Has Been Updated Successfully";
}//END OF COMPANY DOCUMENT UPLOAD

//UPLOADING PROFILE DOCUMENT
if(isset($_POST['certtype'])){
	$file=$_FILES['educcert']['tmp_name'];
	$type=$_POST['certtype'];
	//if there was an error uploading the file
	$upd="";
	if(empty($file)){
		 $test="no";
		 $errorMsg="No Document Uploaded";
	}
	else{
	$newname="assets/data/acad/".$stfID.$type.".pdf";//URL of the image location
	$file = file_put_contents($newname, file_get_contents($file));
	$upd="UPDATE biodata SET $type='yes' WHERE voka_id='$vokaId'";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Document Has Been Updated Successfully";
	}
}//END OF PROFILE DOCUMENT UPLOAD

//UPLOADING PV DOCUMENT
if(isset($_FILES['pvdocuments']['tmp_name'])){
	$file=$_FILES['pvdocuments']['tmp_name'];
    $fname=basename($_FILES['pvdocuments']['name']);
	$pvid=$_POST['showPV'];
	
	//GETTING THE LAST NUMBER OF DOCUMENT UPLOADED
	$seldoc="SELECT documents FROM pv_detail WHERE pv_id='$pvid'";
	$seldocrun=$conn->query($dbcon,$seldoc);
	$seldata=$conn->fetch($seldocrun);
	$docnum=$seldata['documents'];
	$newdocnum=$docnum + 1;
	//if there was an error uploading the file
	$newname="assets/data/pvdocs/".$fname;//URL of the image location
	$ref=$pvid."(".$newdocnum.")";
	
	//TABLE TO STORE NAMES OF DOCUMENTS UPLOADED
	$docqry="INSERT INTO pvdoc SET fname='$fname', ref='$ref', pv_id='$pvid'";
	$conn->query($dbcon,$docqry);
	
	$file = file_put_contents($newname, file_get_contents($file));
	$upd="UPDATE pv_detail SET documents='$newdocnum' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	$test="yes";
	$msg="Document Has Been Uploaded Successfully";
}//END OF PV DOCUMENT UPLOAD

if(isset($_POST['confirmpv'])){
	$pvid=$_POST['confpvid'];
	$chq=$_POST['chq'];
	$stype=$_POST['stype'];
    $supp=$_POST['supp'];
	$chqno=$_POST['chqno'];

	$upd="UPDATE pv_detail SET status='Confirmed', chq='$chq', chekno='$chqno' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	$upd2="UPDATE pv SET status='$status' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd2);

    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Raised By ".checkName($stfID);
    auditTrail($event,$stfID,'Payment Voucher',$usrIP);

    //SENDING MESSAGE TO THE ACCOUNTS ADMINISTRATOR
    $sel="SELECT stfid FROM staff WHERE pv='Director' AND status ='Active'";
    $selrun=$conn->query($dbcon,$sel);

    while($acdata=$conn->fetch($selrun)){
        $acmsg="Payment Voucher With PV ID, ".$pvid." Is Pending Your Approval";
        $vok=$acdata['stfid'];
        notifyStaff($acmsg,'Payment Voucher Approval',$vok);
    }

	header("location: dashboard.php?pvcreate");

}

if(isset($_POST['stfaccess'])){
    $stfid=$_POST['stfaccess'];
    $exams=$_POST['exams'];
    $bank=$_POST['bank'];
    $fees=$_POST['fees'];
    $internship=$_POST['internship'];
    $pv=$_POST['pv'];
    $stfmgt=$_POST['stfmgt'];
    $payroll=$_POST['payroll'];
    $stdmgt=$_POST['stdmgt'];
    $configs=$_POST['configs'];
    $hostel=$_POST['hostel'];

    $upd="UPDATE staff SET bank='$bank', exams='$exams', fees='$fees', internship='$internship', pv='$pv', stfmgt='$stfmgt', payroll='$payroll', stdmgt='$stdmgt', configs='$configs', hostel = '$hostel' WHERE stfid='$stfid'";
    $conn->query($dbcon,$upd);

    notifyStaff('Your Access Rights Has Been Reviewed. Please Check Your New Roles','Access Rights Reviewed',$stfid);
    auditTrail('Access Rights Of '.checkName($stfid)." Has Been Reviewed",$stfID,'Access Rights Reviewed',$usrIP);

    $test="yes";
    $msg="Acees Rights Applied";
}

//CANCEL PV
if(isset($_POST['cancelpv'])){
    $pvid=$_POST['confpvid'];
    $upd="UPDATE pv_detail SET status='Cancelled' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd);

    $upd2="UPDATE pv SET status='Cancelled' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd2);
    header("location: dashboard.php?pvcreate");
}
//REVERSAL APPLICATION
if(isset($_GET['revedit'])){
	$transID=$_GET['staffIDrpt'];
	$stfid=$_GET['stafID'];
	$revdate=$_GET['revdate'];
	$sup=$_GET['supervisor'];
	$penalty=$_GET['penalty'];
	$descript=$_GET['description'];
	$type=$_GET['dtype'];
	$startTym=$_GET['rtime'];
	
	//GETTING THE EXPECTED TIME
	
	$expqry="SELECT end_time, start_time FROM staff_rec WHERE staff_id='$stfid'";
	$exprun=$conn->query($dbcon,$expqry);
	$expdata=$conn->fetch($exprun);
	$exp="";
	if($type=="clock_in"){
		$exp=$expdata['start_time'];
	}else{
		$exp=$expdata['end_time'];
	}
	
	//Preventing duplicate applications in case
	$dup="SELECT * FROM reversal WHERE staff_id='$stfid' AND date='$revdate' AND type='$type' AND status IN ('Pending','HR Pending')";
	$duprun=$conn->query($dbcon,$dup);
	if($conn->sqlnum($duprun) > 0){
		$test="no";
		$errorMsg="You Have Already Applied For A Reversal";
	}
	else{
		$insrev="INSERT INTO reversal SET start_time='$exp', staff_id='$stfid', penalty=$penalty, date='$revdate', status='Pending', reason='$descript', type='$type', supervisor='$sup'";
		$conn->query($dbcon,$insrev);
		$test="yes";
		$errorMsg="Reversal Application Sent To Your Supervisor";
	}
}

if(isset($_GET['supapprrev'])){
	$id=$_GET['revid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE reversal SET status='HR Pending' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	
	$test="yes";
	$errorMsg="Reversal Approved";
}
if(isset($_GET['suprejrev'])){
	$id=$_GET['revid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE reversal SET status='Sup Rejected' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="no";
	$errorMsg="Reversal Rejected";
}
if(isset($_GET['hrrejrev'])){
	$id=$_GET['revid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE reversal SET status='HR Rejected' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="no";
	$errorMsg="Reversal Rejected";
}
if(isset($_GET['hrapprrev'])){
	$revid=$_GET['revid'];
	
	//SELECTING THE DETAILS IF THE REVERSALS
	$selDet=
	
	$count=COUNT($revid);
	for($i=0; $i < $count; $i++){
		$pid=$revid[$i];
		
		//SELECTING THE REVERSAL DETAILS TO USE FOR THE OFFSETTING
		$selDet="SELECT type, penalty, staff_id, date FROM reversal WHERE id=$pid";
		$selDetRun=$conn->query($dbcon,$selDet);
		$selDetData=$conn->fetch($selDetRun);
		$dtype=$selDetData['type'];
		$mdate=$selDetData['date'];
		$dstfid=$selDetData['staff_id'];
		$dpenalty=$selDetData['penalty'];
		//CHECKING IF REVERSAL HAS NOT BEEN DONE ALREADY
		$chq="SELECT * FROM $dtype WHERE date='$mdate' AND staff_id='$dstfid' AND altered='yes'";
		$chqrun=$conn->query($dbcon,$chq);
		if($conn->sqlnum($chqrun)==1){
			 $upd="UPDATE reversal SET status='Approved' WHERE id=$pid";
		}
		else{
			 $upd="UPDATE reversal SET status='Approved' WHERE id=$pid";
			 $updrec="UPDATE $dtype SET alt_by='$vokaId', penalty=(penalty - $dpenalty), altered='yes', status='reversed' WHERE staff_id='$dstfid' AND date='$mdate'";
			 $conn->query($dbcon,$updrec);
		}
		     $conn->query($dbcon,$upd);
	}
	$test="yes";
	$errorMsg="Reversal Approved";
}

////////STAFF PERMISSIONS
if(isset($_GET['permitid'])){
	$date=$_GET['date'];
	$date_from=strtotime(date($date));
	$enddate=$_GET['enddate'];
	$date_to=strtotime(date($enddate));
	$reason=$_GET['reason'];
	$type=$_GET['type'];
	
	
	if($date <= $ddate){
		$test="no";
		$errorMsg="Date Error! Please Select A Date In The Future. Apply for reversal if you want to seek permission today!";
	}
	else{
		for ($i=$date_from; $i<=$date_to; $i+=86400) {  
			$newdate=date("Y-m-d", $i);  
			//Avoiding duplicate permissions
			$sel="SELECT * FROM permit WHERE date='$newdate' AND voka_id='$stfID' AND type='$type'";
			$selQry=$conn->query($dbcon,$sel);
			if($conn->sqlnum($selQry) ==0){
				$insperm="INSERT INTO permit SET voka_id='$stfID', date='$newdate', reason='$reason', status='Pending', supervisor='$genSup', type='$type'";
				$conn->query($dbcon,$insperm);
			
				$test="yes";
				$errorMsg="Permission Application Successful";
			}
			else{
				$test="no";
				$errorMsg="Permission Already Pending For ".date("l, d M, Y",strtotime(date($newdate)));
			}
		} 
	}
}

if(isset($_GET['hrapprperm'])){
	$id=$_GET['permittid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE permit SET status='Approved' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="yes";
	$errorMsg="Permission Approved";
}
if(isset($_GET['hrrejperm'])){
	$id=$_GET['permittid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE permit SET status='HR Rejected' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="yes";
	$errorMsg="Permission Rejected";
}
if(isset($_GET['suprejperm'])){
	$id=$_GET['permittid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE permit SET status='Sup Rejected', supDate='$dateTime' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="no";
	$errorMsg="Permission Rejected";
}
if(isset($_GET['supapprperm'])){
	$id=$_GET['permittid'];
	$count=COUNT($id);
	for($i=0; $i < $count; $i++){
		$pid=$id[$i];
		$upd="UPDATE permit SET status='HR Pending', supDate='$dateTime' WHERE id=$pid";
		$conn->query($dbcon,$upd);
	}
	$test="yes";
	$errorMsg="Permission Approved";
}
//END OF PERMISSIONS
//////////THIS HANDLES THE LEAVE APPLICATION BY A STAFF
if(isset($_POST['leave_application'])){ 
	$replacedBy=$_POST['replacedBy'];
	$leaveType=$_POST['leaveType'];
	$startDate=$_POST['startDate'];
	$leavesTaken=$_POST['leavesTaken'];
	$endDate=$_POST['endDate'];
	$resumedDate=$_POST['resumedDate'];
	$note=$_POST['note'];

	//CHECK IF THERE ARE ALREADY PENDING LEAVE APPLICATIONS
	$pendLeave="SELECT * FROM staff_leave WHERE voka_id='$vokaId' AND status IN ('Pending','HR Pending','stfPending')";
	$pendLeaveQry=$conn->query($dbcon,$pendLeave);
	if($conn->sqlnum($pendLeaveQry) > 0){
		$test="no";
		$errorMsg="You Already Have A Pending Leave Application";
	}
	else{
		$mngQry="INSERT INTO staff_leave SET leaveID='$currDateTime', replacedBy='$replacedBy', voka_id='$vokaId', leaveType='$leaveType',
		startDate='$startDate', endDate='$endDate', resumedDate='$resumedDate', leavesTaken='$leavesTaken', note='$note', status='stfPending', supervisor='$genSup'";
		$conn->query($dbcon,$mngQry);
		
		//MESSAGE TO SEND TO STAFF
		$msg=checkName($vokaId)."Has Applied For A ".$leavesTaken." Day ".$leaveType." Leave And You Have Been Selected To Take Over. Ensure That You Review His Handing Over Note Before Approving";
		 $msgqry="INSERT INTO message SET voka_id='$replacedBy', message='$msg', caption='Staff Replacement', status='Active'";
		$conn->query($dbcon,$msgqry);

		//SEND NOTIFICATION TO THE HR DEPARTMENT
        $msghr=checkName($vokaId)."Has Applied For A ".$leavesTaken." Day ".$leaveType." Leave Pending Supervisor Approval";
        //SEND THE NOTICE TO THE NUMAN RESOURCE DEPARTMENT
        $selhr="SELECT voka_id FROM staff_rec WHERE staff='administrator'";
        $selhrrun=$conn->query($dbcon,$selhr);
        while($seldata=$conn->fetch($selhrrun)){
            $hr=$seldata['voka_id'];
            $msgqry="INSERT INTO message SET voka_id='$hr', message='$msghr', caption='Leave Application', status='Active'";
            $conn->query($dbcon,$msgqry);
        }

        //AUDIT TRAIL
        $event="Applied For A ".$leavesTaken." Day Leave Starting From ".$startDate." To ".$endDate;
        $aud="INSERT INTO atrails SET usr='$stfID', module='Leave Application', event='$event', ip='$usrIP'";
        $conn->query($dbcon,$aud);

		$test="yes";
		$errorMsg="Your Leave Application Has Been Sent For Approval";
		}
}

//SUP Approval
if(isset($_GET['apprleave'])){
	$lvid=$_GET['lvid'];
	$lstatus=$_GET['status'];
    $stfid=$_GET['vokID'];
    $lvdays=$_GET['ldays'];
    $lvcom=mysqli_real_escape_string($dbcon,$_GET['lvcomment']);

	$event="";
	$msg="";
	$upd="";
	if($lstatus=="Pending")//Awaiting supervisor's approval
    {
        $event="Approved Leave Application Of ".checkName($stfid)." As A Supervisor";
        $upd="UPDATE staff_leave SET status='HR Pending', supApprdate='$dateTime', supcomment='$lvcom' WHERE leaveID=$lvid";
        $msg="Your leave application has been approved by your supervisor \n"."Comment: ".$lvcom;
    }elseif($lstatus=="HR Pending"){
        $event="Authorized Leave Application Of ".checkName($stfid)." On Behalf Of HR Department";
        $upd="UPDATE staff_leave SET status='Authorized', hrapprdate='$dateTime', hrcomment='$lvcom' WHERE leaveID=$lvid";
        $msg="Your leave application has been authorized by the Human Resource Department \n"."Comment: ".$lvcom;

        //UPDATE THE REMAINING LEAVE DAYS OF THE STAFF
        $updstf="UPDATE staff_rec SET leave_days=(leave_days-$lvdays) WHERE voka_id='$stfid'";
        $conn->query($dbcon,$updstf);

    }
	$conn->query($dbcon,$upd);

	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Approved By Supervisor', status='Active'";
	$conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $aud="INSERT INTO atrails SET usr='$stfID', module='Leave Application', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="Leave Application Approved";
	
	
}
if(isset($_GET['suprejleave'])){
	$id=$_GET['pending_leave'];
	$stfid=$_GET['stfid'];
	$upd="UPDATE staff_leave SET status='Sup Rejected', supApprdate='$dateTime' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	
	$msg="Your leave application has been rejected by supervisor";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Refused', status='Active'";
	$conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Rejected Leave Application Of ".checkName($stfid)." As A Supervisor";
    $aud="INSERT INTO atrails SET usr='$stfID', module='Leave Application', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="no";
	$errorMsg="Leave Application Rejected";
}
//SUP Approval
/*if(isset($_GET['hrapprleave'])){
	$id=$_GET['pending_leave'];
	$days=$_GET['leave_days'];
	$stfid=$_GET['stfid'];
	
	$upd="UPDATE staff_leave SET status='Approved', hrapprdate='$dateTime' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	
	$msg="Your leave application has been approved by HR";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Approved', status='Active'";
	$conn->query($dbcon,$msgqry);
	
	$test="yes";
	$errorMsg="Leave Application Approved";
}*/
if(isset($_GET['rejleave'])){
	$id=$_GET['lvid'];
	$stfid=$_GET['vokID'];

	$upd="UPDATE staff_leave SET status='HR Rejected', hrapprdate='$dateTime' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	
	$msg="Your leave application has been rejected by HR";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Rejected', status='Active'";
	$conn->query($dbcon,$msgqry);
	
	$test="no";
	$errorMsg="Leave Application Rejected";
}
if(isset($_GET['hrapprleave'])){
	$id=$_GET['pending_leave'];
	$days=$_GET['leave_days'];
	$stfid=$_GET['stfid'];
	
	//UPDATE THE REMAINING LEAVE DAYS OF THE STAFF
	$updstf="UPDATE staff_rec SET leave_days=(leave_days-$days) WHERE voka_id='$stfid'";
	$conn->query($dbcon,$updstf);
	
	$msg="Your leave application has been authorized by the Human Resource Department";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Authorized', status='Active'";
	$conn->query($dbcon,$msgqry);
	
	$upd="UPDATE staff_leave SET status='Authorized', hrapprdate='$dateTime' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Leave Application Authorized";
}
if(isset($_GET['dirrejleave'])){
	$id=$_GET['pending_leave'];
	$stfid=$_GET['stfid'];
	$upd="UPDATE staff_leave SET status='Dir Rejected', hrapprdate='$dateTime' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	
	$msg="Your leave application has been rejected by director";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Leave Application Approved', status='Active'";
	$conn->query($dbcon,$msgqry);
	
	$test="no";
	$errorMsg="Leave Application Rejected";
}
//HOSPITAL REGISTRATION
if(isset($_POST['hospname'])){
	$name=$_POST['hospname'];
	$contact=$_POST['contact'];
	$location=$_POST['location'];
	$address=$_POST['address'];
	$email=$_POST['hospemail'];
	$website=$_POST['website'];
	//CHECKING FOR DUPLICATE HOSPITAL REGISTRATION
	$dup="SELECT name FROM hospital WHERE name='$name' AND location='$location' AND mobile='$contact'";
	$duprun=$conn->query($dbcon,$dup);
	if($conn->sqlnum($duprun) > 0){
		$test="no";
		$errorMsg=$name." Already Registered";
	}
	else{
		$upd="INSERT INTO hospital SET name='$name', mobile='$contact', location='$location', address='$address', email='$email', website='$website', status='Active' ";
		$conn->query($dbcon,$upd);
		$test="yes";
		$errorMsg=$name." Added Successfully";
	}
}
//HOSPITAL RECORD EDIT
if(isset($_POST['hospnameedit'])){
	$name=$_POST['hospnameedit'];
	$contact=$_POST['contactedit'];
	$location=$_POST['locationedit'];
	$address=$_POST['addressedit'];
	$email=$_POST['hospemailedit'];
	$website=$_POST['websiteedit'];
	$status=$_POST['status'];
	$id=$_POST['hospid'];
	$upd="UPDATE hospital SET name='$name', mobile='$contact', location='$location', address='$address', email='$email', website='$website', status='$status' WHERE id=$id ";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg=$name." Updated Successfully";
}
	
	//INSERTING MEDICAL RECORD
if(isset($_POST['medamount'])){
$amount=$_POST['medamount'];
$vokaid=$_POST['medrecid'];
$medDate=$_POST['meddate'];
$facility=$_POST['medfacility'];
$type=$_POST['medtype'];
$balance=$_POST['balance'];
$usertype=$_POST['meduser'];
$year=date("Y",strtotime(date($medDate)));

	$ins="INSERT INTO medicalrec SET user='$usertype', voka_id='$vokaid', date='$medDate', hospital='$facility', year='$year', amount=$amount, bal=$balance, status='Active', type='$type'";
	$conn->query($dbcon,$ins);

//UPDATING THE POLICY TABLE
	$updPol="UPDATE medpolicy SET balance=$balance WHERE type='$type' AND year='$year' AND voka_id='$vokaid' AND user='$usertype'";
	$conn->query($dbcon,$updPol);

	$test="yes";
	$errorMsg="Medical Record Has Been Added Successfully For Staff, ".checkName($vokaid);
}

if(isset($_POST['pvedittypes'])){
	$type=mysqli_real_escape_string($dbcon,$_POST['pvedittypes']);
	$id=mysqli_real_escape_string($dbcon,$_POST['pvtypes']);
	$sup=mysqli_real_escape_string($dbcon,$_POST['supedit']);
	$status=mysqli_real_escape_string($dbcon,$_POST['pvstatus']);
	 $selchk="SELECT name FROM pvtype WHERE name='$type'";
	$selRun=$conn->query($dbcon,$selchk);
		$ins="UPDATE pvtype SET name='$type', sup='$sup', status='$status' WHERE id='$id'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$msg="PV Type Updated Successfully";
}

//CTREATING AN EXPENSE ACCOUNT Type
if(isset($_POST['signatory'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['expaccounts']);
	$img=$_FILES['explogo']['tmp_name'];
	$sign=mysqli_real_escape_string($dbcon,$_POST['signatory']);
	$tin=mysqli_real_escape_string($dbcon,$_POST['tin']);
	$selchk="SELECT name FROM pvexpense WHERE name='$name'";
	$selRun=$conn->query($dbcon,$selchk);
	if($conn->sqlnum($selRun) == 0){
		$ins="";
		if(empty($img)){
			$ins="INSERT INTO pvexpense SET tin='$tin', name='$name', signatory='$sign', status='Active', img='no'";
		}
		else{
		$newname="assets/data/expcomp/".$name.".jpg";
		file_put_contents( $newname, file_get_contents($img));
		$ins="INSERT INTO pvexpense SET tin='$tin', name='$name', signatory='$sign', status='Active', img='yes'";
		
		}
		$conn->query($dbcon,$ins);
		$test="yes";
		$errorMsg="PV Expense Account Created Successfully";
	}else{
		$test="no";
		$errorMsg="PV Expense Account Exists Already";
	}
}
if(isset($_POST['signatoryedit'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['expaccounts']);
	$sign=mysqli_real_escape_string($dbcon,$_POST['signatoryedit']);
	$tin=mysqli_real_escape_string($dbcon,$_POST['tin']);
	$status=$_POST['expacctstatus'];
	$id=$_POST['did'];
		$ins="UPDATE pvexpense SET tin='$tin', name='$name', signatory='$sign', status='$status' WHERE id='$id'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$errorMsg="PV Expense Account Updated Successfully";
}

//CTREATING TAXES
if(isset($_POST['taxname'])){
	$name=mysqli_real_escape_string($dbcon,$_POST['taxname']);
	$taxid=mysqli_real_escape_string($dbcon,$_POST['taxid']);
	$val=mysqli_real_escape_string($dbcon,$_POST['percentage']);
	$decval=($val/100);
	$selchk="SELECT name FROM taxconfig WHERE taxid='$taxid'";
	$selRun=$conn->query($dbcon,$selchk);
	if($conn->sqlnum($selRun) == 0){
		$ins="INSERT INTO taxconfig SET taxid='$taxid', name='$name', val=$decval, status='Active'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$msg="Tax Created Successfully";
	}else{
		$test="no";
		$msg="Taxid, <b>$taxid</b> , Exists Already";
	}
}
if(isset($_POST['taxnameedit'])){
	$taxid=mysqli_real_escape_string($dbcon,$_POST['taxid']);
	$taxname=mysqli_real_escape_string($dbcon,$_POST['taxnameedit']);
	$val=mysqli_real_escape_string($dbcon,$_POST['percentage']);
	$dval=($val/100);
	$status=$_POST['status'];
		$ins="UPDATE taxconfig SET name='$taxname', val=$dval, status='$status' WHERE taxid='$taxid'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$msg="Tax Updated Successfully";
}

//SUPERVISOR PV APPROVALS
if(isset($_GET['pvsupapprove'])){
	$pvid=$_GET['pending_pvs'];
	$comment=mysqli_real_escape_string($dbcon,$_GET['sup']);
	$chq=$_GET['chq'];
    $app=$_GET['app'];
	$chqno=$_GET['chqno'];
	 $upd="UPDATE pv_detail SET chekno='$chqno', chq='$chq', status='supApproved', supDate='$dateTime' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT sup FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 $ins="INSERT INTO pv_comment SET sup='$comment', pv_id='$pvid'";
	    $conn->query($dbcon,$ins);
	}
	else{
		 $upd2="UPDATE pv_comment SET sup='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}
    //Sending message to the applicant
    $msg="Payment Voucher, ".$pvid." Has Been Approved By Your Supervisor \n Pending Accounts Department Approval";
    $msgqry="INSERT INTO message SET voka_id='$app', message='$msg', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry);

    //SENDING MESSAGE TO THE ACCOUNTS ADMINISTRATOR
    $sel="SELECT voka_id FROM staff_rec WHERE accounts='administrator' AND status !='Detached'";
    $selrun=$conn->query($dbcon,$sel);

    while($acdata=$conn->fetch($selrun)){
        $acmsg="Payment Voucher With PV ID, ".$pvid." Is Pending Accounts Department Approval";
        $vok=$acdata['voka_id'];
        $accmsgqry="INSERT INTO message SET voka_id='$vok', message='$acmsg', caption='Payment Voucher Approval', status='Active'";
        $conn->query($dbcon,$accmsgqry);
    }

    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Approved By ".checkName($vokaId)." Pending Accounts Department Approval";
    $aud="INSERT INTO atrails SET usr='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);
	$test="yes";
	$errorMsg="Payment Voucher Approved.";
}
if(isset($_GET['pvsupreject'])){
	$pvid=$_GET['pending_pvs'];
	$comment=mysqli_real_escape_string($dbcon,$_GET['sup']);
	 $upd="UPDATE pv_detail SET status='supReject', supDate='$dateTime' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT sup FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 $ins="INSERT INTO pv_comment SET sup='$comment', pv_id='$pvid'";
	$conn->query($dbcon,$ins);
	}
	else{
		 $upd2="UPDATE pv_comment SET sup='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}

    //Sending message to the applicant
    $msg="Payment Voucher, ".$pvid." Has Been Rejected By Your Supervisor";
    $msgqry="INSERT INTO message SET voka_id='$app', message='$msg', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry);
    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Rejected By ".checkName($vokaId);
    $aud="INSERT INTO atrails SET usr='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="Payment Voucher Has Been Rejected.";
}

//CFO PV APPROVALS
if(isset($_GET['pvcfoapprove'])){
	$pvid=$_GET['pending_pvs'];
	$comment=mysqli_real_escape_string($dbcon,$_GET['sup']);
	$chq=$_GET['chq'];
	$chqno=$_GET['chqno'];
    $findir=$_GET['findir'];
    $applicant=$_GET['applicant'];
	$upd="UPDATE pv_detail SET chekno='$chqno', chq='$chq', status='cfoApproved', cfoDate='$dateTime', accounts='$vokaId' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT accounts FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 $ins="INSERT INTO pv_comment SET accounts='$comment', pv_id='$pvid'";
	$conn->query($dbcon,$ins);
	}
	else{
		 $upd2="UPDATE pv_comment SET accounts='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}

    //Sending message to the applicant
    $msg="Payment Voucher, ".$pvid." Approved By Accounts Department Is Awaiting Your Approval";
    $msgqry="INSERT INTO message SET voka_id='$findir', message='$msg', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry);

    $msg2="Payment Voucher, ".$pvid." Has Been Approved By Accounts Department";
    $msgqry2="INSERT INTO message SET voka_id='$applicant', message='$msg2', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry2);
    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Approved By ".checkName($findir)." As A Finance Director";
    $aud="INSERT INTO atrails SET usr='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="Payment Voucher Approved.";
}
if(isset($_GET['pvcforeject'])){
	$pvid=$_GET['pending_pvs'];
	$comment=mysqli_real_escape_string($dbcon,$_GET['sup']);
    $applicant=$_GET['applicant'];
	 $upd="UPDATE pv_detail SET status='cfoReject', cfoDate='$dateTime' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT accounts FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 $ins="INSERT INTO pv_comment SET accounts='$comment', pv_id='$pvid'";
	$conn->query($dbcon,$ins);
	}
	else{
		 $upd2="UPDATE pv_comment SET accounts='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}

	//SEND NOTIFICATION TO THE APPLICANT
    $msg="Payment Voucher, ".$pvid." Has Been Rejected By Accounts Department";
    $msgqry="INSERT INTO message SET voka_id='$applicant', message='$msg', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Rejected By Accounts Department";
    $aud="INSERT INTO atrails SET usr='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="Payment Voucher Has Been Rejected.";
}
if(isset($_POST['pvdirapprove'])){
	$pvid=$_POST['approveid'];
	$comment=mysqli_real_escape_string($dbcon,$_POST['sup']);
	//$chq=$_POST['chq'];
	//$chqno=$_GET['chqno'];
    $stfid=$_POST['stfid'];

	$upd="UPDATE pv_detail SET status='Approved', finDate='$dateTime', finDir='$stfID' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT director FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 echo $ins="INSERT INTO pv_comment SET director='$comment', pv_id='$pvid'";
	$conn->query($dbcon,$ins);
	}
	else{
		 echo $upd2="UPDATE pv_comment SET director='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}

    //SEND NOTIFICATION TO THE APPLICANT
    $msg="Payment Voucher, ".$pvid." Has Been Approved By The Finance Director, ".checkName($stfID);
    echo $msgqry="INSERT INTO message SET stfid='$stfID', message='$msg', caption='Payment Voucher Approval', status='Active'";
    $conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Approved By ".checkName($stfID)." As A Finance Director";
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$msg="Payment Voucher Approved.";
}
if(isset($_POST['pvdirreject'])){
	$pvid=$_POST['approveid'];
	$comment=mysqli_real_escape_string($dbcon,$_POST['sup']);
	 $upd="UPDATE pv_detail SET status='dirReject', finDate='$dateTime', finDir='$stfID' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);
	//checking if comment exists
	$chk="SELECT director FROM pv_comment WHERE pv_id='$pvid'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun) <1){
		 $ins="INSERT INTO pv_comment SET director='$comment', pv_id='$pvid'";
	$conn->query($dbcon,$ins);
	}
	else{
		 $upd2="UPDATE pv_comment SET director='$comment' WHERE pv_id='$pvid'";
		$conn->query($dbcon,$upd2);
	}

    //AUDIT TRAIL
    $event="Payment Voucher, ".$pvid." Has Been Rejected";
    $aud="INSERT INTO atrails SET stfid='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$msg="Payment Voucher Has Been Rejected.";
}

if(isset($_POST['completePV'])){
	$pvid=$_POST['pending_pvs'];
	$imgsrc=$_FILES["receipt"]['tmp_name'];
	
	if(!empty($imgsrc)){
		$newname="assets/data/pvdocs/rec".$pvid.".pdf";//URL of the image location
		$file = file_put_contents($newname, file_get_contents($imgsrc));
		$test="yes";
		$errorMsg="Payment Voucher Processes Have Been Completed Successfully.";
	}else{
		$test="yes";
		$errorMsg="Payment Voucher Processes Have Been Completed Successfully Without Receipt.";
	}
	
	$updRec="UPDATE pv_detail SET status='Complete' WHERE pv_id='$pvid'";
	$conn->query($dbcon,$updRec);
}

//EDIT BANK
if(isset($_POST['editbankname'])){
	$id=$_POST['bankid'];
	$name=$_POST['editbankname'];
	$code=$_POST['editbankcode'];
	$branch=$_POST['branch'];
	$status=$_POST['status'];
	$accountnumber=$_POST['accountnumber'];
	
		$ins="UPDATE banks SET bankcode='$code',name='$name', branch='$branch', account='$accountnumber', status='$status' WHERE id=$id";
		$conn->query($dbcon,$ins);
		
		$test="yes";
		$msg="Bank Details Updated Successfully";
}

//ADD EXPENSE CLASS
if(isset($_POST['expcode'])){
	$name=$_POST['expname'];
	$code=$_POST['expcode'];
	
	//checkk if account number exists
	$chk="SELECT name FROM expensecls WHERE expcode='$code'";
	$chkrun=$conn->query($dbcon,$chk);
	
	if($conn->sqlnum($chkrun) > 0){
		$test="no";
		$msg="Expense Code Exists";
	}
	else{
		$ins="INSERT INTO expensecls SET name='$name', expcode='$code', status='Active'";
		$conn->query($dbcon,$ins);
		
		$test="yes";
		$msg="Expense Class Added Successfully";
	}
}
if(isset($_POST['expclsid'])){
	$id=$_POST['expclsid'];
	$name=$_POST['expname'];
	$code=$_POST['expcodee'];
	$status=$_POST['expclsstatus'];
	
	$ins="UPDATE expensecls SET name='$name', expcode='$code', status='$status' WHERE id=$id";
	$conn->query($dbcon,$ins);
	$test="yes";
	$msg="Expense Class Updated Successfully";
}
//ADD SALARY RULE

if(isset($_POST['salary_ruleedit'])){
	$name=$_POST['salary_ruleedit'];
	$status=$_POST['status'];
	$id=$_POST['salaryruleid'];
	
	$ins="UPDATE sal_rules SET name='$name', status='$status' WHERE id=$id";
	$conn->query($dbcon,$ins);
	
	$test="yes";
	$errorMsg="Salary Rule Updated Successfully";
}

//REMOVING THE PAYSLIP OF A STAFF
if(isset($_GET['removepayslip'])){
	$slipid=$_GET['removepayslip'];
	$updslip="UPDATE payslipsummary SET status='Detached' WHERE slipid='$slipid'";
	$conn->query($dbcon,$updslip);
	$test="yes";
	$errorMsg="Payslip Detached Successfully";
}

//REATTACHING REMOVED PAYSLIPS
if(isset($_GET['attachpayslip'])){
	$slipid=$_GET['attachpayslip'];
	$updslip="UPDATE payslipsummary SET status='Approved' WHERE slipid='$slipid'";
	$conn->query($dbcon,$updslip);
	$test="yes";
	$errorMsg="Payslip Attached Successfully";
}

//ADDING THE COMPANY TARGET FOR THE STAFF
if(isset($_GET['dcomptarget'])){
	$descID=$_GET['dcomptarget'];
	$rating=$_GET['rating'];
	$stfid=$_GET['stafftarget'];
	$comp=$_GET['comp'];

	/*CHECKING IF TARGET HAS ALREADY BEEN ADDED
    $tgtchk="SELECT * FROM staff_target_tmp WHERE voka_id='$stfid' AND description='$descript'";
    $tgtrun=$conn->query($dbcon,$tgtchk);
    if($conn->sqlnum($tgtrun)==0){*/
        //checking the rating percentage
        $chk="SELECT SUM(rating) AS totrate FROM staff_target_tmp WHERE voka_id='$stfid'";
        $chkrun=$conn->query($dbcon,$chk);
        $chkdata=$conn->fetch($chkrun);
        $exrate=$chkdata['totrate'];
        $newrate=$exrate + $rating;
        if($newrate > 100.00){
            $test="no";
            $errorMsg="Total Ratings Exceed 100%. Please Review Your Targets";
        }
        else{
            //GETTING THE GRADES
            /*$sgrade="SELECT description,grade0,grade1,grade2,grade3 FROM comptarget WHERE id=$descID";
            $sgraderun=$conn->query($dbcon,$sgrade);
            $sdata=$conn->fetch($sgraderun);
            $grade0=mysqli_real_escape_string($dbcon,$sdata['grade0']);
            $grade1=mysqli_real_escape_string($dbcon,$sdata['grade1']);
            $grade2=mysqli_real_escape_string($dbcon,$sdata['grade2']);
            $grade3=mysqli_real_escape_string($dbcon,$sdata['grade3']);
            $descript=mysqli_real_escape_string($dbcon,$sdata['description']);*/
            $ins="INSERT INTO staff_target_tmp SET status='Active', voka_id='$stfid', description='$descID', rating=$rating";
            $conn->query($dbcon,$ins);
            $test="yes";
            $errorMsg="Target Added Successfully";
        }
        /*else{
        $test="no";
        $errorMsg="Target Already Exists";
    }*/


}

//ADDING NEW TARGETS TO THE STAFF AFTER EDITING
//ADDING THE COMPANY TARGET FOR THE STAFF
if(isset($_GET['addnewtarget'])){
	$descript=$_GET['addnewtarget'];
	$rating=$_GET['rating'];
	$stfid=$_GET['stafftarget'];
	$comp=$_GET['comp'];
	$yr=$_GET['year'];
    $qt=$_GET['quarter'];

    //GET THE CURRENT COMPANY OF THE STAFF
    $getcomp="SELECT company FROM staff_rec WHERE voka_id='$stfid'";
    $getcomprun=$conn->query($dbcon,$getcomp);
    $getcompdata=$conn->fetch($getcomprun);
    $dcomp=$getcompdata['company'];
	
	//checking the rating percentage
	$chk="SELECT SUM(rating) AS totrate FROM staff_target WHERE voka_id='$stfid' AND year=$yr AND quarter='$qt'";
	$chkrun=$conn->query($dbcon,$chk);
	$chkdata=$conn->fetch($chkrun);
	$exrate=$chkdata['totrate'];
	$newrate=$exrate + $rating;
	if($newrate > 100.00){
		$test="no";
		$errorMsg="Total Ratings Exceed 100%. Please Review Your Targets";
	}
	else{
		$ins="INSERT INTO staff_target SET name='$dcomp', voka_id='$stfid', description='$descript', rating=$rating, year=$yr, quarter='$qt'";
		$conn->query($dbcon,$ins);

		$upd="UPDATE staff_target SET status='' WHERE voka_id='$stfid' AND year=$yr AND quarter='$qt'";
        $conn->query($dbcon,$upd);

		$test="yes";
		$errorMsg="Target Added Successfully";
	}
}

if(isset($_GET['updatetarget'])){
    $descript=mysqli_real_escape_string($dbcon,$_GET['targetdesc']);
    $rating=$_GET['rating'];
    $stfid=$_GET['stafftarget'];
    $comp=$_GET['comp'];
    $yr=$_GET['year'];
    $qt=$_GET['quarter'];

    //checking the rating percentage
    $chk="SELECT SUM(rating) AS totrate FROM staff_target WHERE voka_id='$stfid' AND year=$yr AND quarter='$qt'";
    $chkrun=$conn->query($dbcon,$chk);
    $chkdata=$conn->fetch($chkrun);
    $exrate=$chkdata['totrate'];
    $newrate=$exrate + $rating;
    if($newrate > 100.00){
        $test="no";
        $errorMsg="Total Ratings Exceed 100%. Please Review Your Targets";
    }
    else{
        //GETTING THE GRADES
        $sgrade="SELECT grade0,grade1,grade2,grade3 FROM comptarget WHERE name='$comp' AND description='$descript'";
        $sgraderun=$conn->query($dbcon,$sgrade);
        $sdata=$conn->fetch($sgraderun);
        $grade0=mysqli_real_escape_string($dbcon,$sdata['grade0']);
        $grade1=mysqli_real_escape_string($dbcon,$sdata['grade1']);
        $grade2=mysqli_real_escape_string($dbcon,$sdata['grade2']);
        $grade3=mysqli_real_escape_string($dbcon,$sdata['grade3']);

        $ins="INSERT INTO staff_target SET grade0='$grade0', grade1='$grade1', grade2='$grade2', grade3='$grade3', status='', voka_id='$stfid', description='$descript', rating=$rating, year=$yr, quarter='$qt'";
        $conn->query($dbcon,$ins);

        $upd="UPDATE staff_target SET status='' WHERE voka_id='$stfid' AND year=$yr AND quarter='$qt'";
        $conn->query($dbcon,$upd);

        $test="yes";
        $errorMsg="Target Added Successfully";
    }
}

//SUPERVISOR APPROVES TARGET
if(isset($_GET['apprtargetby'])){
	$yr=$_GET['apprtargetby'];
	$voka=$_GET['stafftarget'];

	//GET THE CURRENT COMPANY OF THE STAFF
    $getcomp="SELECT company FROM staff_rec WHERE voka_id='$voka'";
    $getcomprun=$conn->query($dbcon,$getcomp);
    $getcompdata=$conn->fetch($getcomprun);
    $dcomp=$getcompdata['company'];
	//CREATE 
	$sel="SELECT * FROM staff_target_tmp WHERE voka_id='$voka' AND status='Active'";
	$selrun=$conn->query($dbcon,$sel);
	while($items=$conn->fetch($selrun)){
		$desc=$items['description'];
		$rating=$items['rating'];
		
		$ins="INSERT INTO staff_target SET name='$dcomp', quarter='mid',status='Pending', voka_id='$voka', description='$desc', rating=$rating, year=$yr";
		$conn->query($dbcon,$ins);

	}
	//CREATE THE STAFF TARGET RECORD IN THE target TABLE
	$ins="INSERT INTO targets SET name='$dcomp', voka_id='$voka', year=$yr, mid_yr='no', end_yr='no', status='Active', supervisor='$voka'";
	$conn->query($dbcon,$ins);

    //Sending message to the applicant
    $msg="Appraisal Target Has Been Set For You By Your Supervisor. Kindly Review The Appraisal";
    $msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Staff Appraisal', status='Active'";
    $conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Staff Appraisal Set For ".checkName($voka);
    $aud="INSERT INTO atrails SET usr='$stfID', module='Staff Appraisal', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="Targets Approved And Forwarded To ".checkName($voka)." For Approval";
}

//DEPARTMENT TARGETS
if(isset($_GET['depttarget'])){
	$descript=mysqli_real_escape_string($dbcon,$_GET['descript']);
	$comp=$_GET['comp'];
	$grade=$_GET['grade'];
	$gradecount=COUNT($grade);
	
	//PREVENTING DUPLICATE ENTRIES
	$dup="SELECT name FROM comptarget WHERE name='$comp' AND description='$descript' AND status='Active'";
	$duprun=$conn->query($dbcon,$dup);
	if($conn->sqlnum($duprun)==0){
	$ins="INSERT INTO comptarget SET name='$comp', description='$descript', status='Active'";
	$conn->query($dbcon,$ins);
	for($i=0;$i < $gradecount; $i++){
		$dgrade=mysqli_real_escape_string($dbcon,$grade[$i]);
		$insgrd="UPDATE comptarget SET grade$i='$dgrade' WHERE name='$comp' AND description='$descript'";
		$conn->query($dbcon,$insgrd);
	}
	$test="yes";
	$errorMsg="Target Added Successfully";
	}
	else{
	$test="yes";
	$errorMsg="Target Exists";
	}
}

//REMOVE A COMPANY TARGET
if(isset($_GET['deltarget'])){
	$id=$_GET['deltarget'];
	$del="UPDATE comptarget SET status='Inactive' WHERE id=$id";
	$conn->query($dbcon,$del);
	$test="yes";
	$errorMsg="Target Removed Successfully";
}

//EDIT TARGET
if(isset($_GET['targetid'])){
	$id=$_GET['targetid'];
	$descript=$_GET['descript'];
	$rating=$_GET['rating'];
	$year=$_GET['year'];
	$quarter=$_GET['quarter'];
	$grade0=$_GET['grade0'];
	$grade1=$_GET['grade1'];
	$grade2=$_GET['grade2'];
	$grade3=$_GET['grade3'];
	$stfid=$_GET['stafftarget'];//staff ID
	
	$targetid=$stfid.$year;
	
	//checking the rating percentage
	$chk="SELECT SUM(rating) AS totrate FROM staff_target WHERE voka_id='$stfid' AND year=$year AND id !=$id";
	$chkrun=$conn->query($dbcon,$chk);
	$chkdata=$conn->fetch($chkrun);
	$exrate=$chkdata['totrate'];
	$newrate=$exrate + $rating;
	if($newrate > 100.00){
		$test="no";
		$errorMsg="Total Ratings Exceed 100%. Please Review Your Targets";
	}
	else{
		$ins="UPDATE staff_target SET grade0='$grade0',grade1='$grade1',grade2='$grade2',grade3='$grade3', description='$descript', rating=$rating, quarter='$quarter', year='$year' WHERE id=$id";
		$conn->query($dbcon,$ins);
		$test="yes";
		$errorMsg="Target Updated Successfully";
	}
}
//DELETE A TARGET ATTACHED TEMPORARILY TO A STAFF
if(isset($_GET['deletetarget'])){
	$id=$_GET['deletetarget'];
	$del="DELETE FROM staff_target_tmp WHERE id=$id";
	$conn->query($dbcon,$del);
	$test="yes";
	$errorMsg="Target Removed Successfully";
}

//DELETE A TARGET APPROVED FOR A STAFF
if(isset($_GET['detachtarget'])){
	$id=$_GET['detachtarget'];
    $yr=$_GET['year'];
    $quarter=$_GET['quarter'];
    $stfid=$_GET['stafftarget'];
	$del="DELETE FROM staff_target WHERE id=$id";
	$conn->query($dbcon,$del);

	$upd="";
	if($quarter=="mid"){
        //REVERSE THE TARGETS BACK TO THE STAFF
        $upd="UPDATE targets SET status='Active' WHERE voka_id='$stfid' AND year=$yr";
    }else{
        //REVERSE THE TARGETS BACK TO THE STAFF
        $upd="UPDATE targets SET status2='Active' WHERE voka_id='$stfid' AND year=$yr";
    }
    $conn->query($dbcon,$upd);

    $upd2="UPDATE staff_target SET status='' WHERE voka_id='$stfid' AND year=$yr AND quarter='$quarter'";
    $conn->query($dbcon,$upd2);

	$test="yes";
	$errorMsg="Target Removed Successfully";
}
//SUPERVISOR APPROVE TARGETS FOR A STAFF
if(isset($_GET['supervisor_approve_target'])){
	$stfid=$_GET['stafftarget'];
	$name=checkName($stfid);
	$yr=$_GET['year'];
	$voka=$_GET['voka'];
    $qt=$_GET['quarter'];
	
	//CHECKING IF TARGET HAS ALREADY BEEN SET FOR THE STAFF
    $chk="SELECT * FROM targets WHERE voka_id='$stfid' AND year=$yr";
	$chkrun=$conn->query($dbcon,$chk);

	//GET THE COMPANY OF THE STAFF
    $cmp="SELECT company FROM staff_rec WHERE voka_id='$stfid'";
    $cmprun=$conn->query($dbcon,$cmp);
    $cmpdata=$conn->fetch($cmprun);
    $scomp=$cmpdata['company'];

	if($conn->sqlnum($chkrun) == 0){
		$ins="INSERT INTO targets SET voka_id='$stfid', year=$yr, mid_yr='no', end_yr='no', status='Active', supervisor='$voka'";
	}
	else{
	    if($qt=="mid"){
            $ins="UPDATE targets SET status='Active', mid_yr='no' WHERE voka_id='$stfid' AND year=$yr";
        }
		else{
            $ins="UPDATE targets SET status2='Active', end_yr='no' WHERE voka_id='$stfid' AND year=$yr";
        }
	}
	$conn->query($dbcon,$ins);
	$upd="UPDATE staff_target SET status='Active', name='$scomp' WHERE voka_id='$stfid' AND year=$yr AND quarter='$qt'";
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Target Has Been Confirmed And Forwarded To ".$name."  For Evaluation";
	
	//MESSAGE TO SEND TO STAFF
	$msg="Appraisal Target Is Ready And Awaiting Your Approval";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Target Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}
if(isset($_GET['supervisor_reject_target'])){
	$stfid=$_GET['stafftarget'];
	$name=checkName($stfid);
	$yr=$_GET['year'];
	$ins="DELETE FROM targets WHERE voka_id='$stfid' AND year=$yr";
	$conn->query($dbcon,$ins);
	$test="yes";
	$errorMsg="Target Has Been Cancelled";
	
}

//STAFF ACCEPT
if(isset($_GET['staff_accept_target'])){
	$stfid=$_GET['staff_accept_target'];
	$yr=$_GET['year'];
    $qt=$_GET['quarter'];

    $upd="";
    if($qt=="mid"){
        $upd="UPDATE targets SET status='Accepted' WHERE voka_id='$stfid' AND year=$Curryear";
    }
    else{
        $upd="UPDATE targets SET status2='Accepted' WHERE voka_id='$stfid' AND year=$Curryear";
    }

	$conn->query($dbcon,$upd);

    $upd2="UPDATE staff_target SET status='Active' WHERE voka_id='$stfid' AND year=$Curryear AND quarter='$qt'";
    $conn->query($dbcon,$upd2);

	$test="yes";
	$errorMsg="Target Has Been Accepted By You";
	
	//MESSAGE TO SEND TO STAFF
	$msg="Appraisal Target Has Been Accepted By ".checkName($stfid);
	$msgqry="INSERT INTO message SET voka_id='$genSup', message='$msg', caption='Target Accepted', status='Active'";
	$conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event= checkName($stfid)." Has Approved The Appraisal Targets For ".$Curryear;
    $aud="INSERT INTO atrails SET usr='$stfID', module='Staff Appraisal', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);
}

//STAFF REJECT TARGET
if(isset($_GET['staff_reject_target'])){
	$stfid=$_GET['voka'];
	$yr=$_GET['targetyear'];
    $qt=$_GET['targetqt'];
	$comment=$_GET['staff_reject_target'];
	$upd="";
	$upd2="";
	if($qt=="mid"){
        $upd="UPDATE targets SET status='Rejected', stfcomment='$comment' WHERE voka_id='$stfid' AND year=$yr";
        $upd2="UPDATE staff_target SET status='Rejected' WHERE voka_id='$stfid' AND year=$yr AND quarter='mid'";
    }else{
        $upd="UPDATE targets SET status2='Rejected', stfcomment='$comment' WHERE voka_id='$stfid' AND year=$yr";
        $upd2="UPDATE staff_target SET status='Rejected' WHERE voka_id='$stfid' AND year=$yr AND quarter='end'";
    }
	$conn->query($dbcon,$upd);
	$conn->query($dbcon,$upd2);
	$test="yes";
	$errorMsg="Target Has Been Refused And Forwarded To Your Supervisor For Review";

    //AUDIT TRAIL
    $event= checkName($stfid)." Has Rejected The Appraisal Targets For ".$yr;
    $aud="INSERT INTO atrails SET usr='$stfID', module='Staff Appraisal', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	//MESSAGE TO SEND TO STAFF
	$msg="Appraisal Target Has Been Rejected By ".checkName($stfid);
	$msgqry="INSERT INTO message SET voka_id='$genSup', message='$msg', caption='Target Rejected', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//ADD APPRAISAL REVIEW DATE
if(isset($_GET['appryear'])){
	$year=$_GET['appryear'];
	$middate=$_GET['middate'];
	$enddate=$_GET['enddate'];
	
	//CHECK IF DATE IS NOT REPEATED
	$chk="SELECT * FROM targetdate WHERE year=$year";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun)==0){
		$upd="INSERT INTO targetdate SET year=$year, middate='$middate', enddate='$enddate', status='Active'";
		$conn->query($dbcon,$upd);
		$test="yes";
		$errorMsg="Target Date Has Been Set";
	}
	else{
		$test="no";
		$errorMsg="Review Dates Have Already Been Set For ".$year;
	}
	
}

if(isset($_GET['dateremove'])){
	$id=$_GET['dateremove'];
	$del="DELETE FROM targetdate WHERE id=$id";
	$conn->query($dbcon,$del);
	$test="no";
	$errorMsg="Target Date Has Been Removed";
}

//TUTORIAL UPLOAD
if(isset($_POST['stutorial'])){
	$pdf=$_FILES['tutfile']['tmp_name'];
	$fname=$_FILES['tutfile']['name'];
	$txt=$_POST['tuttext'];
	$comp=$_POST['company'];
	$title=$_POST['title'];
	$target=$_POST['dtarget'];
	$desc=$_POST['description'];
	$doctype=$_POST['doctype'];
	$ins="";
	if(empty($pdf)){
		//THEN URL LINK IS CHOSEN
		$ins="INSERT INTO tutorials SET url='$txt', title='$title', type='$doctype', dept='$comp', target='$target', description='$desc', status='Active'";
	}
	else{
		//move uploaded file
		$ins="INSERT INTO tutorials SET target='$target', url='$fname', title='$title', type='file', dept='$comp', description='$desc', status='Active'";
		
		$newname="assets/data/tutorial/".$fname;
		$file = file_put_contents($newname, file_get_contents($pdf));
	}
	$conn->query($dbcon,$ins);
	
	//MESSAGE TO SEND TO STAFF
	$msg="A tutorial has been uploaded for your review";
	$msgqry="INSERT INTO message SET voka_id='All', message='$msg', caption='Tutorial Upload', status='Active'";
	$conn->query($dbcon,$msgqry);
	
	$test="yes";
	$errorMsg="Tutorial Uploaded Successfully";
}

//LEAVE APPROVAL BY REPLACEE

if(isset($_GET['stfapprleave'])){
	$id=$_GET['pending_leave'];
	$days=$_GET['leave_days'];
	$stfid=$_GET['stfid'];
	
	$upd="UPDATE staff_leave SET status='Pending' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);

	//Sending message to the applicant
	$msg="Leave Application Has Been Approved By Replacement";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Replacement Approval', status='Active'";
	$conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Approved Leave Application As A Replacement For ".checkName($stfid);
    $aud="INSERT INTO atrails SET usr='$stfID', module='Leave Management', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);

	$test="yes";
	$errorMsg="You Have Agreed To Replace ".checkName($stfid);
}
if(isset($_GET['stfrejleave'])){
	$id=$_GET['pending_leave'];
	$days=$_GET['leave_days'];
	$stfid=$_GET['stfid'];
	
	$upd="UPDATE staff_leave SET status='ReplacementReject' WHERE leaveID=$id";
	$conn->query($dbcon,$upd);
	
	$msg="Leave Application Has Been Rejected By Replacement";
	$msgqry="INSERT INTO message SET voka_id='$stfid', message='$msg', caption='Replacement Reject', status='Active'";
	$conn->query($dbcon,$msgqry);

    //AUDIT TRAIL
    $event="Rejected Leave Application As A Replacement For ".checkName($stfid);
    $aud="INSERT INTO atrails SET usr='$stfID', module='Leave Management', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);


    $test="yes";
	$errorMsg="You Have Refused To Replace ".checkName($stfid);
}

//LOAN APPLICATION
if(isset($_GET['loanamount'])){
	$amount=$_GET['loanamount'];
	$reason=mysqli_real_escape_string($dbcon,$_GET['reason']);
	$duration=$_GET['duration'];
	$schd=($amount/$duration);
	
	//GETTING THE LOAN ID
	$loanid=$currDateTime;
	
	//Checking if staff has a pending loanamount
	$sel="SELECT * FROM loans WHERE status IN ('Pending','HR Approved','Acc Approved') AND voka_id='$vokaId'";
	$selrun=$conn->query($dbcon,$sel);
	if($conn->sqlnum($selrun) > 0){
		$test="no";
		$errorMsg="You Have A Pending Loan Application. It has To Be Approved Before You Can Apply For A New One";
	}
	else{
		$ins="INSERT INTO loans SET schd=$schd, duration='$duration', loanid='$loanid', voka_id='$vokaId', amount=$amount, reason='$reason', status='Pending'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$errorMsg="Your Leave Application Has Been Forwarded To The HR Department For Approval ";
	}
}
if(isset($_GET['deleteloan'])){
	$loanid=$_GET['deleteloan'];
	$del="DELETE FROM loans WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="no";
	$errorMsg="Your Have Detached Your Loan Application Successfully ";
}

//HR APPROVE LOAN
if(isset($_GET['hrloanapp'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	$del="UPDATE loans SET status='HR Approved', hrdate='$dateTime', hr='$vokaId', hrcom='$com' WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Loan Application Approved Successfully ";
	
	$msg="Loan Application Has Been Approved By HR Department";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//HR REJECT LOAN
if(isset($_GET['hrloanrej'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	$del="UPDATE loans SET status='HR Reject', hrdate='$dateTime', hr='$vokaId', hrcom='$com' WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="no";
	$errorMsg="Loan Application Rejected";
	
	$msg="Loan Application Has Been Rejected By HR Department";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//ACCOUNTS APPROVE LOAN
if(isset($_GET['acctapprloan'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	$del="UPDATE loans SET fincom='$com', status='cfoApproved', cfoDate='$dateTime', account='$vokaId' WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Loan Application Approved Successfully ";
	
	$msg="Loan Application Has Been Approved By Finance Department";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//ACCOUNTS REJECT LOAN
if(isset($_GET['acctrejloan'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	$del="UPDATE loans SET fincom='$com', status='cfoReject', cfoDate='$dateTime', account='$vokaId'  WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="no";
	$errorMsg="Loan Application Rejected";
	
	$msg="Loan Application Has Been Rejected By Accounts Department <b><label>Reason: </label>".$com;
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//FINANCE DIRECTOR APPROVE LOAN
if(isset($_GET['dirapprloan'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	$duration=$_GET['duration'];
	$commenceDate= date('Y-m-d', strtotime('+1 month', strtotime($ddate)));
	$del="UPDATE loans SET cdown='$duration', commenceDate='$commenceDate', dircom='$com', status='Approved', finDate='$dateTime', findir='$vokaId'  WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Loan Application Approved Successfully ";
	
	$msg="Loan Application Has Been Approved By Finance Director";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//FINANCE DIRECTOR REJECT LOAN
if(isset($_GET['dirrejloan'])){
	$loanid=$_GET['loanid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	
	$del="UPDATE loans SET dircom='$com', status='dirReject', finDate='$dateTime', findir='$vokaId'  WHERE loanid='$loanid'";
	$conn->query($dbcon,$del);
	
	$test="no";
	$errorMsg="Loan Application Rejected";
	
	$msg="Loan Application Has Been Rejected By Finance Director <b><label>Reason: </label>".$com;
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Loan Approval', status='Active'";
	$conn->query($dbcon,$msgqry);
}

if(isset($_POST['holiday'])){
	$name=$_POST['holiday'];
	$date=$_POST['hdate'];
	
	$chk="SELECT * FROM holidays WHERE name='$name' OR date='$date'";
	$chkrun=$conn->query($dbcon,$chk);
	if($conn->sqlnum($chkrun)==0){
		$ins="INSERT INTO holidays 	set name='$name', date='$date'";
		$conn->query($dbcon,$ins);
		$test="yes";
		$errorMsg="Holiday Added";
	}else{
		$test="no";
		$errorMsg="Holiday Exists";
	}
}

//ADD STAFF GENERAL COMMENT
if(isset($_GET['addgencomment'])){
	$voka=$_GET['voka'];
	$year=$_GET['year'];
	$period=$_GET['period'];
	$comment=mysqli_real_escape_string($dbcon,$_GET['gencomment']);
	
	$upd="";
	if($period=="mid_yr"){
		$upd="UPDATE targets SET gencomment='$comment' WHERE voka_id='$voka' AND year=$year";
	}else{
		$upd="UPDATE targets SET gencomment2='$comment' WHERE voka_id='$voka' AND year=$year";
	}
	$conn->query($dbcon,$upd);
	$test="yes";
	$errorMsg="Comment Added";
}

//ADD STAFF RECRUITMENT NEED
if(isset($_GET['workload'])){
	$title=$_GET['title'];
	$comp=$_GET['comp'];
	$support=$_GET['support'];
	$salary=$_GET['salary'];
	$prod=$_GET['productivity'];
	$wload=$_GET['workload'];
	$duties=$_GET['duties'];
	$budget=$_GET['budget'];
	$rtype=$_GET['roletype'];
	$rnew=$_GET['rolenew'];
	
	$ins="INSERT INTO recruitment SET salCompany='$comp', voka_id='$vokaId', title='$title', support='$support', salary=$salary, prod='$prod',
	wload='$wload', duties='$duties', budget='$budget', rtype='$rtype', rnew='$rnew', status='Pending'";
	$conn->query($dbcon,$ins);
	$test="yes";
	$errorMsg="Staff Recruitment Created And Forwarded To The Human Resource Department";
}

//HR APPROVAL OF THE Recruitment
if(isset($_GET['hrapprrec'])){
	$id=$_GET['recid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	
	$del="UPDATE recruitment SET hr='$vokaId', status='hrApproved', hrdate='$dateTime', hrcom='$com'  WHERE id='$id'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Staff Recruitment Approved";
	
	$msg="Your Recruitment Need Has Been Approved By HR Department";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Recruitment Approved', status='Active'";
	$conn->query($dbcon,$msgqry);
}

if(isset($_GET['hrrejrec'])){
	$id=$_GET['recid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	
	$del="UPDATE recruitment SET hr='$vokaId', status='hrReject', hrdate='$dateTime', hrcom='$com'  WHERE id='$id'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Staff Recruitment Rejected";
	
	$msg="Your Recruitment Need Has Been Rejected By HR Department<br><label>Reason:</label>".$com;
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Recruitment Rejected', status='Active'";
	$conn->query($dbcon,$msgqry);
}
if(isset($_GET['dirapprrec'])){
	$id=$_GET['recid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	
	$del="UPDATE recruitment SET dir='$vokaId', status='Approved', dirdate='$dateTime', dircom='$com'  WHERE id='$id'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Staff Recruitment Approved";
	
	$msg="Your Recruitment Need Has Been Approved By HR Director";
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Recruitment Approved', status='Active'";
	$conn->query($dbcon,$msgqry);
}

if(isset($_GET['dirrejrec'])){
	$id=$_GET['recid'];
	$voka=$_GET['voka'];
	$com=$_GET['comment'];
	
	$del="UPDATE recruitment SET dir='$vokaId', status='dirReject', dirdate='$dateTime', dircom='$com'  WHERE id='$id'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Staff Recruitment Rejected";
	
	$msg="Your Recruitment Need Has Been Rejected By HR Director<br><label>Reason:</label>".$com;
	$msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='Recruitment Rejected', status='Active'";
	$conn->query($dbcon,$msgqry);
}

//DETACH THE SALARY RULE
if(isset($_GET['remrule'])){
	$id=$_GET['remrule'];
	
	$del="DELETE FROM sal_rules WHERE id='$id'";
	$conn->query($dbcon,$del);
	
	$test="yes";
	$errorMsg="Salary Rule Removed";
}

//REMOVING THE TAX ATTACHED TO A PRODUCT BY THE ACCOUNTS DEPARTMENT
if(isset($_GET['remtax'])){
	$taxid=$_GET['remtax'];
	$amount=$_GET['amount'];
	$pvid=$_GET['showPV'];

	//REMOVE THE TAX COMPONENT FROM  PVTAX
	$rem="DELETE FROM pvtax WHERE id=$taxid";
	$conn->query($dbcon,$rem);

	//UPDATE THE TAX AMOUNT OF THE PV_DETAIL TABLE
	$upd="UPDATE pv_detail SET taxamount=(taxamount - $amount) WHERE pv_id='$pvid'";
	$conn->query($dbcon,$upd);

	$test="yes";
	$msg="Tax Component Detached";
}

//STAFF LOGOUT
if(isset($_GET['logout'])){
	$upd="UPDATE users SET logstatus='' WHERE staff_id='$stfID'";
	$conn->query($dbcon,$upd);
    //AUDIT TRAIL
    $event="logged out";
    $aud="INSERT INTO atrails SET usr='$stfID', module='logout', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);
	header ("location: admin_index.php");
	exit(0);
}


//REMOVE PV ATTACHMENTS
if(isset($_GET['remattach'])){
    $doc=$_GET['remattach'];
    $upd="DELETE FROM pvdoc WHERE ref='$doc'";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="Document Detached";
}

//REMOVE PV ATTACHMENTS
if(isset($_GET['resetgentarget'])){
    $stfid=$_GET['resetgentarget'];
    $upd="DELETE FROM staff_target_tmp WHERE voka_id='$stfid'";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="Staff General Targets Have Benn Reset Successfully";
}

///CAREER CREATION //
if(isset($_GET['career_note'])){
    $title=mysqli_real_escape_string($dbcon,$_GET['jobtitle']);
    $company=$_GET['company'];
    $type=$_GET['jobtype'];
    $deadline=$_GET['deadline'];
    $note=mysqli_real_escape_string($dbcon,$_GET['career_note']);

    $ins="INSERT INTO careers (title,company,description,deadline,jobtype,status) VALUES ('$title','$company','$note','$deadline','$type','Active')";
    $conn->query($dbcon,$ins);
    $test="yes";
    $errorMsg="Career Created Successfully";
}

if(isset($_GET['careerstatus'])){
    $title=mysqli_real_escape_string($dbcon,$_GET['jobtitle']);
    $company=$_GET['company'];
    $type=$_GET['jobtype'];
    $deadline=$_GET['deadline'];
    $status=$_GET['careerstatus'];
    $id=$_GET['careerid'];

    $upd="UPDATE careers SET title='$title',company='$company',jobtype='$type',status='$status' WHERE id=$id";
    $conn->query($dbcon,$upd);
    $test="yes";
    $errorMsg="Career Updated Successfully";
}

if(isset($_GET['accept_app'])){
    $jobid=$_GET['njobid'];
    $email=$_GET['nemail'];
    $contact=$_GET['ncontact'];

    $upd="UPDATE career_app SET status='Accepted' WHERE job_id='$jobid' AND email='$email'";
    $conn->query($dbcon,$upd);

    //SEND SMS TO APPLICANT
    To_Send_SMS($contact,"Your Application Has Been Accepted. Kindly Proceed To The Portal To Take Your Aptitude Test");
    /*Create aptuitude test details
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $pword= substr(str_shuffle($permitted_chars), 0, 10);*/

    $sel="SELECT id FROM aptitude_test_qxtns WHERE status ='Active'";
    $selrun=$conn->query($dbcon,$sel);
    while($data=$conn->fetch($selrun)){
        $qxtnid=$data['id'];
        $ins="INSERT INTO career_test (qxtnid,email,job_id) VALUES ('$qxtnid','$email','$jobid')";
        $conn->query($dbcon,$ins);
    }

    $test="yes";
    $errorMsg="Job Application Approved";
}

if(isset($_GET['reject_app'])){
    $jobid=$_GET['njobid'];
    $email=$_GET['nemail'];

    To_Send_SMS($contact,"Your Job Application Has Been Rejected. Better Luck Next Time");

    $upd="UPDATE career_app SET status='Rejected' WHERE JOB_id='$jobid' AND email='$email'";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="Job Application Rejected";
}

if(isset($_GET['deactivate_apt'])){
    $id=$_GET['deactivate_apt'];

    $upd="UPDATE aptitude_test_qxtns SET status='Inactive' WHERE id=$id";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="Aptitude Test Deactivated";
}

if(isset($_GET['activate_apt'])){
    $id=$_GET['activate_apt'];

    $upd="UPDATE aptitude_test_qxtns SET status='Active' WHERE id=$id";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="Aptitude Test Activated";
}

if(isset($_GET['aptjobid'])){
    $jobid=mysqli_real_escape_string($dbcon,$_GET['aptjobid']);
    $email=mysqli_real_escape_string($dbcon,$_GET['aptjobemail']);
    $date=mysqli_real_escape_string($dbcon,$_GET['intdate']);
    $time=mysqli_real_escape_string($dbcon,$_GET['inttime']);
    $loc=mysqli_real_escape_string($dbcon,$_GET['intloc']);
    $oth=mysqli_real_escape_string($dbcon,$_GET['intoth']);
    $location="https://www.ghanapostgps.com/mobilemapview.html#".$loc;
    //GET THE CONTACT
    $selcont="SELECT contact FROM career_reg WHERE email='$email'";
    $selcontrun=$conn->query($dbcon,$selcont);
    $selcontdata=$conn->fetch($selcontrun);
    $contact=$selcontdata['contact'];

    $upd="UPDATE career_app SET status='Interview' WHERE job_id='$jobid' AND email='$email'";
    $conn->query($dbcon,$upd);

    $msg='You are invited for an interview on'.$date.' at '.$time.' Click link for direction: '.$location.' Other:'.$oth;
    To_Send_SMS($contact,$msg);
    $test="yes";
    $errorMsg="Aptitude Test Question Added";
}

if(isset($_GET['chqpvid'])){
    $pvid=mysqli_real_escape_string($dbcon,$_GET['chqpvid']);
    $chq=mysqli_real_escape_string($dbcon,$_GET['chqnumber']);
    $exp=mysqli_real_escape_string($dbcon,$_GET['chqexp_cls']);
    $bank=mysqli_real_escape_string($dbcon,$_GET['chqbk_code']);
    if(empty($chq)){
        $chq="None";
    }

    $upd="UPDATE pv_detail SET chekno='$chq', bankCode='$bank', expense_class='$exp' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd);

    $test="yes";
    $errorMsg="CHEQUE DETAILS ADDED SUCCESSFULLY";
}
if(isset($_GET['create_project'])){
    $edate=mysqli_real_escape_string($dbcon,$_GET['pro_edate']);
    $sdate=mysqli_real_escape_string($dbcon,$_GET['pro_sdate']);
    $desc=mysqli_real_escape_string($dbcon,$_GET['pro_descr']);
    $title=mysqli_real_escape_string($dbcon,$_GET['pro_title']);

    //CREATE PROJECT AND ASSIGN TO ALL STAFF
    $pjid="VKP".date("His"); //Projet ID

    //CREATE REVIEW RECORDS FOR ALL STAFF
    $sel="SELECT voka_id FROM staff_rec WHERE status <> 'Detached'";
    $selrun=$conn->query($dbcon,$sel);
    while($data=$conn->fetch($selrun)){
        $voka = $data['voka_id'];

        $ins="INSERT INTO proj_st_test (voka_id,pj_id,status) VALUES ('$voka','$pjid','Pending')";
        $conn->query($dbcon,$ins);
        //Send the message to the notifier
        $msg="Project, ".$title." Is Awaiting Your Feedback";
        $msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='PROJECT TESTING', status='Active'";
        $conn->query($dbcon,$msgqry);
    }

    $crt="INSERT INTO test_proj (edate,sdate,descr,title,pj_id,status) VALUES ('$edate','$sdate','$desc','$title','$pjid','Active')";
    $conn->query($dbcon,$crt);

    $test="yes";
    $errorMsg="PROJECT ADDED SUCCESSFULLY";
}

if(isset($_GET['submit_uat'])){
    $previd=mysqli_real_escape_string($dbcon,$_GET['previd']);
    $prevnote=mysqli_real_escape_string($dbcon,$_GET['previewnote']);
    $revstf=mysqli_real_escape_string($dbcon,$_GET['revstf']);

    $ins="UPDATE proj_st_test SET fback='$prevnote', status='Done', rev_date='$dateTime' WHERE voka_id='$vokaId' AND pj_id='$previd'";
    $conn->query($dbcon,$ins);
    //Send the response to all managers in charge of projects
    $sel="SELECT voka_id FROM staff_rec WHERE status <>'Detached' AND projectmgt='manager'";
    $selrun=$conn->query($dbcon,$sel);
    while($data=$conn->fetch($selrun)){
        $voka=$data['voka_id'];
        $msg="Project Feedback Has Been Submitted By ".checkName($revstf);
        $msgqry="INSERT INTO message SET voka_id='$voka', message='$msg', caption='PROJECT FEEDBACK', status='Active'";
        $conn->query($dbcon,$msgqry);
    }


    $test="yes";
    $errorMsg="PROJECT FEEDBACK SUBMITTED TO THE PROJECTS DEPARTMENT";
}

if(isset($_FILES['uatdocs']['tmp_name'])){
    $file=$_FILES['uatdocs']['tmp_name'];
    $pjid=$_POST['uatreview'];
    $imgnote=$_POST['imgnote'];
	
	$filename=$_FILES['uatdocs']['name'];

    //if there was an error uploading the file
    $newname="assets/data/uat/".$currDateTime.".jpg";//URL of the image location

    $file = file_put_contents($newname, file_get_contents($file));

    //TABLE TO STORE NAMES OF DOCUMENTS UPLOADED
    $docqry="INSERT INTO proj_st_img SET voka_id='$vokaId', pj_id='$pjid', img='$newname', imgname='$filename', imgnote='$imgnote'";
    $conn->query($dbcon,$docqry);
    $test="yes";
    $errorMsg="Document Has Been Attached Successfully";
}

if(isset($_GET['remuvuat'])){
    $img=mysqli_real_escape_string($dbcon,$_GET['remuvuat']);

    $del="DELETE FROM proj_st_img WHERE img='$img'";
    $conn->query($dbcon,$del);


    $test="yes";
    $errorMsg="Attachment Has Been Removed Successfully";
}

//GALLERY CREATION
if(isset($_GET['gliname'])){
    $gname=mysqli_real_escape_string($dbcon,$_GET['gliname']);
    $ddescr=mysqli_real_escape_string($dbcon,$_GET['descr']);
    $ctype=mysqli_real_escape_string($dbcon,$_GET['ctype']);

    $ins="INSERT INTO gallery (gname, type, descr, status) VALUES ('$gname','$ctype','$ddescr','Active')";
    $conn->query($dbcon,$ins);

    $test="yes";
    $errorMsg="Gallery Has Been Created Successfully";
}

if(isset($_GET['delgallery'])){
    $galid=mysqli_real_escape_string($dbcon,$_GET['delgallery']);

    $ins="DELETE FROM galleryupl WHERE id = $galid";
    $conn->query($dbcon,$ins);

    $test="yes";
    $errorMsg="Media Has Been Removed Successfully";
}

if(isset($_FILES['img_file'])){
    // Count total files
    $countfiles = count($_FILES['img_file']['name']);
    $galid = $_POST['galleryimages'];

    // Looping all files
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['img_file']['tmp_name'][$i];
        // Upload file
        //move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
        //if there was an error uploading the file
        $newname="assets/data/Gallery/Pictures/".$_FILES['img_file']['name'][$i];//URL of the image location
        $file = file_put_contents($newname, file_get_contents($filename));

        $ins = "INSERT INTO galleryupl(galid, url) VALUES ('$galid','$newname')";
        $conn->query($dbcon,$ins);
    }

    $test="yes";
    $errorMsg="Images Uploaded Successfully";
}

if(isset($_FILES['claim_file'])){
    // Count total files
    $countfiles = count($_FILES['claim_file']['name']);
    $fac = $_POST['claim_fac'];
    $fac = $_POST['claim_fac'];

    // Looping all files
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['img_file']['tmp_name'][$i];
        // Upload file
        //move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
        //if there was an error uploading the file
        $newname="assets/data/Gallery/Pictures/".$_FILES['img_file']['name'][$i];//URL of the image location
        $file = file_put_contents($newname, file_get_contents($filename));

        $ins = "INSERT INTO galleryupl(galid, url) VALUES ('$galid','$newname')";
        $conn->query($dbcon,$ins);
    }

    $test="yes";
    $errorMsg="Images Uploaded Successfully";
}
?>