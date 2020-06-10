<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../../Files/PDO/dbcon.php'); 
  $utype='CP';
  $stmt=$con->prepare("CALL GET_USERNAME(:cid, :utype)");
  $stmt->bindparam(':cid', $_GET['cid']);
  $stmt->bindparam(':utype', $utype);
  $stmt->execute();
  $company=$stmt->fetch(PDO::FETCH_ASSOC);
  $cname=$company['uname'];
  $utype='ST';
  $stmt2=$con->prepare("CALL GET_USERNAME(:sid, :utype)");
  $stmt2->bindparam(':sid', $_GET['sid']);
  $stmt2->bindparam(':utype', $utype);
  $stmt2->execute();
  $stmt2=$con->prepare("CALL GET_USERNAME(:sid, :utype)");
  $stmt2->bindparam(':sid', $_GET['sid']);
  $stmt2->bindparam(':utype', $utype);
  $stmt2->execute();
  $student=$stmt2->fetch(PDO::FETCH_ASSOC);
//   print_r($stmt2->errorinfo());
  $sname=$student['uname'];
?>
<!-- <script src="../../Files/ckeditor5/build/ckeditor.js"></script> -->
<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Confirm Your Recomendation</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <form action="#" method="POST">
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    Please provide proper description for your recomendation for <strong class="text-white"><?php echo $sname;?></strong> to <strong class="text-white"><?php echo $cname;?></strong>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <input type="submit" class="button button-border x-small" value="Submit" name="Submit">
                                    <input type="reset" class="btn btn-lg btn-outline-danger float-right ml-2" value="RESET" name="">
                                </div>
                            </div>
                        </li>
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
    if(isset($_REQUEST["Submit"])){
        $cid = $_GET['cid'];
        $sid = $_GET['sid'];
        $des = $_REQUEST["desc"];   

        $stmt3=$con->prepare("CALL INSERT_UPDATE_RECOMMENDATION(:sid,:cid,:des)");
        $stmt3->bindparam(':sid', $sid);
        $stmt3->bindparam(':cid', $cid);
        $stmt3->bindparam(':des', $des);
        $stmt3->execute();
        $stmt3=$con->prepare("CALL INSERT_UPDATE_RECOMMENDATION(:sid,:cid,:des)");
        $stmt3->bindparam(':sid', $sid);
        $stmt3->bindparam(':cid', $cid);
        $stmt3->bindparam(':des', $des);
        $stmt3->execute();

    if($stmt3){
       header("location: send_recommendation.php");
    }else{
        echo "<script>alert('Recommendation Not Student Completed')</script>";
    }
}
?>