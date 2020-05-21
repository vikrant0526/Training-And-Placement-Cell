	<?php
	 session_start();
	 $studid = $_GET['sid'];
	 include('../Files/PDO/dbcon.php');
     $select_id=$_SESSION["selection_list_id"];
     $stmt=$con->prepare("CALL ADD_CHANGE_SHORTLIST_STUDENT_STATUS(:studid,:selectid)");
     $stmt->bindParam(":studid",$studid);
     $stmt->bindParam(":selectid",$select_id); 
     $stmt->execute();	
   ?>