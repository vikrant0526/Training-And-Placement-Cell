<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<!--=================================
 Main content -->

 <!--=================================
wrapper -->
    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $data['STUDENT_FIRST_NAME']; ?>! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            </div>
           </div>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="card">
            <div class="card-body">
              <div class="user-bg" style="background: url(../Files/assets/images/user-bg.jpg);">
                <div class="user-info">
                  <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <!-- <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;">
                                                <img src="Profile_pic/<?php echo $data['STUDENT_PROFILE_PIC']; ?>" onclick="triggerClick()" id="profileDisplay" style="display: block;margin: -5px auto;" class="w-100 h-100">
                                                <input type="file" class="form-control" placeholder="Company L
                                                    ogo" name="profileImage" id="profileImage" onchange="displayImage(this)" accept="image/*" style="display: none;" value="<?php echo $date['STUDENT_PROFILE_PIC'] ?>" required>
                                            </div> -->
                    </div>
                    <!-- <div class="col-lg-6 text-right align-self-center">
                        <button type="button" class="btn btn-sm btn-danger"><i class="ti-user pr-1"></i>Follow</button>
                        <button type="button" class="btn btn-sm btn-success"><i class="ti-email pr-1"></i>Message</button>
                    </div> -->
                  </div>              
                </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
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
                include('../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid);");
                $stmt->bindparam(":sid",$id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
              <form action="#" method="POST">
              	  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data["STUDENT_FIRST_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data["STUDENT_LAST_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                   <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="enum" class="form-control" placeholder="Enrollment Number" value="<?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="email" name="email" placeholder="Student Email" class="form-control" value="<?php echo $data["STUDENT_EMAIL"]; ?>">
                    </div>
                  </div>
                </li> 
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="pnum" class="form-control" placeholder="Phone number" value="<?php echo $data["STUDENT_PHONE_NUMBER"]; ?>">
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<div class="input-group date" id="datepicker-top-left">
		                    <input name="sdob" class="form-control" type="text" placeholder="Date of Birth" value="<?php echo $data["STUDENT_DATE_OF_BIRTH"]; ?>">
			                  <span class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </span>
              			</div>
                    </div>
                  </div>
                </li>  
                <?php $gender = $data["STUDENT_GENDER"]; ?>
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
                    	<input type="text" name="pname" placeholder="Parent Name" class="form-control" value="<?php echo $data["STUDENT_PARENT_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="pnumber" placeholder="Parent Number" class="form-control" value="<?php echo $data["STUDENT_PARENT_PHONE_NUMBER"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="email" name="pemail" placeholder="Parent email" class="form-control" value="<?php echo $data["STUDENT_PARENT_EMAIL"]; ?>">
                    </div>
                  </div>
                </li>

                <!--This is for Profile Pic Update-->

                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="sabout" rows="3" placeholder="Something about yourself........" class="form-control"><?php echo $data["STUDENT_ABOUT"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="saddress" rows="3" placeholder="Address" class="form-control"><?php echo $data["STUDENT_ADDRESS"]; ?>
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
<script type="text/javascript" >
        function triggerClick() {
            document.querySelector('#profileImage').click();
        }

        function displayImage(e) {
            if(e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src',e.target.result);

                }
                reader.readAsDataURL(e.files[0]);
            }
        }
        
        function course(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","degreebind.php?dept="+document.getElementById("dept").value,false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);  
            document.getElementById("degree").innerHTML=xmlhttp.responseText;
        }
    </script>

<?php 

	if(isset($_REQUEST['Update']))
	{
		$sid=$data["STUDENT_ID"]; 
		$fname=$_REQUEST["fname"];
		$lname=$_REQUEST["lname"];
		$enum=$_REQUEST["enum"];
		$dob=$_REQUEST["sdob"];
		$fdate=strtotime($dob);
		$fdob=date('Y-m-d',$fdate); 
		$gender=$_REQUEST["gender"];
		$pname=$_REQUEST["pname"];
		$about=$_REQUEST["sabout"];
		$address=$_REQUEST["saddress"];
		$pnum=$_REQUEST["pnum"];
		$email=$_REQUEST["email"];
		$ppnum=$_REQUEST["pnumber"];
		$pemail=$_REQUEST["pemail"];

		$stmt=$con->prepare("CALL UPDATE_STUDENT_PROFILE(:sid,:fname,:lname,:ennum,:dob,:gender,:pname,:about,:address,:pnum,:email,:ppnum,:pemail)");
		$stmt->bindParam(":sid",$sid);
		$stmt->bindParam(":fname",$fname);
		$stmt->bindParam(":lname",$lname);
		$stmt->bindParam(":ennum",$enum);
		$stmt->bindParam(":dob",$fdob);
		$stmt->bindParam(":gender",$gender);
		$stmt->bindParam(":pname",$pname);
		$stmt->bindParam(":about",$about);
		$stmt->bindParam(":address",$address);
		$stmt->bindParam(":pnum",$pnum);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":ppnum",$ppnum);
		$stmt->bindParam(":pemail",$pemail);
		$stmt->execute();
		header('Refresh:0');
	}

 ?>
<?php 
  include('footer.php');
  ob_flush();
?>      