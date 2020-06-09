<?php session_start();
  $data=$_SESSION['Userdata'];
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/webmin-bootstrap-4-angular-5-admin-dashboard-template/html-dark/index-04.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Feb 2020 17:24:55 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>UTU | T&PCell | Dashboard</title>

<!-- Favicon -->
<link rel="shortcut icon" href="../Files/images/logo-5.png" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="../Files/dash-assets/css/style.css" />

<!--for multipal option select-->

</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->
 
<!-- <div id="pre-loader">
    <img src="images/pre-loader/loader-01.svg" alt="">
</div> -->

<!--=================================
 preloader -->


<!--=================================
 header start-->
 
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <!-- logo -->
  <div class="text-left navbar-brand-wrapper">
    <a class="navbar-brand brand-logo" href="index.html"><img src="../Files/images/logo-5.png" alt=""></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../Files/images/logo-5.png" alt=""></a>
  </div>
  <!-- Top bar left -->
  <ul class="nav navbar-nav mr-auto">
    <li class="nav-item">
      <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
    </li>
    <li class="nav-item">
      <div class="search">
        <a class="search-btn not_click" href="javascript:void(0);"></a>
        <div class="search-box not-click">
          <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
          <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
        </div>
      </div>
    </li>
  </ul>
  <!-- top bar right -->
  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item fullscreen">
      <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
    </li>
    
    <li class="nav-item dropdown mr-30">
      <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="Profile_pic/<?php echo $data['STUDENT_PROFILE_PIC'] ?>" alt="avatar">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">
          <div class="media">
            <div class="media-body">
              <h5 class="mt-0 mb-0"><?php echo $data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME'] ?></h5>
              <span><?php echo $data["STUDENT_EMAIL"]; ?></span>
            </div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        
        <a class="dropdown-item" href="../Login/change_password.php"><i class="text-success ti-email"></i>Change Password</a>
        <a class="dropdown-item" href="student_profile.php"><i class="text-warning ti-user"></i>Profile</a>
        <a class="dropdown-item" href="Update_profile_pic.php"><i class="text-warning ti-user"></i>Profile Pic</a>
        
        <div class="dropdown-divider"></div>
        
        <a class="dropdown-item" href="../Login/logout.php"><i class="text-danger ti-unlock"></i>Logout</a>
      </div>
    </li>
  </ul>
</nav>

<!--=================================
 header End-->

<!--=================================
 Main content -->
 
<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar -->
    <div class="side-menu-fixed light-side-menu">
     <div class="scrollbar side-menu-bg">
      <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li>
          <a href="student_dashboard.php">
            <div class="pull-left"><i class="fa fa-home"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
            <div class="pull-left"><i class="fa fa-edit"></i><span class="right-nav-text">Resume</span></div>
            <div class="clearfix"></div>
          </a>
          <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
            <li> <a href="academic_details.php"><i class="fa fa-university"></i>Academic Details</a> </li>
            <li> <a href="resume_details.php"><i class="fa fa-graduation-cap"></i>Resume Details</a> </li>
            <li> <a href="Bulid_resume.php"><i class="fa fa-edit"></i>Bulid Resume</a> </li>
            <li> <a href="view_Student_resume_details.php"><i class="fa fa-eye"></i>Show Resume Details</a> </li>
          </ul>
        </li>
        <li>
          <a href="Upload_resume.php">
            <div class="pull-left"><i class="fa fa-upload"></i><span class="right-nav-text">Upload Resume</span></div><div class="clearfix"></div>
          </a>
        </li>
        <li>
          <a href="materials.php"><i class="fa fa-file"></i><span class="right-nav-text">Materials</span></div><div class="clearfix"></a>
        </li>
    </ul>
  </div> 
</div>
