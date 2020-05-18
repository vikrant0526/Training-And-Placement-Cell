<?php 
	include('../../Files/PDO/dbcon.php');
	$cid=$_REQUEST['cid'];
	$stmt=$con->prepare("CALL DEACTIVATE_COMPANY(:cid)");
    $stmt->bindParam(":cid",$cid);
    $stmt->execute();
    // print_r($stmt->errorinfo());
    header("Location: view_company.php");
 ?>