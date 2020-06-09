<?php
  ob_start();
  require '../mail/PHPMailer-master/includes/PHPMailer.php';
  require '../mail/PHPMailer-master/includes/SMTP.php';
  require '../mail/PHPMailer-master/includes/Exception.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  include('header.php');
  include('../Files/PDO/dbcon.php');
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];

  $stmt55=$con->prepare("CALL GET_COMPANY(:cid)"); 
  $stmt55->bindParam(":cid",$cid);  
  $stmt55->execute();   
  $stmt55=$con->prepare("CALL GET_COMPANY(:cid)"); 
  $stmt55->bindParam(":cid",$cid);  
  $stmt55->execute();
  $companydata  = $stmt55->fetch(PDO::FETCH_ASSOC);
  $company_name = $companydata["COMPANY_NAME"];
  $company_ryear = $companydata["COMPANY_REGISTERED_YEAR"];
  $company_address = $companydata["COMPANY_ADDRESS"];
  $compnay_email = $companydata["COMPANY_EMAIL"];

  $stmt8=$con->prepare("CALL GET_CH_DATA"); 
  $stmt8->execute();
  $stmt8=$con->prepare("CALL GET_CH_DATA"); 
  $stmt8->execute();
  $facultydata = $stmt8->fetch(PDO::FETCH_ASSOC);
  $email = $facultydata["FACULTY_EMAIL"];
  $faculty_id= $facultydata["FACULTY_ID"];


?>

<div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Student Package Enter</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <form action="#" method="POST">
                      <?php
                        $id_count=sizeof($_SESSION['req']);
                        $ids=$_SESSION['req'];
                        // print_r($ids);
                        $i=1;
                        foreach ($ids as $a) {
                          if ($i<$id_count) {
                            $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                            $stmt->bindParam(":sid",$a);
                            $stmt->execute();
                            $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                            $stmt->bindParam(":sid",$a);
                            $stmt->execute();
                            $x=$stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                              <div class="row">
                                <label for="" class="m-2 mt-3 col-2"><?php echo $x['STUDENT_ENROLLMENT_NUMBER']; ?></label>
                                <label for="" class="m-2 mt-3 col-2"><?php echo $x['STUDENT_FIRST_NAME']." ".$x['STUDENT_LAST_NAME']; ?></label>
                                <input type="text" name="<?php echo $x['STUDENT_ID']; ?>" class="col-6 m-2 form-control" required>
                              </div>
                            <?php 
                          }
                          $i++;
                        }
                      ?>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="submit" class="button button-border x-small" value="Submit" name="Submit">
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
    $id_count=sizeof($_SESSION['req']);
      $ids=$_SESSION['req'];
      // print_r($ids);
      $c=0;
      $i=1;
      foreach ($ids as $a) {
        if ($i<$id_count) {
          $pkg=$_REQUEST[$a];
          if($c==0){
            $stmt6=$con->prepare("CALL INSERT_UPDATE_PLACEMENT(:sid,:cid,:pkg)");
            $stmt6->bindParam(":sid",$a);
            $stmt6->bindParam(":cid",$cid);
            $stmt6->bindParam(":pkg",$pkg);
            $stmt6->execute();
            $c=1;
          }
          $stmt6=$con->prepare("CALL INSERT_UPDATE_PLACEMENT(:sid,:cid,:pkg)");
          $stmt6->bindParam(":sid",$a);
          $stmt6->bindParam(":cid",$cid);
          $stmt6->bindParam(":pkg",$pkg);
          $stmt6->execute();
          // print_r($stmt6->errorinfo());
        }
        $i++;
      }

    
      $sen_type="CP";
      $rec_type="CH";
      $type="CPL";
      $des="New Event: ".$company_name." Placement Offer";

      $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
      $stmt22->bindParam(":senderid",$cid);
      $stmt22->bindParam(":rec_id",$faculty_id);  
      $stmt22->bindParam(":sender_type",$sen_type);  
      $stmt22->bindParam(":rec_type",$rec_type);  
      $stmt22->bindParam(":type",$type);  
      $stmt22->bindParam(":des",$des);   
      $stmt22->execute();
      $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
      $stmt22->bindParam(":senderid",$cid);
      $stmt22->bindParam(":rec_id",$faculty_id);  
      $stmt22->bindParam(":sender_type",$sen_type);  
      $stmt22->bindParam(":rec_type",$rec_type);  
      $stmt22->bindParam(":type",$type);  
      $stmt22->bindParam(":des",$des);   
      $stmt22->execute();  
      
      
      try{
        $mail = new PHPMailer(); 
        $mail->isSMTP();                                       
        $mail->Host       = 'smtp.gmail.com';                  
        $mail->SMTPAuth   = true;                                 
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";                                 
        $mail->Username   = 'noreply324762@gmail.com';          
        $mail->Password   = '@yahoo.in';                     
        $mail->setFrom('noreply324762@gmail.com', 'UKA TARSADIA UNIVERSITY(T&P CELL)');
        $mail->addAddress("$email");    
        $mail->isHTML(true);                                  
        $mail->Subject = "Placement Offer $company_name";
        $msg=
                  "<h1><center>$company_name</center></h1><br>"
                  ."<h3><center>$compnay_email</center></h3><br>"
		               				."<h3><center>$company_address</center></h3><br>"
		               				."<br>"
		               				."<h3>There Are Selected Student List</h3><br>"
		               				."<table border=2>".
		               					"<tr>".
		               						"<td>Student Name</td>".
		               						"<td>Enrollment Number</td>".	
                              "<td>Package</td>". 
                             "</tr>";
                             $i=1;
                             foreach ($ids as $a) {
                              if ($i<$id_count) {
                                $stmt50=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                                $stmt50->bindParam(":sid",$a);
                                $stmt50->execute();
                                $stmt50=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                                $stmt50->bindParam(":sid",$a);
                                $stmt50->execute();
                                $x=$stmt50->fetch(PDO::FETCH_ASSOC);
                                $msg .=
                                "<tr>".
                                 "<td>".$x['STUDENT_FIRST_NAME']." ".$x['STUDENT_LAST_NAME']."</td>".
                                 "<td>".$x['STUDENT_ENROLLMENT_NUMBER']."</td>".
                                "<td>".$_REQUEST[$a]."</td>".
                                 "</tr>";
                              }
                              $i++;
                            }
                            $msg .= 
                           "</table>"; 
                           $mail->Body  = $msg;
                    if($mail->send())
                    {
                              header('Location: traning.php');
                    }
                    else
                    {
                              echo "<script>alert('Mail Not Send')</script>";  
                    }

              }catch(Exception $e){
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               }       

  }

?>
