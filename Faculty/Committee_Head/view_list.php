<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
  $ilid=$_GET['ilid'];
?>

	<?php
	    include('../../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL GET_BORADCAST_LIST(:ilid);");
        $stmt->bindparam(":ilid", $ilid);
        $stmt->execute();
	?>
    <div class="content-wrapper header-info">
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
                  <td>Remove</td>
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
                    <a href="remove_from_list.php?mid=<?php echo $data['BROADCAST_LIST_MEMBER_ID'] ?>&ilid=<?php echo $ilid ?>" title="">
                      <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
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
