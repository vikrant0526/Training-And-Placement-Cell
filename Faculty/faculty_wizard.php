<?php
     session_start();   
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UTU | T&PCell | Registration</title>

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

        <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="../Files/../Files/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="../Files/../Files/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Files/../Files/assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="../Files/../Files/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="../Files/../Files/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="../Files/../Files/assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="../Files/../Files/assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="../Files/../Files/assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="../Files/../Files/assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="../Files/../Files/assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--jqery steps-->
    <link href="../Files/../Files/assets/vendor/jquery-steps/jquery.steps.css" rel="stylesheet">

    <!--custom styles-->
    <link href="../Files/../Files/assets/css/main.css" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-557RCPW');

     function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }

    function isInputChar(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[A-Za-z]/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputCharSpace(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/^[a-zA-Z ]*$/.test(ch))) {
            evt.preventDefault();
        }

    }           
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

    <section class="login-box-main height-100vh page-section-ptb" style="background: url(../Files/images/login/06.jpg); background-repeat: no-repeat; background-attachment: fixed;">
      <div class="login-box-main-middle">
        <div class="container">
          <div class="row justify-content-center no-gutter">
            <div class="row" style="width: 75%;">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-success">
                                <div class="custom-title">Fill Details for Faculty</div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <form class="" action="faculty_data.php" method="post" enctype="multipart/form-data" id="default">     
                                    <div class="form-group row">
                                        <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;margin: auto auto">
                                            <img src="../Files/images/myImages/default-profile-picture1.jpg" onclick="triggerClick()" id="profileDisplay" style="display: block;margin: -5px auto;" name="profileImage" class="w-100 h-100">  
                                            <input type="file" class="form-control" id="profileImage" name="profileImage" onchange="displayImage(this)" style="display: none;" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">  
                                        <label class="col-sm-4 col-form-label col-form-label-sm">First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"  onkeypress="isInputChar(event)" class="form-control" maxlength="20" name="fname" placeholder="First Name"  required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" onkeypress="isInputChar(event)" maxlength="20" name="lname" placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Phone Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"  id="mobile" onkeyup="check(); return false;" class="form-control" maxlength="10" onkeypress="isInputNumber(event)" name="pnum" placeholder="Phone Number" required>
                                            <span id="message"></span>
                                        </div>
                                    </div>    

                                    <div class="form-group row">  
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Gender</label>
                                        <div class="col-sm-8">
                                            <input class="form-check-inline col-1" type="radio" name="gridRadios" id="gridRadios1" value="M" checked="true">Male
                                            <label class="col-1 d-inline"> </label>
                                            <input class="form-check-inline col-1" type="radio" name="gridRadios" id="gridRadios2" value="F">Female 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">About</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" maxlength="255" name="About" placeholder="Tell Us Something About You.." rows="3" required></textarea>
                                        </div>
                                    </div>
                                <!-- 
                                <fieldset title="Step 2" class="step" id="default-step-1" >
                                    <legend> </legend>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Phone</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Mobile</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" cols="60" rows="5"></textarea>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset title="Step 3" class="step" id="default-step-2" >
                                    <legend> </legend>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Full Name</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">John Doe</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Email Address</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">john_doe@testmail.com</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">User Name</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">john-doe</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Phone</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">01234567789</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Mobile</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">+00 123456</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static">
                                                Dreamland, Suite 0011
                                                AU, PC 0123
                                                P: (123) 456-7891 </p>
                                        </div>
                                    </div>
                                </fieldset> -->

                                <input type="submit" class="finish btn" name="submit" style="background:#84BA3F;color: white;" value="Finish"/>
                            </form>
                        </div>
                    </div>
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

    <script src="../Files/../Files/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Files/../Files/assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="../Files/../Files/assets/vendor/popper.min.js"></script>
    <script src="../Files/../Files/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Files/../Files/assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>
    <script src="../Files/../Files/assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Files/../Files/assets/vendor/icheck/skins/icheck.min.js"></script>

    <!--jquery validate-->
    <script src="../Files/../Files/assets/vendor/jquery-validation/jquery.validate.min.js"></script>

    <!--jquery steps-->
    <script src="../Files/../Files/assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <!--init steps-->
    <script src="../Files/../Files/assets/vendor/js-init/init-form-wizard.js"></script>

    <!--jquery stepy-->
    <script src="../Files/../Files/assets/vendor/jquery-steps/jquery.stepy.js"></script>
    <script src="../Files/../Files/assets/vendor/dropzone/dropzone.js"></script>
    <!--init dropzone-->
    <script src="../Files/../Files/assets/vendor/js-init/init-dropzone.js"></script>

    <!--[if lt IE 9]>
    <script src="../Files/assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="../Files/../Files/assets/js/scripts.js"></script>
    <script type="text/javascript" >
        function triggerClick() {
            document.querySelector('#profileImage').click();
        }

        function displayImage(e) {
            if(e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }

    function check()
    {
        // alert("ff");
        var pass1 = document.getElementById('mobile');
        var message = document.getElementById('message');
        var badColor = "#84BA3F";
        if(mobile.value.length!=10){
            // alert("ffrr");
            message.style.color = badColor;
            message.innerHTML = "required 10 digits, match requested format!"
        }    
        if(mobile.value.length=='10'){
            message.style.color = badColor;
            message.innerHTML = ""
        }
    }
    </script>
</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/webster-responsive-multi-purpose-html5-template/login-09.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 09:41:57 GMT -->
</html> 

