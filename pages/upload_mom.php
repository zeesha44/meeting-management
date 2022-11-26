<?php
session_start();
$id=$_SESSION['staffid'];

// Include the database configuration file
include 'connect.php';
include 'post.php';
//$mid= isset($_GET['meetingid'])? strval($_GET['meetingid']):null ;
$mid=$_GET['meetingid'];
//echo $mid;
$sql = "SELECT * FROM meetings WHERE meetingid='$mid'";
  $result = $conn->query($sql);
  
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	$oid= $row["organiser"];
//echo $oid;

?>


<?php include "staff_include/dash.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
	<?php
         $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // if statement to ccheck if there is a string in the url
        // if(strpos($fullUrl,"request=empty")==true){
        //   echo "<p style='color:red'>Error!,please fill all fields!<p>";
        //   // exit();
        // }
        if(strpos($fullUrl,"post=successfull")==true){
          echo "<p style='color:green'>file has been uploaded!<p>";
          // exit();
        }
        if(strpos($fullUrl,"post=failed")==true){
          echo "<p style='color:red'>Error!<p>";
          // exit();
        }

        if(strpos($fullUrl,"comment=successfull")==true){
          echo "<p style='color:green'>comment posted!<p>";
          // exit();
        }
        if(strpos($fullUrl,"comment=failed")==true){
          echo "<p style='color:red'>Error!<p>";
          // exit();
        }
          ?>

<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12">
<div class="card">
<div class="card-header">

<?php
if ($oid === $id) {
	?>
	<h4>Upload File</h4>
  <form  method="post" enctype="multipart/form-data">
  
<input type="file" class="form-control" id="file" name="file">
<br>
<button type="submit" class="rounded-0 btn btn-light" name="save" id="save" style="background-color: #1e4da1; color: white;"><i class="fa fa-upload"></i> Upload</button>
  </form>
  <?php
}

?>
<br>

<a href="staff_include/download.php?meetingid=<?php echo $mid;?>" class="text-info"><i class="ti-import"></i> Minutes</a>


</div>
</div>
<?php
$sql = "SELECT * FROM comment WHERE meetingid='$mid'";
      $result = $conn->query($sql);
      
      if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
      }
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       $cid = $row["commenter"];
       $comment = $row['comment'];
       $time = $row['timestamp'];
       //echo $row["commentid"];

       $sqll = "SELECT * FROM staff WHERE staffid='$cid'";
        $result2 = $conn->query($sqll);
        //echo $cid;
        if (!$result2) {
        trigger_error('Invalid query: ' . $conn->error);
        }
        if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
         $fname = $row2["staff_fname"];
         $lname = $row2["staff_lname"];


?>
<div class="col-lg-4 col-xl-3 col-sm-12 card">
<div class="badge-box">
    <div class="sub-title"><?php echo $fname;echo " "; echo $lname;?></div>

    <p><?php echo $comment;?></p>
    <div>
        <label class="badge badge-primary "style="background-color: #1e4da1; color: white;"><?php echo $time;?></label>
    </div>
</div>
</div>
<?php
}
}
}
}

?>


<form method="post" action="cmt.php?meetingid=<?php echo $mid;?>">
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Comment" aria-label="Recipient's username" aria-describedby="button-addon2" name="comment" id="comment">

  <a href="cmt.php?&meetingid=<?php echo $mid;?>"><button class="btn btn-outline-secondary" type="submit" id="submit" name="submit" style="background-color: #1e4da1; color: white;">Comment</button></a>
 
</div>
  </form>

<?php



}
}
?>
</div>
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