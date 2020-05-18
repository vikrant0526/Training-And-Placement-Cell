<?php 
  include('footer.php');
  $cnt = 1;
  while ($data1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $msg = $_REQUEST['editor'];

    $msg = str_replace("@REP_NAME",$data1['COMPANY_HR_NAME'],$msg);
    $msg = str_replace("@CMPNY_NAME",$data1['COMPANY_NAME'],$msg);
    $msg = str_replace("@SENDER",$data['FACULTY_FIRST_NAME']." ".$data['FACULTY_LAST_NAME'],$msg);
    
    $email = $data1['COMPANY_EMAIL'];

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
        $mail->addAddress("$email");     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Verify Your Account(OTP)';
        $mail->Body    = $msg;
        if($mail->send())
        {
          ?>
            <script type="text/javascript">
              function send(){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","message_send.php?id=<?php echo $data1['COMPANY_ID']; ?>&cnt=<?php echo $cnt; ?>",false);
                xmlhttp.send(null);
                var i = <?php echo json_encode($cnt); ?>;
                var div_id = "sent_".concat(i);
                document.getElementById(div_id).innerHTML=xmlhttp.responseText;
              }
              send();
            </script>
          <?php
        }
        else
        {
           ?>
            <script type="text/javascript">
              function not_send(){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","message_not_send.php?id=<?php echo $data1['COMPANY_ID']; ?>&cnt=<?php echo $cnt; ?>",false);
                xmlhttp.send(null);
                var i = <?php echo json_encode($cnt); ?>;
                var div_id = "sent_".concat(i);
                document.getElementById(div_id).innerHTML=xmlhttp.responseText;
              }
              not_send();
            </script>
          <?php
        }
    } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $cnt += 1;
  }
?>