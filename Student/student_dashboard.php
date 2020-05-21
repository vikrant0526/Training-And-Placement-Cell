<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<!--=================================
 Main content -->
 <!--=================================
wrapper -->

    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $data['STUDENT_FIRST_NAME']; ?>! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            </div>
           </div>
          </div>
        </div>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Notifications</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
                <?php
                $count=0;
                include('../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_ALL_NOTIFICATION(:id,:type);");
                $stmt->bindparam(":id",$id);
                $stmt->bindparam(":type",$type);
                $stmt->execute();
                // print_r($stmt->errorinfo());
                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  $id = $data['NOTIFICATION_EVENT_ID'];
                  if($count==0)
                  {
                    $x=7;
                    $stmt1=$con->prepare(" CALL GET_EVENT(:id);");
                    $stmt1->bindparam(":id",$x);
                    $stmt1->execute();
                    $uname=$stmt1->fetch(PDO::FETCH_ASSOC);
                    $count=1;
                    echo $uname;
                  }
                  $stmt1=$con->prepare(" CALL GET_EVENT(:id);");
                  $stmt1->bindparam(":id",$id);
                  $stmt1->execute();
                  $uname=$stmt1->fetch(PDO::FETCH_ASSOC);
                  // print_r($stmt1->errorInfo());
                  if ($uname["EVENT_CATEGORY"] == "1") {   
                      ?>
                      <li class="">
                        <div class="media">
                          <div class="media-body">
                             <h6 class="mt-0"><?php echo $uname['EVENT_NAME']; ?><small class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small></h6>
                             <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?><?php echo $uname['EVENT_CATEGORY']; ?>
                             <a href="remove_notification.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button class="btn btn-sm btn-outline-warning float-right ml-2 mb-2"><i class="fa fa-times"></i> Remove</button></a>
                             </p>
                             <div>
                               <hr style="border-top: 1px solid #495057">
                             </div>
                          </div>
                        </div>
                      </li>
                      <?php
                 }else{
                    ?>
                      <li class="">
                        <div class="media">
                          <div class="media-body">
                             <h6 class="mt-0"><?php echo $uname['EVENT_NAME']; ?><small class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small></h6>
                             <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                             <a href="deny.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i class="fa fa-times"></i> Deny</button></a>
                             <a href="allow.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_RECEIVER_ID'];?>&eid=<?php echo $uname['EVENT_ID']; ?>"><button class="btn btn-sm btn-outline-success float-right mb-2"><i class="fa fa-check"></i> Accept</button></a></p>
                             <div>
                               <hr style="border-top: 1px solid #495057">
                             </div>
                          </div>
                        </div>
                      </li>
                <?php
                 }
               }
                ?>
              </ul>
             </div>
            </div>
          </div>
        </div>
<?php 
  include('footer.php');
  ob_flush();
?>      


