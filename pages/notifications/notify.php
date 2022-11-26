<?php
include 'connect.php';
 $id=$_SESSION['sessionid'];
       $find_notifications = "SELECT  * from notification where active = 1 and userid= '$id'";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
       $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result)){
          $nid = $rows['id'];
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "n_id" => $rows['id'],
                            "notifications_name"=>$rows['name'],
                            "message"=>$rows['message']
                );
        }
        //only five specific posts
        $deactive_notifications = "SELECT * from notification where active = 0 ORDER BY id DESC LIMIT 0,5";
        $result = mysqli_query($conn,$deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
          $deactive_notifications_dump[] = array(
                      "n_id" => $rows['id'],
                      "notifications_name"=>$rows['name'],
                      "message"=>$rows['message']
          );
        }

     ?>