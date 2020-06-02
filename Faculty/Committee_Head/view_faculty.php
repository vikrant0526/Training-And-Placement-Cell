<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>
	<?php
	    include('../../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL VIEW_COMMITTEE_MEMBER();");
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
                <!-- <button type="button" class="dropdown-toggle-split  button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add new <i class="ti-plus"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Add Project </a>
                  <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i>Add Task </a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-id-badge"></i>Add team </a> 
                  <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i>Leave app </a> 
                  <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>New Message</a> 
                  <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Edit Profile</a> 
                  <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a> 
                  <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a> 
                </div> -->
              </div>
            </div>
           </div>
          </div>
        </div>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100">
           <div class="card-body h-100">
             <h4 class="card-title">Faculty List</h4>
             <!-- action group -->
	          <ul class="list-unstyled d-xl-flex justify-content-center">
	            <li>
                     <table class="table text-dark table-responsive">
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-dark font-weight-bold"><h4>Committee Members</h4></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr class="font-weight-bold">
                        <td></td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone Number</td>
                        <td>Gender</td>
                        <td>About</td>
                        <td>Profile</td>
                        <td>Deactvate</td>
                      </tr>
                      <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td>
                          <div style="height: 35px;width: 35px;border-radius: 50%;">
                            <img src="../img/<?php echo $data['FACULTY_PROFILE_PIC'] ?>" alt="avatar" style="height: 100%;width: 100%;">
                          </div>
                        </td>
                        <td><?php echo $data['FACULTY_FIRST_NAME']; ?> <?php echo $data['FACULTY_LAST_NAME']; ?></td>
                        <td class="text-nowrap"><?php echo $data['FACULTY_EMAIL']; ?></td>
                        <td><?php echo $data['FACULTY_PHONE_NUMBER']; ?></td>
                        <td><?php echo $data['FACULTY_GENDER']; ?></td>
                        <td><?php echo $data['FACULTY_ABOUT']; ?></td>
                        <td><a href="view_faculty_profile.php?fid=<?php echo $data['FACULTY_ID'] ?>" title="">
                          <button type="button" class="btn btn-outline-info"><i class="fa fa-user-circle-o"></i></button>
                        </a></td>
                        <td><a href="deactivate_profile.php?fid=<?php echo $data['FACULTY_ID'] ?>" title="">
                          <button type="button" class="btn btn-outline-danger"><i class="fas fa-user-slash"></i></button>
                        </a></td>
                      </tr>
                     <?php } ?>
                     </table>
              </li>
              
	          </ul>
            <ul class="list-unstyled d-xl-flex justify-content-center">
              <?php 
                $stmt=$con->prepare("CALL VIEW_FACULTY();");
                $stmt->execute();
                $stmt=$con->prepare("CALL VIEW_FACULTY();");
                $stmt->execute();
               ?>
              <li>
                     <table class="table text-dark table-responsive">
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-dark font-weight-bold"><h4>Faculty</h4></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr class="font-weight-bold">
                        <td></td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone Number</td>
                        <td>Gender</td>
                        <td>About</td>
                        <td>Profile</td>
                        <td>Deactivte</td>
                      </tr>
                      <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td>
                          <div style="height: 35px;width: 35px;border-radius: 50%;">
                            <img src="../img/<?php echo $data['FACULTY_PROFILE_PIC'] ?>" alt="avatar" style="height: 100%;width: 100%;">
                          </div>
                        </td>
                        <td><?php echo $data['FACULTY_FIRST_NAME']; ?> <?php echo $data['FACULTY_LAST_NAME']; ?></td>
                        <td class="text-nowrap"><?php echo $data['FACULTY_EMAIL']; ?></td>
                        <td><?php echo $data['FACULTY_PHONE_NUMBER']; ?></td>
                        <td><?php echo $data['FACULTY_GENDER']; ?></td>
                        <td><?php echo $data['FACULTY_ABOUT']; ?></td>
                        <td><a href="view_faculty_profile.php?fid=<?php echo $data['FACULTY_ID'] ?>" title="">
                          <button type="button" class="btn btn-outline-info"><i class="fa fa-user-circle-o"></i></button>
                        </a></td>
                          <td><a href="deactivate_profile.php?fid=<?php echo $data['FACULTY_ID'] ?>" title="">
                          <button type="button" class="btn btn-outline-danger"><i class="fas fa-user-slash"></i></button>
                        </a></td>
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
