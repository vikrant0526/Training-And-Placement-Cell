<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Profile Update</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
                <?php
                $count=0;
                include('../../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_FACULTY(:fid)");
                $stmt->bindparam(":fid",$id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
              <form action="#" method="POST">
              	  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data["FACULTY_FIRST_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data["FACULTY_LAST_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <?php $gender = $data["FACULTY_GENDER"]; ?>
                <li>
					<?php if($gender == 'M'){ ?>
					<div class="row m-3">
						<label class="col-2 text-light font-weight-bold text-nowrap">Gender :</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control" checked value="M">
						<label class="col-2">Male</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control" value="F">
						<label class="col-2">Female</label>
					</div>
					<?php }else{ ?>
					<div class="row m-3">
						<label class="col-2 text-light font-weight-bold">Gender :</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control" value="M">
						<label class="col-2">Male</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control" checked value="F">
						<label class="col-2">Female</label>
					</div>
					<?php } ?>
                </li>  


                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="email" name="email" placeholder="Faculty email" class="form-control" value="<?php echo $data["FACULTY_EMAIL"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <input type="text" name="num" placeholder="Faculty Number" class="form-control" value="<?php echo $data["FACULTY_PHONE_NUMBER"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="about" rows="3" placeholder="Something about yourself........" class="form-control"><?php echo $data["FACULTY_ABOUT"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>
                <li class="">
                        <div class="media">
                          <div class="media-body">
                          	<center>
	                             <input type="submit" name="Update" value="Update" class="btn btn-xs btn-outline-warning ml-2 mb-2">
                           		 <div>
	                               <hr style="border-top: 1px solid #495057">
	                             </div>
	                        </center>	     
                          </div>
                        </div>
                      </li>	  
      
              </form>


<?php 

	if(isset($_REQUEST['Update']))
	{
		$fid=$data["FACULTY_ID"]; 
		$fname=$_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    $gender=$_REQUEST["gender"];
    $email=$_REQUEST["email"];
		$pnum=$_REQUEST["num"];
		$about=$_REQUEST["about"];
    
    
    $faculty_email = $data["FACULTY_EMAIL"];
    $faculty_pnum = $data["FACULTY_PHONE_NUMBER"];


    $stmt=$con->prepare("CALL CHECK_USER(:email)");
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $rowsdata = $stmt->fetch(PDO::FETCH_ASSOC);
    $email_user="";
    if(isset($rowsdata)){
    $email_user = $rowsdata['LOGIN_USER_EMAIL'];
    }
   

    $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
    $stmt1->bindParam(':pnum',$pnum);
    $stmt1->execute();
    $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
    $stmt1->bindParam(':pnum',$pnum);
    $stmt1->execute();
    $rowsdata1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $phone_user="";
    if(isset($rowsdata1)){
    $phone_user = $rowsdata1['LOGIN_USER_PHONE_NUMBER'];
    }


    if($email_user == $email && $faculty_email != $email){
      echo "<script>alert('Email Exist')</script>";      
    }elseif($phone_user == $pnum && $faculty_pnum != $pnum){
      echo "<script>alert('Phone Number Exist')</script>";      
    }else{
      $stmt=$con->prepare("CALL UPDATE_FACULTY_PROFILE(:fid,:fname,:lname,:gender,:phn,:abt,:email)");
      $stmt->bindParam(":fid",$fid);
      $stmt->bindParam(":fname",$fname);
      $stmt->bindParam(":lname",$lname);
      $stmt->bindParam(":gender",$gender);
      $stmt->bindParam(":phn",$pnum);
      $stmt->bindParam(":abt",$about);
      $stmt->bindParam(":email",$email);
      $stmt->execute();
      header('Refresh:0');
    }
	}
  ?>


  
              
<?php 
  include('footer.php');
  ob_flush();
?>      
