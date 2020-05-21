<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  session_start();
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
  <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white">Welcome Back, <?php //echo $data['STUDENT_FIRST_NAME']; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
              </div>
            </div>
           </div>
          </div>
        </div>
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">SHOW SHORT LIST</h4>
             <div class="scrollbar">
              <ul class="list-unstyled d-xl-flex justify-content-center">
              <form action="#" method="Post" class="">
               	<table class="table text-light table-responsive">
                      <thead class="font-weight-bold">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Year</td>
                        <td>View</td>
                        <td>Add Stipend</td>
                        <td>Add</td>
                        <td>Delete</td>
                        <td>Send</td>
                      </thead>
               		
                    <?php 
                        $stmt=$con->prepare("CALL VIEW_SELECTION_LIST(:cid);");
                        $stmt->bindParam(":cid",$cid);  
                        $stmt->execute();
                        $a=1;
                        while($data  = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                     ?> <tr>
                          <td><?php echo $a; ?></td>
                     			<td><?php echo $data["SELECTION_LIST_NAME"]; ?></td>
                     			<td><?php echo $data["SELECTION_LIST_YEAR"]; ?></td>
                          <td><a href="view_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></button></a> </td>
                          <td><a href="STIPEND_entry.php?sid=<?php echo $data["SELECTION_LIST_ID"];?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-paper-plane"></i></button></a></td>
                          <td><a href="add_student_selection_list.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></button></a> </td>
                          <td><a href="delete_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a></td>
                          <td><a href="send_shortlist.php?sid=<?php echo $data["SELECTION_LIST_ID"]; ?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-paper-plane"></i></button></a></td>
                          </tr>
                          <?php $a++; ?>
                   <?php } ?>
               	</table>
                </form>
              </ul>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>	
                <div class="d-flex justify-content-center">
                    <a href="create_shortlist.php"><button class="btn btn-red col-12" type="button">Create Short List</button></a>
                </div>     
             </div>
            </div>
          </div>
        </div>

<?php 
  include('footer.php');
  ob_flush();
?>      

<?php 
	if(isset($_REQUEST["create"])){
		header("location: create_shortlist.php");
	}
?>
