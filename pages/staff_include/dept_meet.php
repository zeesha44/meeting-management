<?php
include "connect.php";
 $id=$_SESSION['sessionid'];
    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
  
if(isset($_POST["submit"])){
	$dept=$_POST['department'];
	$purpose=$_POST['purpose'];
	$date=$_POST['date'];
	 $end=$_POST['end'];
	$start=$_POST['start'];
	// $purpose=$_POST['purpose'];
	// $date=$_POST['date'];
	// $end=$_POST['end'] H:m:sa;

//$sid = $_POST['staffid'];
$timestamp = date('Y-m-d ', strtotime($date));

$sql="INSERT INTO meetings (purpose,meetingdate, organiser, starttime, endtime)Values('$purpose','$timestamp', '$id', '$start', '$end')";
//echo "hello";
if($conn->query($sql)===TRUE){
$sql = "SELECT * FROM meetings WHERE meetingdate = '$timestamp' and purpose = '$purpose'";
$result = $conn->query($sql);

if($result->num_rows >0){
	//echo "hello";
	while ($row = $result->fetch_assoc()){
		$mid = $row['meetingid'];
		//echo $mid;

		$sqli = "SELECT * FROM user WHERE department = '$dept' and usertype = 'staff'";
		$result2 = $conn->query($sqli);

		if($result2->num_rows >0){
			while ($row2 = $result2->fetch_assoc()){
				$sid = $row2['userid'];
				//echo $sid;
					$sql2="INSERT INTO attendance (userid,meetingid)Values('$sid','$mid')";
					if($conn->query($sql2)===TRUE){
						$sql3 =  "INSERT INTO notification (name, message,active, userid)VALUES('$purpose','new meeting request','1', '$sid')";
    						if($conn->query($sql3)===TRUE){
						header("Location:../pages/dept_meeting.php?id=$id?&request=successfull");
					}
					else{
						header("Location:../pages/dept_meeting.php?id=$id?&request=failed");
					}
}
}
}

}
}
} 
else{
	header("Location:dept_meeting.php?meeting=failed");
exit();
}

	
	//$i++;

//echo $i;
}

$conn->close();

	
	


?>