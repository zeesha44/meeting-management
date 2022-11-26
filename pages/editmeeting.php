<?php
include 'connect.php';
	session_start();
$mid=$_GET['meetingid'];
//echo $mid;
	$email = $_SESSION ['sessionemail'];
$id = $_SESSION ['sessionid'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
if(isset($_POST['submit'])){
 
    
  $location=$_POST['location'];
  $purpose=$_POST['purpose'];
  $date=$_POST['date'];
  $end=$_POST['end'];
  $agenda=$_POST['agenda'];
  $start=$_POST['start']; //H:m:sa;

//$sid = $_POST['staffid'];
$timestamp = date('Y-m-d ', strtotime($date));

$sql="UPDATE meetings SET purpose='$purpose', meetingdate='$timestamp', location='$location',endtime='$end', agenda ='$agenda', starttime = '$start' WHERE meetingid='$mid'";
//echo "hello";
if(mysqli_query($conn, $sql)){
  header("Location:editmeeting.php?meetingid=$mid&?edit=success");

}
else{
 header("Location:editmeeting.php?meetingid=$mid&?edit=failed");
}
}
  

?>
<?php include "staff_include/dash.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<?php
         $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if(strpos($fullUrl,"edit=success")==true){
          echo "<p style='color:green'>meeting has been uploaded!<p>";
          // exit();
        }
        if(strpos($fullUrl,"edit=failed")==true){
          echo "<p style='color:red'>Error!<p>";
          // exit();
        }
?>
<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12">
<div class="card">
<div class="card-header">

	<?php
	$mid=$_GET['meetingid'];
$sql = "SELECT * FROM meetings WHERE meetingid='$mid'";

  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  	?>
  	<form method="POST" action="editmeeting.php?meetingid=<?php echo $mid ?>" >
    <div class="mt-3">
    	<label for="date" class="form-label">Subject</label>
       <input class="form-control" type="text" placeholder=""value="<?php echo $row["purpose"]; ?>" name="purpose">
       
    </div>
    <div class="mt-3">
    	<label for="date" class="form-label">Location</label>
       <input class="form-control" type="text" placeholder=""value="<?php echo $row["location"]; ?>" name ="location" >
      
 </div>
 <div class="mt-3">
       <label for="attendess" class="form-label">Organiser</label>
       <input class="form-control" type="text" value="<?php echo $row["organiser"]; ?>" readonly="true">
 </div>
 <div class="mt-3 col-md-4">
 	<label for="typeOfMeeting" class="form-label ">Date</label>
       <input class="form-control" type="date" name="date" value="<?php echo $row["meetingdate"]; ?>" >
        
 </div>
 <div class="mt-3 col-md-4">
  <label for="subjectOfMeeting" class="form-label">Start Time</label>
       <input class="form-control" type="time" value="<?php echo $row["starttime"]; ?>" id="start" name="start" >
  
       
 </div>
 <div class="mt-3 col-md-4">
 	<label for="subjectOfMeeting" class="form-label">End Time</label>
       <input class="form-control" type="time" value="<?php echo $row["endtime"]; ?>" id="end" name="end" >
 	
       
 </div>
 <div class="mt-3">
       <label for="greetingtxt" class="form-label">Agenda</label>
       <textarea class="form-control" id="agenda" rows="5" col="3" value="<?php echo $row["agenda"]; ?>" name="agenda"></textarea>
 </div>
 <br>
	<button type="submit" class="btn btn-light" name="submit" value="submit" style="background-color: #1e4da1; color: white;">submit</button>
		<?php
	}
	
  }








	?>
</form>
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
