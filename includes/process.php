<?php
if(isset($_POST['addclass'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cname=mysqli_real_escape_string($dbcon,strtoupper($_POST['cname']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT COUNT(status) AS totalstat FROM classes WHERE cname = '$cname'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $seldata = $conn->fetch($selchkrun);
    if($seldata['totalstat'] == 0){
        $ins = "INSERT INTO classes (cname, status, template) VALUES ('$cname','ACTIVE','NO')";
        $conn->query($dbcon,$ins);

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." New Class , $cname Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");

        $test = "yes";
        $msg = "Class With Name <b>".$cname."</b> Has Been Added Successfully";
    }else{
        $test = "no";
        $msg = "Class With Name <b>".$cname."</b> Already Exists";
    }
    $conn->close($dbcon);
}

if(isset($_POST['updclass'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cname=mysqli_real_escape_string($dbcon,strtoupper($_POST['cname']));
    $cid=mysqli_real_escape_string($dbcon,strtoupper($_POST['cid']));
    $status=mysqli_real_escape_string($dbcon,strtoupper($_POST['status']));

    $upd = "UPDATE classes SET cname = '$cname', status='$status' WHERE id=$cid";
    $conn->query($dbcon,$upd);
    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Class With ID , $cid Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $test = "yes";
    $msg = "Class Has Been Updated Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['updatesubject'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sbj=mysqli_real_escape_string($dbcon,strtoupper($_POST['sbj']));
    $sbjid=mysqli_real_escape_string($dbcon,strtoupper($_POST['sbjid']));
    $status=mysqli_real_escape_string($dbcon,strtoupper($_POST['status']));

    $upd = "UPDATE subject SET sbj = '$sbj', status='$status' WHERE id=$sbjid";
    $conn->query($dbcon,$upd);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Subject With ID $sbjid Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $test = "yes";
    $msg = "Subject Has Been Updated Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['updatefees'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sbj=mysqli_real_escape_string($dbcon,strtoupper($_POST['feename']));
    $sbjid=mysqli_real_escape_string($dbcon,strtoupper($_POST['feeid']));
    $status=mysqli_real_escape_string($dbcon,strtoupper($_POST['status']));

    $upd = "UPDATE fees_struct SET fee_name = '$sbj', status='$status' WHERE id=$sbjid";
    $conn->query($dbcon,$upd);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Fees Structure With ID $sbjid Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $test = "yes";
    $msg = "Fees Component Has Been Updated Successfully";
    $conn->close($dbcon);
}

if(isset($_FILES['clogo']['tmp_name'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $img=$_FILES['clogo']['tmp_name'];
    $newname="assets/data/logo/logo.png";//URL of the image location

    $cname=mysqli_real_escape_string($dbcon,strtoupper($_POST['cname']));
    $ccont=mysqli_real_escape_string($dbcon,strtoupper($_POST['ccont']));
    $cmail=mysqli_real_escape_string($dbcon,strtoupper($_POST['cmail']));
    $cloc=mysqli_real_escape_string($dbcon,strtoupper($_POST['cloc']));
    $caddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['caddr']));
    $tag=mysqli_real_escape_string($dbcon,strtoupper($_POST['tag']));


    //CHECK IF COMPANY DETAILS EXISTS
    $chk = "SELECT cname FROM company";
    $chkrun = $conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        if(!empty($img)){
            $newname="assets/data/logo/".$currDateTime.".jpg";//URL of the image location
            $file = file_put_contents( $newname, file_get_contents($img));
        }
        $ins = "INSERT INTO company(cname, ccont, cmail, cloc, caddr, clogo, tag) VALUES ('$cname','$ccont','$cmail','$cloc','$caddr','$newname','$tag')";
        $conn->query($dbcon,$ins);
    }else{
        if(!empty($img)){
            $newname="assets/data/logo/".$currDateTime.".jpg";//URL of the image location
            $file = file_put_contents( $newname, file_get_contents($img));

            $sql="UPDATE company SET tag = '$tag', cname = '$cname', ccont = '$ccont', cmail = '$cmail', cloc = '$cloc', caddr = '$caddr', clogo = '$newname'";
            $conn->query($dbcon,$sql);
        }else{
            $sql="UPDATE company SET tag = '$tag', cname = '$cname', ccont = '$ccont', cmail = '$cmail', cloc = '$cloc', caddr = '$caddr'";
            $conn->query($dbcon,$sql);
        }

    }

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Company Details Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $test = "yes";
    $msg = "Company Information Updated Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['subjectlist'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $sbjlist=$_POST['subjectlist'];
    $cid=mysqli_real_escape_string($dbconnection,$_POST['cid']);

    $count=COUNT($sbjlist);
    $failed=0;
    $success=0;
    foreach($sbjlist AS $sbj){
        //CHECK IF SUBJECT IS ALREADY LINKED TO CLASS
        if(!empty($sbj)){
            $chk = "SELECT cid FROM subject_class WHERE sbjid = '$sbj' AND cid='$cid'";
            $chkrun=$conn->query($dbconnection,$chk);
            if($conn->sqlnum($chkrun) == 0){
                $ins="INSERT INTO subject_class(sbjid, cid) VALUES('$sbj','$cid')";
                $conn->query($dbconnection,$ins);
            }
        }

    }
    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Subjects Linked To Class With ID $cid By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $test="yes";
    $msg="Subjects Linked To Class Successfully.";
    $conn->close($dbconnection);
}

if(isset($_POST['feeslist'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $feeslist=$_POST['feeslist'];
    $amount=$_POST['myamount'];
    $feeid=$_POST['cid'];

    $count=COUNT($feeslist);
    $failed=0;
    $success=0;
    for($i=0; $i < $count; $i++){
        $sbj=$feeslist[$i];
        $damount=$amount[$i];
        //CHECK IF FEES IS ALREADY LINKED TO CLASS
        if(!empty($sbj) && !empty($damount)){
            $chk = "SELECT feeid FROM fees_class WHERE feeid = '$sbj' AND cid='$feeid'";
            $chkrun=$conn->query($dbconnection,$chk);
            if($conn->sqlnum($chkrun) == 0){
                $ins="INSERT INTO fees_class(feeid, cid, amount) VALUES('$sbj','$feeid',$damount)";
                $conn->query($dbconnection,$ins);
            }
        }
    }

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Fees Structure Has Been Linked To Class With ID $feeid By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $test="yes";
    $msg="Fees Component Linked To Class Successfully.";
    $conn->close($dbconnection);
}

if(isset($_POST['addsubject'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sbj=mysqli_real_escape_string($dbcon,strtoupper($_POST['sbj']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT status FROM subject WHERE sbj = '$sbj'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO subject (sbj, status) VALUES ('$sbj','ACTIVE')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Subject Has Been Added Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." New Subject , $sbj Was Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }else{
        $test = "no";
        $msg = "Subject Name <b>".$sbj."</b> Already Exists";
    }
    $conn->close($dbcon);
}

if(isset($_POST['adddiscount'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $discname=mysqli_real_escape_string($dbcon,strtoupper($_POST['discname']));
    $percent=mysqli_real_escape_string($dbcon,strtoupper($_POST['percent']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT status FROM discounts WHERE disc_name = '$discname'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO discounts (disc_name, percent, status) VALUES ('$discname',$percent,'ACTIVE')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Discount Has Been Added Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." New Discount , $discname Was Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }else{
        $test = "no";
        $msg = "Discount Name <b>".$discname."</b> Already Exists";
    }
    $conn->close($dbcon);
}

if(isset($_POST['addposition'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $post=mysqli_real_escape_string($dbcon,strtoupper($_POST['postname']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT status FROM positions WHERE post_name = '$post'";
    $selchkrun = $conn->query($dbcon,$selchk);
    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO positions (post_name, status) VALUES ('$post','ACTIVE')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Staff Position <b>$post</b> Has Been Added Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." New Position , $post Was Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }else{
        $test = "no";
        $msg = "Position Name <b>".$post."</b> Already Exists";
    }
    $conn->close($dbcon);
}

if(isset($_POST['addparent'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $stdid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stdid']));
    $fullname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $contact=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $occupation=mysqli_real_escape_string($dbcon,strtoupper($_POST['occupation']));
    $relation=mysqli_real_escape_string($dbcon,strtoupper($_POST['relation']));

    $ins = "INSERT INTO student_parents (stdid, fname, contact, address, occupation, relation) VALUES ('$stdid','$fullname','$contact','$resaddr','$occupation','$relation')";
    $conn->query($dbcon,$ins);
    $test = "yes";
    $msg = "Parent Record Has Been Added Successfully";

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Parent Record Added To Student ".getStudent($stdid)." By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $conn->close($dbcon);
}

if(isset($_POST['addemergency'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $stdid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stdid']));
    $fullname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $contact=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $occupation=mysqli_real_escape_string($dbcon,strtoupper($_POST['occupation']));

    $ins = "INSERT INTO student_emergency (stdid, fname, contact, address, occupation) VALUES ('$stdid','$fullname','$contact','$resaddr','$occupation')";
    $conn->query($dbcon,$ins);
    $test = "yes";
    $msg = "Emergency Record Has Been Added Successfully";

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Emergency Contact Added To Student $stdid By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $conn->close($dbcon);
}

if(isset($_POST['addfees'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sbj=mysqli_real_escape_string($dbcon,strtoupper($_POST['feename']));

    $selchk = "SELECT status FROM fees_struct WHERE fee_name = '$sbj'";
    $selchkrun = $conn->query($dbcon,$selchk);

    $selnum = $conn->sqlnum($selchkrun);

    if($selnum == 0){
        $ins = "INSERT INTO fees_struct (fee_name, status) VALUES ('$sbj','ACTIVE')";
        $conn->query($dbcon,$ins);
        $test = "yes";
        $msg = "Fees Component Has Been Created Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." New Fees Structure , $sbj Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }else{
        $test = "no";
        $msg = "Fees Name <b>".$sbj."</b> Already Exists";
    }
    $conn->close($dbcon);
}

if(isset($_GET['detach_subject'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $id=mysqli_real_escape_string($dbcon,strtoupper($_GET['detach_subject']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "DELETE FROM subject_class WHERE id = $id";
    $conn->query($dbcon,$selchk);

    $test = "yes";
    $msg = "Subject Has Been Unlinked Successfully";
    $conn->close($dbcon);
}

if(isset($_GET['detach_fees'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $id=mysqli_real_escape_string($dbcon,strtoupper($_GET['detach_fees']));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "DELETE FROM fees_class WHERE id = $id";
    $conn->query($dbcon,$selchk);

    $test = "yes";
    $msg = "Fees Has Been Unlinked Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['proceednewstudent']) || isset($_POST['pendingstudent'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $img=$_FILES['stdimg']['tmp_name'];
    $newname="assets/images/defaults/avatar.png";//URL of the image location

    $fname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $lname=mysqli_real_escape_string($dbcon,strtoupper($_POST['lname']));
    $cont=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $mail=mysqli_real_escape_string($dbcon,strtoupper($_POST['email']));
    $class=mysqli_real_escape_string($dbcon,strtoupper($_POST['class']));
    $admitdate=mysqli_real_escape_string($dbcon,strtoupper($_POST['admitdate']));
    $stsex=mysqli_real_escape_string($dbcon,strtoupper($_POST['stsex']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $dob=mysqli_real_escape_string($dbcon,strtoupper($_POST['dob']));
    $term=mysqli_real_escape_string($dbcon,strtoupper($_POST['term']));
    $discount=mysqli_real_escape_string($dbcon,strtoupper($_POST['discount']));

    $yr = date("Y",strtotime(date($admitdate)));
    $mnt = date("m",strtotime(date($admitdate)));

    $status = "ACTIVE";

    //GET THE BIRTH MONTH AND YEAR  AND DAY OF APPLICANT
    $bday= date("d",strtotime(date($dob)));
    $bmnt= date("m",strtotime(date($dob)));
    $byr= date("Y",strtotime(date($dob)));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT COUNT(fname) AS totstudents FROM students";
    $selchkrun = $conn->query($dbcon,$selchk);
    $seldata = $conn->fetch($selchkrun);
    $count=$seldata['totstudents'];

    //GENERATE STUDENT ID
    $stdid = "BHIS".$bday.$bmnt.$byr.str_pad(($count + 1),4,"0",STR_PAD_LEFT);

    //GENERATE SCHOOL FEES INVOICE FOR STUDENT


    if(!empty($img)){
        $newname="assets/data/students/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    if(isset($_POST['proceednewstudent'])){
        //ADD NEW STUDENT
        $ins = "INSERT INTO students (stdid, img, fname, lname, contact, email, class, admitdate, status, sex, dob, resaddr, styr, discid) VALUES ('$stdid','$newname','$fname','$lname','$cont','$mail','$class','$admitdate','ACTIVE','$stsex','$dob','$resaddr','$yr','$discount')";
        $conn->query($dbcon,$ins);
        header("Location: dashboard.php?student_details=$stdid");
    }elseif(isset($_POST['pendingstudent'])){
        $ins = "INSERT INTO students (stdid, img, fname, lname, contact, email, class, admitdate, status, sex, dob, resaddr, styr, discid) VALUES ('$stdid','$newname','$fname','$lname','$cont','$mail','$class','$admitdate','PENDING','$stsex','$dob','$resaddr','$yr', '$discount')";
        $conn->query($dbcon,$ins);
    }


    $test = "yes";
    $msg = "Student Has Been Registered Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;
    $msg2 = "Student Basic Details Saved. Proceed To Add More Details";

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." New Student With ID , $stdid Added By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $conn->close($dbcon);
}

if(isset($_POST['updatestudent'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();

    $fname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $lname=mysqli_real_escape_string($dbcon,strtoupper($_POST['lname']));
    $cont=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $mail=mysqli_real_escape_string($dbcon,strtoupper($_POST['email']));
    $stsex=mysqli_real_escape_string($dbcon,strtoupper($_POST['stsex']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $dob=mysqli_real_escape_string($dbcon,strtoupper($_POST['dob']));
    $discount=mysqli_real_escape_string($dbcon,strtoupper($_POST['discount']));
    $dimg = $_FILES['stdimgupd']['tmp_name'];
    $stdid = $_POST['stdid'];
    $status = $_POST['status'];

    $upd="";
    if(!empty($dimg)){
        $newname="assets/data/students/".$currDateTime.".jpg";//URL of the image location
        $img = $_FILES['stdimgupd']['tmp_name'];
        $file = file_put_contents( $newname, file_get_contents($img));
        $upd = "UPDATE students SET discid='$discount', status = '$status', fname='$fname', lname='$lname', contact='$cont', email='$mail', sex='$stsex', resaddr='$resaddr', dob='$dob', img='$newname' WHERE stdid = '$stdid'";
    }else{
        $upd = "UPDATE students SET discid='$discount', status = '$status', fname='$fname', lname='$lname', contact='$cont', email='$mail', sex='$stsex', resaddr='$resaddr', dob='$dob' WHERE stdid = '$stdid'";
    }
    $conn->query($dbcon,$upd);

    $test = "yes";
    $msg = "Student Basic Records Has Been Updated Successfully. \n"."<b>STUDENT NAME:</b> ".$fname." ".$lname."\n <b>STUDENT ID:</b> ".$stdid;

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Student Records of , $stdid Has Been Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $conn->close($dbcon);
}

if(isset($_POST['generatestudentinvoice'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $feeslist = $_POST['feeslistAll'];
    $amount = $_POST['myamount'];
    $class = $_POST['cid'];
    $stdid = $_POST['stdid'];
    $year = $_POST['year'];
    $term = $_POST['term'];


    //CHECK IF INVOICE HAS BEEN PRODUCED ALREADY
    $chk = "SELECT COUNT(invoiceid) AS totslip FROM student_invoices WHERE stdid='$stdid' AND classid='$class' AND term='$term' AND status !='REJECTED'";
    $chkrun = $conn->query($dbcon,$chk);
    $chkdata = $conn->fetch($chkrun);
    if($chkdata['totslip'] == 0){
        $dcount = COUNT($feeslist);

        //GET THE LAST FOUR DIGITS OF A STRING
        $lastfour = substr($stdid,-4);

        $invid = "INV".$year.str_pad($class,2,"0",STR_PAD_LEFT).str_pad($term,2,"0",STR_PAD_LEFT).$lastfour;


        $totalamount = 0;

        //DELETE EVERY FEES COMPONENT THAT EXISTS IN THE RECORDS TO AVOID DUPLICATES
        $del = "DELETE FROM student_invoice_details WHERE invoiceid = '$invid'";
        $conn->query($dbcon, $del);

        for($i=0; $i < $dcount; $i++){
            $fee=$feeslist[$i];
            $feename = getFeesName($fee);
            $damount=$amount[$i];
            $totalamount+=$damount;

            //CHECK IF INVOICE COMPONENET ALREADY EXISTS
            $chk ="SELECT COUNT(invoiceid) AS total FROM student_invoice_details WHERE feeid = '$fee' AND invoiceid='$invid'";
            $chkrun = $conn->query($dbcon,$chk);
            $chkdata = $conn->fetch($chkrun);
            $count = $chkdata['total'];


            if($count == 0){
                $ins="INSERT INTO student_invoice_details(invoiceid, feeid, amount, feename) VALUES('$invid','$fee',$damount,'$feename')";
                $conn->query($dbcon,$ins);
            }
        }
        $inv = "INSERT INTO student_invoices (invoiceid, stdid, invdate, totalamount, paid, status, created_date, yr, classid, term) VALUES ('$invid','$stdid','$dateTime',$totalamount,0.00,'PENDING','$dateTime','$year','$class','$term')";
        $conn->query($dbcon,$inv);

        $test = "yes";
        $msg = "Invoice With ID <b>$invid</b> Has Been Generated Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Invoice with invoice id , $invid Created By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");

    }else{
        $test = "no";
        $msg = "An invoice already exists for ".getStudent($stdid)." For ".getClass($class)." And Term ".$term;
    }

    $conn->close($dbcon);
}




if(isset($_POST['anmsg'])) {
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $anmsg = mysqli_real_escape_string($dbcon,$_POST['anmsg']);
    $title= mysqli_real_escape_string($dbcon,$_POST['title']);
    $rectype= $_POST['rectype']; // STAFF SELECTION
    if($rectype=="All"){
        $sel="SELECT stfid FROM staff WHERE status ='ACTIVE'";
        $selrun=$conn->query($dbcon,$sel);
        while($data=$conn->fetch($selrun)){
            $stfid=$data['stfid'];
            //Send the message to the notifier
            $msgqry="INSERT INTO message SET stfid='$stfid', message='$anmsg', caption='MEMO: $title', status='ACTIVE'";
            $conn->query($dbcon,$msgqry);

            //Keep Record Of The Memo
            $memo="INSERT INTO memo SET stfid='$stfid', usr='$stfID', title='$title', msg='$anmsg', status='ACTIVE'";
            $conn->query($dbcon,$memo);
        }
        $test="yes";
        $msg="Memo Has Been Sent To All Staff";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Memo Was Sent To All Staff By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }
    else{
        $msgqry="INSERT INTO message SET stfid='$rectype', message='$anmsg', caption='MEMO: $title', status='ACTIVE'";
        $conn->query($dbcon,$msgqry);

        //Keep Record Of The Memo
        $memo="INSERT INTO memo SET stfid='$rectype', usr='$stfID', title='$title', msg='$anmsg', status='ACTIVE'";
        $conn->query($dbcon,$memo);

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Memo Was sent To $rectype By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");

        $test="yes";
        $msg="Memo Has Been Sent To ".checkName($rectype);
    }
    //Keep LOG Of The Memo
    $memo="INSERT INTO memo_log SET usr='$stfID', title='$title', msg='$anmsg', status='ACTIVE', recipient = '$rectype'";
    $conn->query($dbcon,$memo);
    $conn->close($dbcon);
}

if(isset($_POST['makepayment'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $payamount = mysqli_real_escape_string($dbcon,strtoupper($_POST['payamount']));
    $invid = mysqli_real_escape_string($dbcon,strtoupper($_POST['invoice_details']));
    $method = mysqli_real_escape_string($dbcon,strtoupper($_POST['payment_method']));
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

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance, pay_method) VALUE ('$invid',$payamount,$newbalance, '$method')";
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

        $ins = "INSERT INTO invoice_payment (invoiceid, amount, balance, pay_method) VALUE ('$invid',$payamount,$newbalance,'$method')";
        $conn->query($dbcon,$ins);

        $test = "yes";
        $msg = "Part Payment Has Been Completed";
    }



    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Amount Of GHS $payamount Received From Invoice ID $invid By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $conn->close($dbcon);
}

if(isset($_POST['proceednewstaff'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $img=$_FILES['stfimg']['tmp_name'];
    $newname="assets/images/defaults/avatar.png";//URL of the image location

    $fname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $lname=mysqli_real_escape_string($dbcon,strtoupper($_POST['lname']));
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);

    $cont=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $mail=mysqli_real_escape_string($dbcon,strtoupper($_POST['email']));
    $position=mysqli_real_escape_string($dbcon,strtoupper($_POST['post']));
    $admitdate=mysqli_real_escape_string($dbcon,strtoupper($_POST['admitdate']));
    $stsex=mysqli_real_escape_string($dbcon,strtoupper($_POST['stsex']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $sttitle=mysqli_real_escape_string($dbcon,strtoupper($_POST['sttitle']));

    //GET THE ADMISSION MONTH AND YEAR  AND DAY OF APPLICANT
    $bday= date("d",strtotime(date($admitdate)));
    $bmnt= date("m",strtotime(date($admitdate)));
    $byr= date("Y",strtotime(date($admitdate)));

    //GET THE TOTAL NUMBER OF REGISTERED STUDENT
    $selchk = "SELECT COUNT(fname) AS totstaff FROM staff";
    $selchkrun = $conn->query($dbcon,$selchk);
    $seldata = $conn->fetch($selchkrun);
    $count=$seldata['totstaff'];

    //GENERATE STUDENT ID
    $yr = date("Y",strtotime(date($admitdate)));
    //GENERATE STUDENT ID
    $stfid = "BHIS".$bday.$bmnt.$byr.str_pad(($count + 1),4,"0",STR_PAD_LEFT);

    if(!empty($img)){
        $newname="assets/data/staff/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO staff (stfid, img, fname, lname, contact, email, post, admitdate, status, sex, dob, resaddr,sttitle) VALUES ('$stfid','$newname','$fname','$lname','$cont','$mail','$position','$admitdate','ACTIVE','$stsex','$dob','$resaddr','$sttitle')";
    $conn->query($dbcon,$ins);

    //CREATE USER BY CALLING THE FUNCTION
    addUser($stfid,'admin123','staff');

    $test = "yes";
    $msg = "Staff Has Been Registered Successfully. \n"."<b>STAFF NAME:</b> ".$fname." ".$lname."\n <b>STAFF ID:</b> ".$stfid;

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." New Staff With Staff ID , $stfid Created By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    header("Location: dashboard.php?staff_details=$stfid");
    $conn->close($dbcon);
}

if(isset($_POST['updatestaff'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();

    $fname=mysqli_real_escape_string($dbcon,strtoupper($_POST['fname']));
    $lname=mysqli_real_escape_string($dbcon,strtoupper($_POST['lname']));
    $dob=mysqli_real_escape_string($dbcon,$_POST['dob']);

    $cont=mysqli_real_escape_string($dbcon,strtoupper($_POST['contact']));
    $mail=mysqli_real_escape_string($dbcon,strtoupper($_POST['email']));
    $position=mysqli_real_escape_string($dbcon,strtoupper($_POST['post']));
    $stsex=mysqli_real_escape_string($dbcon,strtoupper($_POST['stsex']));
    $resaddr=mysqli_real_escape_string($dbcon,strtoupper($_POST['resaddr']));
    $sttitle=mysqli_real_escape_string($dbcon,strtoupper($_POST['sttitle']));
    $stfid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stfid']));
    $title=mysqli_real_escape_string($dbcon,strtoupper($_POST['sttitle']));
    $post=mysqli_real_escape_string($dbcon,strtoupper($_POST['post']));
    $status=mysqli_real_escape_string($dbcon,strtoupper($_POST['status']));
    $dimg = $_FILES['stfimgupd']['tmp_name'];

    $upd="";
    if(!empty($dimg)){
        $newname="assets/data/staff/".$currDateTime.".jpg";//URL of the image location
        $img = $_FILES['stfimgupd']['tmp_name'];
        $file = file_put_contents( $newname, file_get_contents($img));
        $upd = "UPDATE staff SET status = '$status', post = '$post', sttitle = '$title', fname='$fname', lname='$lname', contact='$cont', email='$mail', sex='$stsex', resaddr='$resaddr', dob='$dob', img='$newname' WHERE stfid = '$stfid'";
    }else{
        $upd = "UPDATE staff SET status = '$status', post = '$post', sttitle = '$title', fname='$fname', lname='$lname', contact='$cont', email='$mail', sex='$stsex', resaddr='$resaddr', dob='$dob' WHERE stfid = '$stfid'";
    }
    $conn->query($dbcon,$upd);

    $test = "yes";
    $msg = "Staff Basic Records Has Been Updated Successfully. \n"."<b>STAFF NAME:</b> ".$fname." ".$lname."\n <b>STAFF ID:</b> ".$stfid;

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Records of staff with ID , $stfid Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $conn->close($dbcon);
}

if(isset($_POST['pname'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $currDateTime;

    $pname=mysqli_real_escape_string($dbconnection,strtoupper($_POST['pname']));
    $sprice=mysqli_real_escape_string($dbconnection,strtoupper($_POST['sprice']));
    $cprice=mysqli_real_escape_string($dbconnection,strtoupper($_POST['cprice']));
    $qty=mysqli_real_escape_string($dbconnection,$_POST['qty']);
    $dbcode = "";

    $sql="INSERT INTO products_master (pid, pname, sprice, cprice, status,qty) VALUES ('$pid','$pname',$sprice,$cprice,'ACTIVE',$qty)";
    $conn->query($dbconnection,$sql);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." New Product, $pname , Was Added By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $test = "yes";
    $msg = "Product Added successfully";
    $conn->close($dbconnection);
}
if(isset($_POST['submitresult'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $currDateTime;

    $talents=mysqli_real_escape_string($dbconnection,$_POST['talents']);
    $remarks=mysqli_real_escape_string($dbconnection,$_POST['remarks']);
    $examid=mysqli_real_escape_string($dbconnection,$_POST['examid']);
    $rollnum=mysqli_real_escape_string($dbconnection,$_POST['rollnum']);
    $vacation=mysqli_real_escape_string($dbconnection,$_POST['vacation']);
    $reopen=mysqli_real_escape_string($dbconnection,$_POST['reopen']);
    $attendance=mysqli_real_escape_string($dbconnection,$_POST['attendance']);
    $outof=mysqli_real_escape_string($dbconnection,$_POST['outof']);

    $sql="INSERT INTO exams_remarks (examid, talents, teacher, principal) VALUES ('$examid','$talents','$remarks','')";
    $conn->query($dbconnection,$sql);

    $upd="UPDATE exams_records SET status = 'CONFIRMED', roll_num='$rollnum', vacation='$vacation', reopening='$reopen', attendance='$attendance', outof='$outof' WHERE examid='$examid'";
    $conn->query($dbconnection,$upd);

    $test = "yes";
    $msg = "Exam Records Have Been Submitted For Approval To The Principal";
    $conn->close($dbconnection);
}

if(isset($_POST['approveresult'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();

    $remarks=mysqli_real_escape_string($dbconnection,strtoupper($_POST['remarks']));
    $examid=mysqli_real_escape_string($dbconnection,strtoupper($_POST['examid']));

    $sql="UPDATE exams_remarks SET principal = '$remarks' WHERE examid='$examid'";
    $conn->query($dbconnection,$sql);

    $upd="UPDATE exams_records SET status = 'APPROVED', dateapproved='$dateTime', approvedby='$stfID' WHERE examid='$examid'";
    $conn->query($dbconnection,$upd);

    $test = "yes";
    $msg = "Exam Records Have Been Approved By Principal";
    $conn->close($dbconnection);
}


if(isset($_POST['rejectresult'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();

    $examid=mysqli_real_escape_string($dbconnection,strtoupper($_POST['examid']));
    $class=mysqli_real_escape_string($dbconnection,strtoupper($_POST['classid']));

    $del1="DELETE FROM exams_details WHERE examid = '$examid'";
    $del2="DELETE FROM exams_records WHERE examid = '$examid'";
    $conn->query($dbconnection,$del1);
    $conn->query($dbconnection,$del2);

    $test = "yes";
    $msg = "Exams Result Has Been Cancelled";
    $conn->close($dbconnection);
    header("Location: dashboard.php?students_data=$class&status=ACTIVE");
}

if(isset($_POST['prodstat'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();

    $pname=mysqli_real_escape_string($dbconnection,strtoupper($_POST['pdname']));
    $pid=mysqli_real_escape_string($dbconnection,strtoupper($_POST['updpid']));
    $sprice=mysqli_real_escape_string($dbconnection,strtoupper($_POST['sprice']));
    $cprice=mysqli_real_escape_string($dbconnection,strtoupper($_POST['cprice']));
    $status=mysqli_real_escape_string($dbconnection,strtoupper($_POST['prodstat']));

    $sql="UPDATE products_master SET status = '$status', pname = '$pname', sprice = $sprice, cprice = $cprice WHERE pid = '$pid'";

    $move = "INSERT INTO products_master_history (pid, pnameo, spriceo, cpriceo, pname, sprice, cprice, status) SELECT pid, pname,sprice,cprice,'$pname',$sprice,$cprice, '$status' FROM products_master WHERE pid = '$pid'";
    $conn->query($dbconnection,$move);
    $conn->query($dbconnection,$sql);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Product, $pname , Was Updated By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $test = "yes";
    $msg = "Product Details Have Been Updated";
    $conn->close($dbconnection);
}

if(isset($_POST['stfaccess'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $stfid=mysqli_real_escape_string($dbcon,strtoupper($_POST['stfaccess']));
    $exams=mysqli_real_escape_string($dbcon,strtoupper($_POST['exams']));
    $bank=mysqli_real_escape_string($dbcon,strtoupper($_POST['bank']));
    $fees=mysqli_real_escape_string($dbcon,strtoupper($_POST['fees']));
    $pv=mysqli_real_escape_string($dbcon,strtoupper($_POST['pv']));
    $stfmgt=mysqli_real_escape_string($dbcon,strtoupper($_POST['stfmgt']));
    $stdmgt=mysqli_real_escape_string($dbcon,strtoupper($_POST['stdmgt']));
    $configs=mysqli_real_escape_string($dbcon,strtoupper($_POST['configs']));
    $sales=mysqli_real_escape_string($dbcon,strtoupper($_POST['sales']));

    $upd="UPDATE staff SET sales='$sales', bank='$bank', exams='$exams', fees='$fees', pv='$pv', stfmgt='$stfmgt', stdmgt='$stdmgt', configs='$configs' WHERE stfid='$stfid'";
    $conn->query($dbcon,$upd);

    notifyStaff('Your Access Rights Has Been Reviewed. Please Check Your New Roles','Access Rights Reviewed',$stfid);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Staff Access Control For $stfid , Was UpdateBy $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $test="yes";
    $msg="Acees Rights Applied";
    $conn->close($dbcon);
}

if(isset($_POST['chvoka'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
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
    $conn->close($dbcon);
}

if(isset($_POST['principalcomment'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $examid=mysqli_real_escape_string($dbcon,strtoupper($_POST['examid']));
    $comment=mysqli_real_escape_string($dbcon,$_POST['comment']);
    $class=mysqli_real_escape_string($dbcon,$_POST['class']);
    $term=mysqli_real_escape_string($dbcon,$_POST['term']);
    $year=mysqli_real_escape_string($dbcon,$_POST['year']);

    $upd="UPDATE exams_records SET dateapproved='$dateTime', approvedBy='$stfID', princ_comment='$comment', status='APPROVED' WHERE examid='$examid'";
    $conn->query($dbcon,$upd);
    header("Location: dashboard.php?pending_exams&class=$class&term=$term&year=$year");
    //notifyStaff('Your Access Rights Has Been Reviewed. Please Check Your New Roles','Access Rights Reviewed',$stfid);
    //auditTrail('Access Rights Of '.checkName($stfid)." Has Been Reviewed",$stfID,'Access Rights Reviewed',$usrIP);

    $test="yes";
    $msg="Examination Approved";

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Exams approved as principal for examid $examid By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    $conn->close($dbcon);
}

if(isset($_GET['detach_staff'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $id=mysqli_real_escape_string($dbcon,strtoupper($_GET['detach_staff']));

    $upd="DELETE FROM class_staff WHERE id = $id";
    $conn->query($dbcon,$upd);
    //notifyStaff('Your Access Rights Has Been Reviewed. Please Check Your New Roles','Access Rights Reviewed',$stfid);
    //auditTrail('Access Rights Of '.checkName($stfid)." Has Been Reviewed",$stfID,'Access Rights Reviewed',$usrIP);

    $test="yes";
    $msg="Staff Has Been Unlinked From Class";
    $conn->close($dbcon);
}

if(isset($_GET['removeparent'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $id=$_GET['removeparent'];

    $upd="DELETE FROM student_parents WHERE id = $id";
    $conn->query($dbcon,$upd);
    //notifyStaff('Your Access Rights Has Been Reviewed. Please Check Your New Roles','Access Rights Reviewed',$stfid);
    //auditTrail('Access Rights Of '.checkName($stfid)." Has Been Reviewed",$stfID,'Access Rights Reviewed',$usrIP);

    $test="yes";
    $msg="Parent Record Has Been Removed";
    $conn->close($dbcon);
}

//ADD BANK
if(isset($_POST['bankname'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name=mysqli_real_escape_string($dbcon,strtoupper($_POST['bankname']));
    $branch=mysqli_real_escape_string($dbcon,strtoupper($_POST['branch']));
    $accountnumber=mysqli_real_escape_string($dbcon,strtoupper($_POST['accountnumber']));

    //checkk if account number exists
    $chk="SELECT name FROM banks WHERE account='$accountnumber'";
    $chkrun=$conn->query($dbcon,$chk);

    if($conn->sqlnum($chkrun) > 0){
        $test="no";
        $msg="Bank Account Exists";
    }
    else{
        $ins="INSERT INTO banks SET name='$name', branch='$branch', account='$accountnumber', status='ACTIVE'";
        $conn->query($dbcon,$ins);

        $test="yes";
        $msg="Bank Added Successfully";
        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Bank $name , Was Creaed By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }
    $conn->close($dbcon);
}

//CTREATING TAXES
if(isset($_POST['taxname'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name=mysqli_real_escape_string($dbcon,$_POST['taxname']);
    $val=mysqli_real_escape_string($dbcon,$_POST['percentage']);
    $decval=($val/100);
    $selchk="SELECT name FROM taxconfig WHERE name='$name'";
    $selRun=$conn->query($dbcon,$selchk);
    if($conn->sqlnum($selRun) == 0){
        $ins="INSERT INTO taxconfig SET name='$name', val=$decval, status='ACTIVE'";
        $conn->query($dbcon,$ins);
        $test="yes";
        $msg="Tax Created Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Tax $name , Was Creaed By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }else{
        $test="no";
        $msg="Taxid, <b>$name</b> , Exists Already";
    }
    $conn->close($dbcon);
}

//BANK DEPOSIT
if(isset($_POST['bankdeposit'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $img=$_FILES['bankimg']['tmp_name'];
    $newname="assets/images/defaults/noimage.jpg";//URL of the image location

    $chq=mysqli_real_escape_string($dbcon,$_POST['chqno']);
    $amount=mysqli_real_escape_string($dbcon,$_POST['chqamount']);
    $dod=mysqli_real_escape_string($dbcon,$_POST['dod']);
    $desc=mysqli_real_escape_string($dbcon,$_POST['chqdesc']);
    $bankid=mysqli_real_escape_string($dbcon,$_POST['bankid']);

    if(!empty($img)){
        $newname="assets/data/deposits/".$currDateTime.".jpg";//URL of the image location
        $file = file_put_contents( $newname, file_get_contents($img));
    }

    //ADD NEW STUDENT
    $ins = "INSERT INTO bank_deposits (chq, chqamount, dod, slip, description, bankcode, stfid) VALUES ('$chq',$amount,'$dod', '$newname','$desc','$bankid','$stfID')";
    $conn->query($dbcon,$ins);

    $test = "yes";
    $msg = "Bank Deposit Made Successfully";

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." Bank Deposit Of GHS $amount made into bank $bankid, Was Entered By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");

    $conn->close($dbcon);
}
//END OF BANK DEPOSIT

if(isset($_POST['addclassification'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name=mysqli_real_escape_string($dbcon,strtoupper($_POST['classname']));

    //checkk if account number exists
    $chk="SELECT name FROM expensecls WHERE name='$name'";
    $chkrun=$conn->query($dbcon,$chk);

    if($conn->sqlnum($chkrun) > 0){
        $test="no";
        $msg="Expense Class Exists";
    }
    else{
        $ins="INSERT INTO expensecls SET name='$name', status='ACTIVE'";
        $conn->query($dbcon,$ins);

        $test="yes";
        $msg="Expense Class Added Successfully";

        //AUDIT TRAIL
        $event=date("Y-m-d H:i:s")." Expense Classification $name , Was Creaed By $stfID ".PHP_EOL;
        logrequest($event,"audit_trails");
    }
    $conn->close($dbcon);
}

//PV
if(isset($_POST['genpv'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    //$expType=mysqli_real_escape_string($dbcon,$_POST['expType']);
    //$curr=mysqli_real_escape_string($dbcon,$_POST['currency']);
    //$exch=mysqli_real_escape_string($dbcon,$_POST['exchgrate']);
    //$expdate=$_POST['expdate'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];
    $supplier=mysqli_real_escape_string($dbcon,$_POST['supplier']);
    //$dept=mysqli_real_escape_string($dbcon,$_POST['dept']);
    //$bank=mysqli_real_escape_string($dbcon,$_POST['bk_code']);
    $expcls=mysqli_real_escape_string($dbcon,$_POST['exp_cls']);
    $pvId=date("YmdHis");

    $count=COUNT($amount);
    $failed=0;
    $success=0;
    $totAmount=0;
    for($i=0; $i < $count; $i++){
        if(!empty($amount[$i]) || !empty($description[$i])){
            $desc=mysqli_real_escape_string($dbcon,$description[$i]);
            $totAmount+=$amount[$i];
            $qry="INSERT INTO pv SET total=$amount[$i], pv_id='$pvId', description='$desc'";
            $conn->query($dbcon,$qry);
            $success++;
        }
        else{
            $failed++;
        }
    }
    if($success > 0){
        $qry2="INSERT INTO pv_detail SET expense_class='$expcls',total=$totAmount, pv_id='$pvId', stfid='$stfID', supplier='$supplier', status='PENDING'";
        $conn->query($dbcon,$qry2);
        $test="yes";
        $msg="PV generated successfully.";
        header("Location: dashboard.php?showPV=$pvId");
    }
    $conn->close($dbcon);
}

if(isset($_POST['attachstaff'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $class=$_POST['cid'];
    $staffid=$_POST['staffid'];

    //CHECK IF CONNECTION EXISTS
    $chk = "SELECT stfid FROM class_staff WHERE classid = '$class' AND stfid='$staffid'";
    $chkrun=$conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $qry2="INSERT INTO class_staff(classid,stfid) VALUES('$class','$staffid')";
        $conn->query($dbcon,$qry2);
        $test="yes";
        $msg="Class Teacher Successfully Attached To A Class";
    }else{
        $test="no";
        $msg="Class Teacher Already Attached To The Class";
    }


    $conn->close($dbcon);
}

if(isset($_FILES['pvdocuments']['tmp_name'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $file=$_FILES['pvdocuments']['tmp_name'];
    $fname=basename($_FILES['pvdocuments']['name']);
    $pvid=$_POST['showPV'];

    $newname="assets/data/pvdocs/".$fname;//URL of the image location

    //TABLE TO STORE NAMES OF DOCUMENTS UPLOADED
    $docqry="INSERT INTO pvdoc SET fname='$fname', pv_id='$pvid', doctype='doc'";
    $conn->query($dbcon,$docqry);

    $file = file_put_contents($newname, file_get_contents($file));
    $test="yes";
    $msg="Document Has Been Uploaded Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['confirmpv'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $pvid=$_POST['confpvid'];

    $upd="UPDATE pv_detail SET status='CONFIRMED' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd);
    $upd2="UPDATE pv SET status='CONFIRMED' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd2);

    //AUDIT TRAIL
    /*$event="";
    if(!empty($chq)){
        $event="Payment Voucher, ".$pvid." Has Been Raised By ".checkName($vokaId)." with cheque number, ".$chq;
    }else{
        $event="Payment Voucher, ".$pvid." Has Been Raised By ".checkName($vokaId);
    }
    $aud="INSERT INTO atrails SET usr='$stfID', module='Payment Voucher', event='$event', ip='$usrIP'";
    $conn->query($dbcon,$aud);*/

    /*if($stype=="shared"){
        $msg="Payment Voucher With PV ID, ".$pvid." Is Pending Your Approval";
        $accmsgqry="INSERT INTO message SET voka_id='$supp', message='$msg', caption='Payment Voucher Approval', status='Active'";
        $conn->query($dbcon,$accmsgqry);
    }
    else{
        //SENDING MESSAGE TO THE ACCOUNTS ADMINISTRATOR
        $sel="SELECT voka_id FROM staff_rec WHERE accounts='administrator' AND status !='Detached'";
        $selrun=$conn->query($dbcon,$sel);

        while($acdata=$conn->fetch($selrun)){
            $acmsg="Payment Voucher With PV ID, ".$pvid." Is Pending Accounts Department Approval";
            $vok=$acdata['voka_id'];
            $accmsgqry="INSERT INTO message SET voka_id='$vok', message='$acmsg', caption='Payment Voucher Approval', status='Active'";
            $conn->query($dbcon,$accmsgqry);
        }
    }*/

    header("location: dashboard.php?pvcreate");
    $conn->close($dbcon);
}

if(isset($_POST['cancelpv'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $pvid=$_POST['confpvid'];

    $upd="UPDATE pv_detail SET status='CANCELLED' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd);
    $upd2="UPDATE pv SET status='CANCELLED' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd2);

    header("location: dashboard.php?pvcreate");
    $conn->close($dbcon);
}

if(isset($_POST['editdiscount'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $id=$_POST['discid'];
    $discname=$_POST['discname'];
    $percent=$_POST['percent'];
    $dstatus=$_POST['dstatus'];

    $upd="UPDATE discounts SET status='$dstatus', disc_name='$discname', percent=$percent WHERE id=$id";
    $conn->query($dbcon,$upd);

    $test="yes";
    $msg="Invoice Discount Updated Successfully";
    $conn->close($dbcon);
}

if(isset($_POST['pvapproval']) || isset($_POST['pvreject'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $pvid=$_POST['pvid'];
    $comment=mysqli_real_escape_string($dbcon,$_POST['pvcomment']);
    $status="";

    if(isset($_POST['pvapproval'])){
        $status="APPROVED";
    }elseif(isset($_POST['pvreject'])){
        $status="REJECTED";
    }
    $upd="UPDATE pv_detail SET status='$status', supervisor='$stfID', supdate='$dateTime', comment='$comment' WHERE pv_id='$pvid'";
    $conn->query($dbcon,$upd);
    $conn->close($dbcon);

    //AUDIT TRAIL
    $event=date("Y-m-d H:i:s")." PVwith pvid $pvid , Was $status By $stfID ".PHP_EOL;
    logrequest($event,"audit_trails");
    //header("location: dashboard.php?pvcreate");
}
?>