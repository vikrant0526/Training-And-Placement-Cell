<?php 
  ob_start();
  include('header.php');
 
  $data=$_SESSION['Userdata'];
?>

	<?php
	    include('../../Files/PDO/dbcon.php');	
        $stmt=$con->prepare("CALL VIEW_BROADCAST_LISTS();");
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
             <h4 class="card-title">Invitation Lists</h4>
             <!-- action group -->
              <div class="btn-group info-drop">
                <a href="new_broadcast_list.php"><button class="btn btn-outline-info">New <i class="fas fa-plus"></i></button></a>
              </div>
	          <ul class="list-unstyled d-xl-flex justify-content-center">
	            <li>
               <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                <tr class="font-weight-bold">
                  <td>Invitation List</td>
                  <td>Created by</td>
                  <td>Date of Creation</td>
                  <td>View</td>
                  <td>Add</td>
                  <td>Delete</td>
                </tr>
                <?php while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $data['BROADCAST_LIST_NAME']; ?></td>
                  <td><?php echo $data['FACULTY_FIRST_NAME']." ".$data['FACULTY_LAST_NAME']; ?></td>
                  <td><?php echo $data['BROADCAST_LIST_DATE']; ?></td>
                  <td>
                    <a href="view_list.php?ilid=<?php echo $data['BROADCAST_LIST_ID'] ?>" title="">
                      <button type="button" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="add_company_list.php?ilid=<?php echo $data['BROADCAST_LIST_ID'] ?>" title="">
                      <button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="delete_list.php?ilid=<?php echo $data['BROADCAST_LIST_ID'] ?>" title="">
                      <button type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
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
