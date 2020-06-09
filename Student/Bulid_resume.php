<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
   <div class="content-wrapper header-info">
        <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Resume Details</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="Post">
                 <h5 class="mb-3">Select Templete</h5>
                  <select class="form-control" name="resume">
                      <option value="Temp1">Templete1</option>
                      <option value="Temp2">Templete2</option>
                      <option value="Temp3">Templete3</option>
                      <option value="Temp4">Templete4</option>
                   </select>
                     <br>
                    <li>
                    <div class="d-flex justify-content-center">
                      <input type="submit" name="submit"  class="btn btn-lg btn-outline-success text-uppercase" value="submit">
                    </div>
                  </li>
              </form>
              </ul>
             </div>
            </div>
          </div>
        </div>
<?php 
  include('footer.php');
?> 

<?php 
  if(isset($_REQUEST['submit'])){
      include('../Files/PDO/dbcon.php');
      $tname = $_REQUEST['resume'];
      $bid = $data["STUDENT_BATCH_ID"];
      $sid = $data["STUDENT_ID"];
      $stmt=$con->prepare("CALL GET_BATCH_INFO(:bid);");
      $stmt->bindParam(":bid",$bid);  
      $stmt->execute();
      $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
      $degree = $datauser["BATCH_DEGREE"];
      $d2d = $datauser["BATCH_D2D"];
      $type = $datauser["BATCH_TYPE"]; 
      //echo "<script>alert('$type,$d2d,$degree')</script>"; 
      $stmt1=$con->prepare("CALL GET_STUDENT_DIP_12TH(:sid);");
      $stmt1->bindParam(":sid",$sid);  
      $stmt1->execute();
      $stmt1=$con->prepare("CALL GET_STUDENT_DIP_12TH(:sid);");
      $stmt1->bindParam(":sid",$sid);  
      $stmt1->execute();
      //print_r($stmt1->errorinfo());
      $data5 = $stmt1->fetch(PDO::FETCH_ASSOC);
      $dipid = $data5["ACADEMIC_DETAILS_DIPLOMA_ID"];
      $twid = $data5["ACADEMIC_DETAILS_12TH_ID"];

      if($tname == "Temp1"){
            if($d2d == 1){
                $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                $stmt5->bindParam(":sid",$sid);
                $stmt5->execute();
                $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                $stmt5->bindParam(":sid",$sid);
                $stmt5->execute();
                $data8 = $stmt5->fetch(PDO::FETCH_ASSOC);
                if($data8["aid"] == NULL){
                          header('Location: academic_details.php');
                }elseif($data8["rid"] == NULL){
                          header('Location: resume_details.php');
                }else{
                    if(isset($dipid)){
                        if($type=="BA"){
                          header('Location: Resume_templete/temp_D6B6.php');
                        }elseif ($type == "MA") {
                          header('Location: Resume_templete/temp_D6B6M4.php');
                        }
                    }elseif (isset($twid)) {
                        if($type=="BA"){
                          header('Location: Resume_templete/temp_B8.php');
                        }elseif ($type == "MA") {
                          header('Location: Resume_templete/temp_B8M4.php');
                        }
                    }
              }
             }elseif($d2d == 0){
                if($type == "BA"){
                  header('Location: Resume_templete/temp_B6.php');
                }elseif($type == "MA"){
                  header('Location: Resume_templete/temp_B6M4.php');
                }elseif($type == "IBM"){
                  header('Location: Resume_templete/temp_I10.php');
                }
             }         
      }


      if($tname == "Temp2"){
            if($d2d == 1){
                $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                $stmt5->bindParam(":sid",$sid);
                $stmt5->execute();
                $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                $stmt5->bindParam(":sid",$sid);
                $stmt5->execute();
                $data8 = $stmt5->fetch(PDO::FETCH_ASSOC);
                if($data8["aid"] == NULL){
                          header('Location: academic_details.php');
                }elseif($data8["rid"] == NULL){
                          header('Location: resume_details.php');
                }else{
                    if(isset($dipid)){
                        if($type=="BA"){
                          header('Location: Resume_templete_1/temp_D6B6.php');
                        }elseif ($type == "MA") {
                          header('Location: Resume_templete_1/temp_D6B6M4.php');
                        }
                    }elseif (isset($twid)) {
                        if($type=="BA"){
                          header('Location: Resume_templete_1/temp_B8.php');
                        }elseif ($type == "MA") {
                          header('Location: Resume_templete_1/temp_B8M4.php');
                        }
                    }
              }
             }elseif($d2d == 0){
                if($type == "BA"){
                  header('Location: Resume_templete_1/temp_B6.php');
                }elseif($type == "MA"){
                  header('Location: Resume_templete_1/temp_B6M4.php');
                }elseif($type == "IBM"){
                  header('Location: Resume_templete_1/temp_I10.php');
                }
             }         
      }

      ob_flush();
  }
 ?>