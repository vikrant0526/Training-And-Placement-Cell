<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  session_start();
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>

<?php
    $sid = $_SESSION["checked_stud_id"];
    //echo "<script>alert('$sid')</script>";
    //$id = explode("",$sid);    
    // $size = sizeof($sid);
    // echo "<script>alert('$size')</script>";
    unset($_SESSION["checked_stud_id"]);
?>

<?php 
  include('footer.php');
?>      
