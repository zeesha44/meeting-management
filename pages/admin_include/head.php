<?php
// session_start();
// $email = $_SESSION ['sessionemail'];
// $id = $_SESSION ['sessionid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Meeting Management System</title>
<!--style-->
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<!--bootsrap-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Font-->
<link rel="stylesheet" type="text/css" href="../css/opensans-font.css">
<link rel="stylesheet" type="text/css" href="../fonts/line-awesome/css/line-awesome.min.css">
<!-- Jquery -->
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="../css/signup.css"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="CodedThemes">
<meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="CodedThemes">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">

<div class="navbar-logo" style="background-color: #1e4da1;">
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="ti-menu"></i>
</a>
<a class="mobile-search morphsearch-search" href="#">
<i class="ti-search"></i>
</a>
<a href="index.html">
<h4>Add Student</h4>
</a>
<a class="mobile-options">
<i class="ti-more"></i>
</a>
</div>

<div class="navbar-container container-fluid">
<ul class="nav-left">
<li>
<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
</li>
</ul>
<ul class="nav-right">
<li class="header-notification">
<a href="#!">
<!-- <i class="ti-bell"></i>
<span class="badge bg-c-pink"></span> -->
</a>
<ul class="show-notification">
<li>
<h6>Notifications</h6>
<label class="label label-danger">New</label>
</li>
<li>
<div class="media">
<img class="d-flex align-self-center img-radius" src="../images/avatar.jpg" alt="Generic placeholder image">
<div class="media-body">
<h5 class="notification-user"></h5>
<p class="notification-msg"></p>
<span class="notification-time"></span>
</div>
</div>
</li>
<li>
<div class="media">
<img class="d-flex align-self-center img-radius" src="../images/avatar.jpg" alt="Generic placeholder image">
<div class="media-body">
<h5 class="notification-user">Joseph William</h5>
<p class="notification-msg"></p>
<span class="notification-time"></span>
</div>
</div>
</li>
<li>
<div class="media">
<img class="d-flex align-self-center img-radius" src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
<div class="media-body">
<h5 class="notification-user">Sara Soudein</h5>
<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
<span class="notification-time">30 minutes ago</span>
</div>
</div>
</li>
</ul>
</li>
<li class="user-profile header-notification">
<a href="#!">
<img src="../images/avatar.jpg" class="img-radius" alt="User-Profile-Image">
<span>Admin</span>
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification profile-notification">
<li>
<a href="EditProfile.php">
<i class="ti-settings"></i> Settings
</a>
</li>
<li>
<a href="#">
<i class="ti-user"></i> Profile
</a>
</li>
<li>
<a href="../index.html">
<i class="ti-layout-sidebar-left"></i> Logout
</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</nav>
<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">
<div class="">
<div class="main-menu-header">
<img class="img-40 img-radius" src="../images/avatar.jpg" alt="User-Profile-Image">
<div class="user-details">
<span></span>
<span id="more-details"><i class="ti-angle-down"></i></span>
</div>
</div>

<div class="main-menu-content">
<ul>
<li class="more-details">
<a href="#"><i class="ti-user"></i>View Profile</a>
<a href="EditProfile.php"><i class="ti-settings"></i>Settings</a>
<a href="../index.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
</li>
</ul>
</div>
</div>
<div class="pcoded-search">
<span class="searchbar-toggle">  </span>
<div class="pcoded-search-box ">
<input type="text" placeholder="Search">
<span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
</div>
</div>
<ul class="pcoded-item pcoded-left-item">
<li class="active">
<!-- <a href="admin_dash.php">
<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
<span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
<span class="pcoded-mcaret"></span>
</a> -->
</li>
<li class="">
<!-- <a href="addstudents.php">
<span class="pcoded-micon"><i class="ti-layout"></i></span>
<span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Add Students</span>
<span class="pcoded-mcaret"></span>
</a> -->
<li>
<a href="addstaff.php">
<span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
<span class="pcoded-mtext" data-i18n="nav.form-components.main">Add Users</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
<li>
<a href="deleteuser.php">
<span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
<span class="pcoded-mtext" data-i18n="nav.form-components.main">Delete Users</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
<li class="pcoded-hasmenu">
<a href="modify.php">
<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
<span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Modify User</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
</div>
</nav>

