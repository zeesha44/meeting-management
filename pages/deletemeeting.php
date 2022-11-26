
 <?php
session_start();
require "connect.php";
$tid=$_GET['tid'];
// $id=$_GET['id'];
// $superID=$_GET['supid'];

 $sql="DELETE FROM meetings WHERE meetingid='$tid'";
 if(mysqli_query($conn, $sql))
  {
    //   echo "hello";
     header("Location:staff_schedules.php?tid=$tid?&delete=successfull");
     exit();
 
 }
 else{
    //  echo "bye";
     header("Location:staff_schedules.php?tid=$tid?&delete=failed");
     exit();
 }

?>