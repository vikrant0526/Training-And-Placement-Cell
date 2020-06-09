<?php
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>
  <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title"></h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="Post">
                <h4 class="card-title">CRATE SHORT LIST</h4>
                <li>
                   <input type="text" name="shortlistname" class="form-control mt-2" placeholder="Enter Short List Name">
                </li>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" name="submit"  class="btn btn-lg btn-outline-success text-uppercase" value="submit">
                </div>     
                </form>
              </ul>
             </div>
            </div>
          </div>
        </div>

<?php 
  include('footer.php');
?>      


<?php 
   include('../Files/PDO/dbcon.php');
   if(isset($_REQUEST["submit"])){
      $shname = $_REQUEST["shortlistname"];

      $stmt1=$con->prepare("CALL GET_SELECTIONLIST_NAME(:cid);");
      $stmt1->bindParam(":cid",$cid);
      $stmt1->execute();
      $a=0;
      while($data = $stmt1->fetch(PDO::FETCH_ASSOC))
      {
        $slname = $data["SELECTION_LIST_NAME"];
        if($slname == $shname){
          $a=1;
          echo "<script>alert('This Name Selection List Created')</script>";
          break;
        }
      }  
        if($a == 0){
        //echo "<script>alert('This is Created')</script>";
        $stmt=$con->prepare("CALL INSERT_SELECTION_LIST(:cid,:sname);");
        $stmt->bindParam(":cid",$cid);
        $stmt->bindParam(":sname",$shname);  
        $stmt->execute();
        $stmt=$con->prepare("CALL INSERT_SELECTION_LIST(:cid,:sname);");
        $stmt->bindParam(":cid",$cid);
        $stmt->bindParam(":sname",$shname);  
        $stmt->execute();
        if($stmt == TRUE){
          header('Location: show_shortlist.php');
        }else{
          echo "<script>alert('Selection List Not Created')</script>";
        } 
      }
     } 
    ob_flush();
 ?>