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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
    <!-- <li class="nav-item">
      <div class="search">
        <a class="search-btn not_click" href="javascript:void(0);"></a>
        <div class="search-box not-click">
          <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
          <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
        </div>
      </div>
    </li> -->
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
        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
        <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
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
          <a href="committee_head_dashboard.php">
            <div class="pull-left"><i class="fas fa-home"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div>
          </a>
        </li>
        <li>
          <a href="reg_notification.php">
            <div class="pull-left"><i class="fa fa-tasks"></i><span class="right-nav-text">New Registrations</span></div><div class="clearfix"></div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
            <div class="pull-left"><i class="fa fa-calendar"></i><span class="right-nav-text">Events</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
            <li> <a href="new_event.php"><i class="fa fa-plus"></i>New Event</a> </li>
            <li> <a href="past_events.php"><i class="fa fa-hourglass"></i>Past Events</a> </li>
            <li> <a href="upcoming_events.php"><i class="fa fa-clock-o"></i>Upcoming Events</a> </li>
            <li> <a href="canceled_events.php"><i class="fa fa-times"></i>Canceled Events</a> </li>
            <li> <a href="attendance.php"><i class="fas fa-clipboard-check"></i>Attendance</a> </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#test">
            <div class="pull-left"><i class="fa fa-book"></i><span class="right-nav-text">Tests</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="test" class="collapse" data-parent="#sidebarnav">
            <li> <a href="new_test.php"><i class="fa fa-pencil"></i>New Test</a> </li>
            <li> <a href="past_test.php"><i class="fa fa-hourglass"></i>Past Test</a> </li>
            <li> <a href="upcoming_test.php"><i class="fas fa-clock-o"></i>Upcoming Test</a> </li>
            <li> <a href="marks.php"><i class="fas fa-clipboard"></i>Marks</a> </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#stud">
            <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">Students</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="stud" class="collapse" data-parent="#sidebarnav">
            <li> <a href="view_students.php"><i class="fa fa-list"></i>Student List</a> </li>
            <li> <a href="view_deactive_students.php"><i class="fas fa-user-slash"></i>Deactive Students</a> </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#company">
            <div class="pull-left"><i class="fas fa-user-secret"></i><span class="right-nav-text">Company</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="company" class="collapse" data-parent="#sidebarnav">
            <li> <a href="view_company.php"><i class="fa fa-list"></i>Company List</a> </li>
            <li class="text-nowrap"> <a href="view_deactive_company.php"><i class="fas fa-user-slash"></i>Deactive Companies</a> </li>
            <li> <a href="broadcast_list.php"><i class="fas fa-stream"></i>Broadcast Lists</a> </li>
            <li> <a href="send_broadcast.php"><i class="fa fa-paper-plane"></i>Send Broadcast</a> </li>
            <li class="text-nowrap"> <a href="placement_schedule.php"><i class="fa fa-calendar-alt"></i>Placement Schedule</a> </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#faculty">
            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">Faculty</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="faculty" class="collapse" data-parent="#sidebarnav">
            <li> <a href="view_faculty.php"><i class="fa fa-list"></i>Facuty List</a> </li>
            <li> <a href="view_deactive_faculty.php"><i class="fas fa-user-slash"></i>Deactive Facuty</a> </li>
          </ul>
        </li>
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#report">
            <div class="pull-left"><i class="fas fa-chart-bar"></i><span class="right-nav-text">Reports</span></div>
            <div class="pull-right font-weight-bold"><span class="right-nav-text"><i class="ti-plus"></i></span></div><div class="clearfix"></div>
          </a>
          <ul id="report" class="collapse" data-parent="#sidebarnav">
            <li> <a href="r1.php"><i class="fas fa-hand-point-right"></i>Attendance</a></li>
            <li> <a href="r2.php"><i class="fa fa-list"></i>Marks</a></li>
            <li> <a href="r3.php"><i class="fa fa-hand-point-right"></i>Recommendations</a></li>
          </ul>
        </li>
    </ul>
  </div> 
</div>
