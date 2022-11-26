<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<title></title>
</head>
<body class="guest">
<div class="white">
<form method="post" action="view.php">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Meeting</th>
      <th scope="col">Purpose</th>
      <th scope="col">Status</th>
    </tr>
  </thead>





<?php
include '../connect.php';
if(isset($_POST["submit"])){
$email= $_POST['email'];

$sql = "SELECT * FROM guest WHERE email='$email'";
		  $result = $conn->query($sql);
		  
		  if (!$result) {
		  trigger_error('Invalid query: ' . $conn->error);
		  }
		  if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	$mdate = $row['mdate'];
			  	$staffemail = $row['staffemail'];
			  	$purpose = $row['purpose'];
			  	$status = $row['status'];

			  	?>


  <tbody>
    <tr>
      <tr>
      <td> <?php echo $mdate; ?></td>
      <td><?php  echo $staffemail;?></td>
      <td><?php echo $purpose;?></td>
      <td><?php echo $status;?></td>
    </tr>
    <tr>
      <?php






		  }
		}
		else{
			echo "0 request";
		}


}




?>
</tr>
</tr>
</tbody>
</table>
<br>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"></label>
  <input type="text" class="form-control" id="email" name="email" placeholder="enter your email address" required="">
</div>
	<button type="submit" class="btn btn-light" name="submit">Check</button>
</form>
<br>
<a href="guest.php">back</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
