<?php 
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $sid = $data["STUDENT_ID"];
?>

    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Terminate Request</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <label>Type</label> 
                      <select name="type" class="form-control p-1 pl-3" id="cate">
                        <option>Select Why?</option>
                        <option value="ET">Entrepreneurship</option>
                        <option value="NP">No PLacement</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                    <div class="media">
                        <div class="media-body mb-2">
                           <label>Description</label> 
                            <textarea name="desc" id="" pleaceholder="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="submit" class="button button-border x-small" value="Submit" name="Submit">
                    </div>
                  </div>
                </li>
                </form>
              </ul>
             </div>
            </div>
          </div>
        </div>


<?php
    if(isset($_REQUEST["Submit"])){

      $type = $_REQUEST["type"]; 
      $des = $_REQUEST["desc"]; 

      $stmt5=$con->prepare("CALL GET_CH_DATA()");  
      $stmt5->execute();
      $facultydata=$stmt5->fetch(PDO::FETCH_ASSOC); 
      $chid = $facultydata["FACULTY_ID"];
      // print_r($stmt5->errorinfo());

      $stmt=$con->prepare("CALL TERMINATION_REQUEST(:sid,:type,:reason,:chid)");
      $stmt->bindParam(":sid",$sid);
      $stmt->bindParam(":type",$type);
      $stmt->bindParam(":reason",$des);
      $stmt->bindParam(":chid",$chid);
      $stmt->execute();
      $stmt=$con->prepare("CALL TERMINATION_REQUEST(:sid,:type,:reason,:chid)");
      $stmt->bindParam(":sid",$sid);
      $stmt->bindParam(":type",$type);
      $stmt->bindParam(":reason",$des);
      $stmt->bindParam(":chid",$chid);
      $stmt->execute();  
      // print_r($stmt->errorinfo());
      if($stmt == TRUE){
          echo "<script>alert('Your Termination Request Will be Send To Committee Head')</script>";
      }else{
        echo "<script>alert('Your Termination Request Will be Not Send')</script>";  
      }

    }   
 ?>

<?php 
  include('footer.php');
  ob_flush();
?>

