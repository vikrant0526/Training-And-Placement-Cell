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
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">New Event</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="ename"  maxlength="50" onkeypress="isInputCharAndNumSpace(event)" class="form-control" placeholder="Event Name" required autofocus>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <textarea name="edes" class="form-control" maxlength="255" rows="5" placeholder="Event Description" required></textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="evenue" maxlength="255" onkeypress="isInputCharSpace(event)" class="form-control" placeholder="Event Venue" required>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <div class="input-group date" id="datepicker-top-left">
                        <input name="edate" class="form-control" type="text" placeholder="Event Date">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="eventfor" class="form-control p-1 pl-3" id="eventfor" onchange="event_for()">
                            <option>Select Event For</option>
                            <option value="PRE">PRE-PLACEMENT</option>
                            <option value="IN">IN-PLACEMENT</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                        <div id="cmp_id"></div>
                    </div>
                  </div>
                </li>
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
                      <select name="pyear" class="form-control p-1 pl-3" id="pyear">
                            <option>Select Passing Year</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="time" name="etime" class="form-control" placeholder="Event Time" required>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="etype" class="form-control p-1 pl-3" id="type" >
                            <option value="-1">Select Event Type</option>
                            <option value="SM">Seminar</option>
                            <option value="TS">Test</option>
                            <option value="CM">Company Visit</option>
                            <option value="WS">Workshop</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <select name="ecat" class="form-control p-1 pl-3" id="cate">
                            <option value="-1">Select Event Category</option>
                            <option value="1">Mandatory</option>
                            <option value="0">Voluntary</option>
                      </select>
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
        function event_for()
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","company_id.php?eve="+document.getElementById("eventfor").value,false);
            xmlhttp.send(null);
            document.getElementById("cmp_id").innerHTML=xmlhttp.responseText;
        }
        </script>

<?php 
  include('footer.php');
?>

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_REQUEST["Submit"])){

          $ename = $_REQUEST["ename"];
          $edes = $_REQUEST["edes"];
          $evenue = $_REQUEST["evenue"];
          $edate = $_REQUEST["edate"];
          $fdate = strtotime($edate);
          $date = date('Y-m-d',$fdate);
          $dept = $_REQUEST["dept"];
          $degree = $_REQUEST["degree"];
          $pyear = $_REQUEST["pyear"];
          $etime = $_REQUEST["etime"];
          $etype = $_REQUEST["etype"];
          $ecat = $_REQUEST["ecat"];
          $eve = $_REQUEST['eventfor'];

          $gb = $_SESSION['lid'];
          $gtype=$_SESSION['lut'];

          if ($eve == "PRE") {
            $cid=0;
          }
          elseif ($eve == "IN") {
            $cid=$_REQUEST['cmp_id'];
          }

          include('../../Files/PDO/dbcon.php');

          $stmt=$con->prepare("CALL INSERT_EVENT(:gb,:ename,:edes,:evenue,:edate,:dept,:degree,:pyear,:etime,:etype,:ecate,:gtype,:cid);");
          $stmt->bindParam(":gb",$gb);
          $stmt->bindParam(":ename",$ename);
          $stmt->bindParam(":edes",$edes);
          $stmt->bindParam(":evenue",$evenue);
          $stmt->bindParam(":edate",$date);
          $stmt->bindParam(":dept",$dept);
          $stmt->bindParam(":degree",$degree);
          $stmt->bindParam(":pyear",$pyear);
          $stmt->bindParam(":etime",$etime);
          $stmt->bindParam(":etype",$etype);
          $stmt->bindParam(":ecate",$ecat);
          $stmt->bindParam(":gtype",$gtype);
          $stmt->bindParam(":cid",$cid);
          $stmt->execute();
          // print_r( $stmt->errorinfo());
          if ($stmt) {
            echo "<script>alert('Event Successfully Created!')</script>";
          }
          else {
            echo "<script>alert('Looks Like Someting Went Worng!!!')</script>";
          }
         
      }
  }
  ob_flush();
?>

