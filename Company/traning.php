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
              <h4 class="text-center"><?php
                if(isset($_SESSION["message_document"])){ 
                echo $_SESSION["message_document"];
                }
               ?></h4>
              <ul class="list-unstyled d-xl-flex justify-content-center">
              <form action="#" method="Post" class="">
               	<table class="table text-light table-responsive">
                      <thead class="font-weight-bold">
                        <td></td>
                        <td>No</td>
                        <td>Student Profile Pic</td>
                        <td>Enrollment Number</td>
                        <td>Student Name</td>
                        <td>Student Email</td>
                        <td>Student Phone Number</td>
                        <td>Date of Birth</td>
                        <td>Student Gender</td>
                        <td>Add Document</td>
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
                             <td><input type="checkbox"  name="<?php echo $studid; ?>" value="<?php echo $studid; ?>" ></td>
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
                              <td><a href="student_documents.php?sid=<?php echo $studdata["TRAINING_STUDENT_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></button></a></td>
                              <!-- <td><input type="text" class="form-control" name="test"/></td> -->
                            </tr>
                          <?php $a++; ?>
                   <?php
                            } 
                            } 
                     ?>
               	</table>
              </ul>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>	     
             </div>
             <div class="d-flex justify-content-center">
				        	<input type="submit" class="form-control" name="submit" value="SUBMIT">
          	  </div>
              </form>
            </div>
          </div>
        </div>
<?php 
  include('footer.php');
?>      
<?php 
  if(isset($_REQUEST["submit"])){
    $stmt3=$con->prepare("CALL GET_ALL_TRANING_STUDENT_BY_COMPANY(:company_id);");
    $stmt3->bindParam(":company_id",$cid);  
    $stmt3->execute();
    $stmt3=$con->prepare("CALL GET_ALL_TRANING_STUDENT_BY_COMPANY(:company_id);");
    $stmt3->bindParam(":company_id",$cid);  
    $stmt3->execute();
    $missing=array();
    while($studdata  = $stmt3->fetch(PDO::FETCH_ASSOC))
    {
        $checked_studid = $studdata["TRAINING_STUDENT_ID"];
        // if(empty($_REQUEST["$checked_studid"])){
        //   echo "<script>alert('Please Select a Student')</script>";
        //   break;
        // }

        if(isset($_REQUEST["$checked_studid"])){
            $sid=$_REQUEST["$checked_studid"];
            // echo "<script>alert('$sid')</script>";
            // if(empty($sid)){
            //   echo "<script>alert('Please Select a Student')</script>";
            // }
            //echo "<script>alert('$sid')</script>";
            //header("Location: student_documents.php?sid=$sid");
            $stmt4=$con->prepare("CALL CHECK_PLACEMENT_DOCUMENTS(:stud_id,:company_id);");
            $stmt4->bindParam(":stud_id",$sid);  
            $stmt4->bindParam(":company_id",$cid);  
            $stmt4->execute();
            $stmt4=$con->prepare("CALL CHECK_PLACEMENT_DOCUMENTS(:stud_id,:company_id);");
            $stmt4->bindParam(":stud_id",$sid);  
            $stmt4->bindParam(":company_id",$cid);  
            $stmt4->execute();
            $file_check = $stmt4->fetch(PDO::FETCH_ASSOC);
            if ($file_check['OL'] != '1' || $file_check['BD'] != '1') {
              array_push($missing,$file_check['STUDENT_ENROLLMENT_NUMBER']);
            }
            $_SESSION["checked_stud_id"] .= $sid;
            header("Location: Package_entry.php");  
        }
    }
    if (sizeof($missing) != 0) {
      $msg="";
      foreach($missing as $a){
        $msg .= $a;
        $msg .= "  ";
      }
      ?>
        <script>
           alert("Document Missing For <?php echo $msg; ?>");
        </script>
      <?php
     }
  }
?>

