<?php 
	include('../../Files/PDO/dbcon.php');
	$eid = $_GET['eid'];
	$stmt=$con->prepare("CALL RESTORE_EVENT(:eid)");
	$stmt->bindparam(":eid",$eid);
	$stmt->execute();
	header("location: canceled_events.php");
 ?>