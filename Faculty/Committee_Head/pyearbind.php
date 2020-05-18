<?php
    include('../../Files/PDO/dbcon.php');
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_PYEAR(:dept,:degree)");
     $stmt->bindParam(':dept',$dept);
     $stmt->bindParam(':degree',$degree);
     $stmt->execute();
     echo "<select>".
            "<option>Select Passing Year</option>"; 
    	while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    	{
    		// echo "<option>"; echo $data['BATCH_DEGREE']; echo "</option>"; 
    		?>
    		<option value="<?php echo $data['BATCH_PASSING_YEAR'] ?>"><?php echo $data['BATCH_PASSING_YEAR'] ?></option>
    		<?php	
    	}
     echo "</select>";	

?>