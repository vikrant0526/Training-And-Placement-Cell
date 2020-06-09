<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $cid=$_SESSION['lid'];
  error_reporting(0);
?>

<?php
	    include('../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL VIEW_RECOMMENDATIONS(:cid);");
        $stmt->bindparam(':cid', $cid);
        $stmt->execute();
	?>

<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100">
            <div class="card-body h-100">
                <h4 class="card-title">Recommendation Student</h4>
                <!-- action group -->
                <ul class="list-unstyled">
                    <li>
                        <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                            <!-- <tr class="font-weight-bold">
                                <td></td>
                            </tr> -->
                            <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $stmt2=$con->prepare("CALL CHECK_STUDENT_IN_SHORTLIST(:sid, :cid);");
                                $stmt2->bindparam(':sid', $data["STUDENT_ID"]);
                                $stmt2->bindparam(':cid', $cid);
                                $stmt2->execute();
                                $stmt2=$con->prepare("CALL CHECK_STUDENT_IN_SHORTLIST(:sid, :cid);");
                                $stmt2->bindparam(':sid', $data["STUDENT_ID"]);
                                $stmt2->bindparam(':cid', $cid);
                                $stmt2->execute();
                                $x=$stmt2->fetch(PDO::FETCH_ASSOC);
                                $st=$x['st'];
                                // echo $st;
                                if ($st == '1') {
                                ?>
                            <tr>
                                    <td><img src="../Student/Profile_pic/<?php echo $data["STUDENT_PROFILE_PIC"]; ?>"
                                                style="height: 120px;width: 120px;"></td>
                                    <td><?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                                    <td><?php echo $data["STUDENT_FIRST_NAME"]." ".$data["STUDENT_LAST_NAME"]; ?></td>
                                    <td><a href="student_profile.php?sid=<?php echo $data["STUDENT_ID"]; ?>"><button class="btn btn-sm btn-outline-info" type="button"><i class="fa fa-eye"></i></button></a></td>
                                    <td><a href="add_to_short_list.php?sid=<?php echo $data["STUDENT_ID"]; ?>&cid=<?php echo $cid; ?>"><button class="btn btn-sm btn-outline-success" type="button"><i class="fa fa-plus"></i> Shortlist</button></a></td>
                            </tr>
                            <?php 
                            
                        }
                        } ?>
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