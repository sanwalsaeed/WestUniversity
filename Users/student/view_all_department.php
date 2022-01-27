<?php
  include "include_student/student_info_header.php";
?>


<div style = "background-color: #2e004f;" >
<br>
<br>
<br>
<br>

<ul class="nav justify-content-center text-light"
  style="width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
    <h2>Viewing all Departments</h2>
    </li>
</ul>
<br>

<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
        <tr>
        <th scope="col">Department Name</th>
        <th scope="col">Department Email</th>
        <th scope="col">Contact Number</th>

        <th scope="col">Room</th>
        <th scope="col">Building Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
              $query="SELECT * FROM Department inner join (Building) on Building.BuildingID = Department.BuildingID inner join (Room) on Room.RoomID = Department.RoomID;";
              $select_department_id = mysqli_query($connection, $query);

              while ($row=mysqli_fetch_assoc($select_department_id)) {
                  $DepartmentName=$row['DepartmentName'];
                  $DepartmentEmail=$row['DepartmentEmail'];
                  $ContactNumber =$row['ContactNumber'];
                  $BuildingName =$row['BuildingName'];
                  $RoomNumber =$row['RoomNumber'];
                  echo "<tr>";
                  echo "<td style = ''>{$DepartmentName}</td>";
                  echo "<td style = ''>{$DepartmentEmail}</td>";
                  echo "<td style = ''>{$ContactNumber}</td>";
                  echo "<td style = ''>{$RoomNumber}</td>";
                  echo "<td style = ''>{$BuildingName}</td>";
                  
                  echo "</tr>";
              }
      ?>

    </tbody>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </div>