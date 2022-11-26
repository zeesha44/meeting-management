<div class="card-header">
  <h4>Completed Tasks</h4>
</div>
<form method="post" action="task.php">
<table class="table table-striped">
  <thead>
  <tr>
  <th scope="col">Task</th>
  <th scope="col">Details</th>
  <th scope="col">Action</th>
  </tr>
  </thead>
    <?php
  include 'connect.php';
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM listtask WHERE studentid='$id' and status = 'completed' ";
  $result = $conn->query($sql);
  if (!$result) {
  trigger_error('Invalid query: ' . $conn->error);
  }
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tid = $row['taskid'];
    
  echo "<tr>". "<td>" . $row["title"] . "</td><td>" . $row["details"] . "</td>";
?>
 <td>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="stud_include/deletetask.php?&tid=<?php echo $row['taskid'];?>">Delete Task</a>
          </div>
      </div>

      </td></tr>

<?php

      }
    }
    ?>
  </table>
</form>
