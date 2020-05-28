<?php 
    include('../Files/PDO/dbcon.php');
    $tid = $_GET['tid']; 
    $stmt3=$con->prepare("CALL TERMINATE_STUDENT_UNDER_TRAINING(:tid);");
    $stmt3->bindParam(":tid",$tid);  
    $stmt3->execute();
    header("location: traning.php");
 ?>