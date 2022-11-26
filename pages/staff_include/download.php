<?php
include "../connect.php";
if (isset($_GET['meetingid'])) {
    $mid = $_GET['meetingid'];

    // fetch file to download from database
    $sql = "SELECT * FROM meetings WHERE meetingid=$mid";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../doc/' . $file['mom'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../doc/' . $file['mom']));
        readfile('../../doc/' . $file['mom']);

        // Now update downloads count
        // $newCount = $file['count'] + 1;
        // echo $newCount;
        // $updateQuery = "UPDATE meetings SET count=$newCount WHERE meetingid=$mid";
        // mysqli_query($conn, $updateQuery);
        // exit;
    }

}
?>