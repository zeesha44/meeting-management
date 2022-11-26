<?php
  session_start();

  $id=$_SESSION['staffid'];
    $email=$_SESSION['staffemail'];
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

if(strpos($fullUrl,"delete=successfull")==true){
echo "<p style='color:green'>Delete successfully!<p>";
// exit();
}
if(strpos($fullUrl,"delete=failed")==true){
echo "<p style='color:red'>Failed to delete!<p>";
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
<h4>Schedule</h4>
<div class="card-header-left ">
</div>
<div class="">
<form method="post" action="">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Start Time</th>
<th scope="col">End Time</th>
<th scope="col">Meeting</th>
<th scope="col">Details</th>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
</tr>
</thead>
<tbody>
<tr>
<form method="post">
<?php
include 'connect.php';
// Check connection
$date=date('Y-m-d');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM attendance WHERE userid='$id'";
  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // matput data of each row
  while($row = $result->fetch_assoc()) {
    $rid = $row['meetingid'];
   // echo $rid;

  $sqli = "SELECT * FROM meetings WHERE meetingid='$rid'";
  $result2 = $conn->query($sqli);
  
  if (!$result2) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result2->num_rows > 0) {
  // matput data of each row
  while($row2 = $result2->fetch_assoc()) {
    $mid = $row2['meetingid'];
    $mdate=$row2['meetingdate'];
    $oid = $row2['organiser'];
    $purpose =$row2["purpose"];
    $start=$row2['starttime'];
    $end=$row2['endtime'];

  $sql2 = "SELECT * FROM user WHERE userid='$oid'";
  $result3 = $conn->query($sql2);
  
  if (!$result3) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result3->num_rows > 0) {
  // matput data of each row
  while($row3 = $result3->fetch_assoc()) {
$fname = $row3['fname'];
    $lname=$row3['lname'];
    if($date<= $mdate){
echo "<tr><td>" . $mdate. "</td><td>" . $start. "</td><td>". $end. "</td><td>". $fname ." ". $lname . "</td><td>"
. $purpose. "</td><td>"; if($id==$oid){?><a href="editmeeting.php?meetingid=<?php echo $mid;?>" title="" class="text-info"><i class="ti-pencil-alt"></i></a> <?php"</td><td>" ?> <a href="deletemeeting.php?meetingid=<?php echo $mid;?>" title="" class="text-info"><i class="ti-trash"></i></a><?php }"</td></tr>";
}
}
}

}
}
}
}



else { echo "0 results"; }
  $conn->close();
  ?>
</tr>
</tbody>

</table>

</form>

</div>
<a href="addschedule.php">Add to Schedule</a>
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
