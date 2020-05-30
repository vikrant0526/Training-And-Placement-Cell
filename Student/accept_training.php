<?php 
    session_start();
    include('../Files/PDO/dbcon.php');
    $sid=$_SESSION['lid'];
    $selection_list_id = $_GET["slid"];
    $nid = $_GET["nid"];
    // echo $sid;    
    $stmt4=$con->prepare(" CALL GET_STUDENT_TRAINING_DATA(:selection_list_id,:stud_id);");
    $stmt4->bindparam(":selection_list_id",$selection_list_id);
    $stmt4->bindparam(":stud_id",$sid);
    $stmt4->execute();
    $companydata=$stmt4->fetch(PDO::FETCH_ASSOC);
    $cid = $companydata["COMPANY_ID"];
    $stipend = $companydata["TRAINING_OFFERED_STIPEND"];
    $acc="A";
    
    $stmt5=$con->prepare("CALL INSERT_UPDATE_TRAINING(:studid,:com_id,:stipend,:accepted)");
    $stmt5->bindParam(":studid",$sid);
    $stmt5->bindParam(":com_id",$cid);
    $stmt5->bindParam(":stipend",$stipend);
    $stmt5->bindParam(":accepted",$acc);
    $stmt5->execute();
    $stmt5=$con->prepare("CALL INSERT_UPDATE_TRAINING(:studid,:com_id,:stipend,:accepted)");
    $stmt5->bindParam(":studid",$sid);
    $stmt5->bindParam(":com_id",$cid);
    $stmt5->bindParam(":stipend",$stipend);
    $stmt5->bindParam(":accepted",$acc);
    $stmt5->execute();
    // print_r($stmt5->errorinfo());

    $stmt6=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
    $stmt6->bindParam(":nid",$nid);
    $stmt6->execute();
    $stmt6=$con->prepare("CALL REMOVE_NOTIFICATION(:nid)");
    $stmt6->bindParam(":nid",$nid);
    $stmt6->execute();
    

    header("location: student_dashboard.php");
?>