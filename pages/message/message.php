<?php
require 'autoload.php';
include '../connect.php';
$date=date('Y-m-d');

 $sqli = "SELECT * FROM meetings";
  $result2 = $conn->query($sqli);
  if (!$result2) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
  	$mdate=$row2['meetingdate'];
    $start=$row2['starttime'];
    $reminder =  (int)($start)-(int)('3 hours');
    }

//require_once '/vendor/autoload.php';
$messagebird = new MessageBird\Client('LPYUvIuyp95DORoXuuJ1Qsnyh');
$message = new MessageBird\Objects\Message;
$message->originator = '+2349121056932';
$message->scheduleDatetime =$reminder;
$message->recipients = [ '+2349121056932' ];
$message->body = 'hello, this is a reminder that you have a meeting by '.$start.' thank you';
$response = $messagebird->messages->create($message);
var_dump($response);
}
?>