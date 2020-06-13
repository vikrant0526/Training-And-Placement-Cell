<?php
	include('../../Files/PDO/dbcon.php');
    $nid = $_GET['nid'];
    $sid = $_GET['sid'];
	$stmt=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
	$stmt->bindparam(":nid",$nid);
    $stmt->execute();

    $stmt5=$con->prepare("CALL GET_CH_DATA()");  
    $stmt5->execute();
    $stmt5=$con->prepare("CALL GET_CH_DATA()");  
    $stmt5->execute();
    $facultydata=$stmt5->fetch(PDO::FETCH_ASSOC); 
    $chid = $facultydata["FACULTY_ID"];

    $stype="CH";
    $rtype="ST";
    $type = "TRREG";
    $des = "Termination Request Denied";
    $stmt6=$con->prepare("CALL INSERT_NOTIFICATION(:sid,:rid,:stype,:rtype,:type,:des)");
    $stmt6->bindparam(":sid",$chid);
    $stmt6->bindparam(":rid",$sid);
    $stmt6->bindparam(":stype",$stype);
    $stmt6->bindparam(":rtype",$rtype);
    $stmt6->bindparam(":type",$type);
    $stmt6->bindparam(":des",$des);
    $stmt6->execute();
    $stmt6=$con->prepare("CALL INSERT_NOTIFICATION(:sid,:rid,:stype,:rtype,:type,:des)");
    $stmt6->bindparam(":sid",$chid);
    $stmt6->bindparam(":rid",$sid);
    $stmt6->bindparam(":stype",$stype);
    $stmt6->bindparam(":rtype",$rtype);
    $stmt6->bindparam(":type",$type);
    $stmt6->bindparam(":des",$des);
    $stmt6->execute();
    // print_r($stmt6->errorinfo());
	header("location: committee_head_dashboard.php");
?>