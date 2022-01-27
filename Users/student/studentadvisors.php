<?php
  include "include_student/student_info_header.php";
?>

<div class = 'text-warning text-center' style="background-color: #2e004f; height: 2000px;">
<br>
<br>
    <h2 style="font-size: 18px; margin-bottom: 5px;">Your current advisor: </h2>

    <!-- Sample data, this table needs to be populated with php calls to the database -->

<?php
             $query="select * from Student 
             INNER JOIN users USING (user_id) 
             INNER JOIN login USING (user_id)
             inner join Major using (MajorID)
             inner join Department using (DepartmentID)
             inner join Advisor using (StudentID)
             WHERE StudentID = {$the_student_id};";
 
             $select_student_by_id =mysqli_query($connection, $query);
         
             while ($row=mysqli_fetch_assoc($select_student_by_id)) {
                 $db_id=             $row['user_id'];
                 $db_username =      $row['user_email'];
                 $db_password =      $row['password'] ;
                 $db_first_name =    $row['first_name'];
                 $db_last_name  =     $row['last_name'];
                 $db_dob =            $row['dob'];
                 $db_add      =       $row['user_address'];
                 $db_city =           $row['city'];
                 $db_state =         $row['state'];
                 $db_zip_code =       $row['zip_code'];
                 $db_user_type =      $row['user_type'];
                 $db_studenttype =      $row['Student_type'];
                 $db_Majorname =      $row['MajorName'];
                 $db_Majorprogram =      $row['MajorProgram'];
                 $departmentname =      $row['DepartmentName'];
                 $advisorid =      $row['FacultyID'];
                 $studentID=             $row['StudentID'];
             }


             $query=" SELECT * FROM Advisor INNER JOIN Faculty USING (FacultyID) INNER JOIN users using (user_id) inner join login on Faculty.user_id = login.user_id WHERE FacultyID = {$advisorid} AND StudentID = {$the_student_id} ;";
             $select_student_by_id =mysqli_query($connection, $query);
             if (!$select_student_by_id) {
                 die("Query Failed " . mysqli_error($connection));
             }
    
             while ($row=mysqli_fetch_assoc($select_student_by_id)) {
                 $advisor_first_name =    $row['first_name'];
                 $advisor_last_name  =     $row['last_name'];
                 $advisor_user_email =     $row['user_email'];
             } 
            ?>
             <table class = "table text-warning">
               <thead>
                 <tr>
                   <th>Advisor First Name</th>
                   <th>Advisor Last Name</th>
                   <th>Advisor Email</th>
                  <tr>
            </thead>
             <tbody>
             <tr>
               <td><?php echo $advisor_first_name;?></td>
               <td><?php echo $advisor_last_name; ?></td>
               <td><?php echo $advisor_user_email; ?></td>
              </tbody>
    </table>
  
  </div>


</html>