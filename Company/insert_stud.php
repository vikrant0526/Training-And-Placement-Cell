<?php 
	 session_start();	
	 $studid = $_GET['sid'];
	 $selection_list_id=$_SESSION["selection_list_id"];
	 $rid = 0;
	 include('../Files/PDO/dbcon.php');
     $stmt6=$con->prepare("CALL INSERT_SHORTLIST(:rid,:selectid,:sid)");
     $stmt6->bindParam(":rid",$rid);
     $stmt6->bindParam(":selectid",$selection_list_id);
     $stmt6->bindParam(":sid",$studid);
     $stmt6->execute();	
 ?>