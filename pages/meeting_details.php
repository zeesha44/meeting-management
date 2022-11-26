<?php
	session_start();

	$email = $_SESSION ['sessionemail'];
$id = $_SESSION ['sessionid'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
  

?>
<?php include "staff_include/dash.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

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
$oid= $row["organiser"];
  	?>
  	<form method="POST" action="meeting_details.php" novalidate="">
    <div class="mt-3">
    	<label for="date" class="form-label">Subject</label>
       <input class="form-control" type="text" placeholder=""value="<?php echo $row["purpose"]; ?>" readonly="true">
       
    </div>
    <div class="mt-3">
    	<label for="date" class="form-label">Location</label>
       <input class="form-control" type="text" placeholder=""value="<?php echo $row["location"]; ?>" readonly="true">
      
 </div>
 <div class="mt-3">
       <label for="attendess" class="form-label">Organiser</label>
       <input class="form-control" type="text" value="<?php echo $row["organiser"]; ?>" readonly="true">
 </div>
 <div class="mt-3 col-md-4">
 	<label for="typeOfMeeting" class="form-label ">Date</label>
       <input class="form-control" type="text" name="" value="<?php echo $row["meetingdate"]; ?>" readonly="true">
        
 </div>
 <div class="mt-3 col-md-4">
  <label for="subjectOfMeeting" class="form-label">Start Time</label>
       <input class="form-control" type="text" value="<?php echo $row["starttime"]; ?>" id="" name="" readonly="true">
  
       
 </div>
 <div class="mt-3 col-md-4">
 	<label for="subjectOfMeeting" class="form-label">End Time</label>
       <input class="form-control" type="text" value="<?php echo $row["endtime"]; ?>" id="" name="" readonly="true">
 	
       
 </div>
 <div class="mt-3">
       <label for="greetingtxt" class="form-label">Agenda</label>
       <textarea class="form-control" id="agenda" rows="5" col="3"><?php echo $row["agenda"]; ?></textarea>
 </div>
 <br>
 <?php
$sqli = "SELECT * FROM user where userid= $oid";
  $result2 = $conn->query($sqli);
  
  if (!$result2) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    if ($row2['usertype']== 'staff') {
      
    
 ?>
	<a href="upload_mom.php?meetingid=<?php echo $mid;?>" class="text-info"><i class="ti-clipboard"></i>Minutes</a>
		<?php
  }
}
}
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
