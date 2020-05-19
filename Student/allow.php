<?php 
	
	$nid = $_GET['nid'];
	$sid = $_GET['sid'];
	$eid = $_GET['eid']; 

	include('../Files/PDO/dbcon.php');

	$stmt=$con->prepare(" CALL INSERT_EVENT_APPLICATION(:nid,:sid,:eid);");
    $stmt->bindparam(":nid",$nid);
    $stmt->bindparam(":sid",$sid);
    $stmt->bindparam(":eid",$eid);
    $stmt->execute();
    header("location:student_dashboard.php");         
 ?>