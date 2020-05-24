<?php 
    if ($att==1) {
        if ($x==1) {
            ?>
<tr>
    <td>
        <label class="text-dark"><?php echo $data['STUDENT_ENROLLMENT_NUMBER']; ?></label>
    </td>
    <td class="d-flex justify-content-center">
        <input type="checkbox" name="<?php echo $data['student_id'];?>" checked>
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
        <input type="checkbox" name="<?php echo $data['student_id'];?>" checked>
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
        <input type="checkbox" name="<?php echo $data['student_id'];?>" checked>
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
        <input type="checkbox" name="<?php echo $data['student_id'];?>" checked>
    </td>
    <?php
         $x=1;
     }
    }
    else {
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