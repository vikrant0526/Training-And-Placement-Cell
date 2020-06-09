<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $cid=$_GET["cid"];
  include('../../Files/PDO/dbcon.php');
?>

<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Placement Offers</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-center">
                            <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                                <tr class="font-weight-bold">
                                    <td></td>
                                </tr>
                                <?php
                                 $stmt2=$con->prepare("CALL GET_PLACMENT_STUDENTS(:cid)");
                                 $stmt2->bindParam(":cid",$cid);     
                                 $stmt2->execute(); 
                                 $stmt2=$con->prepare("CALL GET_PLACMENT_STUDENTS(:cid)");
                                 $stmt2->bindParam(":cid",$cid);     
                                 $stmt2->execute();
                                while($studdata=$stmt2->fetch(PDO::FETCH_ASSOC)) { 
                                 $st='0';
                                 $sid=$studdata['STUDENT_ID'];
                                 $stmt3=$con->prepare("CALL CHECK_STUDENT_PLACEMENT_NOTIFICATION(:sid)");
                                 $stmt3->bindParam(":sid",$sid);     
                                 $stmt3->execute();
                                 $stmt3=$con->prepare("CALL CHECK_STUDENT_PLACEMENT_NOTIFICATION(:sid)");
                                 $stmt3->bindParam(":sid",$sid);     
                                 $stmt3->execute();
                                 $x=$stmt3->fetch(PDO::FETCH_ASSOC);
                                 $st=$x['st'];
                                if ($st=='1') {
                                    $stmt4=$con->prepare("CALL GET_STUDENT_PLACEMENT_DOCUMENTS(:sid)");
                                    $stmt4->bindParam(":sid",$sid);     
                                    $stmt4->execute();
                                    $stmt4=$con->prepare("CALL GET_STUDENT_PLACEMENT_DOCUMENTS(:sid)");
                                    $stmt4->bindParam(":sid",$sid);     
                                    $stmt4->execute();
                                    while ($document = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                                        if ($document['COMPANY_DOCUMENT_TYPE'] == 'OL') {
                                            $ol=$document['COMPANY_DOCUMENT_NAME'];
                                        }
                                        elseif ($document['COMPANY_DOCUMENT_TYPE'] == 'BD') {
                                            $bd=$document['COMPANY_DOCUMENT_NAME'];
                                        }
                                    }
                                 ?>
                                <tr>
                                    <td><img src="../../Student/Profile_pic/<?php echo $studdata["STUDENT_PROFILE_PIC"]; ?>"
                                            style="height: 120px;width: 120px;"></td>
                                    <td><?php echo $studdata["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                                    <td><?php echo $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"]; ?>
                                    </td>
                                    <td><?php echo $studdata["PLACEMENT_OFFERED_PACKAGE"]; ?>
                                    </td>
                                    <td><a href="../../Company/Document_offer_letter/<?php echo $ol; ?>" download><button class="btn btn-outline-warning"><i class="fa fa-download"></i>Offer Letter</button></a></td>
                                    <td><a href="../../Company/Document_bond/<?php echo $bd; ?>" download><button class="btn btn-outline-warning"><i class="fa fa-download"></i>Bond</button></a></td>
                                    <td>
                                        <a href="student_profile.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>"><button
                                                type="button" class="btn btn-sm btn-outline-info"><i
                                                    class="fa fa-eye"></i></button></a>
                                    </td>
                                    <td>
                                        <a
                                            href="insert_student_placement_notification.php?sid=<?php echo $studdata["STUDENT_ID"]; ?>&cid=<?php echo $cid; ?>"><button
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