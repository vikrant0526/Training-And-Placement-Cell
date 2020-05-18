<?php
	include('../../Files/PDO/dbcon.php');
	$sid = $_GET['sid'];
	$nid = $_GET['nid'];
	$type= $_GET['type'];
	$stmt=$con->prepare("CALL REJECT_REG(:sid,:type,:nid)");
	$stmt->bindparam(":sid",$sid);
	$stmt->bindparam(":type",$type);
	$stmt->bindparam(":nid",$nid);
	$stmt->execute();
	header("location: reg_notification.php");
?>