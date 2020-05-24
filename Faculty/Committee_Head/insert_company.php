<?php 
    session_start();
    $cid = $_GET["cid"];
    $bid = $_SESSION["broadcast_id"];
    include('../../Files/PDO/dbcon.php');
    $stmt5=$con->prepare("CALL INSERT_UPDATE_BROADCAST_LIST_MEMBER(:broadcast_id,:company_id)");
    $stmt5->bindParam(":broadcast_id",$bid);
    $stmt5->bindParam(":company_id",$cid);
    $stmt5->execute();
?>