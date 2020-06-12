<?php 
    include('../../Files/PDO/dbcon.php');

    $year=$_GET['year'];

    $stmt=$con->prepare("CALL GET_COMPANY_FOR_REPORT(:year);");
    $stmt->bindParam(":year",$year);
    $stmt->execute();
    $row=$stmt->rowcount();
    if ($row>0) {
    ?>
    <table class="table table-responsive">
        <tr>
            <td>Sr.No.</td>
            <td>Company Name</td>
            <td>Student Count</td>
            <td>Stipend</td>
            <td>Package</td>
        </tr>
    <?php
    $cnt=0;
    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cid=$data['TRAINING_COMPANY_ID'];
        $cnt+=1;
        $stmt2=$con->prepare("CALL COMPANY_PLACEMENT_REPORT(:cid, :year);");
        $stmt2->bindParam(":cid",$cid);
        $stmt2->bindParam(":year",$year);
        $stmt2->execute();
        $stmt2=$con->prepare("CALL COMPANY_PLACEMENT_REPORT(:cid, :year);");
        $stmt2->bindParam(":cid",$cid);
        $stmt2->bindParam(":year",$year);
        $stmt2->execute();
        $data2=$stmt2->fetch(PDO::FETCH_ASSOC);
        $stmt3=$con->prepare("CALL COMPANY_PACKAGE_REPORT(:cid, :year);");
        $stmt3->bindParam(":cid",$cid);
        $stmt3->bindParam(":year",$year);
        $stmt3->execute();
        $stmt3=$con->prepare("CALL COMPANY_PACKAGE_REPORT(:cid, :year);");
        $stmt3->bindParam(":cid",$cid);
        $stmt3->bindParam(":year",$year);
        $stmt3->execute();
        $data3=$stmt3->fetch(PDO::FETCH_ASSOC);

    ?>
        <tr>
            <td><?php echo $cnt;?></td>
            <td><?php echo $data2['COMPANY_NAME']?></td>
            <td><?php echo $data2['STUDENT_COUNT']?></td>
            <td><?php echo $data2['OFFERED_STIPEND']?></td>
            <td><?php echo $data3['PACKAGE']?></td>
        </tr>
    <?php 
    }
}
    ?>
</table>
<?php 
    if ($row>0) {
        ?>
        <a href="place_stud_company.php?pyear=<?php echo $year; ?>"><button type="button" class="btn btn-sm btn-outline-warning"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
        <?php
    }
?>