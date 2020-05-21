<?php 
	session_start();
	$a = $_GET['a'];
 ?>
<input type="text" class="form-control mb-2" name="l[]" placeholder=" Language <?php echo $a+1; ?>">
<div id="language_<?php echo $a+1; ?>"></div>
<?php $_SESSION['language']=$a+1; ?>