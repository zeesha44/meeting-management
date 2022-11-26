<?php
session_start();
include 'connect.php';

$id=$_SESSION['sessionid'];
 //echo $id;

    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
    $type=$_SESSION['usertype'];
    $dept= $_SESSION['department'];



?>
<?php include "staff_include/dash.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
	 <div classs="card">
          <?php
         $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // if statement to ccheck if there is a string in the url
        // if(strpos($fullUrl,"request=empty")==true){
        //   echo "<p style='color:red'>Error!,please fill all fields!<p>";
        //   // exit();
        // }
        if(strpos($fullUrl,"meeting=accepted")==true){
          echo "<p style='color:green'>meeting successfully accepted!<p>";
          // exit();
        }
        if(strpos($fullUrl,"meeting=rejected")==true){
          echo "<p style='color:green'>meeting successfully rejected!<p>";
          // exit();
        }
          ?>
      </div>
<!-- card1 start -->
<!-- Statestics Start -->
<!-- Required Jquery -->
<div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h4>Requests</h4>
<div class="card-header-left ">
</div>
<div class="">
<form method="post" action="Requests.php">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Name</th>
<th scope="col">Purpose</th>
<th scope="col"></th>
<th scope="col"></th>
</tr>
</thead>
<form method="post">
<?php
include 'connect.php';
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$date=date('Y-m-d');
$time=date('H:m:sa');
	$sql = "SELECT * FROM request where pemail = '$email' and status !='accepted' and status !='rejected' ";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$mdate=$row["mdate"];
	$email=$row["pemail"];
	$purpose=$row["purpose"];
	$request=$row['requestid'];
  $requester=$row['requester'];
$start=$row['starttime'];

  $sqli = "SELECT * FROM user where userid = '$requester'";
$result2 = $conn->query($sqli);
if (!$result2) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result2->num_rows > 0) {
// output data of each row
while($row2 = $result2->fetch_assoc()) {
	$fname = $row2['fname'];
	$lname = $row2['lname'];

    //$mdate=$row2['mdate'];
    
  // echo  $start;
    $timestamp = date('H:m:s', strtotime($start));
    $timetosub = date (" H:m:s", strtotime('05:00:00'));
    $newtime=  (int)$timestamp - (int)$timetosub ;
    $new =  date (" H:m:s", strtotime($newtime));
  // echo $new;

if ($mdate>= $date) {
 
echo "<tr><td>" . $row["mdate"]. "</td><td>" . $fname ." ". $lname . "</td><td>"
. $row["purpose"]. "</td> <td>";
if($new <= $time){
?> <button class="btn btn-outline-primary"><a href="staff_include/accept.php?&reqid=<?php echo $row['requestid'];?>">Accept</i></a></button>  <?php }"</td> <td>"?>  <button class="btn btn-outline-danger"><a href="staff_include/reject.php?&reqid=<?php echo $row['requestid'];?>">Reject</a></button>  <?php "</td></tr>";
}
}
}
}

}



?>

</table>

</form>

</div>
</div>
</div>
<?php
if($type=='secretary'){?>
<div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h4>Guest</h4>
<div class="card-header-left ">
</div>
<div class="">
<form method="post" action="Requests.php">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Name</th>
<th scope="col">Purpose</th>
<th scope="col"></th>
<th scope="col"></th>
</tr>
</thead>

<?php


$sql = "SELECT * FROM guest WHERE office='$dept' and status ='pending'";
      $result = $conn->query($sql);
      
      if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
      }
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $mdate = $row['mdate'];
          $staffemail = $row['staffemail'];
          $purpose = $row['purpose'];
          $name = $row['fullname'];

          if ($mdate>= $date) {
 
echo "<tr><td>" . $mdate. "</td><td>" . $name . "</td><td>"
. $purpose. "</td> <td>";

?> <button class="btn btn-outline-primary"><a href="guest/accept.php?&reqid=<?php echo $row['guestid'];?>">Accept</i></a></button>  <?php }"</td> <td>"?>  <button class="btn btn-outline-danger"><a href="guest/reject.php?&reqid=<?php echo $row['guestid'];?>">Reject</a></button>  <?php "</td></tr>";







      }
    }
    else{
      echo "0 request";
    }


}





?>








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


