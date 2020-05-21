<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  session_start();
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
  <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white">Welcome Back, <?php echo $cname; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
              </div>
            </div>
           </div>
          </div>
        </div>
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Under Traning Student Details</h4>
             <div class="scrollbar">
              <ul class="list-unstyled d-xl-flex justify-content-center">
              <form action="#" method="Post" class="">
               	<table class="table text-light table-responsive">
                      <thead class="font-weight-bold">
                        <td>No</td>
                        <td>Student Profile Pic</td>
                        <td>Enrollment Number</td>
                        <td>Student Name</td>
                        <td>Student Email</td>
                        <td>Student Phone Number</td>
                        <td>Date of Birth</td>
                        <td>Student Gender</td>
                      </thead>
               		
                    <?php 
                        $stmt=$con->prepare("CALL GET_ALL_TRANING_STUDENT_BY_COMPANY(:company_id);");
                        $stmt->bindParam(":company_id",$cid);  
                        $stmt->execute();
                        $a=1;
                        while($studdata  = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            $studid=$studdata["TRAINING_STUDENT_ID"];
                            $stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    	$stmt2->bindParam(":studid",$studid);     
    				    	$stmt2->execute(); 
    				    	$stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
    				    	$stmt2->bindParam(":studid",$studid);     
                            $stmt2->execute();
                            while($studenttabledata  = $stmt2->fetch(PDO::FETCH_ASSOC))
                            {
                                // echo "<per>";
                                // print_r($studenttabledata);
                                // echo "</per>";
                     ?> 
                     <tr>
                             <td><?php echo $a; ?></td>
                             <td><img src="../Student/Profile_pic/<?php echo $studenttabledata["STUDENT_PROFILE_PIC"]; ?>" style="height: 120px;width: 120px;"></td>
                             <td><?php echo $studenttabledata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                             <td><?php echo $studenttabledata["STUDENT_FIRST_NAME"]." ".$studenttabledata["STUDENT_LAST_NAME"]; ?></td>
                             <td><?php echo $studenttabledata["STUDENT_EMAIL"]; ?></td>
                             <td><?php echo $studenttabledata["STUDENT_PHONE_NUMBER"]; ?></td>
                             <td><?php echo $studenttabledata["STUDENT_DATE_OF_BIRTH"]; ?></td>
                             <td><?php if($studenttabledata["STUDENT_GENDER"]=="M"){
                                        echo "Male";
                                     }else{
                                        echo "Female";
                                     }
                              ?></td>
                            <!--<td><a href="view_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></button></a> </td>
                            <td><a href="STIPEND_entry.php?sid=<?php echo $data["SELECTION_LIST_ID"];?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-paper-plane"></i></button></a></td>
                            <td><a href="add_student_selection_list.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></button></a> </td>
                            <td><a href="delete_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a></td>
                            <td><a href="send_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-paper-plane"></i></button></a></td> -->

                            </tr>
                          <?php $a++; ?>
                   <?php
                            } 
                            } 
                     ?>
               	</table>
                </form>
              </ul>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>	     
             </div>
            </div>
          </div>
        </div>

<?php 
  include('footer.php');
  ob_flush();
?>      