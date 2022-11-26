<?php
include '../connect.php';
session_start();
$tid=$_GET['tid'];

$sql="SELECT * FROM todo WHERE taskid='$tid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
		$sql="UPDATE todo SET status ='completed' WHERE taskid='$tid'";
			if($conn->query($sql)===TRUE){
			header("Location:../stud_dashboard.php?taskc=completed");
			exit();
				}
				else {
					header("Location:../stud_dashboard.php?taskc=failed");
					exit();				}
				//} 
			// else { 
			// 	echo "0 results"; 
			// }
			$conn->close();
				}
			}

?>