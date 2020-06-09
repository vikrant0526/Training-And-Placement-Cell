<?php
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back,  <?php echo $cname; ?>! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
                <!-- <button type="button" class="dropdown-toggle-split  button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add new <i class="ti-plus"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Add Project </a>
                  <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i>Add Task </a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-id-badge"></i>Add team </a> 
                  <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i>Leave app </a> 
                  <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>New Message</a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Edit Profile</a> 
                   
                  <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a> 
                </div> -->
              </div>
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
                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  if ($data['NOTIFICATION_TYPE']=='RECOM') {
                    $id=$data['NOTIFICATION_SENDER_ID'];
                    $utype=$data['NOTIFICATION_SENDER_TYPE'];
                    $stmt2=$con->prepare("CALL GET_USERNAME(:id, :utype);");
                    $stmt2->bindparam(":id",$id);
                    $stmt2->bindparam(":utype",$utype);
                    $stmt2->execute();
                    $stmt2=$con->prepare("CALL GET_USERNAME(:id, :utype);");
                    $stmt2->bindparam(":id",$id);
                    $stmt2->bindparam(":utype",$utype);
                    $stmt2->execute();
                    $x=$stmt2->fetch(PDO::FETCH_ASSOC);
                    $uname=$x['uname'];
                ?>
                <li class="">
                  <div class="media">
                    <div class="media-body">
                       <h6 class="mt-0"><?php echo $uname; ?><small class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small></h6>
                       <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                       <a href="remove_notification.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button class="btn btn-sm btn-outline-warning float-right ml-2 mb-2"><i class="fa fa-times"></i> Remove</button></a>
                       <a href="recommendations.php"><button class="btn btn-sm btn-outline-info float-right ml-2 mb-2"><i class="fa fa-eye"></i> View</button></a>
                       </p>
                       <div>
                         <hr style="border-top: 1px solid #495057">
                       </div>
                    </div>
                  </div>
                </li>
                <?php
                  }elseif ($data['NOTIFICATION_TYPE']=='MEVNT' || $data['NOTIFICATION_TYPE']=='AEVNT') {
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
                    ?>
                    <li class="">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="mt-0"><?php echo $uname['EVENT_NAME']; ?><small
                                        class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                </h6>
                                <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                                    <a href="remove_notification.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button
                                            class="btn btn-sm btn-outline-warning float-right ml-2 mb-2"><i
                                                class="fa fa-times"></i> Remove</button></a>
                                    <a href="view_event_detail.php?eid=<?php echo $data['NOTIFICATION_EVENT_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-info float-right ml-2 mb-2"><i
                                                    class="fa fa-eye"></i> View</button></a>          
                                </p>
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
