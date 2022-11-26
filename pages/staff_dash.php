<?php
	session_start();
$id=$_SESSION['sessionid'];
 //echo $id;

    $email=$_SESSION['sessionemail'];
    $fname=$_SESSION['sessionfname'];
    $lname=$_SESSION['sessionlname'];

?>
<?php include "staff_include/dash.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12">
<div class="card">
<div class="card-header">

 <h4>TODAY'S MEETINGS</h4>
<?php include "staff_include/todays_meeting.php"; ?>
 	
 </div>
</div>

<!-- <div class="card col-auto">
  <div class="card-header">
<h4>To-do List</h4>
<div class="card-header-left ">
</div>
  <form method="post">
  <table class="table table-hover">
  <thead>
  <tr>
  <th scope="col">Task</th>
  <th scope="col">Details</th>
  <th scope="col">Status</th>
  </tr>
  </thead>
  <?php

  include 'connect.php';
  // echo $id;
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM todo WHERE userid='$id' and status != 'complete'";

  $result = $conn->query($sql);
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tid = $row['taskid'];


    ?>
    <tr>
      <td> <?php echo $row["title"]; ?></td>
      <td><?php  echo $row["details"]?></td>
      <td>
        <div class="dropdown">
          <a class="btn btn-light dropdown-toggle" style="background-color: #1e4da1; color: white;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $row['status']; ?>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="stud_include/progress.php?&tid=<?php echo $row['taskid'];?>">In progress</a>
            <a class="dropdown-item" href="stud_include/complete.php?&tid=<?php echo $row['taskid'];?>">Completed</a>
            <a class="dropdown-item" href="edittask.php?&tid=<?php echo $row['taskid'];?>">Edit Task</a>
            <a class="dropdown-item" href="stud_include/deletetask.php?&tid=<?php echo $row['taskid'];?>">Delete Task</a>
          </div>
      </div>

      </td>
    <tr>
      <?php

  }
  } else { echo "0 results"; }
  $conn->close();
  ?>

  
</table>
<a href="newtask.php">add new task</a>
  </form>
 -->
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
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'notifications/connection/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

</script>
</body>

</html>
