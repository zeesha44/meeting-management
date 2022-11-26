<?php
//session_start();
include 'connect.php';
include "header_sidebar.php"; 
?>



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
<form method="post" action="stud_request.php">
<table class="table table-striped">
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
	$sql = "SELECT * FROM request where pemail = '$email' and status !='accepted' and status !='rejected' ";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$date=$row["mdatetime"];
	$email=$row["pemail"];
	$purpose=$row["purpose"];
	$request=$row['requestid'];
	$fname = $row['fname'];
	$lname = $row['lname'];
echo "<tr><td>" . $row["mdatetime"]. "</td><td>" . $row["fname"] ." ". $row["lname"] . "</td><td>"
. $row["purpose"]. "</td> <td>"?>  <button class="btn btn-primary"><a href="stud_include/accept.php?&reqid=<?php echo $row['requestid'];?>">Accept</a></button> <?php "</td></tr>";
}
echo "</table>";


if(isset($_POST["accept"])){

$sid=$_POST['staffid'];
$rpurpose=$purpose;
$emails=$email;
$dates=$date;
$timestamp = date('Y-m-d H:m:sa', strtotime($dates));
//echo $timestamp;

$sql="INSERT INTO meetings(requestid,purpose,meetingdatetime,person,staffid)Values('$request','$rpurpose','$timestamp','$emails','$id')";
if($conn->query($sql)===TRUE){
$sqli="DELETE FROM request WHERE requestid='$request'";
if($conn->query($sqli)===TRUE){
	echo "meeting successfully accepted";
	}
}
else{
  echo "error could not accept meeting";
}
}

} else { echo "0 results"; }
$conn->close();




?>

</table>

</form>

</div>
</div>
</div>

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


