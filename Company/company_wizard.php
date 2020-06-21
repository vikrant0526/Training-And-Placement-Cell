<?php
    ob_start();
    session_start();
    include('../Files/PDO/dbcon.php');        
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
    <link rel="stylesheet" type="text/css" href="../Files/assets/vendor/dropzone/dropzone.min.css">
    <!--datetime & time picker-->
    <link href="../Files/assets/vendor/datetime-picker/css/datetimepicker.css" rel="stylesheet">
    <link href="../Files/assets/vendor/timepicker/css/timepicker.css" rel="stylesheet">
    <style type="text/css" media="screen">
    input[type="file"] {
        display: none;
    }

    .error {
        color: #FF0000;
    }
    </style>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAEDdgWgnxa7vlBPobbT71RgPv3yzQylYEss">
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAEDdgWgnxa7vlBPobbT71RgPv3yzQylYE&callback=initMap"
        async defer></script>
    <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -33.8688,
                lng: 151.2195
            },
            zoom: 13
        });
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            /*if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }*/

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setIcon(({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);

            // Location details
            for (var i = 0; i < place.address_components.length; i++) {
                if (place.address_components[i].types[0] == 'postal_code') {
                    document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                }
                if (place.address_components[i].types[0] == 'country') {
                    document.getElementById('country').innerHTML = place.address_components[i].long_name;
                }
            }
            document.getElementById('location').innerHTML = place.formatted_address;
            document.getElementById('lat').innerHTML = place.geometry.location.lat();
            document.getElementById('lon').innerHTML = place.geometry.location.lng();
        });
    }


    function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
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
    <link href="../Files/assets/css/main.css" rel="stylesheet">
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
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-557RCPW" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="wrapper">
    <div id="pre-loader">
            <img src="../Files/images/pre-loader/loader-01.svg" alt="">
        </div>
     <section class="login-box-main height-100vh page-section-ptb"
            style="background: url(../Files/images/login/06.jpg); background-repeat: no-repeat; background-attachment: fixed;">
            <div class="login-box-main-middle">
                <div class="container">
                    <div class="row justify-content-center no-gutter">
                        <div class="row" style="width: 75%;">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="card card-shadow mb-4 col-12">
                                        <div class="card-header border-0">
                                            <div class="custom-title-wrap bar-success">
                                                <div class="custom-title">Fill Details for Company Representative</div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form class="" action="#" method="post" enctype="multipart/form-data"
                                                id="default">
                                                    <div class="form-group row">
                                                        <div
                                                            style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;margin: auto auto">
                                                            <img src="../Files/images/myImages/default-profile-picture1.jpg"
                                                                onclick="triggerClick()" id="profileDisplay"
                                                                style="display: block;margin: -5px auto;"
                                                                class="w-100 h-100">
                                                            <input type="file" class="form-control"
                                                                placeholder="Company Logo" name="profileImage"
                                                                id="profileImage" onchange="displayImage(this)"
                                                                accept="image/*" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Comapany
                                                            Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cname" maxlength="30"
                                                                class="form-control" placeholder="Company's Name"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Comapany's
                                                            Website</label>
                                                        <div class="col-sm-8">
                                                            <input type="url" name="cweb" maxlength="100"
                                                                class="form-control"
                                                                placeholder="https: or http:/www.yourcompanywebsite.domains" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Registration
                                                            Year</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="ryear"
                                                                onkeypress="isInputNumber(event)" maxlength="4"
                                                                class="form-control" placeholder="Example: 1998"
                                                                required>
                                                        </div>
                                                    </div>                                                
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Technologies</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control-lg" style="width: 100%"
                                                                id="option_s3" name="param[]" multiple="multiple"
                                                                required>
                                                                <optgroup label="Desktop Software">
                                                                    <option value="CShrap">C#(.net)</option>
                                                                    <option value="Java">JAVA</option>
                                                                    <option value="C+">C++</option>
                                                                    <option value="Python">Python</option>
                                                                </optgroup>
                                                                <optgroup label="Website">
                                                                    <option value="php">PHP</option>
                                                                    <option value="nodejs">Node JS</option>
                                                                    <option value="angjs">Angular JS</option>
                                                                    <option value="ruby">Ruby</option>
                                                                    <option value="django">Django</option>
                                                                    <option value="mj">Magento</option>
                                                                </optgroup>
                                                                <optgroup label="Mobile App">
                                                                    <option value="Android">Android(Java)(Kotlin)
                                                                    </option>
                                                                    <option value="IOS">IOS(Swift)</option>
                                                                </optgroup>
                                                                <optgroup label="Others">
                                                                    <option value="wp">Wordpress</option>
                                                                    <option value="laravel">Laravel(PHP)</option>
                                                                    <option value="CakePHP">CakePHP</option>
                                                                    <option value="CodeIgniter">CodeIgniter</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Address</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" cols="7" maxlength="255"
                                                                name="address" rows="5" placeholder="Enter Your Address"
                                                                required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">Headquaters</label>
                                                        <div class="col-sm-8">
                                                            <input id="searchInput" class="controls form-control"
                                                                name="head" type="text" placeholder="Enter a location">
                                                            <div id="map"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">Package
                                                            Offering</label>
                                                        <div class="col-sm-4">
                                                            <input type="number" onkeyup="packagecheck(); return false;" onkeypress="isInputNumber(event)"
                                                                class="form-control" id="minval" minlength="5" name="minpack"
                                                                placeholder="Min Package" required>
                                                                <span id="packagemessage"></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="number" onkeyup="packagecheck(); return false;" onkeypress="isInputNumber(event)"
                                                                class="form-control" id="maxval" minlength="5" name="maxpack"
                                                                placeholder="Max Package" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">HR
                                                            Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" onkeypress="isInputCharSpace(event)" maxlength="50" class="form-control"
                                                                name="hrname" placeholder="HR's Name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">HR
                                                            Email-ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" patterns=(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])
                                                             class="form-control" name="hremail"
                                                                placeholder="HR's Email-ID" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">Contact
                                                            No.</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" maxlength="10"
                                                                onkeypress="isInputNumber(event)" id="mobile1" onkeyup="check1(); return false;" class="form-control"
                                                                name="contactno" placeholder="Primary Contact" required>
                                                                <span id="message1"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">Contact
                                                            No. (Alt)</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" maxlength="10"
                                                                onkeypress="isInputNumber(event)" id="mobile" onkeyup="check(); return false;" class="form-control"
                                                                name="contactnoalt" placeholder="Alternate Contact"
                                                                required>
                                                                <span id="message"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label col-form-label-sm">No. Of
                                                            Employees</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" onkeypress="isInputNumber(event)"
                                                                class="form-control" name="noe"
                                                                placeholder="No of Employees" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label col-form-label-sm">About</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" rows="3" name="about"
                                                                placeholder="Tell us Something about your company..."></textarea>
                                                        </div>
                                                    </div>
                                                
                                                <input type="submit" name="submit" class="btn btn-success"
                                                    style="background:#84BA3F;color: white;" value="Finish" />
                                            </form>
                                        </div>
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

    <!-- plugin_    h -->
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


    function check1()
    {
        var pass1 = document.getElementById('mobile1');
        var message = document.getElementById('message1');
        var badColor = "#84BA3F";
        if(mobile1.value.length!=10){
            message.style.color = badColor;
            message.innerHTML = "required 10 digits, match requested format!"
        }    
        if(mobile1.value.length=='10'){
            message.style.color = badColor;
            message.innerHTML = ""
        }
    }

    
    function packagecheck()
    {
        // alert("This");
        var min = document.getElementById('minval');
        var max = document.getElementById('maxval');
        var message = document.getElementById('packagemessage');
        var badColor = "#84BA3F";
        if(parseInt(min.value) > parseInt(max.value)){
            // alert('This if');    
            message.style.color = badColor;
            message.innerHTML = "Min Package must be less than Max Package";
        }else{
            message.style.color = badColor;
            message.innerHTML = "";
        }    
    }
    </script>
</body>
</html>

<?php
    $datasave="";
    
     if(isset($_REQUEST['submit'])){
        $cnmae = $_REQUEST['cname'];
        $cweb = $_REQUEST['cweb'];
        $ryear = $_REQUEST['ryear'];
        $tech=$_REQUEST['param'];
        $t = implode("#", $tech);
        $address = $_REQUEST['address']." ".$_REQUEST['head'] ;    
        $minpack = $_REQUEST['minpack'];
        $maxpack = $_REQUEST['maxpack'];
        $hrname = $_REQUEST['hrname'];
        $hremail = $_REQUEST['hremail'];
        $contactno =$_REQUEST['contactno'];
        $contactnoalt =$_REQUEST['contactnoalt'];
        $noe = $_REQUEST['noe'];
        $about=$_REQUEST['about'];
        $imgname=$_FILES['profileImage']['name'];
        $imgtempname=$_FILES['profileImage']['tmp_name'];

        move_uploaded_file($imgtempname, "com_logo/$imgname");
        try{

            $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
            $stmt1->bindParam(':pnum',$contactno);
            $stmt1->execute();
            $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
            $stmt1->bindParam(':pnum',$contactno);
            $stmt1->execute();
            $rowsdata1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $phone_user="";
            if(isset($rowsdata1)){
            $phone_user = $rowsdata1['LOGIN_USER_PHONE_NUMBER'];
            }

            if($phone_user == $contactno){
                echo "<script>alert('Phone Number Exist')</script>";
            }else{
                        $cemailid=$_SESSION['cpemail'];
                        $pass=$_SESSION['cppass'];
                        $rpass=$_SESSION['cprpass'];
                        $stmt=$con->prepare("CALL INSERT_COMPANY(:name,:ryear,:address,:email,:pn1,:pn2,:website,:password,:logo,:about,:tech,:noe,:maximum_pack,:minimum_pack,:hr_name,:hr_email)");   
                        $stmt->bindParam(':name',$cnmae);
                        $stmt->bindParam(':ryear',$ryear);
                        $stmt->bindParam(':address',$address);
                        $stmt->bindParam(':email',$cemailid);
                        $stmt->bindParam(':pn1',$contactno);
                        $stmt->bindParam(':pn2',$contactnoalt);
                        $stmt->bindParam(':website',$cweb);
                        $stmt->bindParam(':password',$pass);
                        $stmt->bindParam(':logo',$imgname);
                        $stmt->bindParam(':about',$about);
                        $stmt->bindParam(':tech',$t);
                        $stmt->bindParam(':noe',$noe);
                        $stmt->bindParam(':maximum_pack',$maxpack);
                        $stmt->bindParam(':minimum_pack',$minpack);
                        $stmt->bindParam(':hr_name',$hrname);
                        $stmt->bindParam(':hr_email',$hremail);
                        $stmt->execute();
                        $stmt=$con->prepare("CALL INSERT_COMPANY(:name,:ryear,:address,:email,:pn1,:pn2,:website,:password,:logo,:about,:tech,:noe,:maximum_pack,:minimum_pack,:hr_name,:hr_email)");   
                        $stmt->bindParam(':name',$cnmae);
                        $stmt->bindParam(':ryear',$ryear);
                        $stmt->bindParam(':address',$address);
                        $stmt->bindParam(':email',$cemailid);
                        $stmt->bindParam(':pn1',$contactno);
                        $stmt->bindParam(':pn2',$contactnoalt);
                        $stmt->bindParam(':website',$cweb);
                        $stmt->bindParam(':password',$pass);
                        $stmt->bindParam(':logo',$imgname);
                        $stmt->bindParam(':about',$about);
                        $stmt->bindParam(':tech',$t);
                        $stmt->bindParam(':noe',$noe);
                        $stmt->bindParam(':maximum_pack',$maxpack);
                        $stmt->bindParam(':minimum_pack',$minpack);
                        $stmt->bindParam(':hr_name',$hrname);
                        $stmt->bindParam(':hr_email',$hremail);
                        $stmt->execute();
                        if($stmt == TRUE){
                            header("Location: ../Login/login.php");
                            session_destroy();
                            session_start();
                            $_SESSION['datamess'] = "Your Registration is Completed<br>Please Login";
                        }else {
                            ?>
                                <script>
                                alert('Your Details Are Not Save!!..');
                                window.open('company_wizard.php', '_self');
                                </script>
                            <?php
                        }
                    }
        }catch(Exception $e)
        {
            die($e);
        }
     }
    ob_flush();
 ?>