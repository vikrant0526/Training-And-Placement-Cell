<?php 
	ob_start();
	include('../../Files/PDO/dbcon.php');
	$mid=$_GET['mid'];
	$ilid=$_GET['ilid'];
    $stmt=$con->prepare("CALL REMOVE_BROADCAST_MEMBER(:mid);");
    $stmt->bindParam(":mid",$mid);
    $stmt->execute();
    print_r($stmt->errorinfo());
    ob_flush();
?>
<script type="text/javascript">
	window.location.href = "view_list.php?ilid=<?php echo $ilid ?>";
</script>