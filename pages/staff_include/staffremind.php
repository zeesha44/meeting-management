
<table class="table table-striped">
  <thead>
  <tr>
  <th scope="col">Task</th>
  </tr>
  </thead>

<?php
include 'connect.php';
  $id=$_SESSION['staffid'];
    $id=$_SESSION['sessionstudid'];
$date=date('Y-m-d H:i:s');
// echo $date;



if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM listtask WHERE staffid='$id' and status !='completed'";
  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tid = $row['taskid'];
    $deadline=$row['deadline'];
    if($deadline<=$date){
    ?>
    <tr style="color:red;">
      <td> <?php echo $row["title"]; ?>
      	<br><?php echo $row["deadline"];?>
      </td>
  </tr>
      <?php
      	}
  }
  } else { echo "0 results"; }
  $conn->close();


?>
</table>
