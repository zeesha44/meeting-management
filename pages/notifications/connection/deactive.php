<?php
    include('../../connect.php');
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_GET["id"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE notification SET active=0 where id= ".$ids." ";
    
    $result = mysqli_query($conn,$deactive);
    echo mysqli_error($conn);

?>