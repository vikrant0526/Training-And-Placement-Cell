<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../../Files/PDO/dbcon.php');
  $stmt=$con->prepare("CALL  VIEW_COMPANY()");
  $stmt->execute();
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<div class="content-wrapper header-info">
    
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Fill Attendance</h4>
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
                    	<select name="pyear" class="form-control p-1 pl-3" id="pyear" onchange="test_bind()">
                            <option>Select Passing Year</option>
                  		</select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="test" class="form-control p-1 pl-3" id="tests" onchange="get_marks()">
                            <option>Select Test</option>
                  		</select>
                    </div>
                  </div>
                </li>
                <li class="d-xl-flex justify-content-center">
                    	<div id="marks"></div>
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
        function test_bind(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","testbind.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value+"&"+"pyear="+document.getElementById("pyear").value,false);
            xmlhttp.send(null);
            document.getElementById("tests").innerHTML=xmlhttp.responseText;
        }
        function get_marks(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","mrk_report.php?tid="+document.getElementById("tests").value+"&"+"dept="+document.getElementById("dept").value+"&"+
                              "degree="+document.getElementById("degree").value+"&"+"pyear="+document.getElementById("pyear").value,false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText);
            document.getElementById("marks").innerHTML=xmlhttp.responseText;
        }
        </script>

    <?php 
	include('footer.php');
    ob_flush();
    ?>