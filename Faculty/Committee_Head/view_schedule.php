<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];

  include('../../Files/PDO/dbcon.php'); 
  $stmt=$con->prepare("CALL GET_PLACMENT_SCHEDULE()");
  $stmt->execute();
?>
    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100">
           <div class="card-body h-100">
             <h4 class="card-title">Placment Schedule</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                  <a class="dropdown-item text-white" href="edit_schedule.php"><i class="text-info fa fa-edit"></i></a>
              </div>
            <ul class="list-unstyled d-xl-flex justify-content-center">
              <li>
               <table class="table table-responsive">
                 <tr>
                   <td></td>
                   <td>Company</td>
                   <td>Strat</td>
                   <td>End</td>
                 </tr>
                 <?php 
                  while ($x=$stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                    <td>
                      <div style="height: 35px;width: 35px;border-radius: 50%;">
                            <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO'] ?>" alt="avatar" style="height: 100%;width: 100%;">
                          </div>
                    </td>
                    <td><?php echo $x['COMPANY_NAME']; ?></td>
                    <td><?php echo $x['PLACEMENT_SCHEDULE_START_DATE']; ?></td>
                    <td><?php echo $x['PLACEMENT_SCHEDULE_END_DATE']; ?></td>
                  </tr>
                  <?php 
                  }
                  ?>
               </table>
               <td><a href="placement_schedule_download.php"><button class="btn btn-outline-warning"><i class="fa fa-download"></i>Download</button></a></td>   
              </li>
            </ul>
           </div>
          </div>
        </div>
<?php 
  include('footer.php');
  ob_flush();
?>      
