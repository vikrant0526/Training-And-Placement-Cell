<?php	
	$nid = $_GET['nid'];

	include('../Files/PDO/dbcon.php');

	$stmt=$con->prepare(" CALL REMOVE_NOTIFICATION(:nid);");
    $stmt->bindparam(":nid",$nid);
    $stmt->execute();
    header("location:student_dashboard.php");         
 ?>