<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<script>
    function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }

    }

    
    function isInputChar(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[A-Za-z]/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputCharSpace(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/^[a-zA-Z ]*$/.test(ch))) {
            evt.preventDefault();
        }

    }
    </script>
<div class="content-wrapper header-info">
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Profile Update</h4>
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
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
                    	<input type="text" name="fname" maxlength="20" class="form-control" onkeypress="isInputChar(event)" placeholder="First Name" value="<?php echo $data["FACULTY_FIRST_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="lname" maxlength="20" class="form-control" onkeypress="isInputChar(event)" placeholder="Last Name" value="<?php echo $data["FACULTY_LAST_NAME"]; ?>">
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
                    	<input type="email" name="email" maxlength="255" pattern=(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])  
                      placeholder="Faculty email" class="form-control" value="<?php echo $data["FACULTY_EMAIL"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <input type="text" name="num" maxlength="10" onkeypress="isInputNumber(event)" placeholder="Faculty Number" class="form-control" value="<?php echo $data["FACULTY_PHONE_NUMBER"]; ?>">
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

      $stmt5=$con->prepare("CALL GET_FACULTY(:fid)");
      $stmt5->bindparam(":fid",$fid);
      $stmt5->execute();
      $stmt5=$con->prepare("CALL GET_FACULTY(:fid)");
      $stmt5->bindparam(":fid",$fid);
      $stmt5->execute();
      $facultdata = $stmt5->fetch(PDO::FETCH_ASSOC);
      $_SESSION['Userdata'] = $facultdata;
    }
	}
  ?>
<?php 
  include('footer.php');
  ob_flush();
?>      
