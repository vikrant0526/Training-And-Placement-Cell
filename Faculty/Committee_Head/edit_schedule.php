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
            <ul class="list-unstyled">
            <form method="POST" action="#">
              <li>
               <table class="table table-responsive">
                 <tr>
                   <td></td>
                   <td>Company</td>
                   <td>Strat</td>
                   <td>End</td>
                 </tr>
                 <?php 
                 $count=0;
                  while ($x=$stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                    <td>
                      <div style="height: 35px;width: 35px;border-radius: 50%;">
                            <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO'] ?>" alt="avatar" style="height: 100%;width: 100%;">
                          </div>
                    </td>
                    <td><?php echo $x['COMPANY_NAME']; ?></td>
                    <td><?php echo $x['COMPANY_ID']; ?></td>
                    <td>
                        <div class="input-group date" id="datepicker-top-left">
                            <input type="hidden" name="company_id<?php echo $count; ?>" value="<?php echo $x['COMPANY_ID']; ?>">
                            <input name="sdate<?php echo $count; ?>" class="form-control" type="text" placeholder="Event Date" value="<?php echo $x['PLACEMENT_SCHEDULE_START_DATE']; ?>">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="input-group date" id="datepicker-top-left">
                            <input name="edate<?php echo $count; ?>" class="form-control" type="text" placeholder="Event Date" value="<?php echo $x['PLACEMENT_SCHEDULE_END_DATE']; ?>">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </td>
                  </tr>
                  <?php
                  $count+=1; 
                  }
                  ?>
               </table>
              </li>
                <li>
                    <div class="media">
                        <div class="media-body mb-2">
                            <input type="submit" name="submit" value="Submit"
                                class="button button-border x-small">
                        </div>
                    </div>
                </il>
                </from>
            </ul>
           </div>
          </div>
        </div>
<?php 
  include('footer.php');
?>      


<?php

    if(isset($_REQUEST["submit"]))
     {
         for($i=0;$i<$count;$i++){
            $sdate=$_REQUEST["sdate$i"];
            $edate=$_REQUEST["edate$i"];
            $cid=$_REQUEST["company_id$i"];

            $ts = strtotime($sdate);
            $sd = date('Y-m-d',$ts);    

            $ts1 = strtotime($edate);
            $ed = date('Y-m-d',$ts1);    

            $stmt2=$con->prepare("CALL INSERT_UPDATE_PLACEMENT_SCHEDULE(:cid,:sdate,:edate)");
            $stmt2->bindParam(":cid",$cid);
            $stmt2->bindParam(":sdate",$sd);
            $stmt2->bindParam(":edate",$ed);
            $stmt2->execute();    
            $stmt2=$con->prepare("CALL INSERT_UPDATE_PLACEMENT_SCHEDULE(:cid,:sdate,:edate)");
            $stmt2->bindParam(":cid",$cid);
            $stmt2->bindParam(":sdate",$sd);
            $stmt2->bindParam(":edate",$ed);
            $stmt2->execute();   
            header('Refresh:0'); 
         }

         if($stmt2){
             echo "<script>alert('Placement Schedule Updated')</script>";
         }else{
            echo "<script>alert('Placement Not Schedule Updated')</script>";
         }
     }             
     ob_flush();
?>