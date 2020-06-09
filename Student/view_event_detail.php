<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../Files/PDO/dbcon.php');	
  $eid = $_GET['eid'];
  $stmt=$con->prepare("CALL VIEW_EVENT_DETAILS(:eid);");
  $stmt->bindparam(":eid",$eid);
  $stmt->execute();
  $event=$stmt->fetch(PDO::FETCH_ASSOC);
//   print_r($event);
//   print_r($stmt->errorinfo());
?>

    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Event Details</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                        <h4><?php echo $event['EVENT_NAME']; ?><br><label class="float-right font-weight-light" style="font-size:14px;"><?php echo $event['EVENT_DATE']; ?><br><?php echo $event['EVENT_TIME']; ?></label></h4>
                        <p><h6 class="font-weight-light">Description: <?php echo $event['EVENT_DESCRIPTION']; ?></h6></p>
                        <p><h6 class="font-weight-light">Venue: <?php echo $event['EVENT_VENUE']; ?></h6></p>
                    </div>
                  </div>
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