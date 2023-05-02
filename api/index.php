<?php
$data=file_get_contents("php://input");
include("../connection/conn.php");
$obj = json_decode($data);
$username =  $obj->username;
$password =  $obj->password;

$conn=new Db_connect;
$dbcon=$conn->conn();
$qry = "SELECT pword, access, last_page FROM users WHERE userid='$username' AND status='Active'";
$qryRun = $conn->query($dbcon, $qry);

if ($conn->sqlnum($qryRun) == 1) {
	$qrydata = $conn->fetch($qryRun);
	$hash = $qrydata['pword'];
	if(password_verify($password, $hash)){
		$response['errorcode']=0;
		$response['msg']="Successful";
		print json_encode($response);
		exit(0);
	}else{
		$response['errorcode']=1;
		$response['msg']="Unsuccessful";
		print json_encode($response);
	}

} else {
	$response['errorcode']=1;
	$response['msg']="Unsuccessful";
	print json_encode($response);
}
$conn->close($dbcon);

?>