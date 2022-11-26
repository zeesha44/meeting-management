<?php
//session_start();
//include "header_sidebar.php";
$id=$_SESSION['sessionid'];
if(isset($_POST["submit"])){
$status="pending";
$date=$_POST['date'];
$start=$_POST['start'];
$timestamp = date('Y-m-d H:m:sa', strtotime($date));
//echo $timestamp;
$email=$_POST["pemail"];
  $purpose=$_POST["purpose"];
if(empty($email)||empty($date)||empty($timestamp)){
    //header("Location:meetings.php?&request=empty");
    echo "empty";
    }
    else{

$sql =  "INSERT INTO request (pemail, purpose, mdate, requester, status, starttime) VALUES ('$email','$purpose', '$timestamp', '$id','$status','$start')";
if($conn->query($sql)===TRUE){

  $sqli = "SELECT * FROM user WHERE email='$email'";
  $result1 = $conn->query($sqli);
  if (!$result1) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
    $tid = $row['userid'];

    $sql =  "INSERT INTO notification (name, message,active, userid)VALUES('$purpose','new meeting request','1', '$tid')";
    if($conn->query($sql)===TRUE){

             header("Location:meetings.php?id=$id?&request=successfull");
                exit();
}
else{
  //echo 'failed';
  header("Location:meetings.php?&request=failed");
  //echo'failed';
                exit();
}
}
}
}
}
}

?>