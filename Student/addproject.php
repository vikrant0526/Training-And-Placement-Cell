<?php 
	session_start();
	$a = $_GET['a'];
 ?>
<input type="text" class="form-control mb-2" name="pr[]" placeholder=" Projects <?php echo $a+1; ?>">
<div id="project_<?php echo $a+1; ?>"></div>
<?php $_SESSION['project']=$a+1; ?>