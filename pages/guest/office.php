<?php  
include '../connect.php';

if(isset($_POST["submit"])){
$office=$_POST['office'];
$purpose=$_POST['purpose'];
$date=$_POST['date'];
$phone_no= $_POST['phone_no'];
$email= $_POST['email'];
$name= $_POST['name'];

$timestamp = date('Y-m-d H:m:sa', strtotime($date));
$sql =  "INSERT INTO guest (office, purpose, mdate, phone_no, email, fullname) VALUES ('$office','$purpose', '$timestamp', '$phone_no','$email', '$name')";

if($conn->query($sql)===TRUE){
echo"New record successfully inserted";
}
else{
echo "error with your insertion";
}
}
// $sql = "SELECT * FROM office";
//     $result = $conn->query($sql);
//     if (!$result) {
//     trigger_error('Invalid query: ' . $conn->error);
//     }
//     if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {

?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<title>offic</title>
</head>
<body class="guest">
	<div class="white">
	<form method="post" action="office.php">
	<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Fullname</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="name" required="">
</div>
<label for="exampleFormControlInput1" class="form-label">Department</label>
<select class="form-select" aria-label="Default select example" name="office" required="">
  <option selected>Department</option>
  <option>MBBS Medicine</option>
      <option>Political Science</option>
      <option>BSc Architecture</option>
      <option>Computer Science</option>
      <option>Banking and Finance</option>
      <option>LLB Law</option>
</select>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Purpose</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="purpose" placeholder="Purpose" required="">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
  <input type="num" class="form-control" id="exampleFormControlInput1" name="phone_no" placeholder="" required="">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Date and Time</label>
  <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="date" placeholder="" required="">
</div>
	
	<button type="submit" class="btn btn-light" name="submit" required="">Submit</button>
	<a href="guest.php">Back</a>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>