<?php
//session_start();
include "connect.php";
include "stud_include/edittsk.php";
include "header_sidebar.php";


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
</div>
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<?php
$tid=$_GET['tid'];
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM todo WHERE taskid='$tid'";
$result = $conn->query($sql);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>

<div class="col-md-12 col-xl-8">
<div class="card">
<div class="card-header">
<h4>Edit Task</h4>
<form method="post">
<label for="exampleDataList" class="form-label">Task Name</label>
<input class="form-control" type="text" value="<?php echo $row['title'];?>" aria-label="default input example" name="title" id="title">
<label for="exampleDataList" class="form-label">Details</label>
<input class="form-control" type="text" value="<?php echo $row['details'];?>" aria-label="default input example"  name="details" id="details">
<br><button  type="submit" name="submit_tsk" class="btn btn-light" style="background-color: #1e4da1; color: white;">Edit Task</button>

<!-- <br><br><label for="exampleDataList" class="form-label">Deadline</label>
<input class="form-control" type="datetime-local" aria-label="default input example" name="date" id="date" >
<br>
<button  type="submit" name="submit_deadline" class="btn btn-primary">Edit Deadline</button> -->

</form>
</div>
</div>
<a href="stud_dashboard.php"><button  type="submit" class="btn btn-light" style="background-color: #1e4da1; color: white;">Back</button></a>



</div>
<?php

}
} else { echo "0 results"; }
$conn->close();

?>

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
