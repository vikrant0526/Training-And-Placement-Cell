<?php
     include('../../Files/PDO/dbcon.php');
     session_start();
     $eid = $_GET['eid'];
     $cid = $_GET['cid'];
     $stmt2=$con->prepare("CALL GET_APPLIED_STUDENT(:eid)");
     $stmt2->bindParam(":eid",$eid);     
     $stmt2->execute();
     $stmt2=$con->prepare("CALL GET_APPLIED_STUDENT(:eid)");
     $stmt2->bindParam(":eid",$eid);     
     $stmt2->execute();
    // $sid = $_SESSION["selection_list_id"];
     ?>
<ul class="list-unstyled d-flex justify-content-center">
    <li>
        <table class="table table-responsive">
            <tr class="text-light font-weight-bold">
                <td>Profile Pic</td>
                <td>En No.</td>
                <td>Name</td>
                <td>Recommendation</td>
            </tr>
            <?php
       $cnt=0;
       $c=0;
        while ($data=$stmt2->fetch(PDO::FETCH_ASSOC)) {
                $studid=$data["STUDENT_ID"];     
                $stmt5=$con->prepare("CALL CHECK_STUDENT_TRAINING_ACCEPTED(:sid)");
                $stmt5->bindParam(":sid",$studid);
                $stmt5->execute();
                $stmt5=$con->prepare("CALL CHECK_STUDENT_TRAINING_ACCEPTED(:sid)");
                $stmt5->bindParam(":sid",$studid);
                $stmt5->execute();
                $tradata=$stmt5->fetch(PDO::FETCH_ASSOC);
                $st = $tradata["st"];    

                    if($st == 0){
                        ?>
                        <tr>
                            <td><img src="../../Student/Profile_pic/<?php echo $data["STUDENT_PROFILE_PIC"]; ?>"
                                    style="height: 120px;width: 120px;"></td>
                            <td><?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                            <td><?php echo $data["STUDENT_FIRST_NAME"]." ".$data["STUDENT_LAST_NAME"]; ?></td>
                            <td><a href="recommendation_confirmation.php?cid=<?php echo $cid; ?>$eid=<?php echo $eid; ?>&sid=<?php echo $data["STUDENT_ID"]; ?>"><button class="btn btn-sm btn-outline-warning" type="button"><i class="fa fa-paper-plane"></i> Recommend</button></a>
                        </tr>
                        <?php
                    }
                } 
           ?>
        </table>
    </li>
</ul>