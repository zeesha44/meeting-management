<?php
session_start();
require "../connect.php";
$id=$_GET['id'];
// $id=$_GET['id'];
// $superID=$_GET['supid'];

 $sql="DELETE FROM user WHERE userid ='$id'";
 if(mysqli_query($conn, $sql))
  {
    //   echo "hello";
     header("Location:../deleteuser.php?id=$id?&delete=successfull");
     exit();
 
 }
 else{
    //  echo "bye";
     header("Location:../deleteuser.php?id=$id?&delete=failed");
     exit();
 }

?>