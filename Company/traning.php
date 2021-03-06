<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
<div class="content-wrapper header-info">
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
                    <ul class="list-unstyled">
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
                                    <td>Terminate Student</td>
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
                            // while($studenttabledata  = $stmt2->fetch(PDO::FETCH_ASSOC))
                            // {
                                // echo "<per>";
                                // print_r($studenttabledata);
                                // echo "</per>";
                            $studenttabledata  = $stmt2->fetch(PDO::FETCH_ASSOC);

                            $stmt3=$con->prepare("CALL CHECK_STUDENT_TRAINING(:sid)");
    				    	          $stmt3->bindParam(":sid",$studid);     
                            $stmt3->execute(); 
                            $stmt3=$con->prepare("CALL CHECK_STUDENT_TRAINING(:sid)");
                            $stmt3->bindParam(":sid",$studid);     
                            $stmt3->execute();
                            $check_training = $stmt3->fetch(PDO::FETCH_ASSOC);
                            $st = $check_training['st'];
                            if ($st == '0') {
                     ?>
                                <tr>
                                    <td><input type="checkbox" name="<?php echo $studid; ?>"
                                            value="<?php echo $studid; ?>"></td>
                                    <td><?php echo $a; ?></td>
                                    <td><img src="../Student/Profile_pic/<?php echo $studenttabledata["STUDENT_PROFILE_PIC"]; ?>"
                                            style="height: 120px;width: 120px;"></td>
                                    <td><?php echo $studenttabledata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                                    <td><?php echo $studenttabledata["STUDENT_FIRST_NAME"]." ".$studenttabledata["STUDENT_LAST_NAME"]; ?>
                                    </td>
                                    <td><?php echo $studenttabledata["STUDENT_EMAIL"]; ?></td>
                                    <td><?php echo $studenttabledata["STUDENT_PHONE_NUMBER"]; ?></td>
                                    <td><?php echo $studenttabledata["STUDENT_DATE_OF_BIRTH"]; ?></td>
                                    <td><?php if($studenttabledata["STUDENT_GENDER"]=="M"){
                                        echo "Male";
                                     }else{
                                        echo "Female";
                                     }
                              ?></td>
                                    <td><a
                                            href="student_documents.php?sid=<?php echo $studdata["TRAINING_STUDENT_ID"]; ?>"><button
                                                type="button" class="btn btn-sm btn-outline-success"><i
                                                    class="fa fa-plus"></i></button></a></td>
                                    <td><a
                                            href="terminate_student.php?sid=<?php echo $studdata["TRAINING_STUDENT_ID"]; ?>"><button
                                                type="button" class="btn btn-sm btn-outline-danger"><i
                                                    class="fa fa-trash"></i></button></a></td>
                                    <!-- <td><input type="text" class="form-control" name="test"/></td> -->
                                </tr>
                                <?php $a++; ?>
                                <?php
                            }
                            // } 
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
    $_SESSION['req']=$_REQUEST;
    $stmt3=$con->prepare("CALL GET_ALL_TRANING_STUDENT_BY_COMPANY(:company_id);");
    $stmt3->bindParam(":company_id",$cid);  
    $stmt3->execute();
    $stmt3=$con->prepare("CALL GET_ALL_TRANING_STUDENT_BY_COMPANY(:company_id);");
    $stmt3->bindParam(":company_id",$cid);  
    $stmt3->execute();
    $missing=array();
    $cnt=0;
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
            $cnt=1;
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
    if ($cnt==1 && sizeof($missing) == 0) {
          header("Location: Package_entry.php");
    }
  }

  
?>