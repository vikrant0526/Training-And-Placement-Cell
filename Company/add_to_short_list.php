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
                <select name="slist" id="slist" class="form-control">
                    <option>Select Shrotlist</option>
                    <?php 
                        $stmt=$con->prepare("CALL VIEW_SELECTION_LIST(:cid);");
                        $stmt->bindParam(":cid",$cid);  
                        $stmt->execute();
                        $a=1;
                        while($data  = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                     ?>
                     <option value="<?php echo $data["SELECTION_LIST_ID"]; ?>"><?php echo $data["SELECTION_LIST_NAME"]; ?></option>
                   <?php } ?>
                   </select>
                </form>
              </ul>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>	
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Submit" class="btn btn-outline-success">
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
