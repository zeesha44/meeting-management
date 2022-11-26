<!-- <?php
//include "connect.php";

// if(isset($_POST["submit"])){
// $name=$_POST['name'];
// $surname=$_POST['surname'];
// $phone_no=$_POST['phone_no'];
// $email=$_POST['email'];
// $sname=$_POST['sname'];
// $sdepartment=$_POST['sdepartment'];
// $sid=$_POST['sid'];
// $rfm=$_POST['rfm'];


// $sql =  "INSERT INTO guest (name, surname, phone_no, email, sname, sdepartment, sid, rfm) VALUES ('$name','$surname', '$phone_no', '$email','$sname', '$sdepartment', '$sid', '$rfm')";

// if($conn->query($sql)===TRUE){
// 	echo"New record successfully inserted";
// }
// else{
// 	echo "error with your insertion";
// }
// }
?> -->

<!DOCTYPE html>
<html>
<head>
	<title>Guest</title>
	<!--bootsrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

</head>

<body style="background-image: url(../../images/3.jpg); background-repeat: no-repeat;
  background-size: cover;">
<h1 style="text-align: center;" class="title">Welcome to Nile Meeting Management System</h1>
<div class="center" >

<div class="row">
  <div class="col ">
    <div class="card text-dark mb-3 shadow" style="max-width: 18rem;">
      <div class="card-header">Department</div>
      <div class="card-body">
        <p class="card-text">book an appointment with a department</p>
        <a href="office.php" class="btn btn-light">Book</a>
      </div>
    </div>
  </div>
  <!-- <div class="col">
    <div class="card text-dark  mb-3 shadow" style="max-width: 18rem;">
      <div class="card-header">Staff</div>
      <div class="card-body">
        <p class="card-text">book an appointment with a staff</p>
        <a href="staff.php" class="btn btn-light">Book</a>
      </div>
    </div>
  </div> -->
  <div class="col">
    <div class="card text-dark  mb-3 shadow" style="max-width: 18rem;">
      <div class="card-header">View Request</div>
      <div class="card-body">
        <p class="card-text">check your request status here</p>
        <a href="view.php" class="btn btn-light">View</a>
      </div>
    </div>
  </div>
</div>	
<a href="../../index.html" class="btn btn-light">back</a>

</div>

<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
