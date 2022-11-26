
<?php 
//session_start();
include "header_sidebar.php";

include 'connect.php';
  // Check connection
 

?>


<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->

<div class="col-md-12 ">

<div class="card">
<div class="card-header">
<h4>Schedule</h4>
<div class="card-header-left ">
</div>
<form method="post" action="schedules.php">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Location</th>
    </tr>
  </thead>

<?php
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

if(isset($_POST["search"])){

  $email=$_POST['email'];
  //$staffid=$_POST['id'];


  $sql = "SELECT * FROM user Where email = '$email'";
    $result = $conn->query($sql);
    if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
    }
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $sid = $row['userid'];

       $sql1 = "SELECT * FROM attendance Where userid = $sid";
      $result1 = $conn->query($sql1);
      if (!$result1) {
      trigger_error('Invalid query: ' . $conn->error);
      }
      if ($result1->num_rows > 0) {
      // output data of each row
      while($row1 = $result1->fetch_assoc()) {
        $mid = $row1['meetingid'];

        $sql2 = "SELECT * FROM meetings Where meetingid = $mid";
        $result2 = $conn->query($sql2);
        if (!$result2) {
        trigger_error('Invalid query: ' . $conn->error);
        }
        if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
          $mdate = $row2['meetingdate'];
          $start = $row2['starttime'];
          $end = $row2['endtime'];
          $location = $row2['location'];



?>


  <tbody>
    <tr>
      <tr>
      <td> <?php echo $mdate; ?></td>
      <td><?php  echo $start;?></td>
      <td><?php  echo $end;?></td>
      <td><?php echo $location;?></td>
    </tr>
    <tr>
      <?php
        }
      }


      }
    }




    }
  }




}
else{
  echo "search for staff schedule";
}



?>


    </tr>
      </tbody>
</table>
</div>
</div>
<div class="form-group row card" style="margin-right: 70%;">
  <div class="col">
<input type="text" class="form-control form-control-round" placeholder="Enter staff's email" id="email" name="email">
</div>

</div>
<br>
<button type="submit" name="search" class="btn btn-primary btn-round" style="background-color: #1e4da1; color: white;">search</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
if ($window.scrollTop() >= 200) {
nav.addClass('active');
}
else {
nav.removeClass('active');
}
});
</script>
</body>

</html>
