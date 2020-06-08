<?php
    include('../Files/PDO/dbcon.php');
     $dept = $_GET['dept'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_DEGREE(:dept)");
     $stmt->bindParam(':dept',$dept);
     $stmt->execute();
     echo "<select>".
     "<option>Select Degree</option>"; 

    	while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    	{
    		// echo "<option>"; echo $data['BATCH_DEGREE']; echo "</option>"; 
    		?>
<option value="<?php echo $data['BATCH_DEGREE'] ?>"><?php echo $data['BATCH_DEGREE'] ?></option>
<?php	
    	}
     echo "</select>";	

?>