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
	$datetime=$row['mdate'];
	$person=$row['pemail'];
	$status=$row['status'];
	$stud=$row['requester'];
	//if($row['staffid']==0){
		echo "hello";
		$sql="UPDATE request SET status ='rejected'WHERE requestid='$rid'";
			if($conn->query($sql)===TRUE){

				$sql7 =  "INSERT INTO notification (name, message, active, userid)VALUES('$purpose','meeting request was rejected','1', '$stud')";
					if($conn->query($sql7)===TRUE){
			header("Location:../Requests.php?meeting=rejected");
				}
			}
				else {
					echo "error could not accept meeting";
				}
				//} 
			$conn->close();
				}
			}

?>