<?php
	if(isset($_REQUEST['submit']))
	{
		session_start();
		$fname=$_REQUEST['fname'];
		$lname=$_REQUEST['lname'];
		$gender=$_REQUEST['gridRadios'];
		$about=$_REQUEST['About'];
		$pnumber=$_REQUEST['pnum'];
		$imgname=$_FILES['profileImage']['name'];
		$imgtempname=$_FILES['profileImage']['tmp_name'];

		move_uploaded_file($imgtempname, "img/$imgname");
		include('../Files/PDO/dbcon.php');
		$email = $_SESSION['femail'];
		$pass = $_SESSION['fpass'];
		$rpass = $_SESSION['frpass'];
		$stmt=$con->prepare("CALL INSERT_FACULTY(:fname,:lname,:gender,:email,:pn,:about,:pp,:password)") or die(PDO::errorinfo());
		$stmt->bindParam(':fname',$fname);
		$stmt->bindParam(':lname',$lname);
		$stmt->bindParam(':gender',$gender);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':pn',$pnumber);
		$stmt->bindParam(':about',$about);
		$stmt->bindParam(':pp',$imgname);
		$stmt->bindParam(':password',$pass);
		$stmt->execute();
		if($stmt == TRUE)
		{
        	header("Location: ../Login/login.php");
            session_destroy();
            session_start();
            $_SESSION['datamess'] = "Your Registration is Completed<br>Please Login";
		}
		else
		{
		 	 ?>
	        <script>
	           alert('Your Details Are Not Save!!..');
	           window.open('faculty_wizard.php','_self');
	        </script>
	         <?php
		 }
	}

?>