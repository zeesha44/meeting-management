
<table class="table table-hover">
  <thead>
  <tr>
  <th scope="col">Meeting</th>
  <th scope="col">Time</th>
  <th scope="col">View</th>
  </tr>
  </thead>

<?php
include 'connect.php';
$id=$_SESSION['sessionstudid'];
$date=date('Y-m-d H:i:s');
// echo $date;



  $sql = "SELECT * FROM meetings WHERE userid='$id' or organiser ='$id'";
  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $mid = $row['meetingid'];
    $mdate=$row['meetingdate'];
    //echo $rid;
    if($mdate==$date){
    ?>
    <tr style="">
      <td> <?php echo $row['meetingdate']; ?></td>
      <td><?php echo $row["purpose"];?></td>
      <td><a href="meeting_details.php?meetingid=<?php echo $mid;?>" title="view" class="text-info"><i class="ti-eye"></i></a></td>
  </tr>
      <?php
        }
 
}
}
 else { 
  echo "0 results"; }
  $conn->close();


?></table>
