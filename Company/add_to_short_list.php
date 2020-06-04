<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
  <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white">Welcome Back, <?php echo $cname; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
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
             <?php
              if(isset($_SESSION["errorforstipend"])){
                 ?>
                   <h3 class="card-title"><?php echo $_SESSION["errorforstipend"]; ?></h3>
                 <?php 
              }else{
                ?>
                <h3 class="card-title"></h3>
              <?php 
              }
             ?>
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="Post" class="">
                  <?php
                        $stmt=$con->prepare("CALL VIEW_SELECTION_LIST(:cid);");
                        $stmt->bindParam(":cid",$cid);  
                        $stmt->execute();
                        $a=1; 
                  ?>
                    <select name="slist" id="slist" class="form-control">
                    <option>Select Shrotlist</option>
                    <?php 
                        while($data  = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                     ?>
                     <option value="<?php echo $data["SELECTION_LIST_ID"]; ?>"><?php echo $data["SELECTION_LIST_NAME"]; ?></option>
                   <?php } ?>
                   </select>
              </ul>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>	
                <div class="d-flex justify-content-center">
                    <input type="submit" name="submit" value="Submit" class="btn btn-outline-success">
                </div>
                </form>     
             </div>
            </div>
          </div>
        </div>

<?php 
  include('footer.php');
  ob_flush();
?>      

<?php 
	if(isset($_REQUEST["submit"])){
  
    $select_id = $_REQUEST["slist"];  
    $sid = $_GET["sid"];
    $stmt2=$con->prepare("CALL GET_RECOMMENDATION(:sid, :cid);");
    $stmt2->bindparam(':sid', $sid);
    $stmt2->bindparam(':cid', $cid);
    $stmt2->execute();
    $stmt2=$con->prepare("CALL GET_RECOMMENDATION(:sid, :cid);");
    $stmt2->bindparam(':sid', $sid);
    $stmt2->bindparam(':cid', $cid);
    $stmt2->execute();
    $company_data= $stmt2->fetch(PDO::FETCH_ASSOC); 
    $rid = $company_data["RECOMMENDATION_ID"];
    

    $stmt3=$con->prepare("CALL INSERT_SHORTLIST(:rid,:select_id,:studid);");
    $stmt3->bindparam(':rid', $rid);
    $stmt3->bindparam(':select_id', $select_id);
    $stmt3->bindparam(':studid', $sid);
    $stmt3->execute();
    $stmt3=$con->prepare("CALL INSERT_SHORTLIST(:rid,:select_id,:studid);");
    $stmt3->bindparam(':rid', $rid);
    $stmt3->bindparam(':select_id', $select_id);
    $stmt3->bindparam(':studid', $sid);
    $stmt3->execute();

    if($stmt3){
      echo "<script>alert('Recommendaed Student')</script>";
    }else{
      echo "<script>alert('Recommendaed Not Student')</script>";
    }
	}
?>

