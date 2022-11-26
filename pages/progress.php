<?php
include 'connect.php';
session_start();
$tid=$_GET['tid'];

$sql="SELECT * FROM listtask WHERE taskid='$tid'";
$result = $conn->query($sql);
if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
		$sql="UPDATE listtask SET status ='In_progress' WHERE taskid='$tid'";
			if($conn->query($sql)===TRUE){
			header("Location:task.php?task=completed");
			exit();
				}
				else {
					header("Location:task.php?task=failed");
					exit();
				}
			$conn->close();
				}
			}

?>