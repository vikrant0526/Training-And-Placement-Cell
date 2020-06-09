<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $select_list_id=$_GET["sid"];
  $_SESSION["selection_list_id"]=$_GET["sid"];
  include('../../Files/PDO/dbcon.php');
?>

<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Shortlisted Students</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-center">
                            <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                                <tr class="font-weight-bold">
                                    <td></td>
                                </tr>
                                <?php
                            $stmt4=$con->prepare(" CALL GET_SHORTLISTED_STUDENT(:selection_list_id);");
                            $stmt4->bindparam(":selection_list_id",$select_list_id);
                            $stmt4->execute();
                             while($x = $stmt4->fetch(PDO::FETCH_ASSOC)) { 
                                //  print_r($x);
                                $studid=$x["SHORTLIST_STUDENT_ID"];
                                $stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
                                $stmt2->bindParam(":studid",$studid);     
                                $stmt2->execute(); 
                                $stmt2=$con->prepare("CALL GET_STUDENT_DETAILS(:studid)");
                                $stmt2->bindParam(":studid",$studid);     
                                $stmt2->execute(); 
                                $studdata=$stmt2->fetch(PDO::FETCH_ASSOC);
                                $stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:selection_list_id)");
                                $stmt3->bindParam(":studid",$studid);   
                                $stmt3->bindParam(":selection_list_id",$select_list_id);   
                                $stmt3->execute();
                                $stmt3=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:selection_list_id)");
                                $stmt3->bindParam(":studid",$studid);   
                                $stmt3->bindParam(":selection_list_id",$select_list_id);   
                                $stmt3->execute();
                                $stipentdata = $stmt3->fetch(PDO::FETCH_ASSOC);
                                $stmt5=$con->prepare("CALL CHECK_STUDENT_TRAINING_NOTIFICATION(:studid)");
                                $stmt5->bindParam(":studid",$studid);   
                                $stmt5->execute();
                                $stmt5=$con->prepare("CALL CHECK_STUDENT_TRAINING_NOTIFICATION(:studid)");
                                $stmt5->bindParam(":studid",$studid);   
                                $stmt5->execute();
                                $checkdata=$stmt5->fetch(PDO::FETCH_ASSOC);
                                $st = $checkdata["st"];
                                if ($st=='1') {
                                 ?>
                                <tr>
                                    <td><img src="../../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>"
                                            style="height: 120px;width: 120px;"></td>
                                    <td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                                    <td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?>
                                    </td>
                                    <td><?php echo $stipentdata["TRAINING_OFFERED_STIPEND"]; ?>
                                    </td>
                                    <td>
                                        <a href="student_profile.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button
                                                type="button" class="btn btn-sm btn-outline-info"><i
                                                    class="fa fa-eye"></i></button></a>
                                    </td>
                                    <td>
                                        <a
                                            href="insert_student_notification.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button
                                                type="button" class="btn btn-sm btn-outline-success"><i
                                                    class="fa fa-check"></i></button></a>
                                    </td>
                                </tr>
                                <?php 
                                }
                            } ?>
                            </table>
                        </li>
                        <li>
                            <!-- <div class="media">
                                <div class="media-body mb-2">
                                    <button class="button button-border x-small">
                                        <a
                                            href="insert_hole_selectlist_notification.php?sid=<?php echo $select_list_id; ?>">
                                            Publish
                                        </a>
                                    </button>
                                </div>
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
  ob_flush();
?>