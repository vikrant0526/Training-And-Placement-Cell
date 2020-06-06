<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>

<?php
	    include('../../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL VIEW_TEST_MARKS(:tid);");
        $stmt->bindparam(":tid", $_GET['tid']);
        $stmt->execute();
	?>

<div class="content-wrapper header-info">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-15 text-white"> Hey, <?php echo $data['FACULTY_FIRST_NAME']; ?>! </h3>
                <span class="mb-10 mb-md-30 text-white d-block">These events have already happend.</span>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="btn-group info-drop header-info-button">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100">
            <div class="card-body h-100">
                <h4 class="card-title">Company</h4>
                <!-- action group -->
                <ul class="list-unstyled">
                    <li>
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
                            <?php } ?>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
  ob_flush();
?>