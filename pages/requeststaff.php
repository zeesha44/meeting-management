<?php
session_start();
include 'connect.php';
//include "header_sidebar.php";
$id=$_SESSION['sessionid'];
if(isset($_POST["submit"])){
$status="pending";
$date=$_POST['date'];
$start=$_POST['start'];
$timestamp = date('Y-m-d H:m:sa', strtotime($date));
//echo $timestamp;
$email=$_POST["pemail"];
  $purpose=$_POST["purpose"];
if(empty($email)||empty($date)||empty($timestamp)){
    //header("Location:meetings.php?&request=empty");
    echo "empty";
    }
    else{

$sql =  "INSERT INTO request (pemail, purpose, mdate, requester, status, starttime) VALUES ('$email','$purpose', '$timestamp', '$id','$status','$start')";
if($conn->query($sql)===TRUE){

  $sqli = "SELECT * FROM user WHERE email='$email'";
  $result1 = $conn->query($sqli);
  if (!$result1) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
    $tid = $row['userid'];

    $sql =  "INSERT INTO notification (name, message,active, userid)VALUES('$purpose','new meeting request','1', '$tid')";
    if($conn->query($sql)===TRUE){

             header("Location:requeststaff.php?id=$id?&request=successfull");
                exit();
}
else{
  //echo 'failed';
  header("Location:requeststaff.php?&request=failed");
  //echo'failed';
                exit();
}
}
}
}
}
}
 include "staff_include/dash.php"; 
?>
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
          echo "<p style='color:green'>request sent!<p>";
          // exit();
        }
        if(strpos($fullUrl,"request=failed")==true){
          echo "<p style='color:red'>failed!<p>";
          // exit();
        }
          ?>

<div class="page-body">
<div class="row">
   <div classs="card">
<div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h4>SEND MEETING REQUEST</h4>
<div class="card-header-left ">
</div>
<form method="post" action="requeststaff.php">
<div class="">
<label for="exampleFormControlInput1" class="form-label ">Email address</label>
<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="staffname@example.com" name="pemail">
</div>
<label for="exampleDataList" class="form-label">Purpose of Meeting</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example" name="purpose">
<label for="exampleDataList" class="form-label">Date</label>
<input class="form-control" type="date" placeholder="" aria-label="default input example" name="date">
<label for="exampleDataList" class="form-label">Start Time </label>
<input class="form-control" type="time" placeholder="" aria-label="default input example" name="start">
<br>
<button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit" name="submit" style="background-color: #1e4da1; color: white;">
  Send
</button>
</form>
</div>
</div>
</div>
<a href="staff_meetings.php"><button type="submit" class="btn btn-secondary" id="submit" name="submit" style="background-color: #1e4da1; color: white;">
  back
</button></a>
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
