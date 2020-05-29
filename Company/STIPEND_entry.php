<?php
   ob_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];
   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $_SESSION["selection_list_id"]=$_GET["sid"]; 
?>
	<div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome Back, <?php echo $cname; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
              </div>
            </div>
           </div>
          </div>
        </div>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title"></h4>
             <!-- action group -->
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
                        <!-- <td>Delete</td> -->
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
						        ?>
						         <tr>
						            <td><img src="../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>" style="height: 120px;width: 120px;"></td>
						            <td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
						            <td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?></td>
                       				<td>
                       					<input type="text" class="form-control" name="stipend_student<?php echo $count;?>" required>
                       					<input type="hidden" class="form-control"name="student_id<?php echo $count;?>"
                       					value="<?php echo $studdata['STUDENT_ID'];?>" required>
                       				</td>
						        </tr>
						        <?php 
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