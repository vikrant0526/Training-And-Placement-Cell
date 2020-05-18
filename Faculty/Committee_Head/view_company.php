<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>

	<?php
	    include('../../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL VIEW_COMPANY();");
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
                  <td></td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Phone Number</td>
                  <td>Contact Person(CP)</td>
                  <td>CP Email</td>
                  <td>CP Phone Number</td>
                  <td>Address</td>
                  <td>Website</td>
                  <td>Profile</td>
                  <td>Deactivate</td>
                </tr>
                <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td>
                          <div style="height: 35px;width: 35px;border-radius: 50%;">
                            <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO'] ?>" alt="avatar" style="height: 100%;width: 100%;">
                          </div>
                  </td>
                  <td><?php echo $data['COMPANY_NAME']; ?></td>
                  <td><?php echo $data['COMPANY_EMAIL']; ?></td>
                  <td><?php echo $data['COMPANY_PHONE_NUMBER_1']; ?></td>
                  <td><?php echo $data['COMPANY_HR_NAME']; ?></td>
                  <td><?php echo $data['COMPANY_HR_EMAIL']; ?></td>
                  <td><?php echo $data['COMPANY_PHONE_NUMBER_2']; ?></td>
                  <td><?php echo $data['COMPANY_ADDRESS']; ?></td>
                  <td><?php echo $data['COMPANY_WEBSITE']; ?></td>
                  <td>
                    <a href="company_profile.php?cid=<?php echo $data['COMPANY_ID'] ?>" title="">
                      <button type="button" class="btn btn-outline-info"><i class="fa fa-user-circle-o"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="company_deactivate.php?cid=<?php echo $data['COMPANY_ID'] ?>" title="">
                      <button type="button" class="btn btn-outline-danger"><i class="fas fa-user-slash"></i></button>
                    </a>
                  </td>
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
