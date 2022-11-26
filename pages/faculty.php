<?php
	session_start();
  include "staff_include/f_meeting.php";
	$id=$_SESSION['sessionid'];
    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
  

?>
<?php include "staff_include/dash.php"; ?>

<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<?php
         $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // if statement to ccheck if there is a string in the url
        // if(strpos($fullUrl,"request=empty")==true){
        //   echo "<p style='color:red'>Error!,please fill all fields!<p>";
        //   // exit();
        // }
        if(strpos($fullUrl,"request=successfull")==true){
          echo "<p style='color:green'>meeting successfully accepted!<p>";
          // exit();
        }
        if(strpos($fullUrl,"request=failed")==true){
          echo "<p style='color:green'>meeting successfully rejected!<p>";
          // exit();
        }
          ?>
<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h4>Meetings</h4>
<div class="card-header-left ">
</div>
<div class="">
<form method="post" action="">

<div class="">
 <div class="form-group">
    <label for="exampleFormControlSelect1">Faculty</label>
    <select class="form-control" name="faculty" id="exampleFormControlSelect1">
      <option>FNAS</option>
      <option>Engineering</option>
      <option>Health Science</option>
      <option>Social Science</option>
    </select>
  </div>
</div>
<label for="exampleDataList" class="form-label">Purpose of Meeting</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example" name="purpose">
<label for="exampleDataList" class="form-label">Date</label>
<input class="form-control" type="date" placeholder="" aria-label="default input example" name="date">
<label for="exampleDataList" class="form-label">Start time </label>
<input class="form-control" type="time" placeholder="" aria-label="default input example" name="start">
<label for="exampleDataList" class="form-label">End time</label>
<input class="form-control" type="time" placeholder="" aria-label="default input example" name="end">
<br>
<button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit" name="submit" style="background-color: #1e4da1; color: white;">
  Send
</button>
</div>

</form>
</div>
</div>
</div>
</div>
<a href="staff_meetings.php"><button type="submit" class="btn btn-secondary" id="submit" name="submit" style="background-color: #1e4da1; color: white;">
  back
</button></a>
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


