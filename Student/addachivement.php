<?php 
	session_start();
	$a = $_GET['a'];
 ?>
<input type="text" class="form-control mb-2" name="ac[]" placeholder=" Achivement <?php echo $a+1; ?>">
<div id="achivement_<?php echo $a+1; ?>"></div>
<?php $_SESSION['achivement']=$a+1; ?>