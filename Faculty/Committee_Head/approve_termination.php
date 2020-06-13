<?php   
    include('../../Files/PDO/dbcon.php');
    $sid=$_GET['sid'];
    $nid=$_GET["nid"];
	$stmt=$con->prepare("CALL DEACTIVATE_STUDENT(:sid)");
    $stmt->bindParam(":sid",$sid);
    $stmt->execute();

    $stmt3=$con->prepare("CALL NO_PLACEMENT_APPROVE_STATUS(:sid)");
	$stmt3->bindparam(":sid",$sid);
	$stmt3->execute();    
    $stmt3=$con->prepare("CALL NO_PLACEMENT_APPROVE_STATUS(:sid)");
	$stmt3->bindparam(":sid",$sid);
    $stmt3->execute();   
    
    $stmt2=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
	$stmt2->bindparam(":nid",$nid);
	$stmt2->execute();    
    $stmt2=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
	$stmt2->bindparam(":nid",$nid);
    $stmt2->execute();   
    header("Location: committee_head_dashboard.php");
?>