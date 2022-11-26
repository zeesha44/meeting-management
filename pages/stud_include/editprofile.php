<?php
$id=$_SESSION['sessionid'];
if(isset($_POST['submit'])){
include "../connect.php";

    $email=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
   
   
      
 if(empty($email)||empty($fname)||empty($lname)){
    header("Location:EditProfile.php?&edit=empty");
    }
    else{
        $sql="UPDATE user SET email='$email',fname='$fname', lname='$lname' WHERE userid='$id'";

        if(mysqli_query($conn, $sql))
            {
                header("Location:EditProfile.php?&edit=successfull");
                exit();
            }
        else{
            header("Location:pages/EditProfile.php?&edit=failed");
                exit();
            }
}
}


?>