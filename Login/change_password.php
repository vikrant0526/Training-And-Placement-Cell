<?php
    session_start();
    error_reporting(0);
  $roldpass = $rrpass = $rnewp="";
  $upassmess="";
  if(isset($_REQUEST['Submit']))
    {
      $old_pswd=$_REQUEST['old_pswd'];
      $email=$_SESSION['lemail'];  
      $new_paswd=$_REQUEST['pswd'];
      $rnew_pass=$_REQUEST['rpswd'];

    if(empty($old_pswd) || empty($new_paswd) || empty($rnew_pass)){
      $roldpass="Please Enter Old Password";      
      $rrpass="Please Enter Re Type Password";
      $rnewp="Please Enter New Password";
    }elseif($new_paswd != $rnew_pass){
      echo "<script>alert('Password And Confirm Password Are Not Match')</script>";
    }
    else{
        include('../Files/PDO/dbcon.php');
        $stmt=$con->prepare("CALL CHANGE_PASSWORD(:oldp,:email)"); 
        $stmt->bindParam(':oldp',$old_pswd);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        // print_r($stmt->errorinfo());
        $rowsdata = $stmt->fetch(PDO::FETCH_ASSOC);
        $demail = $rowsdata['LOGIN_USER_EMAIL'];
        if($demail == $email)
        {
           $stmt=$con->prepare("CALL NEW_PASSWORD(:email,:newp)"); 
           $stmt->bindParam(':email',$demail);
           $stmt->bindParam(':newp',$new_paswd);
           $stmt->execute();

            // echo "<script>alert('Password Update Sccessfully')</script>";

            if(isset($_SESSION['lid']))
            {
              if (isset($_SESSION['lut'])) {
                  $lut=$_SESSION['lut'];
                  if($lut == "CH"){
                     header('Location: ../Faculty/Committee_Head/committee_head_dashboard.php');
                  }
                  elseif($lut == "CM"){
                    header('Location: ../Faculty/Committee_Member/committee_member_dashboard.php');  
                  }
                  elseif($lut == "FC"){
                    header('Location: ../Faculty/faculty_dashboard.php');
                  }
                  elseif($lut == "CP")
                  {
                     header('location: ../Company/company_dashboard.php'); 
                  }
                  elseif($lut == "ST")
                  {
                      header('location: ../Student/Student_dashboard.php');  
                  }
              }
            }
        }
        else
        {
            /*?>
            <script>
              alert('Old Password Does Not Match!!............');
              window.open('change_password.php','_self');
            </script>
            <?php*/
            $upassmess="Old Password Does Not Match";  
        }
      }

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
    <title>UTU | T&PCell | Change Password</title>

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

    </script>
    <!-- End Google Tag Manager -->
    <script type="text/javascript">


// function checkPass()

// {

//     //Store the password field objects into variables ...

//     var password = document.getElementById('password2');

//     var confirm  = document.getElementById('confirm2');

//     var SubmitButtonElement = document.getElementById("SubmitButton");

//     //Store the Confirmation Message Object ...

//     var message = document.getElementById('confirm-message2');

//     //Set the colors we will be using ...

//     var good_color = "#84ba3f";

//     var bad_color  = "#ff6666";

//     //Compare the values in the password field 

//     //and the confirmation field

//     if(password.value == confirm.value){

//         //The passwords match. 

//         //Set the color to the good color and inform

//         //the user that they have entered the correct password 

//         confirm.style.borderColor = good_color;

//         message.style.color           = good_color;

//         message.innerHTML             = '<i class="fa fa-check" style="color:#84ba3f;">&nbsp;Passwords Match!</i>';

//         SubmitButtonElement.style.display="inline";
//     }else{

//         //The passwords do not match.

//         //Set the color to the bad color and

//         //notify the user.

//         confirm.style.borderColor = bad_color;

//         message.style.color           = bad_color;

//         message.innerHTML             = '<i class="fa fa-exclamation-triangle text-danger">&nbsp;Passwords Do Not Match!</i>';

//         SubmitButtonElement.style.display="none";
//     }

}  

</script>
    <style type="text/css">
       .error {color: #FF0000;}
    </style>   
  </head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-557RCPW"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="wrapper">
    <div id="pre-loader">
    <img src="../Files/images/pre-loader/loader-01.svg" alt="">
    </div>
    <section class="login-box-main height-100vh page-section-ptb" style="background: url(../Files/images/login/06.jpg);">
      <div class="login-box-main-middle">
        <div class="container">
          <div class="row justify-content-center no-gutter">
            <div class="col-md-4">
              <div class="login-box pb-50 clearfix white-bg">
                <h3 class="mb-30">Change Password</h3>
                <form action="#" method="post">
                  <div class="section-field mb-20">
                    <label class="mb-10 text-dark font-weight-bold"for="name">Old Password<label class="text-danger">*</label></label>
                    <input id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="Password form-control" type="password" placeholder="Password" name="old_pswd" required>
                    <span class="error"><?php echo $roldpass;?></span> 
                  </div>
                  <div class="section-field mb-20">
                    <label class="mb-10 text-dark font-weight-bold" for="name">New Password<label class="text-danger">*</label></label>
                    <input id="password2" class="Password form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                     title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" placeholder="Password" name="pswd" onkeyup="checkPass();" required>
                    <span class="error"><?php echo $rnewp;?></span> 
                  </div>
                  <div class="section-field mb-20">
                    <label class="mb-10 text-dark font-weight-bold" for="name">Re-Type Password<label class="text-danger">*</label></label>
                    <input id="confirm2" class="Password form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Re-Type Password" name="rpswd" onkeyup="checkPass();" required>
                    <span class="error"><?php echo $rrpass;?></span> 
                     <span class="error"><?php echo $upassmess;?></span> 
                    <span id="confirm-message2" class="confirm-message"></span>
                  </div>
                  <div class="section-field">
                    <div class="remember-checkbox mb-30">
                      <!-- <input type="checkbox" class="form-control" name="two" id="two" />
                      <label for="two"> Remember me</label> -->
                    <!-- <a href="forgot_password.php" class="float-right">Forgot Password?</a> -->
                    </div>
                  </div>
                  <div class="row">
                    <input type="submit" name="Submit" value="Change Password" id="SubmitButton" class="button col-7">
                    <input type="reset" name="reset" value="Reset" class="button col-4">
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

