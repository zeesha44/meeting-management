<?php 
//session_start();

include_once('process.php') ;
include ('admin_include/edit.php');
include ('admin_include/head.php');

//session_start();
$email = $_SESSION ['sessionemail'];
$id = $_SESSION ['sessionid']; 
$fname = $_SESSION['sessionfname'];
$lname =  $_SESSION['sessionlname']; 
//echo$id;
?>

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
    echo "<p style='color:green'>Profile Edited successfully!<p>";
    // exit();
    }
    if(strpos($fullUrl,"edit=failed")==true){
    echo "<p style='color:red'>Profile failed to Edit!<p>";
    // exit();
    }
    ?>
<!-- Basic Form Inputs card start -->
<div class="card">
<div class="card-header">
    
    <?php
   // $id=$_GET['id'];
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

<h5>change profile picture</h5>
</div>
<form method="post" enctype='multipart/form-data'>
  <input type='file' name='file' />
 <input type='submit' value='Save image' class=' btn btn-light' name='save_profile'style="background-color: #1e4da1; color: white;">

</form>

</div>
<ul class="nav nav-tabs">
<li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
</ul>
<div class="tab-content pt-3">
<div class="tab-pane active">
<form class="form" novalidate="" method="post">
<div class="row">
<div class="col">
<div class="row">
<div class="col">
<div class="form-group">
<label>First Name</label>
<input class="form-control" type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>">
</div>
<div class="form-group">
<label>Last Name</label>
<input class="form-control" type="text" name="lname" id="lname" value="<?php echo $row['lname'];?>">
</div>
</div>
</div>
<div class="row">
<div class="col">
<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" id="email" value="<?php echo $row['email'];?>" name="email">
</div>
</div>
</div>

<button class="btn btn-primary" type="submit" name="submit"style="background-color: #1e4da1; color: white;">Save Changes</button>
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
