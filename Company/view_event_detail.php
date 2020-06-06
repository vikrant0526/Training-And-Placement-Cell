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
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Ohoo, <?php echo $data['COMPANY_NAME']; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">So it that time now.</span>
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
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Student List</h4>
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