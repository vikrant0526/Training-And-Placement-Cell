<?php 

  
    include('../../Files/PDO/dbcon.php');
    session_start();
    $selection=$_SESSION["selection_list_id"];

    $stmt=$con->prepare("CALL GET_CH_DATA"); 
    $stmt->execute();
    $stmt=$con->prepare("CALL GET_CH_DATA"); 
    $stmt->execute();
    $facultydata = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $facultydata["FACULTY_EMAIL"];
    $faculty_id= $facultydata["FACULTY_ID"];

    $sen_type="CH";
    $rec_type="ST";
    $type="TROF";
    $des="You Have Traning Offer";
    $studid = $_GET["sid"];
    $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
    $stmt22->bindParam(":senderid",$faculty_id);
    $stmt22->bindParam(":rec_id",$studid);  
    $stmt22->bindParam(":sender_type",$sen_type);  
    $stmt22->bindParam(":rec_type",$rec_type);  
    $stmt22->bindParam(":type",$type);  
    $stmt22->bindParam(":des",$des);   
    $stmt22->execute();
    $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
    $stmt22->bindParam(":senderid",$faculty_id);
    $stmt22->bindParam(":rec_id",$studid);  
    $stmt22->bindParam(":sender_type",$sen_type);  
    $stmt22->bindParam(":rec_type",$rec_type);  
    $stmt22->bindParam(":type",$type);  
    $stmt22->bindParam(":des",$des);   
    $stmt22->execute();
    // print_r($stmt22->errorinfo());
    header("location: view_company_shortlist.php?sid=$selection");
?>