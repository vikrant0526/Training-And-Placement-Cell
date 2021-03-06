<?php 
  ob_start();
  include('header.php');
  $userdata=$_SESSION['Userdata'];
?>
<div class="content-wrapper header-info">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-15 text-white"> Welcome back, <?php echo $userdata['STUDENT_FIRST_NAME']; ?>! </h3>
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
                    <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
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
                  if ($data['NOTIFICATION_TYPE'] == 'MEVNT' || $data['NOTIFICATION_TYPE'] == 'AEVNT') {
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
                                    <h6 class="mt-0"><?php echo $uname['EVENT_NAME']; ?><small
                                            class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                    </h6>
                                    <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?><?php echo $uname['EVENT_CATEGORY']; ?>
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
                  }else{
                      ?>
                        <li class="">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><?php echo $uname['EVENT_NAME']; ?><small
                                            class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                    </h6>
                                    <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>
                                        <a href="deny.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i
                                                    class="fa fa-times"></i> Deny</button></a>
                                        <a href="allow.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&sid=<?php echo $data['NOTIFICATION_RECEIVER_ID'];?>&eid=<?php echo $uname['EVENT_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-success float-right mb-2"><i
                                                    class="fa fa-check"></i> Accept</button></a>

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
                  elseif ($data['NOTIFICATION_TYPE'] == 'TROF') {
                      $id = $data['NOTIFICATION_EVENT_ID'];
                      $studid=$data["NOTIFICATION_RECEIVER_ID"];
                      $stmt4=$con->prepare(" CALL GET_STUDENT_TRAINING_DATA(:selection_list_id,:stud_id);");
                      $stmt4->bindparam(":selection_list_id",$id);
                      $stmt4->bindparam(":stud_id",$studid);
                      $stmt4->execute();
                      $stmt4=$con->prepare(" CALL GET_STUDENT_TRAINING_DATA(:selection_list_id,:stud_id);");
                      $stmt4->bindparam(":selection_list_id",$id);
                      $stmt4->bindparam(":stud_id",$studid);
                      $stmt4->execute();
                      $companydata=$stmt4->fetch(PDO::FETCH_ASSOC);
                      $cmpny_name=$companydata["COMPANY_NAME"];
                    ?>
                        <li class="">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><?php echo $cmpny_name; ?><small
                                            class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                    </h6>
                                    <p><?php echo $data['NOTIFICATION_DESCRPTION']." Stipend:".$companydata["TRAINING_OFFERED_STIPEND"]; ?>
                                        <a href="deny_training.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&slid=<?php echo $id; ?>"><button
                                                class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i
                                                    class="fa fa-times"></i> Deny</button></a>
                                        <a href="accept_training.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>&slid=<?php echo $id; ?>"><button
                                                class="btn btn-sm btn-outline-success float-right mb-2"><i
                                                    class="fa fa-check"></i> Accept</button></a>
                                        <a href="Company_profile.php?cid=<?php echo $companydata['COMPANY_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-info float-right mb-2 mr-2"><i
                                                    class="fa fa-eye"></i> View</button></a></p>
                                    <div>
                                        <hr style="border-top: 1px solid #495057">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                  }
                  elseif ($data['NOTIFICATION_TYPE'] == 'PLOF') {
                    $studid=$data["NOTIFICATION_RECEIVER_ID"];
                    $stmt4=$con->prepare(" CALL CHECK_STUDENT_PLACEMENT_DATA(:stud_id)");
                    $stmt4->bindparam(":stud_id",$studid);
                    $stmt4->execute();
                    $stmt4=$con->prepare(" CALL CHECK_STUDENT_PLACEMENT_DATA(:stud_id)");
                    $stmt4->bindparam(":stud_id",$studid);
                    $stmt4->execute();
                    $companydata=$stmt4->fetch(PDO::FETCH_ASSOC);
                    // print_r($companydata);
                    $cmpny_name=$companydata["COMPANY_NAME"];
                    $stmt5=$con->prepare("CALL GET_STUDENT_PLACEMENT_DOCUMENTS(:sid)");
                    $stmt5->bindParam(":sid",$studid);     
                    $stmt5->execute();
                    $stmt5=$con->prepare("CALL GET_STUDENT_PLACEMENT_DOCUMENTS(:sid)");
                    $stmt5->bindParam(":sid",$studid);     
                    $stmt5->execute();
                    while ($document = $stmt5->fetch(PDO::FETCH_ASSOC)) {
                        if ($document['COMPANY_DOCUMENT_TYPE'] == 'OL') {
                            $ol=$document['COMPANY_DOCUMENT_NAME'];
                        }
                        elseif ($document['COMPANY_DOCUMENT_TYPE'] == 'BD') {
                            $bd=$document['COMPANY_DOCUMENT_NAME'];
                        }
                    }
                  ?>
                        <li class="">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><?php echo $cmpny_name; ?><small
                                            class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                    </h6>
                                    <p><?php echo $data['NOTIFICATION_DESCRPTION']." Package:".$companydata["PLACEMENT_OFFERED_PACKAGE"]; ?>
                                    <a href="accept_placement.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-success float-right ml-2"><i
                                                    class="fa fa-check"></i> Accept</button></a>
                                        <a href="deny_placement.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-danger float-right ml-2 mb-2"><i
                                                    class="fa fa-times"></i> Deny</button></a>
                                                    <a href="../Company/Document_offer_letter/<?php echo $ol; ?>" download><button class="btn btn-sm btn-outline-warning float-right mb-2 ml-2"><i class="fa fa-download"></i>Offer Letter</button></a>
                                                    <a href="../Company/Document_bond/<?php echo $bd; ?>" download><button class="btn btn-sm btn-outline-warning float-right mb-2 ml-2"><i class="fa fa-download"></i>Bond</button></a>     
                                        <a href="Company_profile.php?cid=<?php echo $companydata['COMPANY_ID']; ?>"><button type="button"
                                                class="btn btn-sm btn-outline-info float-right mb-2 mr-2"><i
                                                    class="fa fa-eye"></i> View</button></a></p>  
                                    <div>
                                        <hr style="border-top: 1px solid #495057">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                }
                elseif ($data['NOTIFICATION_TYPE'] == 'TRREG') {
                  ?>
                        <li class="">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0">Hey!!<small
                                            class="float-right"><?php echo $data['NOTIFICATION_TIME_STAMP']; ?></small>
                                    </h6>
                                    <p><?php echo $data['NOTIFICATION_DESCRPTION']; ?>

                                        <a href="remove_notification.php?nid=<?php echo $data['NOTIFICATION_ID']; ?>"><button
                                                class="btn btn-sm btn-outline-secondary float-right mb-2"><i
                                                    class="fa fa-times"></i> Remove</button></a></p>
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