<?php
session_start();
$email = $_SESSION ['sessionemail'];
$id = $_SESSION ['sessionid'];
include "connect.php";

if(isset($_POST["submit"])){

$staff_fname=$_POST['staff_fname'];
$staff_lname=$_POST['staff_lname'];
$staffphone=$_POST['staffphone'];
$staffdept= $_POST['staffdept'];
$position= $_POST['position'];
$staffemail=$_POST['staffemail'];
$staffid=$_POST['staffid'];
$staffpassword=$_POST['staffpassword'];
$level=$_POST['level'];

$rowEmail = "SELECT * FROM user WHERE email= '$staffemail'";
$rowReg = "SELECT * FROM user WHERE userid= '$staffid'";
		if($rowEmail>0){
      header("Location:addstaff.php?&email=exist");
    } 
    elseif ($rowReg>0) {
      header("Location:addstaff.php?&id=exist");
    } 
    else {
	$sqli = "SELECT * from department where deptname = '$staffdept'";
	$result = $conn->query($sqli);

	if($result->num_rows >0){  
  while ($row = $result->fetch_assoc()){
  $deptid = $row['deptid'];
  echo $deptid;

$sql =  "INSERT INTO user (fname, lname, phone_no, email, userid, password, department, deptid, usertype, level) VALUES ('$staff_fname','$staff_lname', '$staffphone', '$staffemail','$staffid', '$staffpassword','$staffdept', '$deptid', '$position', '$level')";

if($conn->query($sql)===TRUE){
header("Location:addstaff.php?&add=success");
//echo"New record successfully inserted";
}
else{
	header("Location:addstaff.php?&add=error");
//echo "error with your insertion";
}
}
}
}
}
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
<h4>Add User</h4>
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

<li class="user-profile header-notification">
<a href="#!">
<img src="../images/avatar.jpg" class="img-radius" alt="User-Profile-Image">
<span>Admin</span>
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification profile-notification">
<li>
<a href="editadmin.php">
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
<a href="editadmin.php"><i class="ti-settings"></i>Settings</a>
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


<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<?php
         $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl,"fields=empty")==true){
          echo "<p style='color:red'>Error!please fill all fields!<p>";
          // exit();
        }
        if(strpos($fullUrl,"email=exist")==true){
          echo "<p style='color:red'>Email already exist!<p>";
          // exit();
        }
        if(strpos($fullUrl,"id=exist")==true){
          echo "<p style='color:red'>Registeration Number already exist!<p>";
          // exit();
        }
        if(strpos($fullUrl,"add=success")==true){
          echo "<p style='color:green'>User successfully registered!<p>";
          // exit();
        }
        if(strpos($fullUrl,"add=error")==true){
          echo "<p style='color:red'>Error!<p>";
          // exit();
        }
          ?>
<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->

<div class="form-v4-content">
<form class="form-detail" action="addstaff.php" method="post">
<div class="form-group color">
<div class="form-row form-row-1 ">
<label for="first_name">First Name</label>
<input type="text" name="staff_fname" id="staff_fname" class="input-text"required>
</div>
<div class="form-row form-row-1">
<label for="last_name">Last Name</label>
<input type="text" name="staff_lname" id="staff_lname" class="input-text"required>
</div>
<div class="form-row form-row-1">
<label for="last_name">Phone No.</label>
<input type="num" name="staffphone" id="staffphone" class="input-text" required>
</div>
</div>
<div class="form-group">
<div class="form-row form-row-1">
<label for="last_name">ID.No</label>
<input type="num" name="staffid" id="staffid" class="input-text" required>
</div>

  <div class="form-row form-row-1">
<label for="">Level</label>
<input type="text" name="level" id="
level" class="input-text" required>
</div>
</div>
<div class="form-group">
<div class="form-row form-row-1">
<label for="last_name">User Type</label>
<select class="form-control" name="position" id="position" required>
      <option>staff</option>
      <option>student</option>
      <option>admin</option>
      <option>security</option>
      <option>secretary</option>
    </select>
</div>

<div class="form-row form-row-1">
<label for="">Department</label>
    <select class="form-control" name="staffdept" id="exampleFormControlSelect1" required>
      <option>MBBS Medicine</option>
      <option>Political Science</option>
      <option>BSc Architecture</option>
      <option>Computer Science</option>
      <option>Banking and Finance</option>
      <option>LLB Law</option>
    </select>
  </div>
</div>
<div class="form-row">
<label for="your_email">Email Address</label>
<input type="text" name="staffemail" id="staffemail" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
</div>
<div class="form-group">
<div class="form-row form-row-1 ">
<label for="password">Password</label>
<input type="password" name="staffpassword" id="staffpassword" class="input-text" required>
</div>
</div>
<div class="form-row-last">
<button type="submit" class="btn btn-light" name="submit" value="login" style="background-color: #1e4da1; color: white;">submit</button>
</div>
</form>
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
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
debug: true,
success:  function(label){
label.attr('id', 'valid');
},
});
$( "#myform" ).validate({
rules: {
password: "required",
comfirm_password: {
equalTo: "#password"
}
},
messages: {
name: {
required: "Please enter a firstname"
},
surname: {
required: "Please enter a lastname"
},
email: {
required: "Please provide an email"
},
password: {
required: "Please enter a password"
},
//comfirm_password: {
//required: "Please enter a password",
//equalTo: "Wrong Password"
//}
}
});
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
