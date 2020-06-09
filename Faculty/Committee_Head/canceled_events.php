<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>
<!--=================================
 Main content -->

 <!--=================================
wrapper -->

  <?php
      include('../../Files/PDO/dbcon.php'); 
        $stmt=$con->prepare("CALL VIEW_FUTURE_CANCELED_EVENT();");
        $stmt->execute();
  ?>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100">
           <div class="card-body h-100">
             <h4 class="card-title">Canceled Events</h4>
             <!-- action group -->
            <ul class="list-unstyled d-xl-flex justify-content-center">
              <li>
                     <table class="table text-dark table-responsive">
                      <thead class="font-weight-bold">
                        <td>Name</td>
                        <td>Description</td>
                        <td>Venue</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Department</td>
                        <td>Degree</td>
                        <td class="text-nowrap">Passing Year</td>
                        <td>Type</td>
                        <td>Category</td>
                        <td>Restore</td>
                      </thead>
                      <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td><?php echo $data['EVENT_NAME']; ?></td>
                        <td><?php echo $data['EVENT_DESCRIPTION']; ?></td>
                        <td><?php echo $data['EVENT_VENUE']; ?></td>
                        <td class="text-nowrap"><?php echo $data['EVENT_DATE']; ?></td>
                        <td><?php echo $data['EVENT_TIME']; ?></td>
                        <td><?php echo $data['BATCH_DEPARTMENT']; ?></td>
                        <td><?php echo $data['BATCH_DEGREE']; ?></td>
                        <td><?php echo $data['BATCH_PASSING_YEAR']; ?></td>
                        <td><?php echo $data['EVENT_TYPE']; ?></td>
                        <td><?php if ($data['EVENT_CATEGORY']=="1") { echo "Mandatory"; }elseif ($data['EVENT_CATEGORY']=="0") { echo "Voluntary"; }  ?></td>
                         <td><a href="restore_event.php?eid=<?php echo $data['EVENT_ID']; ?>"><button class="btn btn-sm btn-outline-success"><i class="fas fa-trash-restore"></i></button></a></td>
                      </tr>
                     <?php }
                          $stmt=$con->prepare("CALL VIEW_PAST_CANCELED_EVENT();");
                          $stmt->execute();
                          while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <tr>
                        <td><?php echo $data['EVENT_NAME']; ?></td>
                        <td><?php echo $data['EVENT_DESCRIPTION']; ?></td>
                        <td><?php echo $data['EVENT_VENUE']; ?></td>
                        <td class="text-nowrap"><?php echo $data['EVENT_DATE']; ?></td>
                        <td><?php echo $data['EVENT_TIME']; ?></td>
                        <td><?php echo $data['BATCH_DEPARTMENT']; ?></td>
                        <td><?php echo $data['BATCH_DEGREE']; ?></td>
                        <td><?php echo $data['BATCH_PASSING_YEAR']; ?></td>
                        <td><?php echo $data['EVENT_TYPE']; ?></td>
                        <td><?php if ($data['EVENT_CATEGORY']=="1") { echo "Mandatory"; }elseif ($data['EVENT_CATEGORY']=="0") { echo "Voluntary"; }  ?></td>
                        <td>Expired</td>
                      </tr>
                      <?php } ?>
                     </table>
              </li>
            </ul>
           </div>
          </div>
        </div>
<?php 
  include('footer.php');
  ob_flush();
?>      
