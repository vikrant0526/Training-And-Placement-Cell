<?php 
    $rid = $_GET["rid"];
    include('../Files/PDO/dbcon.php');	
    $stmt=$con->prepare("CALL REMOVE_RECOMMENDATION(:rid)");
    $stmt->bindparam(':rid', $rid);
    $stmt->execute();
    header('location: recommendations.php');
?>