<?php 
    session_start();
    include('../Files/PDO/dbcon.php');
    $nid = $_GET["nid"];
    $userdata=$_SESSION['Userdata'];
    $sid = $userdata['STUDENT_ID'];
    $status = "R";
    $stmt1=$con->prepare(" CALL UPDATE_PLACEMENT_STATUS(:stud_id,:status)");
    $stmt1->bindparam(":stud_id",$sid);
    $stmt1->bindparam(":status",$status);
    $stmt1->execute();
    
    $stmt6=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
    $stmt6->bindParam(":nid",$nid);
    $stmt6->execute();
    $stmt6=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
    $stmt6->bindParam(":nid",$nid);
    $stmt6->execute();

    header("location: student_dashboard.php");    
?>