<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>

    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">New Test</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
             	<form action="#" method="POST">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="dept" class="form-control p-1 pl-3" id="dept" onchange="course()" autofocus>
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
                    	<select name="pyear" class="form-control p-1 pl-3" id="pyear" onchange="event_bind()">
                            <option>Select Passing Year</option>
                  		</select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="event" class="form-control p-1 pl-3" id="event">
                            <option>Select Event</option>
                  		</select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="tname" class="form-control" placeholder="Test Name">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="tdes" class="form-control" rows="5" placeholder="Test Description"></textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="number" name="tmarks" class="form-control" placeholder="Total Marks" autofocus>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="number" name="pmarks" class="form-control" placeholder="Passing Marks">
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
        function passing_year(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","pyearbind.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value,false);
            xmlhttp.send(null);
            document.getElementById("pyear").innerHTML=xmlhttp.responseText;
        }
        function event_bind(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","test_eventbind.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value+"&"+"pyear="+document.getElementById("pyear").value,false);
            xmlhttp.send(null);
            document.getElementById("event").innerHTML=xmlhttp.responseText;
        }
        </script>

<?php 
	include('footer.php');
?>

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_REQUEST["Submit"])){

      	  $tname = $_REQUEST["tname"];
      	  $eid = $_REQUEST["event"];
          $tdes = $_REQUEST["tdes"];
          $tmarks = $_REQUEST["tmarks"];
          $pmarks = $_REQUEST["pmarks"];

          $gb = $_SESSION['lid'];
          $gtype=$_SESSION['lut'];

          include('../../Files/PDO/dbcon.php');

          $stmt=$con->prepare("CALL INSERT_TEST(:eid,:tname,:tdes,:tmarks,:pmarks);");
          $stmt->bindParam(":eid",$eid);
          $stmt->bindParam(":tname",$tname);
          $stmt->bindParam(":tdes",$tdes);
          $stmt->bindParam(":tmarks",$tmarks);
          $stmt->bindParam(":pmarks",$pmarks);
          $stmt->execute();
          
          if ($stmt) {
            echo "<script>alert('Test Successfully Created!')</script>";
          }
          else {
            echo "<script>alert('Looks Like Someting Went Worng!!!')</script>";
          }

          // print_r( $stmt->errorinfo());
      }
  }
  ob_flush();
?>