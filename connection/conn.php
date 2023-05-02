<?php
session_start();
date_default_timezone_set('Africa/Accra');
//error_reporting(0);
//DATABASE CONNECTION CLASS DECLARATION
$test="";
$msg="";
class Db_connect{
    private $lhost="localhost";
    private $user="root";
    private $pword="";
    private $db="bravery_hills";

    public function conn(){
        try{
            $conn=mysqli_connect($this->lhost,$this->user,$this->pword,$this->db);
            if(!$conn){
                throw new Exception("Database Connection Error");
            }
            else{
                return $conn;
            }
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    //QUERY STRING
    public function query($con,$queryString){
        try{
            if(!empty($queryString)){
                return mysqli_query($con,$queryString);
            }
            else{
                throw new Exception("You Are Submitting An Empty Query");
            }

        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }

    }
    //FETCHING FROM DATABASE
    public function fetch($mysqli_num_rowsqry){
        return mysqli_fetch_assoc($mysqli_num_rowsqry);
    }
    //SQL NUM
    public function sqlnum($num){
        return mysqli_num_rows($num);
    }

    public function close($con){
        mysqli_close($con);
    }
}

$exist = "";

$currDateTime=date("YmdHis");
$currDate=date("Ymd");
$ddate=date("Y-m-d");
$dtime=(strtotime(date("H:i:s"))-3600);//getting the strtotime of the current time
$timereal=date("H:i:s",$dtime);
$dateTime=date("Y-m-d H:i:s");
$sdate=date("Y-m-d 00:00:00");
$edate=date("Y-m-d 23:59:59");
$Currmonth=date("m");
$Curryear=date("Y");
$usrIP=$_SERVER['REMOTE_ADDR'];

//USER LOG IN
if (isset($_POST['login']) || isset($_POST['signin'])) {
    $conn=new Db_connect;
    $dbcon=$conn->conn();
	$username = mysqli_real_escape_string($dbcon, $_POST['username']);
	$password = mysqli_real_escape_string($dbcon, $_POST['password']);
	$qry = "SELECT pword, access, last_page FROM users WHERE userid='$username' AND status='Active'";
	//$qry = "SELECT * FROM users WHERE userid='$username' AND status='Active'";
	$qryRun = $conn->query($dbcon, $qry);

	if ($conn->sqlnum($qryRun) == 1) {
	    $qrydata = $conn->fetch($qryRun);
	    $hash = $qrydata['pword'];
        if(password_verify($password, $hash)){
            $_SESSION['userid'] = $username;
            $_SESSION['access'] = $qrydata['access'];
            $lastpage = $qrydata['last_page'];

            //AUDIT TRAIL
            $event=date("Y-m-d H:i:s")." Staff ID, ".$username." logged In".PHP_EOL;
            logrequest($event,"audit_trails");

            if(isset($_POST['signin'])){
                header("location: $lastpage");
            }else{
                header("location: dashboard.php");
            }

            exit(0);
        }else{
            $exist = "yes";
        }

	} else {
        $exist = "yes";
	}
	$conn->close($dbcon);
}

//STUDENT LOGIN
if (isset($_POST['student_login']) || isset($_POST['student_signin'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['pword']);
    $qry = "SELECT u.pword, u.fname, u.lname, u.img, u.access, s.stdid, u.last_page, s.program  FROM users u INNER JOIN students s ON u.userid = s.stdid WHERE u.userid='$username' AND u.status='Active'";
    //$qry = "SELECT * FROM users WHERE userid='$username' AND status='Active'";
    $qryRun = $conn->query($dbcon, $qry);

    if ($conn->sqlnum($qryRun) == 1) {
        $qrydata = $conn->fetch($qryRun);
        $hash = $qrydata['pword'];
        if(password_verify($password, $hash)){
            $_SESSION['userid'] = $username;
            $lastpage = $qrydata['last_page'];

            //AUDIT TRAIL
            $event=date("Y-m-d H:i:s")." Student ID, ".$username." logged In".PHP_EOL;
            logrequest($event,"audit_trails");

            if(isset($_POST['signin'])){
                header("location: $lastpage");
            }else{
                header("location: dashboard.php");
            }
            //AUDIT TRAIL
            $event="Staff ID, ".$username." logged In";
            auditTrail($event,$username,'Log In',$usrIP);
            exit(0);
        }else{
            $exist = "yes";
        }

    } else {
        $exist = "yes";
    }
}

function logrequest($log,$folder){
    //TODAY'S DATE WILL BE THE NAME OF THE FILE
    $fname = "assets/Logs/".$folder."/".date("Ymd").".log";
    if(file_exists($fname)){
        file_put_contents($fname, $log, FILE_APPEND);
    }else{
        touch($fname);
        file_put_contents($fname, $log, FILE_APPEND);
    }
}

function smslogrequest($log,$folder){
    //TODAY'S DATE WILL BE THE NAME OF THE FILE
    $fname = "../assets/Logs/".$folder."/".date("Ymd").".log";
    if(file_exists($fname)){
        file_put_contents($fname, $log, FILE_APPEND);
    }else{
        touch($fname);
        file_put_contents($fname, $log, FILE_APPEND);
    }
}

function sendsms($msisdn, $msg) {
    //CALL THE API
    $key = 'kLjQ3Nc6ktviVCk19Ae3OsyYe';
    $API_URL = "https://apps.mnotify.net/smsapi?key=kLjQ3Nc6ktviVCk19Ae3OsyYe&to=".$msisdn."&msg=".$msg."&sender_id=BRAVERYHILL";
    //$API_URL = "https://apps.mnotify.net/smsapi?key=xxxxxxxxxx&to=xxxxxxx&msg=xxxxxxxx&sender_id=xxxxx ";
    try{

        $request = curl_init($API_URL);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/text"
            )
        );

        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $feedback = curl_exec($request);
        $err     = curl_errno( $request );
        $errmsg  = curl_error( $request );
        $header  = curl_getinfo( $request );
        $log = date("Y-m-d H:i:s")." MSISDN:".$msisdn." Message:".$msg." RESPONSE:".$feedback.PHP_EOL;
        smslogrequest($log,"sms");
        //echo "<br/><br/>This is the feedback<br/><br/>".$feedback."<br/><br/>";
        return $feedback;
        //return $err.": ".$errmsg." : ".$API_URL;
    }
    catch(Exception $ex){
        $log = date("Y-m-d H:i:s")." MSISDN:".$msisdn." Message:".$msg." RESPONSE: OTP Failed".PHP_EOL;
        logrequest($log,"sms");
    }
}

function getCollectionDataGeneral($ddate){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    //TOTAL REGISTERED BUSINESSES
    $sel="SELECT SUM(tot_sales) AS totsprice, SUM(tot_cost) AS totcprice, SUM(tot_tax) AS tottax FROM sales_summary WHERE CAST(transdate AS DATE) = '$ddate'";

    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $totalsprice = $data['totsprice'];
    $totalcprice = $data['totcprice'];
    $totaltax = $data['tottax'];
    $totalprofit = $totalsprice - $totalcprice - $totaltax;

    $response['sprice'] = $totalsprice;
    $response['profit'] = $totalprofit;
    $conn->close($dbcon);
    return json_encode($response);
}

function getCollectionData($ddate,$stfid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    //TOTAL REGISTERED BUSINESSES
    //$sel="SELECT SUM(qty * sprice) AS totsprice FROM pos_sales WHERE userid = '$stfid' AND CAST(sales_date AS DATE) = '$ddate'";
    $sel="SELECT SUM(amount) AS totpaid FROM invoice_payment WHERE CAST(paydate AS DATE) = '$ddate'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $totsprice = $data['totpaid'];

    $response['sprice'] = $totsprice;

    return json_encode($response);
    $conn->close($dbcon);
}
function barGraph($stfid){
    require_once('jpgraph/src/jpgraph.php');
    require_once('jpgraph/src/jpgraph_bar.php');
    $filename="";
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $datechk = "SELECT DISTINCT(CAST(paydate AS DATE)) AS ddate FROM invoice_payment ORDER BY paydate DESC LIMIT 20";
    $datechkrun = $conn->query($dbcon,$datechk);
    $datenum = $conn->sqlnum($datechkrun);
    if($datenum > 0){
        while($data = $conn->fetch($datechkrun)){
            $ddate = $data['ddate'];
            $dateArray[] = date("d M,Y", strtotime($ddate));
            $getCollection = getCollectionData($ddate,$stfid);
            $obj = json_decode($getCollection);
            $totalsprice[] = $obj->sprice;
        }
        $graph = new Graph(1500,550,"auto");
        $graph->SetScale("textint");
        $graph->title->set("DAILY FES PAYMENT ");
        $graph->img->SetMargin(50,30,50,50);

        $graph->SetShadow();

        $graph->xaxis->SetTickLabels($dateArray);
        $graph->xaxis->title->Set('Payment Dates');
        $graph->legend->SetPos(0.5,0.98,'center','bottom');

        $busplot = new BarPlot($totalsprice);

        $busplot->SetFillColor("lightgreen");
        $busplot->value->Show();
        $busplot->value->SetFont(FF_ARIAL,FS_BOLD);
        $busplot->value->SetAngle(45);
        $busplot->value->SetColor("black","navy");
        $busplot->SetLegend('Payments');


        //////
        $gbplot = new  GroupBarPlot (array($busplot));
        //$graph->ClearTheme();

        $graph->Add($gbplot);
        $busplot->value->Show();
        //FILE NAME
        $filename = "graphs/".date("YmdHis").".jpg";
        $graph->Stroke($filename);
    }
    $conn->close($dbcon);
    return $filename;
}

function generalBarGraph(){
    require_once('jpgraph/src/jpgraph.php');
    require_once('jpgraph/src/jpgraph_bar.php');
    $filename="";
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $datechk = "SELECT DISTINCT(CAST(sales_date AS DATE)) AS ddate FROM pos_sales ORDER BY sales_date DESC LIMIT 10";
    $datechkrun = $conn->query($dbcon,$datechk);
    $datenum = $conn->sqlnum($datechkrun);
    if($datenum > 0){
        while($data = $conn->fetch($datechkrun)){
            $ddate = $data['ddate'];
            $dateArray[] = date("d M,Y", strtotime($ddate));
            $getCollection = getCollectionDataGeneral($ddate);
            $obj = json_decode($getCollection);
            $totalsprice[] = $obj->sprice;
            $totalprofit[] = $obj->profit;
        }
        $graph = new Graph(1200,450,"auto");
        $graph->SetScale("textint");
        $graph->title->set("DAILY TOTAL SALES AND PROFIT CHART");
        $graph->img->SetMargin(50,30,50,50);

        $graph->SetShadow();

        $graph->xaxis->SetTickLabels($dateArray);
        $graph->xaxis->title->Set('Sales Dates');
        $graph->legend->SetPos(0.5,0.98,'center','bottom');

        $spriceplot = new BarPlot($totalsprice);
        $profitplot = new BarPlot($totalprofit);;

        $spriceplot->SetFillColor("lightgreen");
        $spriceplot->value->Show();
        $spriceplot->value->SetFont(FF_ARIAL,FS_BOLD);
        $spriceplot->value->SetAngle(45);
        $spriceplot->value->SetColor("black","navy");
        $spriceplot->SetLegend('Total Sales');

        $profitplot->SetFillColor("red");
        $profitplot->value->Show();
        $profitplot->value->SetFont(FF_ARIAL,FS_BOLD);
        $profitplot->value->SetAngle(45);
        $profitplot->value->SetColor("black","orange");
        $profitplot->SetLegend('Total Profit');


        //////
        $gbplot = new  GroupBarPlot (array( $spriceplot , $profitplot ));

        $graph->Add($gbplot);
        $spriceplot->value->Show();
        $profitplot->value->Show();
        //FILE NAME
        $filename = "graphs/gen_".date("YmdHis").".jpg";
        $graph->Stroke($filename);
    }
    $conn->close($dbcon);
    return $filename;
}


function getSubjects($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT s.sbj FROM subject s INNER JOIN sbj_course c ON s.sbjid = c.sbjid WHERE c.cid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $response = "";
    while($data = $conn->fetch($selrun)){
        $response = $response."  ".$data['sbj'].",  ";
    }

    return $response;
}

function getClass($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT cname FROM classes WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['cname'];
    }
    return $response;
}

function getdiscname($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    if($cid != null && $cid !=""){
        $sel="SELECT disc_name FROM discounts WHERE id = $cid";
        $selrun = $conn->query($dbcon,$sel);
        if($conn->sqlnum($selrun) != 0){
            $data = $conn->fetch($selrun);
            $response = $data['disc_name'];
        }
    }

    return $response;
}

function getDiscountDetails($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response['name'] = "";
    $response['percent'] = "";
    $response['msg'] = "NO";
    if($cid != NULL || $cid != ""){
        $sel="SELECT disc_name, percent FROM discounts WHERE id = $cid";
        $selrun = $conn->query($dbcon,$sel);
        if($conn->sqlnum($selrun) != 0){
            $data = $conn->fetch($selrun);
            $response['name'] = $data['disc_name'];
            $response['percent'] = $data['percent'];
            $response['msg'] = "OK";
        }else{
            $response['name'] = "";
            $response['percent'] = "";
            $response['msg'] = "NO";
        }
    }

    return json_encode($response);
}

function getActiveStudents(){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT COUNT(stdid) AS total FROM students WHERE status = 'ACTIVE'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    return $response;
}

function getRollCount($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT COUNT(stdid) AS total FROM students WHERE class = '$cid' AND status='ACTIVE'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    return $response;
}

function getActiveStaff(){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT COUNT(stfid) AS total FROM staff WHERE status = 'ACTIVE'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    return $response;
}

function getTotalPayments(){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT SUM(amount) AS total FROM invoice_payment";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    if($response === NULL || $response === ""){
        return "0.00";
    }else{
        return number_format($response,2);
    }
}

function getDailySales(){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sdate = date("Y-m-d 00:00:00");
    $edate = date("Y-m-d 23:59:59");
    $sel="SELECT SUM(tot_sales) AS total FROM sales_summary WHERE transdate BETWEEN '$sdate' AND '$edate'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    if($response === NULL || $response === ""){
        return "0.00";
    }else{
        return number_format($response,2);
    }
}

function getTotalArrears(){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT SUM(totalamount - (paid + discount)) AS total FROM student_invoices";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['total'];
    if($response === NULL || $response === ""){
        return "0.00";
    }else{
        return number_format($response,2);
    }
}

function getPosition($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT post_name FROM positions WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['post_name'];
    }
    return $response;
}

function getFeesName($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT fee_name FROM fees_struct WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['fee_name'];
    }
    return $response;
}

function getSubject($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT sbj FROM subject WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['sbj'];

    return $response;
}

function getComment($cid){
    $grade="";
    $comment="";
    switch($cid){
        case ($cid >=0 && $cid < 35 ):
            $grade="E";
            $comment = "LOWEST";
            break;
        case ($cid >=35 && $cid < 40 ):
            $grade="D";
            $comment = "LOWER";
            break;
        case ($cid >=40 && $cid < 50 ):
            $grade="D+";
            $comment = "LOW";
            break;
        case ($cid >=50 && $cid < 55 ):
            $grade="C";
            $comment = "LOW AVERAGE";
            break;
        case ($cid >=55 && $cid < 60 ):
            $grade="C+";
            $comment = "AVERAGE";
            break;
        case ($cid >=60 && $cid < 70 ):
            $grade="B";
            $comment = "HIGH AVERAGE";
            break;
        case ($cid >=70 && $cid < 80 ):
            $grade="B+";
            $comment = "HIGH";
            break;
        case ($cid >=80 && $cid < 90 ):
            $grade="A";
            $comment = "HIGHER";
            break;
        default:
            $grade="AA+";
            $comment = "HIGHEST";
            break;
    }
    $response['grade'] = $grade;
    $response['comment'] = $comment;

    return json_encode($response);

}


function getfees($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT fees FROM course WHERE cid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['fees'];
    return $response;
}

function getStudent($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT fname, lname FROM students WHERE stdid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['fname']." ".$data['lname'];
    }
    return $response;
}
function getStaff($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $response="";
    $sel="SELECT sttitle, fname, lname FROM staff WHERE stfid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['sttitle']." ".$data['fname']." ".$data['lname'];
    }
    return $response;
}

function gettotalstd($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT COUNT(fname) AS totalstd FROM students WHERE batchno = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['totalstd'];
    return $response;
}

function getfacility($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT pname FROM facilities WHERE id = $cid";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['pname'];
    return $response;
}

function getbatch($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT bdesc FROM batches WHERE batchno = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $response = "";
    if($conn->sqlnum($selrun) != 0){
        $data = $conn->fetch($selrun);
        $response = $data['bdesc'];
    }

    return $response;
}
function checkName($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT fname, lname FROM staff WHERE stfid='$id'";
    $selRun=$conn->query($dbcon,$sel);
    $name="";
    if($conn->sqlnum($selRun) != 0){
        $selData=$conn->fetch($selRun);
        $name=$selData['fname']." ".$selData['lname'];
    }

    return $name;
}

function getbank($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name="CASH";
    $sel="SELECT name FROM banks WHERE id=$id";
    $selRun=$conn->query($dbcon,$sel);

    if($conn->sqlnum($selRun) != 0){
        $selData=$conn->fetch($selRun);
        $name=$selData['name'];
    }

    return $name;
    $conn->close($dbcon);
}

function isClassTeacher($class,$stfid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name="CASH";
    $sel="SELECT id FROM class_staff WHERE classid='$class' AND stfid='$stfid'";
    $selRun=$conn->query($dbcon,$sel);

    if($conn->sqlnum($selRun) != 0){
        return "YES";
    }else{
        return "NO";
    }

    $conn->close($dbcon);
}

function getClassTeacher($class){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $name="CASH";
    $sel="SELECT stfid FROM class_staff WHERE classid='$class'";
    $selRun=$conn->query($dbcon,$sel);

    if($conn->sqlnum($selRun) != 0){
        $seldata = $conn->fetch($selRun);
        return $seldata['stfid'];
    }else{
        return "";
    }

    $conn->close($dbcon);
}

function getExp($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT name FROM expensecls WHERE id=$id";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['name'];
    return $name;

    $conn->close($dbcon);
}

function getProduct($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT pname FROM products_master WHERE pid='$id'";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['pname'];
    return $name;

    $conn->close($dbcon);
}

function getStudentCount($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT COUNT(stdid) AS total FROM students WHERE class='$id' AND status = 'ACTIVE'";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['total'];
    return $name;

    $conn->close($dbcon);
}

function addUser($userid,$pword,$access){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $hash = password_hash($pword, PASSWORD_ARGON2I);
    $sql="INSERT INTO users (access,userid, pword, status, dtype) VALUES ('$access','$userid','$hash','ACTIVE','access')";
    $conn->query($dbcon,$sql);
}

function notifyAllStaff($msg,$caption){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $sel = "SELECT voka_id FROM staff_rec WHERE status <> 'Detached'";
    $selrun = $conn->query($dbconnection,$sel);
    while($data = $conn->fetch($selrun)){
        $vokaid = $data['voka_id'];
        $msgqry="INSERT INTO message SET voka_id='$vokaid', message='$msg', caption='$caption', status='Active'";
        $conn->query($dbconnection,$msgqry);
    }
    print "ok";
}

function auditTrail($event,$stfID,$module,$usrIP){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $aud="INSERT INTO atrails SET stfid='$stfID', module='$module', event='$event', ip='$usrIP'";
    $conn->query($dbconnection,$aud);
}

function notifyStaff($msg,$caption,$vokaid){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();
    $msgqry="INSERT INTO message SET stfid='$vokaid', message='$msg', caption='$caption', status='Active'";
    $conn->query($dbconnection,$msgqry);
}

function graph(){
    $datay1=array(13,8,19,7,17,6);
    $datay2=array(4,5,2,7,5,25);

// Create the graph.
    $graph = new Graph(350,250);
    $graph->SetScale('textlin');
    $graph->SetMarginColor('white');

// Setup title
    $graph->title->Set('Acc bar with gradient');

// Create the first bar
    $bplot = new BarPlot($datay1);
    $bplot->SetFillGradient('AntiqueWhite2','AntiqueWhite4:0.8',GRAD_VERT);
    $bplot->SetColor('darkred');

// Create the second bar
    $bplot2 = new BarPlot($datay2);
    $bplot2->SetFillGradient('olivedrab1','olivedrab4',GRAD_VERT);
    $bplot2->SetColor('darkgreen');

// And join them in an accumulated bar
    $accbplot = new AccBarPlot(array($bplot,$bplot2));
    $graph->Add($accbplot);
    $graph->Stroke();
}
?>