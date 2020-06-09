<?php 
  ob_start();
  $fid = $_GET["fid"];
  include('header.php');
  $datahead=$_SESSION['Userdata'];
  $email = $datahead["FACULTY_EMAIL"];
  $headid = $datahead["FACULTY_ID"];  
?>
    
  <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Confirm Password</h4>
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
                    	<p class="text-white">Please NOTE if you continue you will lose your rights as COMMITTEE HEAD and your role will be set to COMMITTEE MEMBER.</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<input type="password" name="pass" class="form-control" placeholder="Confirm Your Password">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="submit" class="button button-border x-small" value="Create" name="Submit">
                      <input type="reset" class="btn btn-lg btn-outline-danger float-right ml-2" value="RESET" name="">
                    </div>
                  </div>
                </li>
              </form>        
<?php     
    if(isset($_REQUEST["Submit"])){
        $pass = $_REQUEST["pass"];

        include('../../Files/PDO/dbcon.php');    
        $stmt2=$con->prepare("CALL LOGIN_AUTHENTICATION(:uname,:pass)");
        $stmt2->bindParam(':uname',$email);
        $stmt2->bindParam(':pass',$pass);
        $stmt2->execute();
        // print_r($stmt2->errorinfo());

        $row =$stmt2->rowCount();

        if($row<1)
        {
            echo "<script>alert('Invalid Password!!')</script>"; 
        }
        else
        {   
            $frole="CH";
            $stmt=$con->prepare("CALL UPDATE_FACULTY_ROLE(:fid,:frole)");
            $stmt->bindparam(":fid",$fid);
            $stmt->bindparam(":frole",$frole);
            $stmt->execute();
            $stmt=$con->prepare("CALL UPDATE_FACULTY_ROLE(:fid,:frole)");
            $stmt->bindparam(":fid",$fid);
            $stmt->bindparam(":frole",$frole);
            $stmt->execute(); 


            $frolemember = "CM";
            $stmt1=$con->prepare("CALL UPDATE_FACULTY_ROLE(:fid,:frole)");
            $stmt1->bindparam(":fid",$headid);
            $stmt1->bindparam(":frole",$frolemember);
            $stmt1->execute();
            $stmt1=$con->prepare("CALL UPDATE_FACULTY_ROLE(:fid,:frole)");
            $stmt1->bindparam(":fid",$headid);
            $stmt1->bindparam(":frole",$frolemember);
            $stmt1->execute(); 

            header("location: ../../Login/logout.php");
        }

    }

?> 

<?php 
  include('footer.php');
  ob_flush();
?>

