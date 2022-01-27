<?php
  include "include_admin/admin_output_top.php";
?>

<br>
<ul class="nav justify-content-center"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
      <h1 class="h2">Currently Viewing All Full Time Undergraduate Students </h1>
    </li>
</ul>
<table class = "table table table-bordered text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Student Type</th>
                        <th>Major Name</th>
                        <th>Credit Hours</th>
                        <th>Credits Earned</th>
                        <th>Student Standing</th>
                        <th>View</th> 
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query="Select * from users inner join (login) on login.user_id = users.user_id inner join (Student) on Student.user_id = users.user_id inner join (UndergraduateStudent) on UndergraduateStudent.StudentID = Student.StudentID inner join (UndergraduateStudentFullTime) on UndergraduateStudentFullTime.StudentID = UndergraduateStudent.StudentID inner join (Major) on Major.MajorID = Student.MajorID ;";
                            
                            $select_student =mysqli_query($connection, $query);
                            if(!$select_student){
                                die("Query Failed " . mysqli_error($connection));
                            }
                           while($row=mysqli_fetch_assoc($select_student)) {
                            $student_id= $row['StudentID'] ;
                            $user_email= $row['user_email'] ;
                            $password = $row['password'] ;
                            $first_name = $row['first_name'] ;
                            $last_name =  $row['last_name'] ;
                            $student_type =  $row['Student_type'] ;
                            $MajorName =  $row['MajorName'] ;
                 
                            $StudentCreditHours =  $row['StudentCreditHours'] ;
                 
                            $CreditsAcquired =  $row['CreditsAcquired'] ;
                            $StudentStanding =  $row['StudentStanding'] ;
                 
                       echo "<tr>";
                       echo "<td>{$student_id}</td>";
                       echo "<td>{$user_email}</td>";
                       echo "<td>{$password}</td>";
                       echo "<td>{$first_name}</td>";
                       echo "<td>{$last_name}</td>";
                       echo "<td>{$student_type}</td>";
                       echo "<td>{$MajorName}</td>";
                       echo "<td>{$StudentCreditHours}</td>";
                       echo "<td>{$CreditsAcquired}</td>";
                       echo "<td>{$StudentStanding}</td>";
                 
                       echo "<td><a class = 'text-light' href = 'view_students.php?source=view_student&student_id={$student_id}'>View</a></td>";
                       echo "</tr>";
                        }
                        ?>
                        </tr>
                        </tbody>
                        </table>
<?php
include "include_admin/admin_output_bottom.php"
?>