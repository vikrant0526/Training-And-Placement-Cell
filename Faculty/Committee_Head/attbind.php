<?php
    include('../../Files/PDO/dbcon.php');
     $eid = $_GET['eid'];

    //$dept ="BMIIT";
     $stmt=$con->prepare("CALL  GET_APPLIED_STUDENT(:eid)");
     $stmt->bindParam(":eid",$eid);
     $stmt->execute();
     ?>
     <table class="table table-responsive" style="background-color: #d3d3d3;">
        <tr class="text-dark font-weight-bold">
            <td>Enrollment Number</td>
            <td>Attendance</td>
            <td>Enrollment Number</td>
            <td>Attendance</td>
            <td>Enrollment Number</td>
            <td>Attendance</td>
            <td>Enrollment Number</td>
            <td>Attendance</td>
        </tr>
     <?php 
     $x=1;
     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($x==1) {
            ?>
         <tr>
             <td>
                <label class="text-dark"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td class="d-flex justify-content-center">
                <input type="checkbox" name="<?php echo $data['STUDENT_ID']; ?>">
            </td>
            <?php
            $x=2;
        }else if($x==2)
        {
         ?>
            <td>
                <label class="text-dark"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td class="d-flex justify-content-center">
                <input type="checkbox" name="<?php echo $data['STUDENT_ID']; ?>">
            </td>
         <?php
         $x=3;
        }
         elseif($x==3)
        {
         ?>
            <td>
                <label class="text-dark"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td class="d-flex justify-content-center">
                <input type="checkbox" name="<?php echo $data['STUDENT_ID']; ?>">
            </td>
         <?php
         $x=0;
        }else
        {
         ?>
            <td>
                <label class="text-dark"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
            </td>
             <td class="d-flex justify-content-center">
                <input type="checkbox" name="<?php echo $data['STUDENT_ID']; ?>">
            </td>
         <?php
         $x=1;
     }
     }
?>
        </table>
    