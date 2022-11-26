<?php
session_start();
include "connect.php";
  $id=$_SESSION['sessionid'];
    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];

if(isset($_POST["submit"])){

$date=$_POST['date'];
$start=$_POST['start'];
$end=$_POST['end'];
$details=$_POST['details'];

// $date=$_POST['date'];
 $timestamp = date('Y-m-d H:m:sa', strtotime($date));

$sql =  "INSERT INTO meetings (endtime, starttime, meetingdate, purpose, organiser) VALUES ('$end', '$start', '$date','$details', '$id')";
if (mysqli_query($conn, $sql)) {
		header("Location:addschedule.php?id=$id?&add=successfull");
		exit();
}
else{
	// echo "Task FAiled";
	header("Location:addschedule?&add=failed");
}
}


?>
<?php include "staff_include/dash.php";
?>


<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div classs="card">
<?php
$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// if statement to ccheck if there is a string in the url

if(strpos($fullUrl,"add=successfull")==true){
echo "<p style='color:green'>Task uploaded successfully!<p>";
// exit();
}
if(strpos($fullUrl,"add=failed")==true){
echo "<p style='color:red'>Task failed to upload!<p>";
// exit();
}
?>
</div>
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12 col-xl-8">
<div class="card">
<div class="card-header">
<h4>Add </h4>
<form method="post">
<label for="exampleDataList" class="form-label">Date</label>
<input class="form-control" type="date" placeholder="" aria-label="default input example" name="date" id="date">
<label for="exampleDataList" class="form-label">Start Time</label>
<input class="form-control" type="time" placeholder="" aria-label="default input example"  name="start" id="start">
<label for="exampleDataList" class="form-label">End Time</label>
<input class="form-control" type="time" placeholder="" aria-label="default input example"  name="end" id="end">
<label for="exampleDataList" class="form-label">Details</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example"  name="details" id="details">
<br>
<button  type="submit" name="submit" class="btn btn-primary" style="background-color: #1e4da1; color: white;">Add</button>

</form>


</div>
</div>
<a href="staff_schedule.php"><button  type="submit" name="submit" class="btn btn-primary" style="background-color: #1e4da1; color: white;">Back</button></a>

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
