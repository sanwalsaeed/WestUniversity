<?php
     $query="select * from Student 
      inner join GraduateStudent using (StudentID) WHERE StudentID = {$the_student_id};";
        $select_student_by_id =mysqli_query($connection, $query);
        if (!$select_student_by_id) {
            die("Query Failed " . mysqli_error($connection));
        }
  
        while ($row=mysqli_fetch_assoc($select_student_by_id)) {
            $student_cred_hours = $row['StudentCreditHours'];
        }
        if ($student_cred_hours === "Full Time") {
            $query="select * from Student 
            inner join GraduateStudent using (StudentID)
            inner join GraduateStudentFullTime using (StudentID)
            INNER JOIN users USING (user_id) 
            INNER JOIN login USING (user_id)
            inner join Major using (MajorID)
            inner join Department on Department.DepartmentID = GraduateStudent.DepartmentID
            inner join Advisor using (StudentID)
            WHERE StudentID = {$the_student_id};";

            $select_student_by_id =mysqli_query($connection, $query);
            if (!$select_student_by_id) {
                die("Query Failed " . mysqli_error($connection));
            }
        
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
                $studentstanding = $row['Grad_Year'];
                $student_cred_hours = $row['StudentCreditHours'];
                $creditsacquired = $row['CreditsAcquired'];
            }

            $query=" SELECT * FROM Advisor INNER JOIN Faculty USING (FacultyID) INNER JOIN users using (user_id) WHERE FacultyID = {$advisorid} AND StudentID = {$the_student_id} ;";
            $select_student_by_id =mysqli_query($connection, $query);
            if (!$select_student_by_id) {
                die("Query Failed " . mysqli_error($connection));
            }
   
            while ($row=mysqli_fetch_assoc($select_student_by_id)) {
                $advisor_first_name =    $row['first_name'];
                $advisor_last_name  =     $row['last_name'];
            } ?>

<h3>User Information : <?php echo $db_first_name .  " " . $db_last_name ; ?>
</h3>
<table class="bordered text-warning" style="border: 1px;">
  <tbody style="border: 1px;">
    <tr>
      <th>Email</th>
      <td><?php echo $db_username; ?>
      </td>
    </tr>
    <tr>
      <th>Password</th>
      <td><?php echo $db_password; ?>
      </td>
    </tr>
    <tr>
      <th>User ID</th>
      <td><?php echo $db_id; ?>
      </td>
    </tr>
    <tr>
      <th>First Name</th>
      <td><?php echo $db_first_name; ?>
      </td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><?php echo $db_last_name ; ?>
      </td>
    </tr>
    <tr>
      <th>Date of Birth</th>
      <td><?php echo $db_dob ; ?>
      </td>
    </tr>
    <tr>
      <th>Street Address</th>
      <td><?php echo $db_add ; ?>
      </td>
    </tr>
    <tr>
      <th>City</th>
      <td><?php echo $db_city; ?>
      </td>
    </tr>
    <tr>
      <th>State</th>
      <td><?php echo $db_state ; ?>
      </td>
    </tr>
    <tr>
      <th>Zipcode</th>
      <td><?php echo $db_zip_code ; ?>
      </td>
    </tr>
    <tr>
      <th>User Type</th>
      <td><?php echo $db_user_type; ?>
      </td>
    </tr>
    <tr>
      <th>Student Type</th>
      <td><?php echo $db_studenttype; ?>
      </td>
    </tr>
    <tr>
      <th>Major</th>
      <td><?php echo $db_Majorname ; ?>
      </td>
    </tr>
    <tr>
      <th>Program</th>
      <td><?php echo $db_Majorprogram ; ?>
      </td>
    </tr>
    <tr>
      <th>Department</th>
      <td><?php echo $departmentname; ?>
      </td>
    </tr>
    <tr>
      <th>Advisor</th>
      <td><?php echo $advisor_first_name . " " . $advisor_last_name; ?>
      </td>
    </tr>
    <tr>
      <th>Student Year</th>
      <td><?php echo $studentstanding; ?>
      </td>
    </tr>
    <tr>
      <th>Fulltime/Parttime</th>
      <td><?php echo $student_cred_hours; ?>
      </td>
    </tr>
    <tr>
      <th>Credits Received</th>
      <td><?php echo $courseapplied; ?>
      </td>
    </tr>
    <tr>
      <th>GPA</th>
      <td><?php
                        if ($has_previous_semester) {
                            if ($coursecount <= 0) {
                            } else {
                                echo round($GPA_total/$coursecount, 2);
                            }
                        } else {
                            echo "GPA: No Previous Enrollment Found.";
                        } ?>
      </td>
    </tr>
  </tbody>
</table>


<?php
        } elseif ($student_cred_hours === "Part Time") {
            $query="select * from Student 
            inner join GraduateStudent using (StudentID)
            inner join GraduateStudentPartTime using (StudentID)
            INNER JOIN users USING (user_id) 
            INNER JOIN login USING (user_id)
            inner join Major using (MajorID)
            inner join Department using (DepartmentID)
            inner join Advisor using (StudentID)
            WHERE StudentID = {$the_student_id};";
            $select_student_by_id =mysqli_query($connection, $query);
            if (!$select_student_by_id) {
                die("Query Failed " . mysqli_error($connection));
            }
        
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
                $studentstanding = $row['Grad_Year'];
                $student_cred_hours = $row['StudentCreditHours'];
                $creditsacquired = $row['CreditsAcquired'];
            }

            $query=" SELECT * FROM Advisor INNER JOIN Faculty USING (FacultyID) INNER JOIN users using (user_id) WHERE FacultyID = {$advisorid} AND StudentID = {$the_student_id} ;";
            $select_student_by_id =mysqli_query($connection, $query);
            if (!$select_student_by_id) {
                die("Query Failed " . mysqli_error($connection));
            }
   
            while ($row=mysqli_fetch_assoc($select_student_by_id)) {
                $advisor_first_name =    $row['first_name'];
                $advisor_last_name  =     $row['last_name'];
            } ?>

<h3>User Information : <?php echo $db_first_name .  " " . $db_last_name ; ?>
</h3>
<table class="" style="border: 1px;">
  <tbody style="border: 1px;">
    <tr>
      <th>Email</th>
      <td><?php echo $db_username; ?>
      </td>
    </tr>
    <tr>
      <th>Password</th>
      <td><?php echo $db_password; ?>
      </td>
    </tr>
    <tr>
      <th>User ID</th>
      <td><?php echo $db_id; ?>
      </td>
    </tr>
    <tr>
      <th>First Name</th>
      <td><?php echo $db_first_name; ?>
      </td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><?php echo $db_last_name ; ?>
      </td>
    </tr>
    <tr>
      <th>Date of Birth</th>
      <td><?php echo $db_dob ; ?>
      </td>
    </tr>
    <tr>
      <th>Street Address</th>
      <td><?php echo $db_add ; ?>
      </td>
    </tr>
    <tr>
      <th>City</th>
      <td><?php echo $db_city; ?>
      </td>
    </tr>
    <tr>
      <th>State</th>
      <td><?php echo $db_state ; ?>
      </td>
    </tr>
    <tr>
      <th>Zipcode</th>
      <td><?php echo $db_zip_code ; ?>
      </td>
    </tr>
    <tr>
      <th>User Type</th>
      <td><?php echo $db_user_type; ?>
      </td>
    </tr>
    <tr>
      <th>Student Type</th>
      <td><?php echo $db_studenttype; ?>
      </td>
    </tr>
    <tr>
      <th>Major</th>
      <td><?php echo $db_Majorname ; ?>
      </td>
    </tr>
    <tr>
      <th>Program</th>
      <td><?php echo $db_Majorprogram ; ?>
      </td>
    </tr>
    <tr>
      <th>Department</th>
      <td><?php echo $departmentname; ?>
      </td>
    </tr>
    <tr>
      <th>Advisor</th>
      <td><?php echo $advisor_first_name . " " . $advisor_last_name; ?>
      </td>
    </tr>
    <tr>
      <th>Student Year</th>
      <td><?php echo $studentstanding; ?>
      </td>
    </tr>
    <tr>
      <th>Fulltime/Parttime</th>
      <td><?php echo $student_cred_hours; ?>
      </td>
    </tr>
    <tr>
      <th>Credits Received</th>
      <td><?php echo $courseapplied; ?>
      </td>
    </tr>
    <tr>
      <th>GPA</th>
      <td><?php
                        if ($has_previous_semester) {
                            if ($coursecount <= 0) {
                            } else {
                                echo round($GPA_total/$coursecount, 2);
                            }
                        } else {
                            echo "GPA: No Previous Enrollment Found.";
                        } ?>
      </td>
    </tr>
  </tbody>
</table>
<?php
        }
