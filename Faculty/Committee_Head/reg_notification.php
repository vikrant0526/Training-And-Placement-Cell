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
             <h4 class="card-title">New Registration</h4>
             <!-- action group -->
             <!-- <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div> -->
             <div class="scrollbar">
              <ul class="list-unstyled">
                <?php
                $count=0;
                include('../../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type='CH';
                $stmt=$con->prepare("CALL GET_REG_NOTIFICATION();");
                $stmt->execute();
                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  $id = $data['NOTIFICATION_SENDER_ID'];
                  $type = $data['NOTIFICATION_SENDER_TYPE'];
                  if($count==0)
                  {
                    $x=7;
                    $y='ST';
                    $stmt1=$con->prepare(" CALL GET_USERNAME(:id,:type);");
                    $stmt1->bindparam(":id",$x);
                    $stmt1->bindparam(":type",$y);
                    $stmt1->execute();
                    $uname=$stmt1->fetch(PDO::FETCH_ASSOC);
                    $count=1;
                    echo $uname;
                  }
                  $stmt1=$con->prepare(" CALL GET_USERNAME(:id,:type);");
                  $stmt1->bindparam(":id",$id);
                  $stmt1->bindparam(":type",$type);
                  $stmt1->execute();
                  $uname=$stmt1->fetch(PDO::FETCH_ASSOC); 
                ?>
                <li class="">
                  <div class="media">
                    <div class="media-body">
                       <h6 class="mt-0"><?php echo $uname['uname']; ?><small class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small></h6>
                       <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                       <a href="deny.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_SENDER_ID'];?>&type=<?php echo $data['NOTIFICATION_SENDER_TYPE']; ?>"><button class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i class="fa fa-times"></i> Deny</button></a>
                       <a href="apply.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_SENDER_ID'];?>&type=<?php echo $data['NOTIFICATION_SENDER_TYPE']; ?>"><button class="btn btn-sm btn-outline-success float-right mb-2"><i class="fa fa-check"></i> Allow</button></a></p>
                       <div>
                         <hr>
                       </div>
                    </div>
                  </div>
                </li>
                <?php
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
