<?php 
	ob_start();
	include('../../Files/PDO/dbcon.php');
	$ilid=$_GET['ilid'];
    $stmt=$con->prepare("CALL DELETE_BROADCAST_LIST(:ilid);");
    $stmt->bindParam(":ilid",$ilid);
    $stmt->execute();
    // print_r($stmt->errorinfo());
    header('Location: broadcast_list.php');
    ob_flush();
?>