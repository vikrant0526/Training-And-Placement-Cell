<?php
   ob_start();
   session_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];
   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $_SESSION["slist_id"]=$_GET["sid"];
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
                        <!-- <td>Documents</td> -->
                        <td>Delete</td>
						        </tr>
						     <?php 
						     $x=1;
						     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						     		$studid=$data["SHORTLIST_STUDENT_ID"];	
                    // echo "$studid";
						     		  $stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    			$stmt2->bindParam(":studid",$studid);     
    				    			$stmt2->execute(); 
    				    			$stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    			$stmt2->bindParam(":studid",$studid);     
    				    			$stmt2->execute(); 
    				    			while ($studdata = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                      $student_id=$studdata["STUDENT_ID"];
                      $stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:company_id)");
                      $stmt3->bindParam(":studid",$student_id);   
                      $stmt3->bindParam(":company_id",$cid);   
                      $stmt3->execute();
                      $stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:company_id)");
                      $stmt3->bindParam(":studid",$student_id);   
                      $stmt3->bindParam(":company_id",$cid);        
                      $stmt3->execute(); 
                      ?>
                          <tr>
                            <td><img src="../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>" style="height: 120px;width: 120px;"></td>
                            <td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                            <td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?></td>
                      <?php
                      $row =$stmt3->rowCount();
                          if($row == 0){
                              ?>
                                <td><?php echo "Stipend Not Enter"; ?></td>
                                <td><a href="delete_student.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a> </td>
                            </tr>
                              <?php
                            }
                      while ($stipentdata = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                         //print_r($stipentdata);
						        ?>
                        <?php
                          if($stipentdata["TRAINING_OFFERED_STIPEND"] == "0"){
                            ?>
                                <td><?php echo "Stipend Zero"; ?></td>
                                <td><a href="delete_student.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a> </td>
                            </tr>
                            <?php
                          }else{
                            ?>
                                  <td><?php echo $stipentdata["TRAINING_OFFERED_STIPEND"]; ?></td>
                                   <td><a href="delete_student.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a> </td>
                            </tr>
                              <?php
                          }
                        ?>

                       <!--  <td><a href="student_documents.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></button></a></td> -->
                  
						        <?php } } ?>	
						        <?php
						}?>
				              </table>
				           </li>
			     	     </ul>
              </ul>
                <a href="STIPEND_entry.php?sid=<?php echo $selection_list_id; ?>"><input type="button" value="Update Stipend" class="btn btn-sm btn-outline-success form-control"></a> 
             </div>
            </div>
          </div>
        </div>
<?php 
  include('footer.php');
  ob_flush();
?>      
