<?php
include("../connection/functions.php");
$vokaId = $_POST["vokaId"];
$amount = $_POST["amount"];
$type = $_POST["type"];
$medDate = $_POST["date"];
$usertype = $_POST["user"];
$year=date("Y",strtotime(date($medDate)));
$month=date("m",strtotime(date($medDate)));

$selQry="SELECT balance FROM medpolicy WHERE voka_id='$vokaId' AND type='$type' AND year='$year' AND user='$usertype'";
$selQryRun=$conn->query($dbconnection,$selQry);
$selData=$conn->fetch($selQryRun);

$balance=$selData['balance'] - $amount;
if($balance < 0){
	echo "no";
}
else{
	echo $balance;
}

?>