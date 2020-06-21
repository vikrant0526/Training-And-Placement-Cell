<?php 
    include('../Files/PDO/dbcon.php');
    session_start();
    $sid = $_GET['sid']; 
    $data=$_SESSION['Userdata'];
    $cid = $data["COMPANY_ID"];

    $stmt5=$con->prepare("CALL GET_CH_DATA()");  
    $stmt5->execute();
    $facultydata=$stmt5->fetch(PDO::FETCH_ASSOC); 
    $chid = $facultydata["FACULTY_ID"];

    $stmt3=$con->prepare("CALL TERMINATE_STUDENT_UNDER_TRAINING(:sid,:cid,:chid)");
    $stmt3->bindParam(":sid",$sid); 
    $stmt3->bindParam(":cid",$cid); 
    $stmt3->bindParam(":chid",$chid);  
    $stmt3->execute();
    $stmt3=$con->prepare("CALL TERMINATE_STUDENT_UNDER_TRAINING(:sid,:cid,:chid)");
    $stmt3->bindParam(":sid",$sid); 
    $stmt3->bindParam(":cid",$cid); 
    $stmt3->bindParam(":chid",$chid);  
    $stmt3->execute();
    // print_r($stmt3->errorinfo());
    header("location: traning.php");
 ?>