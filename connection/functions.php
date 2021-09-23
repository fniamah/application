<?php
function getcat($id){
	$conn=new Db_connect;
	$dbconnection=$conn->conn();
	$sel="SELECT fname, lname FROM members WHERE mid='$id'";
	$selRun=$conn->query($dbconnection,$sel);
	$selData=$conn->fetch($selRun);
	$name=$selData['fname']." ".$selData['lname'];
	return $name;
}
?>