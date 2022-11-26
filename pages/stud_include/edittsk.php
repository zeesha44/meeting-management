<?php
$tid=$_GET['tid'];

if(isset($_POST['submit_tsk'])){
include "../connect.php";

   $title=$_POST['title'];
   $details=$_POST['details'];
   
      
 if(empty($title)||empty($details)){
    header("Location:edittask.php?tid=$tid?&edit=empty");
    }
    else{
        $sql="UPDATE todo SET title='$title',details='$details' WHERE taskid='$tid'";

        if(mysqli_query($conn, $sql))
            {
                header("Location:edittask.php?tid=$tid&edit=successfull");
                exit();
            }
        else{
            header("Location:edittask.php?tid=$tid&edit=successfull");
                exit();
            }
}
}



// if(isset($_POST['submit_deadline'])){
// include "connect.php";

//    $date=$_POST['date'];
// $timestamp = date('Y-m-d H:m:sa', strtotime($date));
   
//         $sql="UPDATE listtask SET deadline='$timestamp' WHERE taskid='$tid'";

//         if(mysqli_query($conn, $sql))
//             {
//                 header("Location:edittask.php?tid=$tid&edit=successfull");
//                 exit();
//             }
//         else{
//             header("Location:edittask.php?tid=$tid&edit=successfull");
//                 exit();
//             }
// }

?>