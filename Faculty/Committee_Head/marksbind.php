<?php
    include('../../Files/PDO/dbcon.php');
     $tid = $_GET['tid'];

    //$dept ="BMIIT";
     $stmt=$con->prepare("CALL  GET_TOTAL_MARKS(:tid)");
     $stmt->bindParam(":tid",$tid);
     $stmt->execute();
     $tMarks=$stmt->fetch(PDO::FETCH_ASSOC);
     $stmt=$con->prepare("CALL  GET_TEST_STUDENT(:tid)");
     $stmt->bindParam(":tid",$tid);
     $stmt->execute();
     ?>
     <table class="table table-responsive" style="background-color: #d3d3d3">
        <tr class="text-dark font-weight-bold">
            <td>Enrollment Number</td>
            <td>Marks Obtained</td>
            <td class="text-nowrap">Out of</td>
            <td>Enrollment Number</td>
            <td>Marks Obtained</td>
            <td class="text-nowrap">Out of</td>
            <td>Enrollment Number</td>
            <td>Marks Obtained</td>
            <td class="text-nowrap">Out of</td>
        </tr>
     <?php 
     $x=1;
     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($x==1) {
            ?>
         <tr>
             <td>
                <label class="text-dark text-nowrap"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td>
                <input class="form-control" type="number" max="<?php echo $tMarks['TEST_TOTAL_MARKS']; ?>" name="<?php echo $data['STUDENT_ID'] ?>" min="0">
            </td>
            <td>
                <label>/<?php echo $tMarks['TEST_TOTAL_MARKS']; ?></label>
            </td>
            <?php
            $x=2;
        }else if($x==2)
        {
         ?>
            <td>
                <label class="text-dark text-nowrap"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td>
                <input class="form-control" type="number" max="<?php echo $tMarks['TEST_TOTAL_MARKS']; ?>" name="<?php echo $data['STUDENT_ID'] ?>" min="0">
            </td>
            <td>
                <label>/<?php echo $tMarks['TEST_TOTAL_MARKS']; ?></label>
            </td>
         <?php
         $x=0;
        }
         else
        {
         ?>
            <td>
                <label class="text-dark text-nowrap"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td>
                <input class="form-control" type="number" max="<?php echo $tMarks['TEST_TOTAL_MARKS']; ?>" name="<?php echo $data['STUDENT_ID'] ?>" min="0">
            </td>
            <td>
                <label>/<?php echo $tMarks['TEST_TOTAL_MARKS']; ?></label>
            </td>
         </tr>
         <?php
         $x=1;
     }
     }
?>
        </table>