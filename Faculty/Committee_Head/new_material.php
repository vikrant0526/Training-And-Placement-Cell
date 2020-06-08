<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $fid=$data["FACULTY_ID"];
  $ftype=$data["FACULTY_ROLE"];
?>

    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">New Material</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST" enctype="multipart/form-data">   
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="dept" class="form-control p-1 pl-3" id="dept" onchange="course()">
                            <option>Select Department</option>
                            <option value="BMIIT">BMIIT</option>
                            <option value="SRIMCA">SRIMCA</option>
                            <option value="CGPIT">CGPIT</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="degree" class="form-control p-1 pl-3" id="degree" onchange="passing_year()">
                            <option>Select Degree</option>
                        </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="title" class="form-control" placeholder="Material Title">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="doc_type" class="form-control p-1 pl-3">
                            <option>Select Type</option>
                            <option value="PL">Practical List</option>
                            <option value="RL">Referance Material</option>
                            <option value="SP">Sample Paper</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li class="mb-2">
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" accept="application/pdf" name="matrials[]" multiple required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file for Matrials</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="submit" class="button button-border x-small" value="Create" name="Submit">
                      <input type="reset" class="btn btn-lg btn-outline-danger float-right ml-2" value="RESET" name="">
                    </div>
                  </div>
                </li>
                </form>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <script type="text/javascript"> 
    function course(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","degreebind.php?dept="+document.getElementById("dept").value,false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);  
            document.getElementById("degree").innerHTML=xmlhttp.responseText;
        }
        </script>

<?php 
  include('footer.php');
?>

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_REQUEST["Submit"])){
        include('../../Files/PDO/dbcon.php');
            $filecount = count($_FILES["matrials"]["name"]);
            $dept = $_REQUEST["dept"];
            $degree = $_REQUEST["degree"];
            $doc_type = $_REQUEST["doc_type"];
            $doc_title = $_REQUEST["title"];
           for($i=0;$i<$filecount;$i++){
               $ran_num = mt_rand(100000,999999);
               $filename = $ran_num." ".$_FILES["matrials"]["name"][$i];
               move_uploaded_file($_FILES["matrials"]["tmp_name"][$i], "MATERIAL/$filename");
               $stmt=$con->prepare("CALL INSERT_MATERIAL(:dept,:degree,:up_id,:up_type,:doc_type,:doc_name,:doc_title);");
               $stmt->bindParam(":dept",$dept);
               $stmt->bindParam(":degree",$degree);
               $stmt->bindParam(":up_id",$fid);
               $stmt->bindParam(":up_type",$ftype);
               $stmt->bindParam(":doc_type",$doc_type);
               $stmt->bindParam(":doc_name",$filename);
               $stmt->bindParam(":doc_title",$doc_title);
               $stmt->execute(); 
           }    
            if ($stmt) {
            echo "<script>alert('All Document Save!')</script>";
          }
          else {
            echo "<script>alert('Looks Like Someting Went Worng!!!')</script>";
          }
         
      }
  }
  ob_flush();
?>

