<?php 
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
?>
  <div class="content-wrapper header-info">
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
                                                <img src="com_logo/<?php echo $data['COMPANY_LOGO']; ?>" onclick="triggerClick()" id="profileDisplay"  style="display: block;margin: -5px auto;" class="w-100 h-100">
                                                <input type="file" class="form-control" name="company_logo" placeholder="Company L
                                                    ogo" name="profileImage" id="profileImage" onchange="displayImage(this)" accept="image/*" style="display: none;" value="<?php echo $date['STUDENT_PROFILE_PIC'] ?>" required>
                                            </div>
                         <input type="submit" name="submit" class="finish btn"
                                                style="background:#84BA3F;color: white;" value="Upload Profile Pic" />
                    </form>
                    </div>
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
        
        $imgname = $_FILES["company_logo"]["name"];
        $tmpname = $_FILES["company_logo"]["tmp_name"];
        
        move_uploaded_file($tmpname, "com_logo/$imgname");

         $stmt=$con->prepare("CALL UPDATE_COMPANY_LOGO(:cid,:company_logo_nam)");
         $stmt->bindParam(":cid",$cid);
		     $stmt->bindParam(":company_logo_nam",$imgname);
         $stmt->execute();
         header('Refresh:0');

         $stmt5=$con->prepare("CALL GET_COMPANY(:cid);");
         $stmt5->bindparam(":cid",$cid);
         $stmt5->execute();
         $stmt5=$con->prepare("CALL GET_COMPANY(:cid);");
         $stmt5->bindparam(":cid",$cid);
         $stmt5->execute();
         $companydata = $stmt5->fetch(PDO::FETCH_ASSOC);
         $_SESSION['Userdata'] = $companydata;
	}
 ?>
<?php 
  include('footer.php');
  ob_flush();
?>      