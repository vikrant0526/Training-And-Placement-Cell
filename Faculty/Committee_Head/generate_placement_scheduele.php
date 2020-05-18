<?php 
	include('../../Files/PDO/dbcon.php');
	$sdate =  $_REQUEST['sdate'];
    $a = strtotime($sdate);
    $start_date = date('Y-m-d',$a);
    $stmt=$con->prepare("CALL GENERATE_PLACEMENT_SCHEDULE(:gap, :sdate);");
    $stmt->bindparam(":gap", $_REQUEST['gap']);
    $stmt->bindparam(":sdate", $start_date);
    $stmt->execute();

    header("Location: view_schedule.php");
 ?>