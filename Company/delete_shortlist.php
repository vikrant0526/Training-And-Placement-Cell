<?php
   ob_start();
   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $stmt=$con->prepare("CALL DELETE_SELECTION_LIST(:sid);");
   $stmt->bindParam(":sid",$selection_list_id);     
   $stmt->execute(); 
   header("Location: show_shortlist.php");
   ob_flush();
?>      
