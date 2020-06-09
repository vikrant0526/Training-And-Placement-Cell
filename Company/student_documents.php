<?php
   ob_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];
   include('../Files/PDO/dbcon.php');
   $selection_stud_list_id=$_GET["sid"];
?>
	<div class="content-wrapper header-info">
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Add Document</h4>
             <!-- action group -->
             <form action="#" method="post" enctype="multipart/form-data">
             <div class="scrollbar">
              <ul class="list-unstyled">
						    <li class="mb-2">
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="offer_letter" accept="application/pdf" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file for Offer Letter</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                </li>
                <li>
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="bond" accept="application/pdf" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file for Bond</label>
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
    // echo "<br>"; 
    // print_r($_FILES);
    // echo "<br>";
    if(isset($_REQUEST['doc_save'])){
      $ran_num = mt_rand(100000,999999);
      $offer_letter_name = $ran_num." ".$_FILES['offer_letter']['name'];
      $offer_letter_temp_name = $_FILES['offer_letter']['tmp_name'];
      $bond_name = $ran_num." ".$_FILES['bond']['name'];
      $bond_temp_name = $_FILES['bond']['tmp_name']; 
      //echo "<script>alert('$ran_num')</script>";
      $doc_type_ol="OL";
      $doc_type_b="BD";
      // $stmt1=$con->prepare("CALL GET_COMPANY_DOCUMENT(:studid)");
      // $stmt1->bindParam(":studid",$selection_stud_list_id);   
      // $stmt1->execute();   
      move_uploaded_file($offer_letter_temp_name, "Document_offer_letter/$offer_letter_name");
      move_uploaded_file($bond_temp_name, "Document_bond/$bond_name");
      $stmt=$con->prepare("CALL INSERT_UPDATE_COMPANY_DOCUMENT(:studid,:company_id,:doc_type,:doc_name)");
      $stmt->bindParam(":studid",$selection_stud_list_id);     
      $stmt->bindParam(":company_id",$cid);
      $stmt->bindParam(":doc_type",$doc_type_ol);     
      $stmt->bindParam(":doc_name",$offer_letter_name);          
      $stmt->execute(); 
      $stmt=$con->prepare("CALL INSERT_UPDATE_COMPANY_DOCUMENT(:studid,:company_id,:doc_type,:doc_name)");
      $stmt->bindParam(":studid",$selection_stud_list_id);     
      $stmt->bindParam(":company_id",$cid);
      $stmt->bindParam(":doc_type",$doc_type_b);     
      $stmt->bindParam(":doc_name",$bond_name);          
      $stmt->execute(); 
      if($stmt == TRUE){
        $_SESSION["message_document"]="Document Save";
        header("location: traning.php");
      }else{
         echo "<script>alert('Document Not Save')</script>"; 
      }
    }
 ?>
