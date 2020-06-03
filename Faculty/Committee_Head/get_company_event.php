<?php
    include('../../Files/PDO/dbcon.php');
     $cid = $_GET['cid'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_EVENT_BY_COMPANY(:cid)");
     $stmt->bindParam(':cid',$cid);
     $stmt->execute();
    //  print_r($stmt->errorinfo());
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