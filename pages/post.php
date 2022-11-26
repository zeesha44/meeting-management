<?php
$mid=$_GET['meetingid'];
//$supId=$_SESSION['sessionId'];
//$mid= isset($_GET['meetingid'])? strval($_GET['meetingid']):null ;
if(isset($_POST['save'])){
    require "connect.php";
    //$description=$_POST['post_detail'];
    // Getting uploaded file
    $file = $_FILES['file']['name'];
    // destination of the file on the server
    $destination = '../doc/' . $file;
    $files = $_FILES['file']['tmp_name'];
    // if(empty($description)){
    //      echo 'empty';;
       //header("Location:upload_mom.php?&post=empty");
         //exit();
    //     }
        //else{
            // Uploading in "uploads" folder
            if(move_uploaded_file($files, $destination)){

                $sql = "UPDATE meetings SET mom ='$file' WHERE meetingid='$mid'";
                if(mysqli_query($conn, $sql))
                         {
                             header("Location:upload_mom.php?meetingid=$mid?&post=successfull");
                            //echo $mid;
                            //echo 'successfull';
                             exit();
                         }
                     else{
                         echo "<script type='text/javascript'>alert('there was an errorrr!!')</script>";
                         }

            }
            else{
                $sql = "UPDATE meetings SET mom ='$filename' WHERE meetingid='$mid'";
                if(mysqli_query($conn, $sql))
                         {
                             //echo 'successfull';
                             header("Location:upload_mom.php?meetingid=$mid?&post=successfull");
                             exit();
                         }
                     else{
                         //echo 'failed';
                       header("Location:Location:upload_mom.php?meetingid=$mid?&post=failed");
                        exit();
                        //  echo "<script type='text/javascript'>alert('there was an errorrr!!')</script>";
                         }
                
            }
 

        //}
}
?>