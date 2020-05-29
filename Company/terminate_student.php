<?php 
    include('../Files/PDO/dbcon.php');
    $sid = $_GET['sid']; 
    $stmt3=$con->prepare("CALL TERMINATE_STUDENT_UNDER_TRAINING(:sid);");
    $stmt3->bindParam(":sid",$sid);  
    $stmt3->execute();
    header("location: traning.php");
 ?>