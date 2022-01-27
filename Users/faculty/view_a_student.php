<?php
  include "include_faculty/faculty_information_header.php";

?>
<div class = "text-center">
<h3 class="text-center">Student Information </h3>

            <?php
         if (isset($_GET['student_id'])) {
             $the_student_id = $_GET['student_id'];
         }
          $query="SELECT * FROM Student 
          INNER JOIN users USING (user_id) 
          INNER JOIN login USING (user_id)
          inner join Major using (MajorID)
          inner join Department using (DepartmentID)
          WHERE StudentID = {$the_student_id};";
          $select_student_by_id =mysqli_query($connection, $query);
          if (!$select_student_by_id) {
              die("Query Failed " . mysqli_error($connection));
          }
        $has_previous_semester = true;
          while ($row=mysqli_fetch_assoc($select_student_by_id)) {
              $db_id=             $row['user_id'];
              $db_first_name =    $row['first_name'];
              $db_last_name  =     $row['last_name'];
              $major  =     $row['MajorName'];
              $Department  =     $row['DepartmentName'];
              $db_studenttype =      $row['Student_type'];
          }
            $coursesapplied = 0;
            $query="Select * from Enrollment inner join Section using (CRN) inner join Timeslot using (TimeSlotID) inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join Semester on Semester.SemesterID = Enrollment.SemesterID inner join DepartmentFaculty using (FacultyID) inner join Department using (DepartmentID) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Courses on Courses.CourseNumber = Enrollment.CourseNumber inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID WHERE StudentID = {$the_student_id};";
            $select_enrollment =mysqli_query($connection, $query);
            if (!$select_enrollment) {
                die("Query Failed " . mysqli_error($connection));
            }
          if (mysqli_num_rows($select_enrollment) > 0) {
              $has_previous_semester = true;
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
                  if ($SemesterID == 10) {
                  } else {
                      $coursesapplied += $CourseCredits;
                  }
              }
          } elseif (mysqli_num_rows($select_enrollment) == 0) {
              $has_previous_semester = false;
          }
?>

            <?php

        
    include "student_functions/student_navigation.php";




    include "student_functions/view_next_semester_schedule.php";


    include "student_functions/view_graduation_audit.php";


    if (isset($_POST['registerstudent'])) {
    }
    ?>
            <?php
    if (isset($POST['add_hold_button'])) {
        echo "clicked"; ?>
            <?php
    }
?>

            <script type="text/javascript">
                function openForm() {
                    document.getElementById("Add_holds").style.display = "block";
                }


                function closeForm() {
                    document.getElementById("Add_holds").style.display = "none";
                }
            </script>


            <?php
    if (isset($GET['add_view_holds'])) {
        $the_student_id = $_GET['add_view_holds']; ?>
            <h6>Add a Hold <?php echo $db_first_name . " " . $db_last_name?>
            </h6>
            <select name="hold_id" id="post_category">
                <?php
                     $query="SELECT * FROM Holds;";
        $select_hold_id = mysqli_query($connection, $query);

        while ($row=mysqli_fetch_assoc($select_hold_id)) {
            $hold_id=$row['HoldID'];
            $hold_type =$row['HoldTypes'];
            echo "<option value = '{$hold_id}'>{$hold_type}</option>";
        } ?>
            </select>
            </a>
            <input class="btn btn-dark signinbtn" type="submit" name="addholdbtn" value="Add Hold">
            </a>
        </div>
    </div>
    </div>
    </form>
    <?php
    }
?>


    <?php
   

    //View Schedule
  include "student_functions/view_schedule.php";

    //View Transcript
    include "student_functions/view_transcript.php";
                                          
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


              if ($has_previous_semester == true) {
                  $query="Select * from StudentHistory inner join Section using (CRN) inner join Timeslot using (TimeSlotID) inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join Semester on Semester.SemesterID = StudentHistory.SemesterID inner join Courses on Courses.CourseNumber = StudentHistory.CourseNumber inner join Department using (DepartmentID) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID WHERE StudentID = {$the_student_id};";
                  $select_enrollment =mysqli_query($connection, $query);
                  if (!$select_enrollment) {
                      die("Query Failed " . mysqli_error($connection));
                  }
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
                  }
              }
                      ?>
    </tbody>
    </table>
    <?php
 if (isset($_POST['studentinformation'])) {
     if ($db_studenttype === "Undergraduate") {
         include "student_functions/view_undergraduate_student_information.php";
     } elseif ($db_studenttype == "Graduate") {
         include "student_functions/view_graduate_student_information.php";
     }
 }
?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
