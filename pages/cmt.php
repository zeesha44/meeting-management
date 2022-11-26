<?php
 session_start();
$mid=$_GET['meetingid'];
$id=$_SESSION['staffid'];
require "connect.php";
if(isset($_POST['submit'])){
$comments = $_POST['comment'];
    if(empty($comments)){
        header("Location:upload_mom.php?&comment=empty");
        exit();                        
    }
    $sql="INSERT INTO comment (timestamp,commenter,comment, meetingid) VALUES ( NOW(),'$id','$comments', '$mid')";
    if(mysqli_query($conn, $sql))
             {
                // $query="UPDATE comments SET fname='$fname',lname='$lname' WHERE supervisor_ids='$supId'";
                // if(mysqli_query($conn, $query))meetingid=$mid;
                //          {
                            header("Location:upload_mom.php?meetingid=$mid?&comment=successfull");
                             exit();
                             
                         }
                     else{
                        header("Location:upload_mom.php?meetingid=$mid?&comment=failed");
                         } 
     }
 else{
    header("Location:upload_mom.php?meetingid=$mid?&comment=failed");
    //echo 'error';
     }


?>
