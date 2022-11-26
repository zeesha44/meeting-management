<?php
include '../connect.php';
session_start();
$id=$_SESSION['sessionid'];
$rid=$_GET['reqid'];
//  echo $rid;
// die();
$sql="SELECT * FROM guest WHERE guestid='$rid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$mdate = $row['mdate'];
	$start = $row['mtime'];
          //$staffemail = $row['staffemail'];
          $purpose = $row['purpose'];
          $name = $row['fullname'];

$sqli="UPDATE guest SET status ='accepted' WHERE guestid='$rid'";
		//echo "hello";
			if($conn->query($sqli)===TRUE){
			
			$sql2="INSERT INTO meetings(purpose,meetingdate, guest,starttime, organiser)Values('$purpose','$mdate','$name','$start', '$id')";
			if($conn->query($sql2)===TRUE){
				$sql3 = "SELECT * FROM meetings WHERE meetingdate = '$mdate' and purpose = '$purpose'";
				$result2 = $conn->query($sql3);

				if($result2->num_rows >0){
					//echo "hello";
					while ($row2 = $result2->fetch_assoc()){
						$mid = $row2['meetingid'];
						
			$sql5="INSERT INTO attendance (userid,meetingid)Values('$id','$mid')";
			if($conn->query($sql5)===TRUE){
					
			header("Location:../Requests.php?&meeting=successfull");
				}
				else{
					echo "error could not accept meeting";
				}
			} 
		}
	}
}
			else { echo "0 results"; }
			$conn->close();
				}
			}
			

 
// }
?>