<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
  <script>
    function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputChar(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[A-Za-z]/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputCharSpace(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/^[a-zA-Z ]*$/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputCharAndNumSpace(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/^[a-zA-Z0-9 ]*$/.test(ch))) {
            evt.preventDefault();
        }

    }
  
  </script>
    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">New Batch</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
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
                      <select name="degree" class="form-control p-1 pl-3" id="degree">
                            <option>Select Degree</option>
                        </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="pyear" maxlength="4" id="mobile" onkeyup="check(); return false;" onkeypress="isInputNumber(event)" class="form-control" placeholder="Passing Year" value="<?php echo date('Y');?>" required>
                      <span id="message"></span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="sem" maxlength="2" id="mobile1" onkeyup="checksem(); return false;" onkeypress="isInputNumber(event)" class="form-control" placeholder="No. of Semister" required>
                      <span id="message1"></span>
                    </div>
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

        function check()
        {
            var pass1 = document.getElementById('mobile');
            var message = document.getElementById('message');
            var badColor = "#84BA3F";
            if(mobile.value.length!=4){
                message.style.color = badColor;
                message.innerHTML = "required 4 digits, match requested format!"
            }    
            if(mobile.value.length==4){
                message.style.color = badColor;
                message.innerHTML = ""
            }
        }

        function checksem()
        {
            var pass1 = document.getElementById('mobile1');
            var message = document.getElementById('message1');
            var badColor = "#84BA3F";
            if(mobile1.value.length!=2 || mobile1.value.length!=1){
                message.style.color = badColor;
                message.innerHTML = "required 2 digits or 1 digits, match requested format!"
            }    
            if(mobile1.value.length==2 || mobile1.value.length==1){
                message.style.color = badColor;
                message.innerHTML = ""
            }
        }
        </script>

<?php 
  include('footer.php');
?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_REQUEST["Submit"])){
          $dept = $_REQUEST["dept"];
          $degree = $_REQUEST["degree"];

          if ($degree == 'BCA' || $degree == 'BSC(IT)') {
              $d2d=0;
              $type='BA';
          }elseif($degree == 'MCA' || $degree == 'MSC(IT)') {
            $d2d=0;
            $type='MA';
          }elseif($degree == 'IMCA' || $degree == 'IMSC(IT)') {
            $d2d=0;
            $type='IBM';
          }elseif($degree == 'BTECH(IT)'){
            $d2d=1;
            $type='BA';
          }elseif($degree == 'MTECH(IT)'){
            $d2d=1;
            $type='MA';
          }

          $pyear=$_REQUEST["pyear"];
          $nos=$_REQUEST["sem"];  

          include('../../Files/PDO/dbcon.php');

          $stmt2=$con->prepare("CALL INSERT_UPDATE_BATCH(:dept,:degree,:pyear,:sem,:d2d,:type)");
          $stmt2->bindParam(":dept",$dept);
          $stmt2->bindParam(":degree",$degree);
          $stmt2->bindParam(":pyear",$pyear);
          $stmt2->bindParam(":sem",$nos);
          $stmt2->bindParam(":d2d",$d2d);
          $stmt2->bindParam(":type",$type);
          $stmt2->execute();
        //   print_r( $stmt2->errorinfo());
          if ($stmt2) {
            echo "<script>alert('BATCH ADDED!')</script>";
          }
          else {
            echo "<script>alert('Looks Like Someting Went Worng!!!')</script>";
          }
         
      }
  }
  ob_flush();
?>

