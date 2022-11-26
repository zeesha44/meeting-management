<?php
include '../connect.php';
session_start();
$rid=$_GET['reqid'];

$sql="SELECT * FROM guest WHERE guestid='$rid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	
		$sql="UPDATE guest SET status ='rejected'WHERE guest='$rid'";
			if($conn->query($sql)===TRUE){

			header("Location:../Requests.php?meeting=rejected");
				}
			
				else {
					echo "error could not accept meeting";
				}
				//} 
			$conn->close();
				}
			}

?>