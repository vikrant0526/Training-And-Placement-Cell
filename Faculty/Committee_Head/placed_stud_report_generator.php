<?php 
    include('../../Files/PDO/dbcon.php');

    $dept=$_GET['dept'];
    $degree=$_GET['degree'];
    $pyear=$_GET['pyear'];

    $stmt=$con->prepare("CALL BATCH_WISE_PLACEMENT_REPORT(:dept, :degree, :pyear);");
    $stmt->bindParam(":dept",$dept);
    $stmt->bindParam(":degree",$degree);
    $stmt->bindParam(":pyear",$pyear);
    $stmt->execute();
    $row=$stmt->rowcount();
    if($row>0){
    ?>
        <table class="table table-responsive">
        <tr>
            <td>Sr No.</td>
            <td>Enrollment No</td>
            <td>Student Name</td>
            <td>Company Name</td>
            <td>Stipend</td>
            <td>Salary Package</td>
        </tr>
    <?php
    $cnt=0;
    while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $cnt+=1;
        ?>
        <tr>
            <td><?php echo $cnt;?></td>
            <td><?php echo $data['STUDENT_ENROLLMENT_NUMBER'];?></td>
            <td><?php echo $data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME'];?></td>
            <td><?php echo $data['COMPANY_NAME'];?></td>
            <td><?php echo $data['TRAINING_OFFERED_STIPEND'];?></td>
            <td><?php echo $data['PLACEMENT_OFFERED_PACKAGE'];?></td>
        </tr>
        <?php
    }
}
?>
</table>
<?php
if ($row>0) {
        ?>
        <a href="place_stud.php?dept=<?php echo $dept;?>&degree=<?php echo $degree; ?>&pyear=<?php echo $pyear; ?>"><button type="button" class="btn btn-sm btn-outline-warning"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
        <?php
}
?>