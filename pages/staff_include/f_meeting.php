<?php
include "connect.php";
 $stemail=$_SESSION['staffemail'];
$id=$_SESSION['staffid'];
$fname=$_SESSION['sessionfname'];
$lname=$_SESSION['sessionlname'];
//$i=0;
if(isset($_POST["submit"])){
	$faculty=$_POST['faculty'];
	$purpose=$_POST['purpose'];
	$date=$_POST['date'];
	$end=$_POST['end'];
	$start=$_POST['start'];
	// $end=$_POST['end'];
	// $dept=$_POST['department'];
	// $purpose=$_POST['purpose'];
	// $date=$_POST['date'];
	// $end=$_POST['end'];

//$sid = $_POST['staffid'] H:m:sa;
$timestamp = date('Y-m-d ', strtotime($date));

$sql="INSERT INTO meetings (purpose,meetingdate, organiser, starttime, endtime)Values('$purpose','$timestamp', '$id', '$start', '$end')";
//echo "hello";
if($conn->query($sql)===TRUE){
$sqli = "SELECT * FROM meetings WHERE meetingdate = '$timestamp' and purpose = '$purpose'";
$result = $conn->query($sqli);

if($result->num_rows >0){
	//echo "hello";
	while ($row = $result->fetch_assoc()){
		$mid = $row['meetingid'];
		//echo $mid;
		$sql3 = "SELECT * FROM department WHERE faculty = '$faculty'";
		$result3 = $conn->query($sql3);

		if($result3->num_rows >0){
			while ($row3 = $result3->fetch_assoc()){
				$did = $row3['deptid'];

		$sql2 = "SELECT * FROM user WHERE usertype = 'staff' and deptid = '$did'";
		$result2 = $conn->query($sql2);

		if($result2->num_rows >0){
			while ($row2 = $result2->fetch_assoc()){
				$sid = $row2['userid'];
					$sql3="INSERT INTO attendance (userid,meetingid)Values('$sid','$mid')";
					if($conn->query($sql3)===TRUE){
						$sql4 =  "INSERT INTO notification (name, message,active, userid)VALUES('$purpose','new meeting request','1', '$sid')";
    						if($conn->query($sql4)===TRUE){
						header("Location:../pages/faculty.php?id=$id?&request=successfull");
					}
					else{
						header("Location:../pages/faculty.php?id=$id?&request=failed");
					}
}
}
}

}
}
}
}
else{
	header("Location:faculty.php?&meeting=failed");
exit();
}

	}
}



$conn->close();

	
	


?>