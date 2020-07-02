<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];

  include('../../Files/PDO/dbcon.php'); 
  $stmt=$con->prepare("CALL GET_PLACMENT_SCHEDULE()");
  $stmt->execute();
  $rows=$stmt->rowCount();
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- <script src="jquery-2.1.4.js"></script> -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="http://cdn.jsdelivr.net/g/filesaver.js"></script>
<!-- <script lang="javascript" src="FileSaver.min.js"></script> -->
    <div class="content-wrapper header-info">
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
              <?php 
                if ($rows>0) {
              ?>
               <table class="table table-responsive" id="mytable">
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
               <div class=row>
                  <a href="placement_schedule_download.php" class=" col-6"><button class="btn btn-outline-warning btn-block"><i class="fa fa-download"></i> Download PDF</button></a>
                  <button id="button-a" class="btn btn-outline-warning col-5"><i class="fa fa-download"></i> Download Excel</button>
               </div>
               <?php } 
                  else {
                    ?>
                      No Schedule Available
                    <?php
                  }
               ?>
              </li>
            </ul>
           </div>
          </div>
        </div>
        <?php 
          $stmt=$con->prepare("CALL GET_PLACMENT_SCHEDULE()");
          $stmt->execute();
          $stmt=$con->prepare("CALL GET_PLACMENT_SCHEDULE()");
          $stmt->execute();
        ?>
        <table id="schedule_download" style="display:none;">
        <tr>
            <td colspan="3" class="font-weight-bold"><h3>Placement Schedule <?php echo date('Y')-1;?>-<?php echo date('Y');?></h3></td>
        </tr>
        <tr>
            <td>Company</td>
            <td>Strat</td>
            <td>End</td>
          </tr>
          <?php 
          while ($x=$stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <tr>
            <td><?php echo $x['COMPANY_NAME']; ?></td>
            <td><?php echo $x['PLACEMENT_SCHEDULE_START_DATE']; ?></td>
            <td><?php echo $x['PLACEMENT_SCHEDULE_END_DATE']; ?></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <script>
        var wb = XLSX.utils.table_to_book(document.getElementById('schedule_download'), {sheet:"Placement-Schedule"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
        function s2ab(s) {
          var buf = new ArrayBuffer(s.length);
          var view = new Uint8Array(buf);
          for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
          return buf;
        }
        $("#button-a").click(function(){
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'Placement-Schedule.xlsx');
        });
        </script>     

<?php 
  include('footer.php');
  ob_flush();
?>      
