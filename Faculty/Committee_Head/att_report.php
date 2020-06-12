<?php
    include('../../Files/PDO/dbcon.php');
     $cid=$_GET['cid'];
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];
     $pyear = $_GET['pyear'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_EVENT_BY_BATCH_AND_COMPANY(:cid, :dept, :degree, :pyear)");
     $stmt->bindParam(':cid',$cid);
     $stmt->bindParam(':dept',$dept);
     $stmt->bindParam(':degree',$degree);
     $stmt->bindParam(':pyear',$pyear);
     $stmt->execute();
     $cnt=0;
    	while($data = $stmt->fetch(PDO::FETCH_ASSOC))
    	{
            $eid=$data['EVENT_ID'];
            if ($eid==0) {
                $eid="";
            }
            $stmt2=$con->prepare("CALL GET_EVENT_ATTENDANCE(:eid)");
            $stmt2->bindParam('eid',$eid);
            $stmt2->execute();
            $stmt2=$con->prepare("CALL GET_EVENT_ATTENDANCE(:eid)");
            $stmt2->bindParam('eid',$eid);
            $stmt2->execute();
            $row =$stmt2->rowCount();
            if($row>0){
                $cnt=1;
            ?>
                <h4><?php echo $data['EVENT_NAME'];?></h4>
                <table class="table table-responsive">
                <tr>
                    <td>Sr.No</td>
                    <td>Enrollment Number</td>
                    <td>Student</td>
                    <td>Attendance</td>
                </tr>
            <?php
            $sr_cnt=0;
            while ($x = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $sr_cnt+=1;
                ?>
                    <tr>
                        <td><?php echo $sr_cnt;?></td>
                        <td><?php echo $x["STUDENT_ENROLLMENT_NUMBER"];?></td>
                        <td><?php echo $x['STUDENT_FIRST_NAME'];?> <?php echo $x['STUDENT_FIRST_NAME'];?></td>
                        <td>
                            <?php 
                                if ($x['ATTENDANCE']=='0') {
                                    echo "Absent";
                                }elseif ($x['ATTENDANCE']=='1') {
                                    echo "Present";
                                }
                            ?>
                        </td>
                    </tr>
                <?php
            }
            ?>
                </table>
            <?php
        }	
    }
if ($cnt==1) {
    ?>
<a href="attendance_pdf_report.php?cid=<?php echo $cid;?>&dept=<?php echo $dept;?>&degree=<?php echo $degree;?>&pyear=<?php echo $pyear;?>"><button type="button" class="btn btn-outline-warning btn-block"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
<?php
}
?>