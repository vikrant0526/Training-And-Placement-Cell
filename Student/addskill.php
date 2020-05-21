<?php 
	session_start();
	$a = $_GET['a'];
 ?>
<input type="text" class="form-control mb-2" name="t[]" placeholder=" Technical Skill <?php echo $a+1; ?>">
<div id="technical_skills_<?php echo $a+1; ?>"></div>
<?php $_SESSION['skill']=$a+1; ?>