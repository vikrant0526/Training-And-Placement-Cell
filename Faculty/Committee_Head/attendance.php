<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
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
                                        <select name="dept" class="form-control p-1 pl-3" id="dept" onchange="course()"
                                            autofocus>
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
                                        <select name="degree" class="form-control p-1 pl-3" id="degree"
                                            onchange="passing_year()">
                                            <option>Select Degree</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <select name="pyear" class="form-control p-1 pl-3" id="pyear"
                                            onchange="all_event()">
                                            <option>Select Passing Year</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <select name="event" class="form-control p-1 pl-3" id="event"
                                            onchange="get_att()">
                                            <option>Select Event</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li class="d-xl-flex justify-content-center">
                                <div id="att"></div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <input type="submit" class="button button-border x-small" value="SUBMIT"
                                            name="Submit">
                                        <input type="reset" class="btn btn-lg btn-outline-danger float-right ml-2"
                                            value="RESET" name="">
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
    function course() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "degreebind.php?dept=" + document.getElementById("dept").value, false);
        xmlhttp.send(null);
        //alert(xmlhttp.responseText);  
        document.getElementById("degree").innerHTML = xmlhttp.responseText;
    }

    function passing_year() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "pyearbind.php?dept=" + document.getElementById("dept").value + "&" + "degree=" + document
            .getElementById("degree").value, false);
        xmlhttp.send(null);
        document.getElementById("pyear").innerHTML = xmlhttp.responseText;
    }

    function all_event() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "eventbind.php?dept=" + document.getElementById("dept").value + "&" + "degree=" + document
            .getElementById("degree").value + "&" + "pyear=" + document.getElementById("pyear").value, false);
        xmlhttp.send(null);
        document.getElementById("event").innerHTML = xmlhttp.responseText;
    }

    function get_att() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "attbind.php?eid=" + document.getElementById("event").value, false);
        xmlhttp.send(null);
        document.getElementById("att").innerHTML = xmlhttp.responseText;
    }
    </script>

    <?php 
	include('footer.php');
    ob_flush();
    ?>

    <?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  	include('../../Files/PDO/dbcon.php');
      if(isset($_REQUEST["Submit"])){
      	$eid=$_REQUEST['event'];
        $sid=0;
        $att=0;
        $fid=$_SESSION['lid'];
        $c=1;
      	$stmt=$con->prepare("CALL  GET_APPLIED_STUDENT(:eid)");
        $stmt->bindParam(":eid",$eid);
        $stmt->execute();
        while ($x=$stmt->fetch(PDO::FETCH_ASSOC)) {
          $sid=$x['STUDENT_ID'];
          if(isset($_REQUEST[$sid]))
          {
            $att=1;
          }
          else
          {
            $att=0;
          }
          if ($c==1) {
            $c=0;
            $st1=$con->prepare("CALL INSERT_UPDATE_ATTENDANCE(:eid,:sid,:fid,:att);");
            $st1->bindparam(":eid",$eid);
            $st1->bindparam(":sid",$sid);
            $st1->bindparam(":fid",$fid);
            $st1->bindparam(":att",$att);
            $st1->execute();
          }
          $st1=$con->prepare("CALL INSERT_UPDATE_ATTENDANCE(:eid,:sid,:fid,:att);");
          $st1->bindparam(":eid",$eid);
          $st1->bindparam(":sid",$sid);
          $st1->bindparam(":fid",$fid);
          $st1->bindparam(":att",$att);
          $st1->execute();
          // print_r($st1->errorinfo());
        }
      }
  }
?>


    <script type="text/javascript">
    function att_check_evnt(clicked) {
        if ($('#' + clicked).is(":checked")) {
            var val = $('#' + clicked).val();
            // alert("uncheck" + val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "insert_att.php?sid=" + val, false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText);
        } else {
            var val = $('#' + clicked).val();
            // alert(val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "delete_att.php?sid=" + val, false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText);
        }
    }


    function att_uncheck_evnt(clicked) {
        if ($('#' + clicked).is(":checked")) {
            var val = $('#' + clicked).val();
            // alert("check" + val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "insert_att.php?sid=" + val, false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);
        } else {
            var val = $('#' + clicked).val();
            // alert(val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "delete_att.php?sid=" + val, false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);
        }
    }
    </script>