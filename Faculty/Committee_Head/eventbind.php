<?php
    include('../../Files/PDO/dbcon.php');
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];
     $pyear = $_GET['pyear'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_EVENT_BY_BATCH(:dept,:degree,:pyear)");
     $stmt->bindParam(':dept',$dept);
     $stmt->bindParam(':degree',$degree);
     $stmt->bindParam(':pyear',$pyear);
     $stmt->execute();
     echo "<select>".
            "<option>Select Event</option>"; 
    	while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    	{
    		// echo "<option>"; echo $data['BATCH_DEGREE']; echo "</option>"; 
    		?>
    		<option value="<?php echo $data['EVENT_ID'] ?>"><?php echo $data['EVENT_NAME'] ?></option>
    		<?php	
    	}
     echo "</select>";	

?>