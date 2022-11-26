
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
$id=$_SESSION['sessionid'];

$date=date('Y-m-d');
$time=date('H:m:sa');
 //echo $time;


$sql = "SELECT * FROM attendance WHERE userid='$id'";

  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rid = $row['meetingid'];
   // echo $rid;

  $sqli = "SELECT * FROM meetings WHERE meetingid='$rid'";
  $result2 = $conn->query($sqli);
  
  if (!$result2) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $mid = $row2['meetingid'];
    $mdate=$row2['meetingdate'];
    $start=$row2['starttime'];
$oid = $row2['organiser'];
   // echo  $start;
    $timestamp = date('H:i:s', strtotime($start));
   $timetosub = date (" H:m:s", strtotime('05:00:00'));
    $newtime=  (int)$timestamp - (int)$timetosub ;
    $new =  date (" H:m:s", strtotime($newtime));
   //echo $new;
    $sql2 = "SELECT * FROM user WHERE userid='$oid'";
  $result3 = $conn->query($sql2);
  
  if (!$result3) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result3->num_rows > 0) {
  // matput data of each row
  while($row3 = $result3->fetch_assoc()) {
  $fname = $row3['fname'];
    $lname=$row3['lname'];
  }
}
    if($mdate==$date){


    ?>
    <tr style="">
      <td> <?php echo $fname; ?></td>
      <td><?php echo $start;?></td>
      <td><a href="meeting_details.php?meetingid=<?php echo $mid;?>" title="view" class="text-info"><i class="ti-eye"></i></a></td>
      <?php
      if($new<= $time){
      ?>
      
      <?php
    }
      ?>
  </tr>
      <?php
    }
      

  }
}



}
}
 else { 
  echo "0 results"; }

  $conn->close();


?></table>
