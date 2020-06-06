<?php
     include('../Files/PDO/dbcon.php');
     session_start();
     $eid = $_GET['eid'];
     $stmt2=$con->prepare("CALL GET_APPLIED_PRESENT_STUDENT(:eid)");
     $stmt2->bindParam(":eid",$eid);     
     $stmt2->execute();
     $stmt2=$con->prepare("CALL GET_APPLIED_PRESENT_STUDENT(:eid)");
     $stmt2->bindParam(":eid",$eid);     
     $stmt2->execute();
     $sid = $_SESSION["selection_list_id"];
     ?>
<ul class="list-unstyled d-flex justify-content-center">
    <li>
        <table class="table table-responsive">
            <tr class="text-light font-weight-bold">
                <td></td>
                <td>Profile Pic</td>
                <td>En No.</td>
                <td>Name</td>
            </tr>
            <?php
       $cnt=0;
       $c=0;
        while ($data=$stmt2->fetch(PDO::FETCH_ASSOC)) {
            $studid=$data['STUDENT_ID'];
            $check = 0;
            $stmt3=$con->prepare("CALL GET_SHORTLISTED_STUDENT(:sid)");
            $stmt3->bindParam(":sid",$sid);
            $stmt3->execute();
            $stmt3=$con->prepare("CALL GET_SHORTLISTED_STUDENT(:sid)");  
            $stmt3->bindParam(":sid",$sid);   
            $stmt3->execute();

            while ($y=$stmt3->fetch(PDO::FETCH_ASSOC)) {
                $shortlit_studid=$y['SHORTLIST_STUDENT_ID'];
                if ($studid==$shortlit_studid) {
                    $check = 1;
                    break;
                }
            }
            if ($check==1) {
                ?>
            <tr>
                <td><input type="checkbox" id="stud_ins<?php echo $cnt; ?>" name="<?php echo $studid; ?>"
                        value="<?php echo $studid; ?>" checked="checked" onClick="get_click(this.id)"></td>
                <td><img src="../Student/Profile_pic/<?php echo $data["STUDENT_PROFILE_PIC"]; ?>"
                        style="height: 120px;width: 120px;"></td>
                <td><?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                <td><?php echo $data["STUDENT_FIRST_NAME"]." ".$data["STUDENT_LAST_NAME"]; ?></td>
            </tr>
            <?php
                $cnt+=1; 
            }
            else
            {
                ?>
            <tr>
                <td><input type="checkbox" id="ins_stud<?php echo $c; ?>" name="<?php echo $studid; ?>"
                        value="<?php echo $studid; ?>" onClick="ins_click(this.id)"></td>
                <td><img src="../Student/Profile_pic/<?php echo $data["STUDENT_PROFILE_PIC"]; ?>"
                        style="height: 120px;width: 120px;"></td>
                <td><?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?></td>
                <td><?php echo $data["STUDENT_FIRST_NAME"]." ".$data["STUDENT_LAST_NAME"]; ?></td>
            </tr>
            <?php
                $c+=1;
            }
        } 
           ?>
        </table>
    </li>
</ul>