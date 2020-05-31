<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>

<div class="content-wrapper header-info">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-15 text-white"> Hey, <?php echo $data['FACULTY_FIRST_NAME']; ?>! </h3>
                <span class="mb-10 mb-md-30 text-white d-block">These events have already happend.</span>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="btn-group info-drop header-info-button">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100">
            <div class="card-body h-100">
                <h4 class="card-title">Batch</h4>
                <!-- action group -->
                <ul class="list-unstyled">
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
                      <select name="degree" class="form-control p-1 pl-3" id="degree" onchange="get_batch()">
                            <option>Select Degree</option>
                        </select>
                    </div>
                  </div>
                </li>
                <li>
                    <div id="show" class="d-flex justify-content-center"></div> 
                </li>
                </ul>
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
        function get_batch(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","view_batch_bind.php?dept="+document.getElementById("dept").value+"&degree="+document.getElementById("degree").value,false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText); 
            document.getElementById("show").innerHTML=xmlhttp.responseText;
        }
        </script>
    <?php 
  include('footer.php');
  ob_flush();
?>