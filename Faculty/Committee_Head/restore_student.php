<?php 
	include('../../Files/PDO/dbcon.php');
	$sid = $_GET['sid'];
	$stmt=$con->prepare("CALL RESTORE_STUDENT(:sid)");
	$stmt->bindparam(":sid",$sid);
	$stmt->execute();
	print_r($stmt->errorinfo());
	header("location: view_deactive_students.php");
 ?>