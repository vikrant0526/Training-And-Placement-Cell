<?php
   ob_start();
   include('../Files/PDO/dbcon.php');
   session_start();
   $student_id=$_GET["sid"];
   $select_id=$_SESSION["slist_id"];
   $stmt=$con->prepare("CALL DELETE_STUDENT_FROM_SHORTLIST(:sid,:selectid);");
   $stmt->bindParam(":sid",$student_id); 
   $stmt->bindParam(":selectid",$select_id);         
   $stmt->execute(); 
   header("location:view_shortlist.php?sid=".$select_id);
   ob_flush();
?>      
