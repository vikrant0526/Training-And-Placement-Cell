<?php
   ob_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $sid = $data["STUDENT_ID"];
   $sname= $data["STUDENT_FIRST_NAME"]." ".$data["STUDENT_LAST_NAME"];
   include('../Files/PDO/dbcon.php');
?>
<div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $sname; ?>! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            </div>
           </div>
          </div>
        </div>
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title"></h4>
             <!-- action group -->
             <form action="#" method="post" enctype="multipart/form-data">
             <div class="scrollbar">
              <ul class="list-unstyled">
			<li class="mb-2">
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="resume_document" accept="application/pdf" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file for Resume</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                </li>
                <br>
                <li>
                  <div class="d-flex justify-content-center">
                    <input type="submit" name="doc_save" value="SAVE"> 
                  </div>          
                </li>  
              </ul>
             </div>
            </div>
          </div>
        </div>
      </form>
<?php 
  include('footer.php');
?>      

<?php
    if(isset($_REQUEST['doc_save'])){
      $ran_num = mt_rand(100000,999999);
      $resume_document_name = $ran_num." ".$_FILES['resume_document']['name'];
      $resume_document_temp_name = $_FILES['resume_document']['tmp_name'];
      move_uploaded_file($resume_document_temp_name, "Resume_Document/$resume_document_name");
      $stmt=$con->prepare("CALL STUDENT_RESUME_UPLOAD(:studid,:resume_name)");
      $stmt->bindParam(":studid",$sid);     
      $stmt->bindParam(":resume_name",$resume_document_name);
      $stmt->execute(); 
      if($stmt == TRUE){
        echo "<script>alert('Resume Uploaded')</script>"; 
      }else{
         echo "<script>alert('Resume Not Uploaded')</script>"; 
      }
    }
 ?>
