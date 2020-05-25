<?php 
    session_start();
    include('../../Files/PDO/dbcon.php');
    $sid = $_GET["sid"];
    $att = "1";
    $eid = $_SESSION["event_id"];
    $data= $_SESSION['Userdata'];
    $fid=$_SESSION['lid'];
    $st1=$con->prepare("CALL INSERT_UPDATE_ATTENDANCE(:eid,:sid,:fid,:att);");
    $st1->bindparam(":eid",$eid);
    $st1->bindparam(":sid",$sid);
    $st1->bindparam(":fid",$fid);
    $st1->bindparam(":att",$att);
    $st1->execute();
?>