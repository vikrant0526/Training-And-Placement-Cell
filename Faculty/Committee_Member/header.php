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
<link rel="shortcut icon" href="../../Files/images/logo-5.png" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="../../Files/dash-assets/css/style.css" />
 
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
    <a class="navbar-brand brand-logo" href="index.html"><img src="../../Files/images/logo-5.png" alt=""></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../Files/images/logo-5.png" alt=""></a>
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
    <li class="nav-item dropdown ">
      <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-big">
        <div class="dropdown-header">
          <strong>Quick Links</strong>
        </div>
        <div class="dropdown-divider"></div> 
        <div class="nav-grid">
          <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i><h5>New Task</h5></a>
          <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i><h5>Assign Task</h5></a>
        </div>
        <div class="nav-grid">
          <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i><h5>Add Orders</h5></a>
          <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i><h5>New Orders</h5></a>
        </div>
      </div>
    </li>
    <li class="nav-item dropdown mr-30">
      <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <img src="../img/<?php echo $data['FACULTY_PROFILE_PIC'] ?>" alt="avatar">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">
          <div class="media">
            <div class="media-body">
            <h5 class="mt-0 mb-0"><?php echo $data['FACULTY_FIRST_NAME']." ".$data['FACULTY_LAST_NAME'] ?></h5>
              <span><?php echo $data["FACULTY_EMAIL"] ?></span>
            </div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
        <a class="dropdown-item" href="../../Login/change_password.php"><i class="text-success ti-email"></i>Change Password</a>
        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
        <a class="dropdown-item" href="../../Login/logout.php"><i class="text-danger ti-unlock"></i>Logout</a>
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
    <div class="side-menu-fixed">
     <div class="scrollbar side-menu-bg">
      <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li>
          <a href="committee_member_dashboard.php">
            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div>
          </a>
        </li>
    </ul>
  </div> 
</div>
