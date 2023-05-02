<?php
include("../connection/conn.php");
if(isset($_POST['getClass'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cid=$_POST['getClass'];
    $response="";
    $sel="SELECT cname FROM classes WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $seldata = $conn->fetch($selrun);
    print $seldata['cname'];
    $conn->close($dbcon);

}
if(isset($_POST['getSubject'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cid=$_POST['getSubject'];
    $response="";
    $sel="SELECT sbj FROM subject WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $seldata = $conn->fetch($selrun);
    print $seldata['sbj'];
    $conn->close($dbcon);

}

if(isset($_POST['getDiscount'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cid=$_POST['getDiscount'];
    $sel="SELECT disc_name, percent, status FROM discounts WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $seldata = $conn->fetch($selrun);
    $response['discname'] = $seldata['disc_name'];
    $response['percent'] = $seldata['percent'];
    $response['status'] = $seldata['status'];
    print json_encode($response);
    $conn->close($dbcon);

}
if(isset($_POST['getFee'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $cid=$_POST['getFee'];
    $response="";
    $sel="SELECT fee_name FROM fees_struct WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $seldata = $conn->fetch($selrun);
    print $seldata['fee_name'];
    $conn->close($dbcon);
}

if(isset($_POST['checkinvoice'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $invid=$_POST['checkinvoice'];
    $response="";
    $sel="SELECT totalamount FROM student_invoices WHERE invoiceid = '$invid'";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        print "FOUND";
    }else{
        print "NOT FOUND";
    }
}

if(isset($_POST['validateStfid'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $stfid=$_POST['validateStfid'];
    $sel="SELECT contact FROM staff WHERE stfid = '$stfid'";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $seldata = $conn->fetch($selrun);
        $contact = $seldata['contact'];
        $response['code'] = 0;
        $response['msg'] = $contact;

        $otpcode = mt_rand(1000,9999);
        //UPDATE THE OTP OF THE STAFF
        $upd = "UPDATE users SET otp = '$otpcode' WHERE userid = '$stfid'";
        $conn->query($dbcon,$upd);

        sendsms($contact,"Your four digit number is $otpcode. Do not share with anyone.");
        print json_encode($response);
    }else{
        $response['code'] = 1;
        $response['msg'] = "";
        print json_encode($response);
    }
}

if(isset($_POST['validateOtp'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $otp=$_POST['validateOtp'];
    $stfid=$_POST['stfid'];
    $sel="SELECT status FROM users WHERE userid = '$stfid' AND otp='$otp'";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $response['code'] = 0;
        $response['msg'] = "VERIFIED";
        print json_encode($response);
    }
    else{
        $response['code'] = 1;
        $response['msg'] = "NOT VERIFIED";
        print json_encode($response);
    }
}

if(isset($_POST['transferStudents'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $studentlist=$_POST['transferStudents'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $obj = explode(",",$studentlist);
    foreach($obj AS $stdid){
        //UPDATE THE CLASS OF THE STUDENT
        $upd="UPDATE students SET class= '$to' WHERE stdid = '$stdid'";
        $conn->query($dbcon,$upd);
    }

    print "DONE";
    $conn->close($dbcon);
}

if(isset($_POST['recallInvoice'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $invid=$_POST['recallInvoice'];
    $response="";
    $del="DELETE FROM student_invoices WHERE invoiceid='$invid'";
    $del2="DELETE FROM student_invoice_details WHERE invoiceid='$invid'";
    $conn->query($dbcon,$del);
    $conn->query($dbcon,$del2);
    print "DONE";
    $conn->close($dbcon);

}

if(isset($_POST['reversePayment'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $invid=$_POST['reversePayment'];
    $payid=$_POST['payid'];
    $amount=$_POST['amount'];
    $response="";
    $del="DELETE FROM invoice_payment WHERE id=$payid";
    $del2="UPDATE student_invoices SET paid= (paid - $amount) WHERE invoiceid='$invid'";
    $conn->query($dbcon,$del);
    $conn->query($dbcon,$del2);
    print "DONE";
    $conn->close($dbcon);

}

if(isset($_POST['salesdetails'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $sid = $_POST['salesdetails'];
    //GETBTHE SESSION ID
    $getsess = "SELECT s.pid, s.qty, s.cprice, s.sprice, p.pname  FROM pos_sales s INNER JOIN products_master p ON p.pid = s.pid WHERE s.sid = '$sid'";
    $getsessrun = $conn->query($dbconnection,$getsess);

    $msg = "<table class='table table-striped'><thead><tr><th>Product Name</th><th>Unit Cost</th><th>Qty</th><th>Total</th></tr></thead><tbody>";
    $overalltotal = 0 ;
    while($data = $conn->fetch($getsessrun)){
        $total = ($data['sprice'] * $data['qty']);
        $overalltotal = $overalltotal + $total;
        $msg = $msg . "<tr><td>".$data['pname']."</td><td>".$data['sprice']."</td><td>".$data['qty']."</td><td>".number_format($total, 2, '.', ',')."</td></tr>";
    }    //$msg = $msg . "<tr><td colspan='4'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: xx-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr></tbody></table>";
    $msg = $msg . "<tr><td colspan='5'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: xx-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr></tbody></table>";

    print $msg;
    $conn->close($dbconnection);
}

if(isset($_POST['examTemplate'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $temp=$_POST['examTemplate'];
    $cid=$_POST['classid'];

    $sel="UPDATE classes SET template = '$temp' WHERE id=$cid";
    $conn->query($dbcon,$sel);
    print "DONE";
    $conn->close($dbcon);

}

if(isset($_POST['invoiceapproval'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $invid=$_POST['invoiceapproval'];
    $stdid=$_POST['stdid'];
    $class=$_POST['dclass'];
    $term=$_POST['term'];
    $discid=$_POST['discid'];

    $admitdate = date("Y-m-d");
    $yr = date("Y");
    $dateTime = date("Y-m-d H:i:s");
    //GET THE TOTAL FEES FOR THE PROGRAM
    $getfee="SELECT SUM(amount) AS totfees FROM fees_class WHERE cid='$class'";
    $getfeesrun = $conn->query($dbcon,$getfee);
    $getfeedata = $conn->fetch($getfeesrun);
    $fee = $getfeedata['totfees'];
    $discountamount=0;

    //CREATING DISCOUNT DETAILS
    $getdisc = getDiscountDetails($discid);
    $obj = json_decode($getdisc);
    $msg = $obj->msg;
    if($msg != "NO"){
        $name = $obj->name;
        $percent = $obj->percent;
        $discountamount =($fee * $percent)/100;
        $invdisc = "INSERT INTO invoice_discount(invoiceid, discid, percent, amount) VALUES ('$invid','$discid',$percent,$discountamount)";
        $conn->query($dbcon,$invdisc);
    }

    //ADD NEW INVOICE AND CREATE INVOICE COMPONENTS FROM FEE STRUCTURE OF THE SELECTED CLASS
    $inv = "INSERT INTO student_invoices (invoiceid, stdid, invdate, totalamount, paid, status, created_date, yr, classid, term, discount) VALUES ('$invid','$stdid','$admitdate',$fee,0.00,'PENDING','$dateTime','$yr','$class','$term',$discountamount)";
    $conn->query($dbcon,$inv);

    $ins_det="INSERT INTO student_invoice_details(invoiceid, feeid, feename, amount) SELECT '$invid', c.feeid, s.fee_name, c.amount FROM fees_struct s INNER JOIN fees_class c ON s.id = c.feeid WHERE c.cid = '$class'";
    $conn->query($dbcon,$ins_det);


    print "OK";
    $conn->close($dbcon);
}

if(isset($_POST['sendmysms'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $custom=$_POST['sendmysms'];
    $rectype=$_POST['type'];
    $msg=$_POST['msg'];
    $stfid=$_POST['stfid'];

    if($rectype == "Custom"){
        $obj = explode(",",$custom);
        $count = COUNT($obj);
        for($i = 0; $i < $count ;$i++){
            $contact = $obj[$i];
            sendSMS($contact,$msg);

            //Keep Record Of The SMS
            $memo="INSERT INTO sms SET stfid = '$stfid', contact='$contact', msg='$msg', status='SENT'";
            $conn->query($dbcon,$memo);
        }
    }elseif($rectype == "Staff"){
        $selstf="SELECT contact FROM staff WHERE status = 'ACTIVE'";
        $selstfrun = $conn->query($dbcon,$selstf);
        while($data = $conn->fetch($selstfrun)){
            $contact = $data['contact'];
            sendSMS($contact,$msg);
            //Keep Record Of The SMS
            $memo="INSERT INTO sms SET stfid = '$stfid', contact='$contact', msg='$msg', status='SENT'";
            $conn->query($dbcon,$memo);
        }
    }
    else{
        $selstf="SELECT p.contact FROM student_parents p INNER JOIN students s ON p.stdid = s.stdid WHERE s.status = 'ACTIVE'";
        $selstfrun = $conn->query($dbcon,$selstf);
        while($data = $conn->fetch($selstfrun)){
            $contact = $data['contact'];
            //Keep Record Of The SMS
            $memo="INSERT INTO sms SET stfid = '$stfid', contact='$contact', msg='$msg', status='SENT'";
            $conn->query($dbcon,$memo);
            sendSMS($contact,$msg);
        }
    }

    //Keep LOG Of The Memo
    $memo="INSERT INTO sms_log SET stfid='$stfid', msg='$msg', status='SENT', recipient = '$rectype'";
    $conn->query($dbcon,$memo);
    print "OK";

}

if(isset($_POST['generateExamReport'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $subjectlist=$_POST['subjectlist'];
    $classscore=$_POST['classscore'];
    $examsscore=$_POST['examsscore'];
    $class=$_POST['class'];
    $stdid=$_POST['stdid'];
    $term=$_POST['term'];
    $year=$_POST['year'];

    //GET THE EXAM TEMPLATE FOR THE CLASS
    $gettemp = "SELECT template FROM classes WHERE id=$class";
    $gettemprun = $conn->query($dbcon,$gettemp);
    $gettempdata = $conn->fetch($gettemprun);
    $template = $gettempdata['template'];

    //CHECK IF EXAMS RESULT ALREADY EXISTS FOR THE CLASS
    $chk = "SELECT examid FROM exams_records WHERE stdid = '$stdid' AND class='$class' AND term = '$term'";
    $chkrun = $conn->query($dbcon,$chk);
    if($conn->sqlnum($chkrun) == 0){
        $sbjobj = explode(",",$subjectlist);
        $clsobj = explode(",",$classscore);
        $examobj = explode(",",$examsscore);

        //GET THE EXAM ID
        $examid=date("YmdHis");
        $datecreate = date("Y-m-d H:i:s");

        $dcount = COUNT($sbjobj);
        $totclass = 0;
        $totexams = 0;
        for($i=0; $i < $dcount; $i++){
            $sbj = $sbjobj[$i];
            $cls = $clsobj[$i];
            $exam = $examobj[$i];
            $totclass+=$cls;
            $totexams+=$exam;

            //CHECK IF RECORDS ALREADY EXISTS
            $chk = "SELECT COUNT(examid) AS totcount FROM exams_details WHERE sbj='$sbj' AND examid = '$examid'";
            $chkrun=$conn->query($dbcon,$chk);
            $chkdata=$conn->fetch($chkrun);

            if($chkdata['totcount'] == 0){
                $ins2="INSERT INTO exams_details (examid, cls_score, exam_score, sbj) VALUES('$examid',$cls,$exam,'$sbj')";
                $conn->query($dbcon,$ins2);
            }


        }

        $ins = "INSERT INTO exams_records (examid, stdid, class, term, datecreated, status, dyear, exam_score, class_score, template) VALUES ('$examid','$stdid','$class','$term','$datecreate','PENDING','$year',$totexams,$totclass,'$template')";
        $conn->query($dbcon,$ins);

        $response['errorcode'] = 0;
        $response['msg'] = $examid;
        print json_encode($response);
    }else{
        $response['errorcode'] = 1;
        $response['msg'] = "";
        print json_encode($response);
    }
}

if(isset($_POST['getproductselectwh'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $msg = "<select class='select2-active form-control' id='selectprod' required><option value=''>--SELECT PRODUCT --</option>";
    $sel = "SELECT pid,pname, qty FROM products_master WHERE status = 'Active' AND qty > 0 ORDER BY pname ASC";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $msg = $msg."<option value='".$data['pid']."'>".$data['pname']."&nbsp;&nbsp;<span style='font-weight: bold;'>(".$data['qty'].")</span></option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}

if(isset($_POST['getstock'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $_POST['getstock'];
    $check = "SELECT qty FROM products_master WHERE pid = '$pid'";
    $checkrun = $conn->query($dbconnection,$check);
    $chkdata = $conn->fetch($checkrun);
    print $chkdata['qty'];
    $conn->close($dbconnection);
}

if(isset($_POST['possales'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $_POST['possales'];
    $user = $_POST['user'];
    $sid = $_POST['sid'];
    $qty = $_POST['qty'];

    //CHECK IF PRODUCT HAS ALREADY BEEN ADDED
    $chkpro = "SELECT * FROM pos_temp WHERE pid = $pid AND sid='$sid'";
    $chkprorun = $conn->query($dbconnection,$chkpro);
    if($conn->sqlnum($chkprorun) > 0){
        $response['msg']= "Product Selectd Has Already Been Added To Your List";
        $response['errorcode']= "001";
        print json_encode($response);
    }else{
        //CHECK QUANTITY
        //$chk = "SELECT qty, sprice, cprice FROM products WHERE id = $pid";
        $chk = "SELECT qty, sprice, cprice, pname FROM products_master WHERE pid = '$pid'";
        $chkrun = $conn->query($dbconnection,$chk);
        $chkdata = $conn->fetch($chkrun);
        $realqty = $chkdata['qty'];
        $sprice = $chkdata['sprice'];
        $cprice = $chkdata['cprice'];
        $pname = $chkdata['pname'];
        if($qty > $realqty){
            $response['msg']= "Quantity Specified Is More Than The Stock Value. Current Stock Value Is ".$realqty;
            $response['errorcode']= "001";
            $response['total']= "000";
            print json_encode($response);
        }else{
            $ins = "INSERT INTO pos_temp (pid, userid,sid,qty,sprice,cprice) VALUES ($pid,'$user','$sid',$qty,$sprice,$cprice)";
            $conn->query($dbconnection,$ins);
            //SELECT the entries
            $sel = "SELECT p.pname, p.sprice, s.qty, s.pid, s.id  FROM pos_temp s INNER JOIN products_master p ON p.pid = s.pid WHERE s.sid = '$sid'";
            $selrun = $conn->query($dbconnection, $sel);
            $msg = "<table class='table table-striped'><thead><tr><th>Product Name</th><th>Unit Cost</th><th>Qty</th><th>Total</th></tr></thead><tbody>";
            $overalltotal = 0 ;
            while($data = $conn->fetch($selrun)){
                $total = ($data['sprice'] * $data['qty']);
                $overalltotal = $overalltotal + $total;
                $id = $data['id'];
                $msg = $msg . "<tr><td>".$data['pname']."</td><td>".$data['sprice']."</td><td>".$data['qty']."</td><td>".number_format($total, 2, '.', ',')."</td><td><a class='btn btn-sm btn-danger' onclick='remsales(".$id.")'><span class='icon icon-trash'></span></a> </td></tr>";
            }
            //$msg = $msg . "<tr><td colspan='4'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: xx-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr></tbody></table>";
            $msg = $msg . "<tr><td colspan='4'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: x-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr><tr><td colspan='5'><div align='center'><a class='btn btn-lg btn-success' onclick='checkout()'><span class='icon icon-shopping-cart'></span>CHECK OUT</a></div></td></tr></tbody></table>";
            $response['msg']= $msg;
            $response['errorcode']= "000";
            $response['total']= $overalltotal;
            print json_encode($response);
        }
    }
    $conn->close($dbconnection);
}

if(isset($_POST['remsales'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $_POST['remsales'];
    //GETBTHE SESSION ID
    $getsess = "SELECT sid FROM pos_temp WHERE id = $pid";
    $getsessrun = $conn->query($dbconnection,$getsess);
    $getsessdata = $conn->fetch($getsessrun);
    $sid = $getsessdata['sid'];
    //CHECK IF PRODUCT HAS ALREADY BEEN ADDED
    $chkpro = "DELETE FROM pos_temp WHERE id = $pid";
    $chkprorun = $conn->query($dbconnection,$chkpro);
    //SELECT the entries
    $sel = "SELECT p.pname, p.sprice, s.qty, s.pid, s.id  FROM pos_temp s INNER JOIN products_master p ON p.pid = s.pid WHERE s.sid = '$sid'";
    $selrun = $conn->query($dbconnection, $sel);
    $selnum = $conn->sqlnum($selrun);
    $msg = "";
    //CHECK IF CART IS EMPTY
    if($selnum == 0){
        $msg = "CART IS EMPTY";
        $response['msg']= $msg;
        $response['total']= "000";
    }
    else{
        $msg = "<table class='table table-striped'><thead><tr><th>Product Name</th><th>Unit Cost</th><th>Qty</th><th>Total</th></tr></thead><tbody>";
        $overalltotal = 0 ;
        while($data = $conn->fetch($selrun)){
            $total = ($data['sprice'] * $data['qty']);
            $overalltotal = $overalltotal + $total;
            $id = $data['id'];
            $msg = $msg . "<tr><td>".$data['pname']."</td><td>".$data['sprice']."</td><td>".$data['qty']."</td><td>".number_format($total, 2, '.', ',')."</td><td><a class='btn btn-sm btn-danger' onclick='remsales(".$id.")'><span class='icon icon-trash'></span></a> </td></tr>";
        }
        //$msg = $msg . "<tr><td colspan='4'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: xx-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr></tbody></table>";
        $msg = $msg . "<tr><td colspan='4'><p style='color: #ff630d; font-weight: bold; text-align: center; font-size: xx-large'>TOTAL = ".number_format($overalltotal, 2, '.', ',')." </p></td></tr><tr><td colspan='5'><div align='center'><a class='btn btn-lg btn-success' onclick='checkout()'><span class='icon icon-shopping-cart'></span>CHECK OUT</a></div></td></tr></tbody></table>";
        $response['msg']= $msg;
        $response['total']= $overalltotal;
    }

    print json_encode($response);
    $conn->close($dbconnection);
}

if(isset($_POST['checkoutpay'])) {
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $sid = $_POST['sid'];
    $tender = $_POST['tender'];
    $bal = $_POST['bal'];
    $total = $_POST['total'];
    $stfID = $_POST['userid'];
    $cnamee = mysqli_real_escape_string($dbconnection, $_POST['cname']);
    $custid = "";

    //CHECK IF THERE ARE PRODUCTS IN THE POS_TEMP TABLE AND DELETE
    $chk = "SELECT COUNT(*) AS totcount FROM pos_temp WHERE sid='$sid'";
    $chkrun = $conn->query($dbconnection, $chk);
    $chkdata = $conn->fetch($chkrun);
    $dcount = $chkdata['totcount'];
    if ($dcount != 0) {

        //INSERT PAYMENT DETAILS
        $ins = "INSERT INTO pos_payment (sid, tend, dtotal, dbal) VALUES ('$sid',$tender, $total, $bal)";
        $conn->query($dbconnection, $ins);

        //MOVE POS RECORDS
        $move = "INSERT INTO pos_sales (pid, userid, sid, qty, cprice, sprice, cid) SELECT pid,userid,sid,qty, cprice, sprice,'$custid' FROM pos_temp WHERE sid = '$sid'";
        $conn->query($dbconnection, $move);

        //GET THE TOTAL SALES AND PROFIT MARGIN
        $gettot = "SELECT SUM(sprice * qty) AS totsprice, SUM(cprice * qty) AS totcprice FROM pos_temp WHERE sid = '$sid'";
        $gettotrun = $conn->query($dbconnection, $gettot);
        $gettotdata = $conn->fetch($gettotrun);
        $totsprice = $gettotdata['totsprice'];
        $totcprice = $gettotdata['totcprice'];
        $profit = $totsprice - $totcprice;

        $ins2 = "INSERT INTO sales_summary(sid, tot_sales, tot_cost, profit, userid, customer, transdate) VALUES ('$sid',$totsprice,$totcprice,$profit,'$stfID','$cnamee','$dateTime')";
        $conn->query($dbconnection, $ins2);

        //REDUCE THE PRODUCT QUANTITY
        $sel = "SELECT pid, qty FROM pos_temp WHERE sid = '$sid'";
        $selrun = $conn->query($dbconnection, $sel);
        while ($data = $conn->fetch($selrun)) {
            $pid = $data['pid'];
            $qty = $data['qty'];

            $upd = "UPDATE products_master SET qty = (qty - $qty) WHERE pid = '$pid'";
            $conn->query($dbconnection, $upd);
        }

        //DELETE THE RECORDS FROM THE TEMP TABLE
        $del = "DELETE FROM pos_temp WHERE sid = '$sid'";
        $conn->query($dbconnection, $del);

        //GET THE COMPANY DETAILS
        //GET THE COMPANY INFORMATION / DETAILS
        $cname="COMPANY NAME";
        $ctag="";
        $cmail="";
        $caddr="";
        $ccont="";
        $cloc="";

        $msg = "";

        $getcomp = "SELECT cname, ccont, cmail, cloc, caddr, tag FROM company";
        $getcomprun = $conn->query($dbconnection,$getcomp);
        if($conn->sqlnum($getcomprun) != 0){
            $getcompdata = $conn->fetch($getcomprun);
            $cname = $getcompdata['cname'];
            $ccont = $getcompdata['ccont'];
            $cmail = $getcompdata['cmail'];
            $cloc = $getcompdata['cloc'];
            $caddr = $getcompdata['caddr'];
            $ctag = $getcompdata['tag'];
        }

        $msg=$msg."<div id='content'>
                    <div class='container'>
                        <div class='row' style='font-family: monospace, serif' id='ptable'>
                            <div class='well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
                                <div class='row'>
                                    <div class='col-xs-6 col-sm-6 col-md-6'>
                                        <address>
                                            <strong>".$cname."</strong>
                                            <br>".$caddr." <br>".$cloc."<br>
                                            <abbr title='Phone'>P:</abbr> ".$ccont."
                                        </address>
                                    </div>
                                    <div class='col-xs-6 col-sm-6 col-md-6 text-right'>
                                        <p>
                                            <em>Date: ".date("Y-m-d H:i:s")."</em>
                                        </p>
                                        <p>
                                            <em>Officer:".getstaff($stfID)."</em>
                                        </p>
                                        <p>
                                            <em>Customer:".strtolower($cnamee)."</em>
                                        </p>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='text-center'>
                                        <h3>Receipt</h3>
                                    </div>
                                    </span>
                                    <table class='table table-hover'>
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th class='text-center'>Price</th>
                                            <th class='text-center'>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>";
        $sel = "SELECT pid, qty, sprice FROM pos_sales WHERE sid = '$sid'";
        $selrun = $conn->query($dbconnection,$sel);
        $overalltotal = 0;
        while($saledata = $conn->fetch($selrun)){
            $overalltotal+=($saledata['qty'] * $saledata['sprice']);
            $msg=$msg."<tr>
                                            <td class='col-md-9'><em>".getproduct($saledata['pid'])."</em></h4></td>
                                            <td class='col-md-1' style='text-align: center'>".$saledata['qty']." </td>
                                            <td class='col-md-1 text-center'>".$saledata['sprice']."</td>
                                            <td class='col-md-1 text-center'>".($saledata['qty'] * $saledata['sprice'])."</td>
                                            </tr>";
        }
        $msg=$msg."<tr>
                                            <td>   </td>
                                            <td>   </td>
                                            <td class='text-right'>
                                                <p>
                                                    <strong>Subtotal: </strong>
                                                </p>
                                                <p>
                                                    <strong>Tender: </strong>
                                                </p>
                                                <p>
                                                    <strong>Change: </strong>
                                                </p>
                                            </td>
                                            <td class='text-center'>
                                                <p>
                                                    <strong>".number_format($overalltotal,2)."</strong>
                                                </p>
                                                <p>
                                                    <strong>".number_format($tender,2)."</strong>
                                                </p>
                                                <p>
                                                    <strong>".number_format($bal,2)."</strong>
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12' style='font-style: italic; font-size: small; text-align: center'>Receipt #: ".strtoupper($sid)."</div>
                                </div>
                            </div>
                        </div>
                        <div class='row' id='bottomprint'>
                            <div class='col-md-12' align='center'>
                                <div class='buttons'>
                                    <a class='btn btn-default btn-lg' href='javascript:void(0);' onclick='javascript:window.print();'><i class='icon-printer'></i> Print</a>
                                    <a class='btn btn-success btn-lg'  onclick='resetpos()'>Next Order <i class='icon-angle-right'></i></a>
                                </div>
                            </div>
                        </div>
                    <!-- /.container -->
                    </div>
                </div>";

        $ddate = date("Y-m-d");
        //GET THE TOTAL SALES FOR TODAY
        $get="SELECT SUM(sprice * qty) AS totprice FROM pos_sales WHERE userid = '$stfID' AND CAST(sales_date AS DATE) = '$ddate'";
        $getrun=$conn->query($dbconnection,$get);
        $getdata=$conn->fetch($getrun);
        $dtotal = 0.00;
        if($getdata['totprice'] != null || $getdata['totprice'] != ""){
            $dtotal =$getdata['totprice'];
        }
        $response['msg']=$msg;
        $response['newsprice']=$dtotal;
        $response['newsid'] = $stfID.date("YmdHis");
        print json_encode($response);
    }else{
        print "NO RECORDS FOUND IN POS_SALES";
    }
    $conn->close($dbconnection);
}


if(isset($_POST['loadshopproducts'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $sel = "SELECT pname, sprice, pid, qty FROM products_master WHERE status = 'ACTIVE' AND qty > 0";
    $selrun = $conn->query($dbconnection,$sel);

    $msg="";
    while($data = $conn->fetch($selrun)){
        $msg=$msg."<option value='".$data['pid'].':'.$data['pname']."'>".$data['pname']."</option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}

if(isset($_POST['receiveProduct'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();

    $pid = $_POST['receiveProduct'];
    $qty = $_POST['qty'];
    $note = mysqli_real_escape_string($dbconnection,$_POST['note']);
    $stfid = $_POST['stfid'];

    $getwh = "SELECT qty FROM products_master WHERE pid = '$pid'";
    $getwhrun = $conn->query($dbconnection,$getwh);
    $getdata = $conn->fetch($getwhrun);
    $prevqty = $getdata['qty'];

    $transid = date("YmdHis");

    $move = "INSERT INTO products_master_history (pid, pnameo, spriceo, cpriceo, pname, sprice, cprice, status,qty,qtyo) 
    SELECT pid, pname,sprice,cprice,pname,sprice,cprice,status,(qty + $qty),qty FROM products_master WHERE pid = '$pid'";
    $conn->query($dbconnection,$move);

    //UPDATE product quantity
    $upd = "UPDATE products_master SET qty = (qty + $qty) WHERE pid = '$pid'";
    $conn->query($dbconnection,$upd);

    $ins = "INSERT INTO transfers (transid,pid, prev, cur, stfid, description) VALUES ('$transid','$pid', $prevqty,$qty,'$stfid','$note')";
    $conn->query($dbconnection,$ins);

    print "OK";

    $conn->close($dbconnection);
}

if(isset($_POST['getprod'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $pid = $_POST['getprod'];
    $check = "SELECT * FROM products_master WHERE pid = '$pid'";
    $checkrun = $conn->query($dbconnection,$check);
    $checkdata = $conn->fetch($checkrun);
    $response['pid']= $checkdata['pid'];
    $response['pname']= $checkdata['pname'];
    $response['sprice']= $checkdata['sprice'];
    $response['cprice']= $checkdata['cprice'];
    $response['status']= $checkdata['status'];

    print json_encode($response);
    $conn->close($dbconnection);
}


if(isset($_POST['getSubjectList'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $cid = $_POST['getSubjectList'];
    $msg = "<select class='select2-active form-control' name='subjectlist[]' id='sbjlistid' required><option value=''>--SELECT SUBJECT --</option>";
    $sel = "SELECT id, sbj FROM subject WHERE status='ACTIVE' AND id NOT IN (SELECT sbjid FROM subject_class WHERE cid = $cid) ORDER BY sbj ASC";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $msg = $msg."<option value='".$data['id']."'>".$data['sbj']."</option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}

if(isset($_POST['getClassSubjects'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $cid = $_POST['getClassSubjects'];
    $msg = "<select class='select2-active form-control' name='subjectlist[]' id='sbjlistid' required>";
    //$sel = "SELECT id, sbj FROM subject WHERE status='ACTIVE' AND id NOT IN (SELECT sbjid FROM subject_class WHERE cid = $cid) ORDER BY sbj ASC";
    $sel = "SELECT c.sbjid, s.sbj FROM subject s INNER JOIN subject_class c ON c.sbjid = s.id WHERE c.cid = '$cid' ORDER BY s.sbj ASC";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $msg = $msg."<option value='".$data['sbjid']."'>".$data['sbj']."</option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}


if(isset($_POST['getFeesList'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $cid = $_POST['getFeesList'];
    $msg = "<select class='select2-active form-control' name='feeslist[]' id='feeslistid' required><option value=''>--SELECT FEES COMPONENT --</option>";
    $sel = "SELECT id, fee_name FROM fees_struct WHERE status='ACTIVE' AND id NOT IN (SELECT feeid FROM fees_class WHERE cid = $cid) ORDER BY fee_name ASC";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $msg = $msg."<option value='".$data['id']."'>".$data['fee_name']."</option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}
if(isset($_POST['getFeesListAll'])){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $msg = "<select class='select2-active form-control' name='feeslistAll[]' id='feeslistallid' required><option value=''>--SELECT FEES COMPONENT --</option>";
    $sel = "SELECT id, fee_name FROM fees_struct WHERE status='ACTIVE' ORDER BY fee_name ASC";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $msg = $msg."<option value='".$data['id']."'>".$data['fee_name']."</option>";
    }
    $msg=$msg."</select>";
    print $msg;
    $conn->close($dbconnection);
}


if(isset($_POST['getcompany'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    //GET THE COMPANY INFORMATION / DETAILS
    $getcomp = "SELECT * FROM company";
    $getcomprun = $conn->query($dbcon,$getcomp);
    if($conn->sqlnum($getcomprun) != 0){
        $getcompdata = $conn->fetch($getcomprun);
        $response['cname'] = $getcompdata['cname'];
        $response['ccont'] = $getcompdata['ccont'];
        $response['cmail'] = $getcompdata['cmail'];
        $response['cloc'] = $getcompdata['cloc'];
        $response['caddr'] = $getcompdata['caddr'];
        $response['clogo'] = $getcompdata['clogo'];
        $response['tag'] = $getcompdata['tag'];
    }else{
        $response['cname'] = "";
        $response['ccont'] = "";
        $response['cmail'] = "";
        $response['cloc'] = "";
        $response['caddr'] = "";
        $response['clogo'] = "assets/images/defaults/noimage.jpg";
        $response['tag'] = "";
    }


    print json_encode($response);
    $conn->close($dbcon);
}

//GET THE DESKTOP NOTIFIER
if(isset($_POST['getNotify'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
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
    $conn->close($dbcon);
}
?>