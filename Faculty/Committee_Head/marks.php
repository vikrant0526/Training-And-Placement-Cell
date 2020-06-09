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
             <h4 class="card-title">Fill Marks</h4>
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
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="submit" class="button button-border x-small" value="SUBMIT" name="Submit">
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
        function test_bind(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","testbind.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value+"&"+"pyear="+document.getElementById("pyear").value,false);
            xmlhttp.send(null);
            document.getElementById("tests").innerHTML=xmlhttp.responseText;
        }
        function get_marks(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","marksbind.php?tid="+document.getElementById("tests").value,false);
            xmlhttp.send(null);
            document.getElementById("marks").innerHTML=xmlhttp.responseText;
        }
        </script>

<?php 
	include('footer.php');
?>

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  	include('../../Files/PDO/dbcon.php');
      if(isset($_REQUEST["Submit"])){
      	$tid=$_REQUEST['test'];
      	$i=0;
      	foreach ($_REQUEST as $key => $value) {
      		if($i==sizeof($_REQUEST)-1)
      		{
      		}
      		else if($i>=4) {
      		$stmt=$con->prepare("CALL INSERT_MARKS(:tid,:sid,:obMarks)");
			    $stmt->bindParam(":tid",$tid);
			    $stmt->bindParam(":sid",$key);
			    $stmt->bindParam(":obMarks",$value);
			    $stmt->execute();
      		}
      		$i+=1;
      	}
      	if($stmt)
	    {
	    	echo "<script>alert('Marks Filled-Up Successfully')</script>";
	    }
	    else {
	    	echo "<script>alert('Something Went Worng')</script>";
	    }
      }
  }
  ob_flush();
?>