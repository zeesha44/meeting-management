<?php
include '../connect.php';
session_start();
$id=$_SESSION['sessionid'];
$rid=$_GET['reqid'];
// echo $rid;
// die();
$sql="SELECT * FROM request WHERE requestid='$rid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$purpose=$row['purpose'];
	$date=$row['mdate'];
	$start=$row['starttime'];
	$person=$row['pemail'];
	$stud=$row['requester'];
	//$end=$row['end'];
	//$lname=$row['lname'];
	//if($row['staffid']== 0){
		$sqli="UPDATE request SET status ='accepted' WHERE requestid='$rid'";
		//echo "hello";
			if($conn->query($sqli)===TRUE){
			
			$sql2="INSERT INTO meetings(requestid,purpose,meetingdate,organiser, starttime)Values('$rid','$purpose','$date','$stud','$start')";
			if($conn->query($sql2)===TRUE){
				$sql3 = "SELECT * FROM meetings WHERE meetingdate = '$date' and purpose = '$purpose'";
				$result2 = $conn->query($sql3);

				if($result2->num_rows >0){
					//echo "hello";
					while ($row2 = $result2->fetch_assoc()){
						$mid = $row2['meetingid'];
						//echo $mid;

						// $sql4 = "SELECT * FROM user WHERE email = '$person'";
						// $result3 = $conn->query($sql4);

						// if($result3->num_rows >0){
						// 	while ($row3 = $result3->fetch_assoc()){
						// 		$sid = $row3['userid'];
								//echo $sid;
			$sql5="INSERT INTO attendance (userid,meetingid)Values('$id','$mid')";
			if($conn->query($sql5)===TRUE){
				$sql6="INSERT INTO attendance (userid,meetingid)Values('$stud','$mid')";
				if($conn->query($sql6)===TRUE){
					
					$sql7 =  "INSERT INTO notification (name, message, active, userid)VALUES('$purpose','meeting request was accepted','1', '$stud')";
					if($conn->query($sql7)===TRUE){
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
			}
}
// }
// }

?>

