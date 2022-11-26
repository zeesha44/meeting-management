<?php

	//session_start();

	$id=$_SESSION['staffid'];
    $email=$_SESSION['staffemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];
 include "staff_include/dash.php";

  if(isset($_POST["submit"])){
  $status="pending";
$date=$_POST['date'];
//$sid = $_POST['staffid'];H:m:sa
$timestamp = date('Y-m-d ', strtotime($date));
//echo $timestamp;
$email=$_POST["pemail"];
  $purpose=$_POST["purpose"];
if(empty($email)||empty($date)||empty($timestamp)){
    header("Location:requeststudent.php?request=empty");
    }
    else{

$sql =  "INSERT INTO request (pemail, purpose, mdatetime, staffid,fname,lname) VALUES ('$email','$purpose', '$timestamp', '$id','$fname','$lname')";
if($conn->query($sql)===TRUE){
             // header("Location:meetings.php?tid=$tid&request=successfull");
                exit();
}
else{
  echo "failed";
 // header("Location:requeststudent.php?request=failed");
                exit();
}
}
}

?>
<div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h4>SEND MEETING REQUEST</h4>
<div class="card-header-left ">
</div>
<form method="post" action="requeststudent.php">
<div class="">
<label for="exampleFormControlInput1" class="form-label ">Email address</label>
<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="studentname@example.com" name="pemail">
</div>
<label for="exampleDataList" class="form-label">Purpose of Meeting</label>
<input class="form-control" type="text" placeholder="" aria-label="default input example" name="purpose">
<label for="exampleDataList" class="form-label">Date</label>
<input class="form-control" type="date" placeholder="" aria-label="default input example" name="date">
<br>
<button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit" name="submit">
  Send
</button>
</form>
</div>
</div>
</div>
