<?php
        include('../../Files/PDO/dbcon.php');	
        $tid = $_GET['tid'];
        $dept = $_GET['dept'];
        $degree = $_GET['degree'];
        $pyear = $_GET['pyear'];
        $stmt=$con->prepare("CALL VIEW_TEST_MARKS(:tid);");
        $stmt->bindparam(":tid", $_GET['tid']);
        $stmt->execute();
        $row =$stmt->rowCount();
        if ($row>0) {
	?>
<table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
    <tr class="font-weight-bold">
        <td>Enrollment Number</td>
        <td>Name</td>
        <td>Marks Obtained</td>
        <td>Total Marks</td>
        <td>Result</td>
    </tr>
    <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <?php $tname = $data["TEST_NAME"];?> 
    <tr>
        <td><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></td>
        <td><?php echo $data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME']; ?></td>
        <td><?php echo $data['MARKS_OBTAINED']; ?></td>
        <td><?php echo $data['TEST_TOTAL_MARKS']; ?></td>
        <?php 
        if($data['MARKS_OBTAINED']  >= $data['TEST_PASSING_MARKS']){
            ?>
                <td><?php echo "Pass"; ?></td>
            <?php
        }
        else{
            ?>
                <td><?php echo "Fail"; ?></td>
            <?php
        }
        ?>
    </tr>
<?php } 
?>
    </table>
    <a href="marks_pdf_report.php?tid=<?php echo $tid;?>&dept=<?php echo $dept;?>&degree=<?php echo $degree;?>&pyear=<?php echo $pyear;?>&tname=<?php echo $tname; ?>"><button type="button" class="btn btn-outline-warning btn-block"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
<?php
}?>