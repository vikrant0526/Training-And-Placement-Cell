<?php 
	ob_start();
	$eid=$_REQUEST['eid'];
	// header('Location: update_event.php'.$eid);
	?>
		<script type="text/javascript">
			window.location.replace("update_event.php?eid=<?php echo $eid; ?>");
		</script>
	<?php
	ob_flush();
 ?>