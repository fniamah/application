<?php
session_start();
date_default_timezone_set('Africa/Accra');
//error_reporting(0);
//DATABASE CONNECTION CLASS DECLARATION
class Db_connect{
    private $lhost="localhost";
    private $user="root";
    private $pword="";
    private $db="schoolpro";

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
}


$conn=new Db_connect;
$dbcon=$conn->conn();
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
	$username = mysqli_real_escape_string($dbcon, $_POST['username']);
	$password = mysqli_real_escape_string($dbcon, $_POST['password']);
	$qry = "SELECT u.pword, u.fname, u.lname, u.img, u.access, s.stfid, u.last_page, s.post  FROM users u INNER JOIN staff s ON u.userid = s.stfid WHERE u.userid='$username' AND u.status='Active'";
	//$qry = "SELECT * FROM users WHERE userid='$username' AND status='Active'";
	$qryRun = $conn->query($dbcon, $qry);

	if ($conn->sqlnum($qryRun) == 1) {
	    $qrydata = $conn->fetch($qryRun);
	    $hash = $qrydata['pword'];
        if(password_verify($password, $hash)){
            $_SESSION['userid'] = $username;
            $_SESSION['access'] = $qrydata['access'];
            $lastpage = $qrydata['last_page'];
            if(isset($_POST['signin'])){
                header("location: $lastpage");
            }else{
                header("location: dashboard.php");
            }
            //AUDIT TRAIL
            $event="Staff ID, ".$username." logged In";
            $aud="INSERT INTO atrails SET stfid='$username', module='Log In', event='$event', ip='$usrIP'";
            $conn->query($dbcon,$aud);
            exit(0);
        }else{
            $exist = "yes";
        }

	} else {
        $exist = "yes";
	}
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
            if(isset($_POST['signin'])){
                header("location: $lastpage");
            }else{
                header("location: dashboard.php");
            }
            //AUDIT TRAIL
            $event="Staff ID, ".$username." logged In";
            $aud="INSERT INTO atrails SET stfid='$username', module='Log In', event='$event', ip='$usrIP'";
            $conn->query($dbcon,$aud);
            exit(0);
        }else{
            $exist = "yes";
        }

    } else {
        $exist = "yes";
    }
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

function getCourse($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT cname FROM course WHERE cid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['cname'];

    return $response;
}

function getSubject($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT sbj FROM subject WHERE sbjid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['sbj'];

    return $response;
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

function getstudent($cid){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT fname, lname FROM students WHERE stdid = '$cid'";
    $selrun = $conn->query($dbcon,$sel);
    $data = $conn->fetch($selrun);
    $response = $data['fname']." ".$data['lname'];
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
    $data = $conn->fetch($selrun);
    $response = $data['bdesc'];
    return $response;
}
function checkName($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT fname, lname FROM staff WHERE stfid='$id'";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['fname']." ".$selData['lname'];
    return $name;
}

function getbank($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT name FROM banks WHERE bankCode='$id'";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['name'];
    return $name;
}

function getexp($id){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $sel="SELECT name FROM expensecls WHERE expcode='$id'";
    $selRun=$conn->query($dbcon,$sel);
    $selData=$conn->fetch($selRun);
    $name=$selData['name'];
    return $name;
}

function addUser($userid,$pword,$type,$fname,$lname,$access,$img){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $hash = password_hash($pword, PASSWORD_ARGON2I);
    $sql="INSERT INTO users (access,userid, fname, lname, img, pword, status, dtype) VALUES ('$access','$userid','$fname','$lname','$img','$hash','Active','$type')";
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