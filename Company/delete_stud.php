<?php 
	 session_start();	
	 $studid = $_GET['sid'];
	 include('../Files/PDO/dbcon.php');
     $select_id=$_SESSION["selection_list_id"];
     $stmt=$con->prepare("CALL DELETE_STUDENT_FROM_SHORTLIST(:studid,:selectid)");
     $stmt->bindParam(":studid",$studid);
     $stmt->bindParam(":selectid",$select_id);  
     $stmt->execute();		
 ?>