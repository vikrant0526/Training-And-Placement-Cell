<?php 
	ob_start();
	include('../../Files/PDO/dbcon.php');
	$eid=$_GET['eid'];
    $stmt=$con->prepare("CALL CANCEL_EVENT(:eid);");
    $stmt->bindParam(":eid",$eid);
    $stmt->execute();
    header('Location: upcoming_events.php');
    ob_flush();
?>