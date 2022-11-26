<?php
$id=$_SESSION['staffid'];
if(isset($_POST['submit'])){
include "../connect.php";

    $email=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
   
   
      
 if(empty($email)||empty($fname)||empty($lname)){
    header("Location:EditProfile.php?&edit=empty");
    }
    else{
        $sql="UPDATE staff SET stud_email='$email',stud_fname='$fname', stud_lname='$lname' WHERE staff='$id'";

        if(mysqli_query($conn, $sql))
            {
                header("Location:staffedit.php?&edit=successfull");
                exit();
            }
        else{
            header("Location:pages/staffedit.php?&edit=failed");
                exit();
            }
}
}


?>