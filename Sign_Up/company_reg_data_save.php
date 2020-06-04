  <?php
  ob_start();
  session_start();
  require '../mail/PHPMailer-master/includes/PHPMailer.php';
  require '../mail/PHPMailer-master/includes/SMTP.php';
  require '../mail/PHPMailer-master/includes/Exception.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  error_reporting(0);
  if(isset($_REQUEST['Submit']))
  {
    $email=$_REQUEST['uname'];
    $pass=$_REQUEST['pass'];
    $rpass=$_REQUEST['rpass'];


    include('../Files/PDO/dbcon.php');
    $stmt=$con->prepare("CALL CHECK_USER(:pne)");
    $stmt->bindParam(':pne',$email);
    $stmt->execute();
    $rowsdata = $stmt->fetch(PDO::FETCH_ASSOC);
    $email_user="";
    if(isset($rowsdata)){
    $email_user = $rowsdata['LOGIN_USER_EMAIL'];
    }
    
    if($email_user == $email){
        echo "<script>alert('Email Exist');window.open('company_reg.php','_self');</script>";
    }
    elseif($pass != $rpass)
    {
        ?>
          <script>
            alert('Password AND Confirm Password are Not Same!!...')
            window.open('company_reg.php','_self');
          </script>
          <?php
    }
    else
    {
       $_SESSION['cpemail']=$email;
       $_SESSION['cppass']=$pass;
       $_SESSION['cprpass']=$rpass;
       $otp = mt_rand(100000,999999);
       $_SESSION['crotp']=$otp;        

       try{
               $mail = new PHPMailer(); 
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
               $mail->Subject = 'Verification Email Company Confirmation(OTP)';
               $mail->Body = '<html style="line-height: inherit;"><head style="line-height: inherit;">
  <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" style="line-height: inherit;">
  <meta name="viewport" content="width=device-width" style="line-height: inherit;">
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" style="line-height: inherit;">
  <!--<![endif]-->
  <title style="line-height: inherit;"></title>
  <!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" style="line-height: inherit;">
  <!--<![endif]-->
  
  
<style type="text/css" style="line-height: inherit;">
    body{
      margin:0;
      padding:0;
    }
    table,td,tr{
      vertical-align:top;
      border-collapse:collapse;
    }
    *{
      line-height:inherit;
    }
    a[x-apple-data-detectors=true]{
      color:inherit !important;
      text-decoration:none !important;
    }
  @media (max-width: 620px){
    .block-grid,.col{
      min-width:320px !important;
      max-width:100% !important;
      display:block !important;
    }

} @media (max-width: 620px){
    .block-grid{
      width:100% !important;
    }

} @media (max-width: 620px){
    .col{
      width:100% !important;
    }

} @media (max-width: 620px){
    .col>div{
      margin:0 auto;
    }

} @media (max-width: 620px){
    img.fullwidth,img.fullwidthOnMobile{
      max-width:100% !important;
    }

} @media (max-width: 620px){
    .no-stack .col{
      min-width:0 !important;
      display:table-cell !important;
    }

} @media (max-width: 620px){
    .no-stack.two-up .col{
      width:50% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num4{
      width:33% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num8{
      width:66% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num4{
      width:33% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num3{
      width:25% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num6{
      width:50% !important;
    }

} @media (max-width: 620px){
    .no-stack .col.num9{
      width:75% !important;
    }

} @media (max-width: 620px){
    .video-block{
      max-width:none !important;
    }

} @media (max-width: 620px){
    .mobile_hide{
      min-height:0px;
      max-height:0px;
      max-width:0px;
      display:none;
      overflow:hidden;
      font-size:0px;
    }

} @media (max-width: 620px){
    .desktop_hide{
      display:block !important;
      max-height:none !important;
    }

}</style></head>

<body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e2eace;line-height: inherit;"><div style="line-height: inherit;"><span style="mso-hide: all;display: none;max-height: 0px;overflow: hidden;line-height: inherit;">*|MC_PREVIEW_TEXT|*</span></div>
  <!--[if IE]><div class="ie-browser"><![endif]-->
  <table class="nl-container" style="table-layout: fixed;vertical-align: top;min-width: 320px;margin: 0 auto;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #e2eace;width: 100%;line-height: inherit;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#e2eace" valign="top">
    <tbody style="line-height: inherit;">
      <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
        <td style="word-break: break-word;vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#e2eace"><![endif]-->
          <div style="background-color: transparent;line-height: inherit;">
            <div class="block-grid " style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px;"><![endif]-->
                <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;width: 600px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 5px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <div class="img-container center fullwidth" align="center" style="padding-right: 0px;padding-left: 0px;line-height: inherit;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
                        <div style="font-size:1px;line-height:25px">&nbsp;</div><img class="center fullwidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/20/rounder-up.png" alt="Image" title="Image" style="text-decoration: none;-ms-interpolation-mode: bicubic;border: 0;height: auto;width: 100%;max-width: 600px;display: block;line-height: inherit;" width="600">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent;line-height: inherit;">
            <div class="block-grid " style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: #FFFFFF;line-height: inherit;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#FFFFFF;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;width: 600px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 5px;padding-bottom: 5px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <div class="img-container center" align="center" style="padding-right: 0px;padding-left: 0px;line-height: inherit;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img class="center" align="center" border="0" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/BeeFree/beefree-rmatn5troh/logo-5.png" alt="Image" title="Image" style="text-decoration: none;-ms-interpolation-mode: bicubic;border: 0;height: auto;width: 100%;max-width: 120px;display: block;line-height: inherit;" width="120">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 1.5; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                          <p style="font-size: 42px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 63px; margin: 0;"><span style="font-size: 42px;line-height: inherit;"><strong style="line-height: inherit;">Uka Tarsadia University</strong></span></p>
                          <p style="font-size: 14px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 21px; margin: 0;">Empowering Your Knowledge</p>
                          <p style="font-size: 14px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 21px; margin: 0;"><strong style="line-height: inherit;"><span style="font-size: 30px;line-height: inherit;">Training and Placement Cell</span></strong></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent;line-height: inherit;">
            <div class="block-grid " style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: #FFFFFF;line-height: inherit;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#FFFFFF;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;width: 600px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 0px;padding-bottom: 5px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#0D0D0D;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 1.2; color: #0D0D0D; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                          <p style="font-size: 28px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 34px; margin: 0;"><span style="font-size: 28px;line-height: inherit;"><strong style="line-height: inherit;"><span style="font-size: 28px;line-height: inherit;"> <em style="line-height: inherit;"></em></span></strong></span><br style="line-height: inherit;"><span style="font-size: 28px;line-height: inherit;">Here is Your OTP go ahead and<br>verify yourself.</span></p>
                          <p style="font-size: 28px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 34px; margin: 0;"><span style="font-size: 28px;line-height: inherit;"></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <div class="img-container center" align="center" style="line-height: inherit;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img class="center" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/20/divider.png" alt="Image" title="Image" style="text-decoration: none;-ms-interpolation-mode: bicubic;border: 0;height: auto;width: 100%;max-width: 318px;display: block;line-height: inherit;" width="318">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#0D0D0D;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 1.5; color: #0D0D0D; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                          <p style="font-size: 14px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 21px; margin: 0;">DO NOT SHARE THIS WITH ANY ONE UNDER ANY CIRCUMSTANCE</p>
                          <p style="font-size: 14px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 21px; margin: 0;">FOR YOUR SECURITY. BEST OF LUCK</p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <div class="button-container" align="center" style="padding-top: 25px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;line-height: inherit;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 25px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:46.5pt; width:87.75pt; v-text-anchor:middle;" arcsize="7%" stroke="false" fillcolor="#84bf3f"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px"><![endif]--><a href="#" target="_blank" style="-webkit-text-size-adjust: none;text-decoration: none;display: inline-block;color: #ffffff;background-color: #84bf3f;border-radius: 4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;width: auto;border-top: 1px solid #84bf3f;border-right: 1px solid #84bf3f;border-bottom: 1px solid #84bf3f;border-left: 1px solid #84bf3f;padding-top: 15px;padding-bottom: 15px;font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align: center;mso-border-alt: none;word-break: keep-all;line-height: inherit;"><span style="padding-left: 15px;padding-right: 15px;font-size: 16px;display: inline-block;line-height: inherit;"><span style="line-height: 32px; word-break: break-word;">'.$otp.'</span></span></a>
                        <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                      </div>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;line-height: inherit;" role="presentation" valign="top">
                        <tbody style="line-height: inherit;">
                          <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
                            <td class="divider_inner" style="word-break: break-word;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;padding-top: 30px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;line-height: inherit;border-collapse: collapse;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-top: 0px solid transparent;width: 100%;line-height: inherit;" align="center" role="presentation" valign="top">
                                <tbody style="line-height: inherit;">
                                  <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
                                    <td style="word-break: break-word;vertical-align: top;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;line-height: inherit;border-collapse: collapse;" valign="top"><span style="line-height: inherit;"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent;line-height: inherit;">
            <div class="block-grid three-up" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #525252;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: #525252;line-height: inherit;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#525252"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="200" style="background-color:#525252;width:200px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                <div class="col num4" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;width: 200px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <table class="social_icons" cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;line-height: inherit;" valign="top">
                        <tbody style="line-height: inherit;">
                          <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
                            <td style="word-break: break-word;vertical-align: top;padding-top: 15px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;line-height: inherit;border-collapse: collapse;" valign="top">
                              <table class="social_table" align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-tspace: 0;mso-table-rspace: 0;mso-table-bspace: 0;mso-table-lspace: 0;line-height: inherit;" valign="top">
                                <tbody style="line-height: inherit;">
                                  <tr style="vertical-align: top;display: inline-block;text-align: center;line-height: inherit;border-collapse: collapse;" align="center" valign="top">
                                    <td style="word-break: break-word;vertical-align: top;padding-bottom: 5px;padding-right: 3px;padding-left: 3px;line-height: inherit;border-collapse: collapse;" valign="top"><a href="https://www.facebook.com/utu.malibacampus/" target="_blank" style="line-height: inherit;"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-default-gray/facebook@2x.png" alt="Facebook" title="utu.malibacampus" style="text-decoration: none;-ms-interpolation-mode: bicubic;height: auto;border: none;display: block;line-height: inherit;"></a></td>
                                    <td style="word-break: break-word;vertical-align: top;padding-bottom: 5px;padding-right: 3px;padding-left: 3px;line-height: inherit;border-collapse: collapse;" valign="top"><a href="https://www.youtube.com/channel/UC2N7bQCLyHnUnMfTwA8MgMw/" target="_blank" style="line-height: inherit;"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-default-gray/youtube@2x.png" alt="YouTube" title="utu.malibacampus" style="text-decoration: none;-ms-interpolation-mode: bicubic;height: auto;border: none;display: block;line-height: inherit;"></a></td>
                                    <td style="word-break: break-word;vertical-align: top;padding-bottom: 5px;padding-right: 3px;padding-left: 3px;line-height: inherit;border-collapse: collapse;" valign="top"><a href="https://www.instagram.com/utu.malibacampus/" target="_blank" style="line-height: inherit;"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-default-gray/instagram@2x.png" alt="Instagram" title="utu.malibacampus" style="text-decoration: none;-ms-interpolation-mode: bicubic;height: auto;border: none;display: block;line-height: inherit;"></a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="200" style="background-color:#525252;width:200px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;width: 200px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 5px;padding-bottom: 5px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 20px; padding-bottom: 0px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#84ba3f;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:20px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                        <div style="font-size: 12px; line-height: 1.2; color: #84ba3f; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                          <p style="font-size: 12px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><span style="color: #ffffff;font-size: 12px;line-height: inherit;"><span style="font-size: 12px;color: #a8bf6f;line-height: inherit;">Tel.:</span> +91 99982-21020</span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="200" style="background-color:#525252;width:200px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;width: 200px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 5px;padding-bottom: 5px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 20px; padding-bottom: 0px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#84ba3f;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:20px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                        <div style="font-size: 12px; line-height: 1.2; color: #84ba3f; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                          <p style="font-size: 12px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">Email <span style="color: #ffffff;font-size: 12px;line-height: inherit;">bhumika.patel@utu.ac.in</span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color: transparent;line-height: inherit;">
            <div class="block-grid " style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;width: 600px;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top: 0px;padding-bottom: 5px;padding-right: 0px;padding-left: 0px;line-height: inherit;">
                      <!--<![endif]-->
                      <div class="img-container center fullwidth" align="center" style="padding-right: 0px;padding-left: 0px;line-height: inherit;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img class="center fullwidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/20/rounder-dwn.png" alt="Image" title="Image" style="text-decoration: none;-ms-interpolation-mode: bicubic;border: 0;height: auto;width: 100%;max-width: 600px;display: block;line-height: inherit;" width="600">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;line-height: inherit;" role="presentation" valign="top">
                        <tbody style="line-height: inherit;">
                          <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
                            <td class="divider_inner" style="word-break: break-word;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;padding-top: 30px;padding-right: 30px;padding-bottom: 30px;padding-left: 30px;line-height: inherit;border-collapse: collapse;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;vertical-align: top;border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-top: 0px solid transparent;width: 100%;line-height: inherit;" align="center" role="presentation" valign="top">
                                <tbody style="line-height: inherit;">
                                  <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;" valign="top">
                                    <td style="word-break: break-word;vertical-align: top;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;line-height: inherit;border-collapse: collapse;" valign="top"><span style="line-height: inherit;"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
      </tr>
    </tbody>
  </table>
  <!--[if (IE)]></div><![endif]-->
</body></html>';
                if($mail->send())
                {
                    header('Location: Sign_up_OTP_company.php');
                 }
                else
                {
                  header('Location: company_reg.php');
                }
           }catch(Exception $e){
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
    }
    ob_flush();
  } 
?>

