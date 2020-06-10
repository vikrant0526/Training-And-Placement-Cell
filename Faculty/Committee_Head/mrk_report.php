<?php
	    include('../../Files/PDO/dbcon.php');	
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
    </tr>
    <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></td>
        <td><?php echo $data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME']; ?></td>
        <td><?php echo $data['MARKS_OBTAINED']; ?></td>
    </tr>
<?php } 
?>
    </table>
    <a href="marks_pdf_report.php?tid=<?php echo $tid;?>&dept=<?php echo $dept;?>&degree=<?php echo $degree;?>&pyear=<?php echo $pyear;?>"><button class="btn btn-outline-warning btn-block"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
<?php
}?>