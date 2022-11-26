<?php
session_start();
include "connect.php";
$id=$_SESSION['staffid'];
$email=$_SESSION['staffemail'];
$fname=$_SESSION['sessionfname'];
$lname=$_SESSION['sessionlname'];
if(isset($_POST["submit"])){
// echo "hello";
// $studentid = $_GET['studentid'];
// $taskid = $_GET['taskid'];

// //$fname = $_SESSION['fname'];
// //$lname = $_SESSION['lname'];

$title=$_POST['title'];
$details=$_POST['details'];
$status="incomplete";
$date=$_POST['date'];
$timestamp = date('Y-m-d H:m:sa', strtotime($date));
if(empty($title)||empty($date)){
    header("Location:addtaskstaff.php?&newtask=empty");
        exit();
    }
 else{
$sql =  "INSERT INTO listtask (title, deadline, details, status, fname, lname, staffid) VALUES ('$title', '$timestamp','$details', '$status', '$fname', '$lname','$id')";
if (mysqli_query($conn, $sql)) {
header("Location:addtaskstaff.php?&newtask=successfull");
		exit();
	}
else{
	header("Location:addtaskstaff.php?&newtask=failed");
}
}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Meeting Management System</title>
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

<div class="navbar-logo">
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="ti-menu"></i>
</a>
<a class="mobile-search morphsearch-search" href="#">
<i class="ti-search"></i>
</a>
<a href="index.html">
<h3>Welcome</h3>
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
<i class="ti-bell"></i>
<span class="badge bg-c-pink"></span>
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
<span><?php echo "$fname $lname";?></span>
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
<span><?php echo "$fname $lname";?></span>
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
<li class="">
<a href="staff_dash.php">
<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
<span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
<li class="">
<a href="staff_task.php">
<span class="pcoded-micon"><i class="ti-layout"></i></span>
<span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Task</span>
<span class="pcoded-mcaret"></span>
</a>
<li>
<a href="staff_meetings.php">
<span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
<span class="pcoded-mtext" data-i18n="nav.form-components.main">Meetings</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
<li>
<a href="staff_schedules.php">
<span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
<span class="pcoded-mtext" data-i18n="nav.form-components.main">Schedules</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
<li class="">
<a href="Requests.php">
<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
<span class="pcoded-mtext" data-i18n="nav.dash.main">Requests</span>
<span class="pcoded-mcaret"></span>
</a>
</li>

</div>
</nav>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
 <?php
$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// if statement to ccheck if there is a string in the url
if(strpos($fullUrl,"newtask=empty")==true){
echo "<p style='color:red'>Error!,please fill all fields!<p>";
// exit();
}
if(strpos($fullUrl,"newtask=successfull")==true){
echo "<p style='color:green'>Task uploaded successfully!<p>";
// exit();
}
if(strpos($fullUrl,"newtask=failed")==true){
echo "<p style='color:red'>Task failed to upload!<p>";
// exit();
}
?>
<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12 col-xl-8">
<div class="card">
<div class="card-header">
<h4>Add New Task</h4>
<form method="post">
<label for="exampleDataList" class="form-label">Task Name</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example" name="title" id="title">
<label for="exampleDataList" class="form-label">Details</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example"  name="details" id="details">
<label for="exampleDataList" class="form-label">Deadline</label>
<input class="form-control" type="datetime-local" placeholder="" aria-label="default input example" name="date" id="date" >
<br>
<button  type="submit" name="submit" class="btn btn-primary">Add Task</button>

</form>


<div id="styleSelector">

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>


<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
if ($window.scrollTop() >= 200) {
nav.addClass('active');
}
else {
nav.removeClass('active');
}
});
</script>
</body>

</html>
