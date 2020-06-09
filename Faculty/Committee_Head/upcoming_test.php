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
        $stmt=$con->prepare("CALL GET_FUTURE_TEST();");
        $stmt->execute();
  ?>

    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100">
           <div class="card-body h-100">
             <h4 class="card-title">Upcoming Test</h4>
             <!-- action group -->
            <ul class="list-unstyled d-xl-flex justify-content-center">
              <li>
                     <table class="table text-dark table-responsive">
                      <thead class="font-weight-bold">
                        <td>Test Name</td>
                        <td>Event Name</td>
                        <td>Test Description</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Department</td>
                        <td>Degree</td>
                        <td class="text-nowrap">Passing Year</td>
                        <td>Total Marks</td>
                        <td>Passing Marks</td>
                      </thead>
                      <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td><?php echo $data['TEST_NAME']; ?></td>
                        <td class="text-nowrap"><?php echo $data['EVENT_NAME']; ?></td>
                        <td><?php echo $data['TEST_DESCRIPTION']; ?></td>
                        <td class="text-nowrap"><?php echo $data['EVENT_DATE']; ?></td>
                        <td><?php echo $data['EVENT_TIME']; ?></td>
                        <td><?php echo $data['BATCH_DEPARTMENT']; ?></td>
                        <td><?php echo $data['BATCH_DEGREE']; ?></td>
                        <td><?php echo $data['BATCH_PASSING_YEAR']; ?></td>
                        <td><?php echo $data['TEST_TOTAL_MARKS']; ?></td>
                        <td><?php echo $data['TEST_PASSING_MARKS']; ?></td>
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
