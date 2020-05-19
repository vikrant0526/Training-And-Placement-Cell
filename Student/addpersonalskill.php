<?php 
	session_start();
	$a = $_GET['a'];
 ?>
<input type="text" class="form-control mb-2" name="p[]" placeholder=" Personal Skill <?php echo $a+1; ?>">
<div id="personal_skills_<?php echo $a+1; ?>"></div>
<?php $_SESSION['personalSkill']=$a+1; ?>