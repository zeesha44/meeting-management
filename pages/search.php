<?php
include 'connect.php';
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

if(isset($_POST["search"])){
	$staffemail=$_POST['email'];
	$staffid=$_POST['id'];

	$sql = "SELECT * FROM staff Where staffid = $staffid or  staffemail = $staffemail";
	  $result = $conn->query($sql);
	  if (!$result) {
	  trigger_error('Invalid query: ' . $conn->error);
	  }
	  if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	$sid = $row['staffid'];

	  	 $sql = "SELECT * FROM attendance Where staffid = $sid";
		  $result = $conn->query($sql);
		  if (!$result) {
		  trigger_error('Invalid query: ' . $conn->error);
		  }
		  if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	$mid = $row['meetingid'];

		  	$sql = "SELECT * FROM meetings Where staffid = $sid";
			  $result = $conn->query($sql);
			  if (!$result) {
			  trigger_error('Invalid query: ' . $conn->error);
			  }
			  if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			  	$mdate = $row['meetingdatetime'];
			  	$end = $row['endtime'];
			  	$location = $row['location'];


		  }
		}




	  }
	}




}
else{
	echo "error";
}



?>