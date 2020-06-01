<?php 
	require '../../mail/PHPMailer-master/includes/PHPMailer.php';
	require '../../mail/PHPMailer-master/includes/SMTP.php';
	require '../../mail/PHPMailer-master/includes/Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	$cnt = $_GET['cnt'];
	$id = $_GET['id'];
	include('../../Files/PDO/dbcon.php'); 
	$x=$con->prepare("CALL GET_COMPANY(:id);");
	$x->bindparam(":id", $id);
	$x->execute();
	// print_r($x->errorinfo());
	$company = $x->fetch(PDO::FETCH_ASSOC);

	try {
        $mail = new PHPMailer();
    
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";                                 // Enable SMTP authentication
        $mail->Username   = 'noreply324762@gmail.com';                     // SMTP username
        $mail->Password   = '@yahoo.in';                               // SMTP password
        $mail->setFrom('noreply324762@gmail.com', 'UKA TARSADIA UNIVERSITY(T&P CELL)');
        $mail->addAddress($_COOKIE["email".$cnt]);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_COOKIE["subject".$cnt];
        $mail->Body    = $_COOKIE[$cnt];
        if($mail->send())
        {
        	?>
				<h5 class="text-white"><i class="fas fa-check text-success"></i> Mail successfully sent to <b style="font-size: 24px;"><?php echo $company['COMPANY_NAME']; ?></b>
				</h5>
				<div id="sent_<?php echo $cnt+1; ?>"></div>
        	<?php
    	}
        else
        {
        	?>
				<h5 class="text-white"><i class="fas fa-times text-danger"></i> Unable to send mail to <b style="font-size: 24px;"><?php echo $company['COMPANY_NAME']; ?></b>
				</h5>
				<div id="sent_<?php echo $cnt+1; ?>"></div>
        	<?php
        }
    } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
<!-- <p><?php echo $_COOKIE[$cnt]; ?></p>
<p><?php echo $_COOKIE["email".$cnt]; ?></p> -->