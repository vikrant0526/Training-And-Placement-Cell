<?php 
    include('../../Files/PDO/dbcon.php');	
    $dept=$_GET['dept'];
    $degree=$_GET['degree'];
    $stmt=$con->prepare("CALL VIEW_BATCH(:dept, :degree);");
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":degree", $degree);
    $stmt->execute();

?>
<table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
    <tr class="font-weight-bold">
        <td>Passing Year</td>
        <td>Semester</td>
        <td>Students</td>
    </tr>
    <?php while($x = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $stmt2=$con->prepare("CALL COUNT_BATCH_STUDENTS(:bid);");
        $stmt2->bindparam(":bid", $x['BATCH_ID']);
        $stmt2->execute();
        $stmt2=$con->prepare("CALL COUNT_BATCH_STUDENTS(:bid);");
        $stmt2->bindparam(":bid", $x['BATCH_ID']);
        $stmt2->execute();
        $a=$stmt2->fetch(PDO::FETCH_ASSOC);
        ?>
    <tr>
        <td><?php echo $x["BATCH_PASSING_YEAR"]; ?></td>
        <td><?php echo $x["BATCH_SEMESTER"]; ?></td>
        <td><?php echo $a["STUDENTS"]; ?></td>
    </tr>
    <?php } ?>
</table>