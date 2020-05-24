<?php 
    session_start();
    $cid = $_GET["cid"];
    $bid = $_SESSION["broadcast_id"];
    include('../../Files/PDO/dbcon.php');
    $stmt5=$con->prepare("CALL ADD_MEMBER_BROADCASTLIST_CHANGE_STATUS(:broadcast_id,:company_id)");
    $stmt5->bindParam(":broadcast_id",$bid);
    $stmt5->bindParam(":company_id",$cid);
    $stmt5->execute();
?>