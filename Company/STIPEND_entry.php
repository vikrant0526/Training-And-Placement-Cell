<?php
   ob_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];
   error_reporting(0);
   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $_SESSION["selection_list_id"]=$_GET["sid"]; 
?>
	<script>
	function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }

    }
	</script>
	<div class="content-wrapper header-info">
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Stipend Enter</h4>
             <form action="#" method="post">
             <div class="scrollbar">
              <ul class="list-unstyled">
              		<?php
              			$stmt=$con->prepare("CALL VIEW_SHORTLIST(:sid);");
    				        $stmt->bindParam(":sid",$selection_list_id);     
    				        $stmt->execute(); 
              		 ?>	
            	  <ul class="list-unstyled d-flex justify-content-center">
						    <li>
						     <table class="table table-responsive">
						        <tr class="text-light font-weight-bold">
						            <td>Profile Pic</td>
						            <td>En No.</td>
						            <td>Name</td>
                      			 	<td>Stipend</td>
                                </tr>
						     <?php
						     $count=0; 
						     $x=1;
						     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						     		$studid=$data["SHORTLIST_STUDENT_ID"];	
                    				//echo "$studid";
						     		$stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    			$stmt2->bindParam(":studid",$studid);     
    				    			$stmt2->execute(); 
    				    			$stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    			$stmt2->bindParam(":studid",$studid);     
									$stmt2->execute(); 	
									
    				    			while ($studdata = $stmt2->fetch(PDO::FETCH_ASSOC)) {
										$student_id = $studdata['STUDENT_ID'];
										$stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:selection_list_id)");
										$stmt3->bindParam(":studid",$student_id);   
										$stmt3->bindParam(":selection_list_id",$selection_list_id);   
										$stmt3->execute();
										$stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:selection_list_id)");
										$stmt3->bindParam(":studid",$student_id);   
										$stmt3->bindParam(":selection_list_id",$selection_list_id);   
										$stmt3->execute();
										$stipenddata = $stmt3->fetch(PDO::FETCH_ASSOC);
										if($stipenddata["TRAINING_OFFERED_STIPEND"] == 0){
											?>
											<tr>
												<td><img src="../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>" style="height: 120px;width: 120px;"></td>
												<td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
												<td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?></td>
												<td>
													<input type="text" class="form-control" maxlength="11" onkeypress="isInputNumber(event)" name="stipend_student<?php echo $count;?>" required>
													<input type="hidden" class="form-control"name="student_id<?php echo $count;?>"
													value="<?php echo $studdata['STUDENT_ID'];?>" required>
												</td>
											</tr>
											<?php 	
										}else{
											?>
											<tr>
												<td><img src="../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>" style="height: 120px;width: 120px;"></td>
												<td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
												<td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?></td>
												<td>
													<input type="text" class="form-control" maxlength="11" onkeypress="isInputNumber(event)" name="stipend_student<?php echo $count;?>" value="<?php echo $stipenddata["TRAINING_OFFERED_STIPEND"]; ?>" required>
													<input type="hidden" class="form-control"name="student_id<?php echo $count;?>"
													value="<?php echo $studdata['STUDENT_ID'];?>" required>
												</td>
											</tr>
											<?php
										}
						        	$count+=1;
						    	} ?>	
						        <?php
						}?>
						</table>
				    </li>
				</ul>
              </ul>
             </form>	
          	 <div class="d-flex justify-content-center">
					<input type="submit" class="form-control" name="submit" value="SUBMIT">
          	  </div>
             </div>
            </div>
        </div>
<?php 
  include('footer.php');
?>

<?php 
	if(isset($_REQUEST["submit"])){
		//$stipend=$_REQUEST["stipend_student"];
		$acc='P';
		$a=0;
		for ($i = 0; $i < $count; $i++) {
			$stipend=$_REQUEST["stipend_student$i"];
			$student_id=$_REQUEST["student_id$i"];
			//echo "<script>alert('$student_id')</script>";
			if($a==0){
				$stmt3=$con->prepare("CALL INSERT_UPDATE_TRAINING(:studid,:com_id,:stipend,:accepted)");
	    		$stmt3->bindParam(":studid",$student_id);
	    		$stmt3->bindParam(":com_id",$cid);
	    		$stmt3->bindParam(":stipend",$stipend);
	    		$stmt3->bindParam(":accepted",$acc);
	    		$stmt3->execute();
	    		$a=1;
    		}
    		$stmt3=$con->prepare("CALL INSERT_UPDATE_TRAINING(:studid,:com_id,:stipend,:accepted)");
    		$stmt3->bindParam(":studid",$student_id);
    		$stmt3->bindParam(":com_id",$cid);
    		$stmt3->bindParam(":stipend",$stipend);
    		$stmt3->bindParam(":accepted",$acc);
    		$stmt3->execute();
		}

		if($stmt3 == TRUE){
	   	echo "<script>alert('Stipend Save Or Updated')</script>";
		}else{
			echo "<script>alert('Save Not Stipend')</script>";
		}


	}
 ?>