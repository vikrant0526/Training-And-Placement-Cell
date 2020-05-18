<?php 
	include('../../Files/PDO/dbcon.php');
	$sid=$_REQUEST['sid'];
	$stmt=$con->prepare("CALL DEACTIVATE_STUDENT(:sid)");
    $stmt->bindParam(":sid",$sid);
    $stmt->execute();
    header("Location: view_students.php");
 ?>