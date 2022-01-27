<?php
  include "include_student/student_info_header.php";
?>


<?php
  include "include_student/student_information_bar.php";
?>

<br>
<ul class="nav justify-content-center"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">
    <li class="nav-item dropdown">
    <h2 class = "text-warning">Student Transcript</h2>
    </li>
</ul>

<table class = "table table-bordered text-light " style = "background-color: #2e004f;" >
    <thead class= "text-warning" style = "background-color: #2e004f;">
                         <th>CRN</th>
                         <th>Section </th>
                         <th>Course</th>
                         <th>Course Name</th>
                         <th>Department Name</th>
                         <th>Room Number</th>
                         <th>Building Name</th>
                         <th>Professor First Name</th>
                         <th>Professor Last Name</th>
                         <th>Semester Name</th>
                         <th>Semester Year</th>
                         <th>Credits </th>
                         <th>Grade Recieved</th>
                     </thead>
                     <tbody>
                         <tr>
              <?php
              $courseapplied = 0;
              $coursecount = 0;

              $GPA_total = 0.0;
              $calculated_gpa = 0.0;

              $A      = 4.0;
              $Aminus = 3.7;
              $Bplus  = 3.3;
              $B      = 3.0;
              $Bminus = 2.7;
              $Cplus  = 2.3;
              $C  = 2.0;
              $D  = 1.0;
              $F  = 0.0;


              $query="Select * from StudentHistory inner join Section using (CRN) inner join Timeslot using (TimeSlotID) inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join Semester on Semester.SemesterID = StudentHistory.SemesterID inner join Courses on Courses.CourseNumber = StudentHistory.CourseNumber inner join Department using (DepartmentID) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID WHERE StudentID = {$the_student_id} ORDER BY Semester.SemesterID;";
              $select_enrollment =mysqli_query($connection, $query);
              if (!$select_enrollment) {
                  die("Query Failed " . mysqli_error($connection));
              }
              if (mysqli_num_rows($select_enrollment) == 0) {
                  echo "<h5 >No Previous Record Found.</h5>";
              } else {
                  while ($row=mysqli_fetch_assoc($select_enrollment)) {
                      $CRN = $row['CRN'];
                      $SectionNumber = $row['SectionNumber'];
                      $CourseNumber = $row['CourseNumber'];
                      $CourseName = $row['CourseName'];
                      $DepartmentName = $row['DepartmentName'];
                      $day_name = $row['day_name'];
                      $start_time = $row['start_time'];
                      $end_time = $row['end_time'];
                      $RoomNumber = $row['RoomNumber'];
                      $BuildingName = $row['BuildingName'];
                      $RoomType = $row['RoomType'];
                      $SemesterName = $row['SemesterName'];
                      $SemesterYear = $row['SemesterYear'];
                      $CourseCredits = $row['CourseCredits'];
                      $last_name  = $row['last_name'] ;
                      $first_name  = $row['first_name'] ;
                      $SemesterID  = $row['SemesterID'] ;
                      $GradeRecieved  = $row['GradeRecieved'] ;
                           
                      echo "<tr>";
                      echo "<td>{$CRN}</td>";
                      echo "<td>{$SectionNumber}</td>";
                      echo "<td>{$CourseNumber}</td>";
                      echo "<td>{$CourseName}</td>";
                      echo "<td>{$DepartmentName}</td>";
                      echo "<td>{$RoomNumber}</td>";
                      echo "<td>{$BuildingName}</td>";
                      echo "<td>{$last_name}</td>";
                      echo "<td>{$first_name}</td>";
                      echo "<td>{$SemesterName}</td>";
                      echo "<td>{$SemesterYear}</td>";
                      echo "<td>{$CourseCredits}</td>";
                      echo "<td>{$GradeRecieved}</td>";
                      if ($GradeRecieved == "A") {
                          $GPA_total += $A ;
                      } elseif ($GradeRecieved == "A-") {
                          $GPA_total += $Aminus ;
                      } elseif ($GradeRecieved == "B+") {
                          $GPA_total += $Bplus ;
                      } elseif ($GradeRecieved == "B") {
                          $GPA_total += $B ;
                      } elseif ($GradeRecieved == "B-") {
                          $GPA_total += $Bminus;
                      } elseif ($GradeRecieved == "C+") {
                          $GPA_total += $Cplus;
                      } elseif ($GradeRecieved == "C") {
                          $GPA_total += $C ;
                      } elseif ($GradeRecieved == "D") {
                          $GPA_total += $D ;
                      } elseif ($GradeRecieved == "F") {
                          $GPA_total += $F ;
                      }
                      $courseapplied += $CourseCredits;
                      $coursecount++;
                      
             
                      echo "</tr>";
                  } ?>
    </tbody>
</table>
                                                        <?php
              }
          
          ?>
          </div>
            </div>
            </section>