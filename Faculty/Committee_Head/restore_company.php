<?php 
	include('../../Files/PDO/dbcon.php');
	$cid = $_GET['cid'];
	$stmt=$con->prepare("CALL RESTORE_COMPANY(:cid)");
	$stmt->bindparam(":cid",$cid);
	$stmt->execute();
	print_r($stmt->errorinfo());
	header("location: view_deactive_company.php");
 ?>