<?php  
session_start();
 
include 'connect.php';
$id=$_SESSION['staffid'];
if(isset($_POST['save_profile'])){
 
  // $uname = $_POST['uname'];
  $name = $_FILES['file']['name'];
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = "UPDATE staff SET photo='$name' WHERE staffid='$id'";
     mysqli_query($conn,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
}





?>