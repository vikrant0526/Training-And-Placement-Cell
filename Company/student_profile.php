<?php 
  ob_start();
  $sid = $_GET["sid"];
  include('header.php');
  $datacompany=$_SESSION['Userdata'];
?>
   <?php
                $count=0;
                include('../Files/PDO/dbcon.php');
                // $id=$_SESSION['lid'];
                // $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                $stmt->bindparam(":sid",$sid);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                // print_r($datas);
              ?>
             
  <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $datacompany['COMPANY_NAME']; ?>! </h3>
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
                         <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;">
                                                <img src="../Student/Profile_pic/<?php echo $data['STUDENT_PROFILE_PIC']; ?>"  id="profileDisplay" style="display: block;margin: -5px auto;" class="w-100 h-100">
                                            </div>
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
             <h4 class="card-title">Profile Student View</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="POST">
              	  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data["STUDENT_FIRST_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data["STUDENT_LAST_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                   <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="enum" class="form-control" placeholder="Enrollment Number" value="<?php echo $data["STUDENT_ENROLLMENT_NUMBER"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="email" name="email" placeholder="Student Email" class="form-control" value="<?php echo $data["STUDENT_EMAIL"]; ?>" disabled>
                    </div>
                  </div>
                </li> 
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="pnum" class="form-control" placeholder="Phone number" value="<?php echo $data["STUDENT_PHONE_NUMBER"]; ?>" disabled>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<div class="input-group date" id="datepicker-top-left">
		                    <input name="sdob" class="form-control" type="text" placeholder="Date of Birth" value="<?php echo $data["STUDENT_DATE_OF_BIRTH"]; ?>" disabled>
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
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control"  checked value="M">
						<label class="col-2">Male</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control"  value="F">
						<label class="col-2">Female</label>
					</div>
					<?php }else{ ?>
					<div class="row m-3">
						<label class="col-2 text-light font-weight-bold">Gender :</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control"  value="M">
						<label class="col-2">Male</label>
						<input class="col-1 mt-1" type="radio" name="gender" class="form-control" checked value="F">
						<label class="col-2">Female</label>
					</div>
					<?php } ?>
                </li>  
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="pname" placeholder="Parent Name" class="form-control" value="<?php echo $data["STUDENT_PARENT_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="text" name="pnumber" placeholder="Parent Number" class="form-control" value="<?php echo $data["STUDENT_PARENT_PHONE_NUMBER"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="email" name="pemail" placeholder="Parent email" class="form-control" value="<?php echo $data["STUDENT_PARENT_EMAIL"]; ?>" disabled>
                    </div>
                  </div>
                </li>

                <!--This is for Profile Pic Update-->

                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="sabout" rows="3" disabled placeholder="Something about yourself........" class="form-control"><?php echo $data["STUDENT_ABOUT"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="saddress" rows="3" disabled placeholder="Address" class="form-control"><?php echo $data["STUDENT_ADDRESS"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>  
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<textarea name="saddress" rows="3" disabled placeholder="Address" class="form-control"><?php echo $data["STUDENT_ADDRESS"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <?php 
                        $stmt1=$con->prepare("CALL CHECK_STUDENT_RESUME(:sid)");
                        $stmt1->bindparam(":sid",$sid);
                        $stmt1->execute();
                        $stmt1=$con->prepare("CALL CHECK_STUDENT_RESUME(:sid)");
                        $stmt1->bindparam(":sid",$sid);
                        $stmt1->execute();
                        $x=$stmt1->fetch(PDO::FETCH_ASSOC);
                        $st=$x['st'];
                        if ($st == '1') {
                          $resume_name=$x['RESUME_DOCUMENT_NAME'];
                          ?>                         
                            <a href="../../Student/Resume_Document/<?php echo $resume_name; ?>" download><button class="btn btn-outline-warning" type="button"><i class="fa fa-download"></i>Resume</button></a>
                          <?php
                        }else{
                          ?>
                            Resume Not Uploaded
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                </li>  
              </form>
<script type="text/javascript" >  
        function course(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","degreebind.php?dept="+document.getElementById("dept").value,false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);  
            document.getElementById("degree").innerHTML=xmlhttp.responseText;
        }
    </script>

<?php 
  include('footer.php');
  ob_flush();
?>      