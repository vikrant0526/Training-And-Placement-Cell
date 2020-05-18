<?php 
	$fid = $_GET['fid'];
	include('../../Files/PDO/dbcon.php');
	$stmt=$con->prepare("CALL DEACTIVE_FACULTY(:fid)");
	$stmt->bindParam(':fid',$fid);
    $stmt->execute();
    print_r($stmt->errorinfo());
    header("Location: view_faculty.php");
 ?>