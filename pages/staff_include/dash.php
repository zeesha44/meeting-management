<?php
include 'connect.php';
$id=$_SESSION['sessionid'];
 //echo $id;

    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];

    if(isset($_POST['logout'])){
        if(session_destroy())
        {
        header("Location:index.html");
        }
    }
    include 'notifications/notify.php';
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
<link rel="stylesheet" type="text/css" href="../css/style.css">


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
<?php if(!empty($count_active)){?>
<div class="badge bg-c-pink" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
<?php }?>
</a>
<?php if(!empty($count_active)){?>
<ul class="show-notification">
<li>
<h6>Notifications</h6>
<?php if(!empty($count_active)){?>
<label class="label label-danger">New</label>
</li>
<?php
foreach($notifications_data as $list_rows){?>
  <li id="message_items">
  <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id'];?>>
    <span><?php echo $list_rows['notifications_name'];?></span>
    <div class="msg">
      <a href="notifications/connection/deactive.php?&id=<?php echo $nid; ?>"><p><?php 
        echo $list_rows['message']; 
      ?></p></a>
      <?php }?> 
<?php }else{?>
  <?php
    foreach($deactive_notifications_dump as $list_rows){?>
      <li id="message_items">
      <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id'];?>>
        <span><?php echo $list_rows['notifications_name'];?></span>
        <div class="msg">
          <p><?php 
            echo $list_rows['message'];
          ?></p>
        </div>
      
      </li>
   <?php }
 ?>
  <!--old Messages-->

<?php } ?>
                                        

</ul>
</li>
<?php }
$sql = "SELECT * FROM user WHERE userid ='$id' ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $photo=$row["photo"];
?>
<li class="user-profile header-notification">
<a href="#!">
<img src="<?php echo '../images/' . $row["photo"] ?>" class="img-radius rounded_circle" style="border: 2px black; height: 50px; width: 50px; object-fit: cover;" >
<span><?php echo "$fname $lname";?></span>
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification profile-notification">
<li>
<a href="editstaff.php">
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
<img src="<?php echo '../images/' . $row["photo"] ?>" class="img-radius rounded_circle" style="border: 2px black; height: 50px; width: 50px; object-fit: cover;" >
<?php } ?>
<div class="user-details">
<span><?php echo "$fname $lname";?></span>
<span id="more-details"><i class="ti-angle-down"></i></span>
</div>
</div>

<div class="main-menu-content">
<ul>
<li class="more-details">
<a href="#"><i class="ti-user"></i>View Profile</a>
<a href="editstaff.php"><i class="ti-settings"></i>Settings</a>
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
<!-- <a href="staff_task.php">
<span class="pcoded-micon"><i class="ti-layout"></i></span>
<span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Task</span>
<span class="pcoded-mcaret"></span>
</a> -->
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
<li class="">
<a href="admin.php">
<span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
<span class="pcoded-mtext" data-i18n="nav.dash.main">Login as Admin</span>
<span class="pcoded-mcaret"></span>
</a>
</li>
</div>
</nav>
