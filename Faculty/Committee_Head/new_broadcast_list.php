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
             <h4 class="card-title">New Broadcast List</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="ilname" class="form-control" placeholder="List Name" autofocus>
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

          $ilname = $_REQUEST["ilname"];
         
          $gb = $_SESSION['lid'];

          include('../../Files/PDO/dbcon.php');

          $stmt=$con->prepare("CALL INSERT_BROADCAST_LIST(:ilname, :gb);");
          $stmt->bindParam(":ilname",$ilname);
          $stmt->bindParam(":gb",$gb);
          $stmt->execute();
          // print_r( $stmt->errorinfo());
          if ($stmt) {
            echo "<script>alert('Event Successfully Created!')</script>";
          }
          else {
            echo "<script>alert('Looks Like Someting Went Worng!!!')</script>";
          }
          header("Location: broadcast_list.php");
      }
  }
  ob_flush();
?>

