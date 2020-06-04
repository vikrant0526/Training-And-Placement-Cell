<?php
  ob_start();
  require '../mail/PHPMailer-master/includes/PHPMailer.php';
  require '../mail/PHPMailer-master/includes/SMTP.php';
  require '../mail/PHPMailer-master/includes/Exception.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  session_start();
  if(isset($_SESSION['datamess']))
    {
      $cpreg=$_SESSION['datamess'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/webster-responsive-multi-purpose-html5-template/login-09.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 09:41:56 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UTU | T&PCell | Forget Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../Files/images/logo-5.png" type="images/png" />

    <!-- font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="../Files/css/plugins-css.css" />

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="../Files/css/typography.css" />

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="../Files/css/shortcodes/shortcodes.css" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../Files/css/style.css" />

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="../Files/css/responsive.css" />

    <!-- Style customizer -->
    <link rel="stylesheet" type="text/css" href="#" data-style="styles"/>
    <link rel="stylesheet" type="text/css" href="css/style-customizer.css" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-557RCPW');

     function preventBack(){
        window.history.forward();
      }
      setTimeout("preventBack()",0);
      window.onunload = function(){null};

    </script>
    <!-- End Google Tag Manager -->
   
  </head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-557RCPW"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="wrapper">

  <!--=================================
   preloader -->

    <div id="pre-loader">
    <img src="../Files/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
     preloader -->

    <!--=================================
     login-->

    <section class="login-box-main height-100vh page-section-ptb" style="background: url(../Files/images/login/06.jpg);">
      <div class="login-box-main-middle">
        <div class="container">
          <div class="row justify-content-center no-gutter">
            <div class="col-lg-2 col-md-4">
              <div class="login-box-left  white-bg">
                <img class="logo-small" src="../Files/images/logo-5.png" alt="">
                  <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php"> <i class="fa fa-home"></i>Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="../Login/login.php"> <i class="fa fa-sign-in"></i> Login</a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user-plus"></i>Sign-Up</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="../Sign_Up/student_reg.php"><i class="fa fa-user"></i>Student</a>
                        <a class="dropdown-item" href="../Sign_Up/company_reg.php"><i class="fa fa-users"></i>Company</a>
                        <a class="dropdown-item" href="../Sign_Up/faculty_reg.php"><i class="fa fa-university"></i>Faculty</a>
                      </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../about_us.php"> <i class="fa fa-info-circle"></i>About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact_us.php"> <i class="fa fa-phone"></i>Contact Us</a></li>
                  </ul>
                  <div class="social-icons color-hover clearfix pos-bot pb-30 pl-30">
                    <ul>
                      <li class="social-facebook"><a href="https://www.facebook.com/utu.malibacampus/"><i class="fa fa-facebook"></i></a></li>
                      <li class="social-youtube"><a href="https://www.youtube.com/channel/UC2N7bQCLyHnUnMfTwA8MgMw/"><i class="fa fa-youtube-play"></i></a></li>
                      <li class="social-instagram"><a href="https://www.instagram.com/utu.malibacampus/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 theme-bg">
              <div class="login-box pos-r text-white login-box-theme">
                <h2 class="text-white mb-16">Uka Tarsadia University</h2>
                <p class="mb-10 text-white pl-1">Empowering Your Knowledge </p>
                <br><span class="text-light font-weight-bold" style="font-size: 2em;"><?php 
                  if(isset($_SESSION['datamess']))
                    {
                      echo $cpreg;
                      unset($_SESSION['datamess']);
                    }
                ?></span>          
                <ul class="list-unstyled pos-bot">
                  <h3 class="text-white pt-8 pb-1">Training and<br>Placement Cell</h3>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="login-box pb-50 clearfix white-bg">
                <h3 class="mb-30">Forgot Password</h3>
                <form action="#" method="post">
                  <div class="section-field mb-20">
                    <label class="mb-10 text-dark font-weight-bold" for="name">Phone Number Or Email<label class="text-danger">*</label></label>
                    <input id="name" class="web form-control" type="text" placeholder="Phone Number Or Email" name="uname" autofocus required>
                  </div>
                  <br><br><br><br><br><br><br>
                  <div class="section-field">
                    <div class="remember-checkbox mb-30">
                      <!-- <input type="checkbox" class="form-control" name="two" id="two" />
                      <label for="two"> Remember me</label> -->
                    <!-- <a href="forgot_password.php" class="float-right">Forgot Password?</a> -->
                    </div>
                  </div>
                  <div class="row">
                    <input type="submit" name="Submit" value="Reset Password" class="button col-6">
                    <input type="reset" name="reset" value="Reset" class="button col-5">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

<script src="../Files/js/jquery-3.4.1.min.js"></script>

<!-- plugins-jquery -->
<script src="../Files/js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script>var plugin_path = '../Files/js/index.html';</script>

<!-- Style Customizer -->
<script src="../Files/js/style-customizer.min.js"></script>

<!-- custom -->
<script src="../Files/js/custom.js"></script>



</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/webster-responsive-multi-purpose-html5-template/login-09.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 09:41:57 GMT -->
</html>

<?php
  
  if(isset($_REQUEST['Submit']))
  {
      
      $pne = $_REQUEST['uname'];


      include('../Files/PDO/dbcon.php');
      $stmt=$con->prepare("CALL CHECK_USER(:pne)");
      $stmt->bindParam(':pne',$pne);
      $stmt->execute();
      $rowsdata = $stmt->fetch(PDO::FETCH_ASSOC);
      $email = $rowsdata['LOGIN_USER_EMAIL'];
      $_SESSION['formail'] = $email;
      $_SESSION['otp'] =  mt_rand(100000,999999);
      $otp=$_SESSION['otp'];
    
 
      //print_r($rowsdata);
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
        $mail->Body    = '<html style="line-height: inherit;"><head style="line-height: inherit;">
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
          header('Location: otp.php');
        }
        else
        {
          header('Location: forgot_password.php');
          $_SESSION['datamess'] = "User Not Found<br>Try Again!"; 
        }
} catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
ob_flush();
 }
?>