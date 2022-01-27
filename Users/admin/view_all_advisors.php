<?php
  include "include_admin/admin_output_top.php";
?>
<h1></h1>

<br>
<ul class="nav justify-content-center " style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
      <h1 class="h2">Viewing all Advisors </h1>
    </li>
</ul>
<br>

<table class="table table table-bordered text-light" style="background-color: #2e004f;">
  <thead class="text-warning" style="background-color: #2e004f;">
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Department</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
              $query="SELECT * FROM Advisor inner join (Faculty) on Faculty.FacultyID = Advisor.FacultyID inner join (users) on users.user_id = Faculty.user_id inner join (Department) on Department.DepartmentID = Faculty.DepartmentID inner join (login) on login.user_id = users.user_id
              Group by Faculty.FacultyID;";

              $select_department_id = mysqli_query($connection, $query);

              while ($row=mysqli_fetch_assoc($select_department_id)) {
                  $DepartmentName=$row['DepartmentName'];
                  $DepartmentEmail=$row['first_name'];
                  $lastname=$row['last_name'];
                  $ContactNumber =$row['last_name'];
                  $BuildingName =$row['user_email'];
                  
                  echo "<tr>";

                  echo "<td style = ''>{$DepartmentEmail}</td>";

                  echo "<td style = ''>{$lastname}</td>";

                  echo "<td style = ''>{$DepartmentName}</td>";


                //   echo "<td style = ''>{$ContactNumber}</td>";
                  echo "<td style = ''>{$BuildingName}</td>";
                  echo "</tr>";
              }
      ?>

  </tbody>
</table>



<?php
include "include_admin/admin_output_bottom.php"
?>