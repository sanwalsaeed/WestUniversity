
<?php
  include "include_student/student_info_header.php";
?>


<?php
  include "include_student/student_reg_menu.php";
?>
<div class = "text-center text-warning" style="background-color: #2e004f;">
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
    if (mysqli_num_rows($see_hold) > 0) {
        ?>
<table class="table  text-light" style="background-color: #2e004f;">
    <thead class="text-warning" style="background-color: #2e004f;">
        <th>Student ID</th>
        <th>Holds Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Type</th>
        <th>Holds Date</th>
    </thead>
    <tbody>
        <tr>
            <?php
            while ($row=mysqli_fetch_assoc($see_hold)) {
                $StudentID =   $row['StudentID'] ;
                $first_name =   $row['first_name'] ;
                $last_name =   $row['last_name'] ;
                $Student_type =   $row['Student_type'] ;
                $hold_type       = $row['HoldTypes'] ;
                $hold_date      = $row['HoldsDate'] ;
                echo "<tr>";
                echo "<td>{$StudentID}</td>";
                echo "<td>{$first_name}</td>";
                echo "<td>{$last_name}</td>";
                echo "<td>{$Student_type}</td>";
                echo "<td>{$hold_type}</td>";
                echo "<td>{$hold_date}</td>";
                echo "</tr>";
            }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<br><br><h1 style = 'text-align: center;'>Student has no Holds</h1><br><br>";
    }
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>