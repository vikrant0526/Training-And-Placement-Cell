<?php 
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $sid = $data["STUDENT_ID"];
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
                    <form  action="#" method="post" enctype="multipart/form-data">
                        <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;">
                                                <img src="Profile_pic/<?php echo $data['STUDENT_PROFILE_PIC']; ?>" onclick="triggerClick()" id="profileDisplay"  style="display: block;margin: -5px auto;" class="w-100 h-100">
                                                <input type="file" class="form-control" name="student_pic" placeholder="Company L
                                                    ogo" name="profileImage" id="profileImage" onchange="displayImage(this)" accept="image/*" style="display: none;" value="<?php echo $date['STUDENT_PROFILE_PIC'] ?>" required>
                                            </div>
                         <input type="submit" name="submit" class="finish btn"
                                                style="background:#84BA3F;color: white;" value="Finish" />
                    </form>
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
    </script>

<?php 

	if(isset($_REQUEST['submit']))
	{
        
        $imgname = $_FILES["student_pic"]["name"];
        $tmpname = $_FILES["student_pic"]["tmp_name"];
        
        move_uploaded_file($tmpname, "Profile_pic/$imgname");

         $stmt=$con->prepare("CALL UPDATE_STUDENT_PROFILE_PIC(:ppic,:sid)");
         $stmt->bindParam(":ppic",$imgname);
		 $stmt->bindParam(":sid",$sid);
         $stmt->execute();
         header('Refresh:0');
	}

 ?>
<?php 
  include('footer.php');
  ob_flush();
?>      