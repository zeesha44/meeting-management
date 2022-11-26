<?php
session_start();
$email = $_SESSION ['sessionemail'];
$id = $_SESSION ['sessionid'];

$id=$_GET['id'];
if(isset($_POST['submit'])){
include "connect.php";

    $password=$_POST['password'];
    $level=$_POST['level'];
    $department=$_POST['department'];
    //$deptid = $_POST['deptid'];

    $sql = "SELECT * FROM department WHERE deptname='$department'";
    $result = $conn->query($sql);
      
      if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
      }
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $newdept = $row['deptid'];
      
        $sql="UPDATE user SET department='$department',level='$level',password='$password', deptid = '$newdept' WHERE userid='$id'";

        if(mysqli_query($conn, $sql))
            {
                header("Location:modifyform.php?id=$id?&edit=successfull");
                exit();
            }
        else{
            header("Location:modifyform.php?id=$id?&edit=failed");
                exit();
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
<h4>Modify User</h4>
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
<li >
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
<li class="active">
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
<!-- Page-header end -->

<!-- Page body start -->
<div class="page-body">
<div class="row">
<div class="col-sm-12">
    <?php
    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // if statement to ccheck if there is a string in the url
    if(strpos($fullUrl,"edit=empty")==true){
    echo "<p style='color:red'>Error!,please fill all fields!<p>";
    // exit();
    }
    if(strpos($fullUrl,"edit=successfull")==true){
    echo "<p style='color:green'>Task Edited successfully!<p>";
    // exit();
    }
    if(strpos($fullUrl,"edit=failed")==true){
    echo "<p style='color:red'>Task failed to Edit!<p>";
    // exit();
    }
    ?>
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
    
    <?php
    include "connect.php";
   $id=$_GET['id'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM user WHERE userid='$id'";
      $result = $conn->query($sql);
      
      if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
      }
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
<h5>Edit Profile</h5>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="row flex-lg-nowrap">
<div class="col">
<div class="row">
<div class="card-body">
<div class="e-profile">
<div class="row">


</div>
<ul class="nav nav-tabs">
<li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
</ul>
<div class="tab-content pt-3">
<div class="tab-pane active">
<form class="form" novalidate="" method="post" action="modifyform.php?id=<?php echo $id;?>">
<div class="row">
<div class="col">
<div class="row">
<div class="col">
<div class="form-group">
<label>Department</label>
<select class="form-control" name="department" id="department">
      <option><?php echo $row['department'];?></option>
      <option>MBBS Medicine</option>
      <option>Political Science</option>
      <option>BSc Architecture</option>
      <option>Computer Science</option>
      <option>Banking and Finance</option>
      <option>LLB Law</option>
    </select>
</div>
<div class="form-group">
<label>Level</label>
<input class="form-control" type="text" name="level" id="level" value="<?php echo $row['level'];?>">
</div>
</div>
</div>
<div class="row">
<div class="col">
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" id="password" name="password">
</div>
</div>
</div>

<button class="btn btn-light" type="submit" name="submit" style="background-color: #1e4da1; color: white;">Save Changes</button>
</div>
</div>

</form>
<?php
    
}
} else { echo "0 results"; }
$conn->close();

?>
         
</div>
</div>
</div>
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

function triggerClick(e) {
document.querySelector('#profileImage').click();
}
function displayImage(e) {
if (e.files[0]) {
var reader = new FileReader();
reader.onload = function(e){
document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
}
reader.readAsDataURL(e.files[0]);
}
}
</script>
<script type="../js/script.js"></script>
</body>

</html>
