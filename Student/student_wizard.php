<?php
    ob_start();
    session_start();    
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

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
    <link rel="stylesheet" type="text/css" href="#" data-style="styles" />
    <link rel="stylesheet" type="text/css" href="../Files/css/style-customizer.css" />

    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="../Files/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="../Files/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Files/assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="../Files/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="../Files/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="../Files/assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="../Files/assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="../Files/assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="../Files/assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="../Files/assets/vendor/icheck/skins/all.css" rel="stylesheet">
    <link href="../Files/assets/vendor/select2/css/select2.css" rel="stylesheet">
    <!--jqery steps-->
    <link href="../Files/assets/vendor/jquery-steps/jquery.steps.css" rel="stylesheet">
    <!--date picker-->
    <link href="../Files/assets/vendor/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--datetime & time picker-->
    <link href="../Files/assets/vendor/datetime-picker/css/datetimepicker.css" rel="stylesheet">
    <link href="../Files/assets/vendor/timepicker/css/timepicker.css" rel="stylesheet">
    <!--custom styles-->
    <link href="../Files/assets/css/main.css" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-557RCPW');


    function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }

    }
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-557RCPW" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
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

        <section class="login-box-main height-100vh page-section-ptb"
            style="background: url(../Files/images/login/06.jpg); background-repeat: no-repeat; background-attachment: fixed;">
            <div class="login-box-main-middle">
                <div class="container">
                    <div class="row justify-content-center no-gutter">
                        <div class="row" style="width: 75%;">
                            <div class="col-xl-12">
                                <div class="card card-shadow mb-4">
                                    <div class="card-header border-0">
                                        <div class="custom-title-wrap bar-success">
                                            <div class="custom-title">Fill Details for Student</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <form class="" action="#" method="post" enctype="multipart/form-data"
                                            id="default">
                                            

                                                <!-- <h5 class="mb-3">Step Title</h5> -->
                                                <div class="form-group row">
                                                    <div
                                                        style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;margin: auto auto">
                                                        <img src="../Files/images/myImages/default-profile-picture1.jpg"
                                                            onclick="triggerClick()" id="profileDisplay"
                                                            style="display: block;margin: -5px auto;"
                                                            class="w-100 h-100">
                                                        <input type="file" class="form-control" placeholder="Company L
                                                    ogo" name="profileImage" id="profileImage"
                                                            onchange="displayImage(this)" accept="image/*"
                                                            style="display: none;" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">First
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fname" maxlength="20"
                                                            class="form-control" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Last
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="lname" maxlength="20"
                                                            class="form-control" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Enrollment
                                                        Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="enum" onkeypress="isInputNumber(event)"
                                                            maxlength="15" minlength="15" class="form-control"
                                                            placeholder="Enrollment Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-4 col-form-label col-form-label-sm">Gender</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-check-inline col-1" type="radio"
                                                            name="gridRadios" id="gridRadios1" value="M"
                                                            checked="true">Male
                                                        <label class="col-1 d-inline"></label>
                                                        <input class="form-check-inline col-1" type="radio"
                                                            name="gridRadios" id="gridRadios2" value="F">Female
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Date of
                                                        Birth</label>
                                                    <div class="col-lg-8 col-md-9 col-sm-8">
                                                        <div class="input-group date dpYears" data-date-viewmode="years"
                                                            data-date-format="dd-mm-yyyy" data-date="01-01-1995">
                                                            <input type="text" class="form-control" name="dob"
                                                                placeholder="01-01-1995" aria-label="Right Icon"
                                                                aria-describedby="dp-ig" required>
                                                            <div class="input-group-append">
                                                                <button id="dp-ig" class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar f14"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Parent's
                                                        Full Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" maxlength="20"
                                                            name="pfname" placeholder="Parent's Full Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Parent's
                                                        Email-ID</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" name="pemail"
                                                            placeholder="Parent's Email-ID" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Parent's
                                                        Phone No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" maxlength="10"
                                                            onkeypress="isInputNumber(event)" class="form-control"
                                                            name="ppno" placeholder="Parent's Phone Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Phone
                                                        Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" maxlength="10"
                                                            onkeypress="isInputNumber(event)" class="form-control"
                                                            name="pnum" placeholder="Student's Phone Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-4 col-form-label col-form-label-sm">Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" maxlength="255" rows="3"
                                                            name="address" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-4 col-form-label col-form-label-sm">Department</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="dept" id="dept"
                                                            onchange="course()" required>
                                                            <option>Select....</option>
                                                            <option value="BMIIT">BMIIT</option>
                                                            <option value="SRIMCA">SRIMCA</option>
                                                            <option value="CGPIT">CGPIT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-4 col-form-label col-form-label-sm">Degree</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" onchange="passing_year()" name="degree" id="degree" required>
                                                        <option>Select....</option>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Year Of
                                                        Passing</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="pyear" id="pyear" required>
                                                                <option>Select....</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label col-form-label-sm">Year Of
                                                        Admission</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="yoa" maxlength="4"
                                                            onkeypress="isInputNumber(event)" class="form-control"
                                                            placeholder="Example: 2015" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-4 col-form-label col-form-label-sm">About</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" maxlength="255" name="about"
                                                            cols="7" rows="5"
                                                            placeholder="Tell us Something about you..."
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                
                                            <input type="submit" name="submit" class="finish btn"
                                                style="background:#84BA3F;color: white;" value="Finish" />
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
    <script>
    var plugin_path = '../Files/js/index.html';
    </script>

    <!-- Style Customizer -->
    <script src="../Files/js/style-customizer.min.js"></script>

    <!-- custom -->
    <script src="../Files/js/custom.js"></script>

    <script src="../Files/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Files/assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="../Files/assets/vendor/popper.min.js"></script>
    <script src="../Files/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Files/assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>
    <script src="../Files/assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Files/assets/vendor/icheck/skins/icheck.min.js"></script>

    <!--jquery validate-->
    <script src="../Files/assets/vendor/jquery-validation/jquery.validate.min.js"></script>

    <!--jquery steps-->
    <script src="../Files/assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <!--init steps-->
    <script src="../Files/assets/vendor/js-init/init-form-wizard.js"></script>

    <!--jquery stepy-->
    <script src="../Files/assets/vendor/jquery-steps/jquery.stepy.js"></script>
    <script src="../Files/assets/vendor/dropzone/dropzone.js"></script>
    <!--init dropzone-->
    <script src="../Files/assets/vendor/js-init/init-dropzone.js"></script>
    <script src="../Files/assets/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
    <!--init date picker-->
    <script src="../Files/assets/vendor/js-init/pickers/init-date-picker.js"></script>

    <!--datetime picker-->
    <script src="../Files/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js"></script>
    <script src="../Files/assets/vendor/timepicker/js/bootstrap-timepicker.js"></script>
    <!--init datetime picker-->
    <script src="../Files/assets/vendor/js-init/pickers/init-datetime-picker.js"></script>
    <!--select2-->
    <script src="../Files/assets/vendor/select2/js/select2.min.js"></script>
    <!--init select2-->
    <script src="../Files/assets/vendor/js-init/init-select2.js"></script>

    <!--[if lt IE 9]>
    <script src="../Files/assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="../Files/assets/js/scripts.js"></script>
    <script type="text/javascript">
    function triggerClick() {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    function course() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "degreebind.php?dept=" + document.getElementById("dept").value, false);
        xmlhttp.send(null);
        //alert(xmlhttp.responseText);  
        document.getElementById("degree").innerHTML = xmlhttp.responseText;
    }
    
    function passing_year(){ 
            // alert('aa');
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","pyearbind.php?dept="+document.getElementById("dept").value+"&"+"degree="+document.getElementById("degree").value,false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText);
            document.getElementById("pyear").innerHTML=xmlhttp.responseText;
        }
    </script>
</body>

</html>

<?php

    //print_r($_REQUEST);

    if(isset($_REQUEST['submit'])){
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname']; 
        $enum = $_REQUEST['enum'];   
        $gender = $_REQUEST['gridRadios'];
        $dob =  $_REQUEST['dob'];
        $ts = strtotime($dob);
        $nd = date('Y-m-d',$ts);
        $pfname = $_REQUEST['pfname'];
        $pemail = $_REQUEST['pemail'];
        $pphoneno = $_REQUEST['ppno'];
        $sphoneno = $_REQUEST['pnum']; 
        $address = $_REQUEST['address'];
        $dept= $_REQUEST['dept'];
        $yoa=$_REQUEST['yoa'];
        $yop=$_REQUEST['yop'];
        $about=$_REQUEST['about'];
        $imgname=$_FILES['profileImage']['name'];
        $imgtempname=$_FILES['profileImage']['tmp_name'];   
        $degree = $_REQUEST['degree'];
        // $degree = "MSC(IT)";


   
        move_uploaded_file($imgtempname, "Profile_pic/$imgname");
        include('../Files/PDO/dbcon.php');
        $email = $_SESSION['semail'];
        $pass = $_SESSION['spass'];
        $rpass = $_SESSION['srpass'];

        $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
        $stmt1->bindParam(':pnum',$sphoneno);
        $stmt1->execute();
        $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
        $stmt1->bindParam(':pnum',$sphoneno);
        $stmt1->execute();
        $rowsdata1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        $phone_user="";
        if(isset($rowsdata1)){
        $phone_user = $rowsdata1['LOGIN_USER_PHONE_NUMBER'];
        }

        
        $stmt2=$con->prepare("CALL CHECK_ENROLLMENT_NUMBER(:eno)");
        $stmt2->bindParam(':eno',$enum);
        $stmt2->execute();
        $stmt2=$con->prepare("CALL CHECK_ENROLLMENT_NUMBER(:eno)");
        $stmt2->bindParam(':eno',$enum);
        $stmt2->execute();  
        $Studen = $stmt2->fetch(PDO::FETCH_ASSOC);
        // print_r($stmt2->errorinfo());
        $st=$Studen['st'];
        // echo $st;
        // echo $enum;
          if($st == '1'){
            echo "<script>alert('Enrollment Number Exist')</script>"; 
          }elseif($phone_user == $sphoneno){
            echo "<script>alert('Phone Number Exist')</script>";      
          }else{
          $stmt=$con->prepare("CALL INSERT_STUDENT(:fn,:ln,:en,:email,:pn,:dob,:gender,:password,:pname,:ppnum,:pemail,:ppic,:about,:address,:dept,:degree,:pyear,:ayear)");   
          $stmt->bindParam(':fn',$fname);
          $stmt->bindParam(':ln',$lname);
          $stmt->bindParam(':en',$enum);
          $stmt->bindParam(':email',$email);
          $stmt->bindParam(':pn',$sphoneno);
          $stmt->bindParam(':dob',$nd);
          $stmt->bindParam(':gender',$gender);  
          $stmt->bindParam(':password',$pass);
          $stmt->bindParam(':pname',$pfname);
          $stmt->bindParam(':ppnum',$pphoneno);
          $stmt->bindParam(':pemail',$pemail);
          $stmt->bindParam(':ppic',$imgname);
          $stmt->bindParam(':about',$about);
          $stmt->bindParam(':address',$address);
          $stmt->bindParam(':dept',$dept);
          $stmt->bindParam(':degree',$degree);
          $stmt->bindParam(':pyear',$yop);
          $stmt->bindParam(':ayear',$yoa);
          $stmt->execute();

          $stmt=$con->prepare("CALL INSERT_STUDENT(:fn,:ln,:en,:email,:pn,:dob,:gender,:password,:pname,:ppnum,:pemail,:ppic,:about,:address,:dept,:degree,:pyear,:ayear)");   
          $stmt->bindParam(':fn',$fname);
          $stmt->bindParam(':ln',$lname);
          $stmt->bindParam(':en',$enum);
          $stmt->bindParam(':email',$email);
          $stmt->bindParam(':pn',$sphoneno);
          $stmt->bindParam(':dob',$nd);
          $stmt->bindParam(':gender',$gender);  
          $stmt->bindParam(':password',$pass);
          $stmt->bindParam(':pname',$pfname);
          $stmt->bindParam(':ppnum',$pphoneno);
          $stmt->bindParam(':pemail',$pemail);
          $stmt->bindParam(':ppic',$imgname);
          $stmt->bindParam(':about',$about);
          $stmt->bindParam(':address',$address);
          $stmt->bindParam(':dept',$dept);
          $stmt->bindParam(':degree',$degree);
          $stmt->bindParam(':pyear',$yop);
          $stmt->bindParam(':ayear',$yoa);
          $stmt->execute();
           if($stmt == TRUE){
            //  print_r($stmt->errorinfo());
                header("Location: ../Login/login.php");
                session_destroy();
                session_start();
                $_SESSION['datamess'] = "Your Registration is Completed<br>Please Login";
             }else {
                  ?>
                    <script>
                    alert('Your Details Are Not Save!!..');
                    window.open('student_wizard.php', '_self');
                    </script>
                    <?php
             }
            }  
     }   
     ob_flush();
?>