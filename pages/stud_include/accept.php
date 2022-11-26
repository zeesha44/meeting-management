<?php
include '../connect.php';
session_start();
$rid=$_GET['reqid'];

$sql="SELECT * FROM request WHERE requestid='$rid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$purpose=$row['purpose'];
	$datetime=$row['mdatetime'];
	$person=$row['pemail'];
	$staff=$row['staffid'];
	$fname=$row['fname'];
	$lname=$row['lname'];
	//if($row['staffid']== 0){
		$sql="INSERT INTO meetings(purpose,meetingdatetime,pemail,staffid,fname,lname)Values('$purpose','$datetime','$person','$staff','$fname','$lname')";
		//echo "hello";
			if($conn->query($sql)===TRUE){
			$sqli="UPDATE request SET status ='accepted'WHERE requestid='$rid'";
			if($conn->query($sqli)===TRUE){
			header("Location:../stud_request.php?meeting=accepted");
				}
				else{echo "error could not accept meeting";
				}
			} 
			else { echo "0 results"; }
			$conn->close();
				//}
			}
}
?>