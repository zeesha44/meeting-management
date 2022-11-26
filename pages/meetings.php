<?php
//session_start();
include "header_sidebar.php";
include "stud_include/request.php";

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
        if(strpos($fullUrl,"request=empty")==true){
          echo "<p style='color:red'>Error!,please fill all fields!<p>";
          // exit();
        }
        if(strpos($fullUrl,"request=successfull")==true){
          echo "<p style='color:green'>Request successfully sent!<p>";
          // exit();
        }
        if(strpos($fullUrl,"request=failed")==true){
          echo "<p style='color:red'>Request Failed to Send!<p>";
          // exit();
        }
          ?>
      </div>

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
<form method="post" action="meetings.php">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Meeting</th>
<th scope="col">Details</th>
</tr>
</thead>
<tbody>
<tr>
<form method="post">
<?php
include 'connect.php';
// Check connection H:i:s
$date=date('Y-m-d ');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM attendance WHERE userid='$id'";

  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rid = $row['meetingid'];
    
  $sqli = "SELECT * FROM meetings WHERE meetingid='$rid'";
  $result2 = $conn->query($sqli);
  
  if (!$result2) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $mid = $row2['meetingid'];
    $mdate=$row2['meetingdate'];
    $oid = $row2['organiser'];
    $purpose =$row2["purpose"];
//echo $rid;

  $sql2 = "SELECT * FROM user WHERE userid='$oid'";

  $result3 = $conn->query($sql2);
  
  if (!$result3) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
   // echo $oid;
$fname = $row3['fname'];
    $lname=$row3['lname'];
    if($date<= $mdate){
echo "<tr><td>" . $mdate. "</td><td>" . $fname ." ". $lname . "</td><td>"
. $purpose. "</td></tr>";
}
}
}

}
}
}
}

?>
</tr>
</tbody>

</table>

</form>

</div>
</div>
</div>
<div class="row">
<div class="col card">
 <div class="mr">
  <form method="post" action="meetings.php">
<h4>SEND MEETING REQUEST</h4>
<div class="">
<label for="exampleFormControlInput1" class="form-label ">Email address</label>
<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="staffname@example.com" name="pemail">
</div>
<label for="exampleDataList" class="form-label">Purpose of Meeting</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example" name="purpose">
<label for="exampleDataList" class="form-label">Date</label>
<input class="form-control" type="date" placeholder="" aria-label="default input example" name="date">
<label for="exampleDataList" class="form-label">Start time</label>
<input class="form-control" type="time" placeholder="" aria-label="default input example" name="start">
<br>
<button type="submit" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit" name="submit"style="background-color: #1e4da1; color: white;">
  Send
</button>
</div>

</form>
</div>
<div class="col-auto"></div>
<div class="col card">
  <div class="mr">
  <h4>REQUEST'S STATUS</h4>
<form method="post" action="">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Request</th>
<th scope="col">Status</th>
</tr>
</thead>
<tbody>
<tbody>
<tr>
<form method="post">
<?php
include 'connect.php';
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//echo $id;
$sql = "SELECT * FROM request where requester = '$id' and mdate >= '$date' ORDER BY requestid DESC LIMIT 5";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  // $date=$row["meetingdatetime"];
  // $email=$row["pemail"];
  // $purpose=$row["purpose"];
echo "<tr><td>" . $row["purpose"]. "</td><td>" . $row["status"] . "</td></tr>";
}
echo "</table>";
}
else { echo "0 results"; }
  $conn->close();
  ?>
</tr>
</tbody>

</table>

</form>
</div>
</div>
</div>
<div id="styleSelector">
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
</script>
</body>

</html>


