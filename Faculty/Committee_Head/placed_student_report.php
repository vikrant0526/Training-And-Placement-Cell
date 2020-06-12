<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../../Files/PDO/dbcon.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<div class="content-wrapper header-info">
    
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Pleacement Recode</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <form action="#" method="POST">
                        <li>
                          <div class="media">
                            <div class="media-body mb-2">
                              <select name="pattern" class="form-control p-1 pl-3" id="pattern" onchange="pattern_set()" autofocus>
                                <option>Select Report Pattern</option>
                                <option value="C">Company Wise</option>
                                <option value="S">Student Wise</option>
                              </select>
                            </div>
                          </div>
                        </li>
                        <li>
                        <div id="pattern_selector"></div>
                        <div id="data_display"></div>
                        <li>
                        </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
	include('footer.php');
    ob_flush();
    ?>

<script type="text/javascript">	
function pattern_set(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","pattern_selector.php?pattern="+document.getElementById("pattern").value,false);
  xmlhttp.send(null); 
  document.getElementById("pattern_selector").innerHTML=xmlhttp.responseText;
}
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
function report_generate(){ 
  // alert('a');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","placed_stud_report_generator.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value+"&"+"pyear="+document.getElementById("pyear").value,false);
  xmlhttp.send(null);
  document.getElementById("data_display").innerHTML=xmlhttp.responseText;
}
function company_report(){
  // alert('a');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","placement_company_report.php?year="+document.getElementById("year").value,false);
  xmlhttp.send(null); 
  document.getElementById("data_display").innerHTML=xmlhttp.responseText;
}
</script>