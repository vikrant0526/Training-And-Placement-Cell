<?php
    include('../../Files/PDO/dbcon.php');
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];
     $pyear = $_GET['pyear'];

    //$dept ="BMIIT";
   
     $stmt=$con->prepare("CALL GET_DEACTIVE_STUDENTS(:dept,:degree,:pyear)");
     $stmt->bindParam(':dept',$dept);
     $stmt->bindParam(':degree',$degree);
     $stmt->bindParam(':pyear',$pyear);
     $stmt->execute();
     ?>
<table class="table table-responsive text-dark">
    <tr class="font-weight-bold">
        <td></td>
        <td>Enrollment Number</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>About</td>
        <td></td>
        <td></td>
    </tr>
    <?php 
     while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
        <td>
            <div style="height: 35px;width: 35px;border-radius: 50%;">
                <img src="../../Student/Profile_pic/<?php echo $data['STUDENT_PROFILE_PIC'] ?>" alt="avatar"
                    style="height: 100%;width: 100%;">
            </div>
        </td>
        <td><?php echo $data['STUDENT_ENROLLMENT_NUMBER'] ?></td>
        <td class="text-nowrap"><?php echo $data['STUDENT_FIRST_NAME'] ?> <?php echo $data['STUDENT_LAST_NAME'] ?></td>
        <td><?php echo $data['STUDENT_EMAIL'] ?></td>
        <td><?php echo $data['STUDENT_PHONE_NUMBER'] ?></td>
        <td class="text-nowrap"><?php echo $data['STUDENT_ABOUT'] ?></td>
        <td>
            <a href="student_profile.php?sid=<?php echo $data['STUDENT_ID']; ?>" title="">
                <button class="btn btn-outline-info" type="button"><i class="fa fa-user-circle-o"></i></button>
            </a>
        </td>
        <td>
            <a href="restore_student.php?sid=<?php echo $data['STUDENT_ID']; ?>" title="">
                <button class="btn btn-outline-success" type="button"><i class="fas fa-trash-restore"></i></button>
            </a>
        </td>
    </tr>
    <?php 
    }
?>
</table>