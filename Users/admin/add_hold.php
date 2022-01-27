<?php
echo "clicked";
?>

<h6>Add a Hold</h6>
  <form action="" method="post" enctype="multipart/form-data">
      <div class="container">
          <div class="row b" >
              <div class="col-sm">
                  <select name="hold_id" id="post_category">
                      <?php
                      $query="SELECT * FROM Holds;";
                      $select_hold_id = mysqli_query($connection, $query);

          while ($row=mysqli_fetch_assoc($select_hold_id)) {
              $hold_id=$row['HoldID'];
              $hold_type =$row['HoldTypes'];
              echo "<option value = '{$hold_id}'>{$hold_type}</option>";
          }
      ?>
          </select>
          </a>
          <input class="btn btn-dark signinbtn" type="submit" name="addholdbtn"
              value="Add Hold">
          </a>
                  </div>
              </div>
          </div>
   </form>

   <?php


if (isset($_POST['addholdbtn'])) {
    $hold_id_selected =  $_POST['hold_id'];
    $timenow = date('Y-m-d H:i:s');
    $query ="INSERT INTO StudentHolds (StudentID, HoldsDate, HoldID) values ({$the_student_id }, '{$timenow}', {$hold_id_selected});";

    $add_hold = mysqli_query($connection, $query);
    if (!$add_hold) {
        die("Query Failed " . mysqli_error($connection));
    } else {
        echo "<br><br><br><br><h4 class = 'text-warning'>Added a Hold<h4>"; ?>

<table class="table  text-light" style="background-color: #2e004f;">
    <thead class="text-warning" style="background-color: #2e004f;">
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Type</th>
        <th>Date of Hold</th>
        <th>View with Other Holds</th>
    </thead>
    <tr>
        <?php
        $query ="Select * from StudentHolds 
        inner join Holds using (HoldID)
        inner join Student using (StudentID)
        inner join users using (user_id)
        WHERE StudentID = {$the_student_id}
        ;";
        
        $see_hold =mysqli_query($connection, $query);
        if (!$see_hold) {
            die("Query Failed " . mysqli_error($connection));
        }
        
        while ($row=mysqli_fetch_assoc($see_hold)) {
            $StudentID =   $row['StudentID'] ;
            $first_name =   $row['first_name'] ;
            $last_name =   $row['last_name'] ;
            $Student_type =   $row['Student_type'] ;
            $hold_type       = $row['HoldTypes'] ;
            $hold_date      = $row['HoldsDate'] ;

            echo "<tr>";
            //echo "<td>{$major_id}</td>";
            echo "<td>{$StudentID}</td>";
            echo "<td>{$first_name}</td>";
            echo "<td>{$last_name}</td>";
            echo "<td>{$Student_type}</td>";
            echo "<td>{$hold_type}</td>";
            echo "<td>{$hold_date}</td>";
            echo "<td><a class = 'text-light' href = 'view_student_holds.php'>View this Offence with All Students With Holds</a></td>";
            echo "</tr>";
        }
    }
}
