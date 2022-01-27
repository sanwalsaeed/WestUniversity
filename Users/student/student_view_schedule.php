<?php
  include "include_student/student_info_header.php";
?>
<?php
  include "include_student/student_reg_menu.php";
?>

<section class="student-information text-warning text-center" style="background-color: #2e004f;">
    <br>
    <div class="second-container">
        <h1 style="font-size: 35px">Current Schedule : Student Schedule Fall 2021</h1>
        <br>
        <div class="division2"></div> <br>
        <!-- This is example data, the table has to be populated with php calls to the database instead -->

        <form action="" method="post" enctype="multipart/form-data">
<?php

    $query="Select * from Enrollment inner join Section using (CRN) inner join Timeslot using (TimeSlotID) inner join timeslot_day using (TimeSlotID) inner join Courses on Courses.CourseNumber = Enrollment.CourseNumber inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join Semester on Semester.SemesterID = Enrollment.SemesterID inner join Department using (DepartmentID) inner join Faculty using (FacultyID) inner join users using (user_id)  inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID WHERE StudentID = {$the_student_id} AND Enrollment.SemesterID = 10;";
    $select_enrollment =mysqli_query($connection, $query);
    if (!$select_enrollment) {
        die("Query Failed " . mysqli_error($connection));
    }
    if (mysqli_num_rows($select_enrollment) == 0) {
      
    } else {
        ?>
        <table class="bordered" style = "background-color: #2e004f;">
  <thead>
    <th>Drop/ Withdraw Course </th>
    <th>CRN</th>
    <th>Section Number</th>
    <th>Course Number</th>
    <th>Course Name</th>
    <th>Department Name</th>
    <th>Day</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Room Number</th>
    <th>Building Name</th>
    <th>Professor First Name</th>
    <th>Professor Last Name</th>
    <th>Credits </th>

  </thead>
  <tbody>
    <tr>
      <?php
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
                $first_name  = $row['first_name'] ;
  
                echo "<tr>";
                echo "<td><input type='radio' name='select_crn' value='{$CRN}'/><h6 >Drop/Withdraw</h6></td>";
                echo "<td>{$CRN}</td>";
                echo "<td>{$SectionNumber}</td>";
                echo "<td>{$CourseNumber}</td>";
                echo "<td>{$CourseName}</td>";
                echo "<td>{$DepartmentName}</td>";
                echo "<td>{$day_name}</td>";
                echo "<td>{$start_time}</td>";
                echo "<td>{$end_time}</td>";
                echo "<td>{$RoomNumber}</td>";
                echo "<td>{$BuildingName}</td>";
                echo "<td>{$last_name}</td>";
                echo "<td>{$first_name}</td>";
                echo "<td>{$CourseCredits}</td>";

                echo "</tr>";
            }
    }
         ?>
  </tbody>
</table>
<input class="btn btn-dark bodycenter bg-warning text-dark" name="drop_next_semester_course" type="submit" value="Drop / Withdraw">
</form>
                                                        <br>
                                                    
                                                        <br>      <br>      <br>      <br>
                                                        <br>      <br>      <br>      <br>
              </div>


              
<?php

if (isset($_POST['drop_next_semester_course'])) {
    $selected_crn = $_POST['select_crn'];
    $query="Select * from Courses inner join Section using (CourseNumber) Where CRN = {$selected_crn};";
    $select_coursename =mysqli_query($connection, $query);
    if (!$select_enrollment) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($select_coursename)) {
        $CourseName = $row['CourseName'];
        $SeatAvailability = $row['SeatAvailability'];
        $SemesterID = $row['SemesterID'];
    }

    $todaydate = date("Y-m-d");

    $query = "Select * from Semester Where SemesterID = {$SemesterID};";
    $semester_lookup =mysqli_query($connection, $query);
    if (!$semester_lookup) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($semester_lookup)) {
        $SemesterID  = $row['SemesterID'];
        $SemesterName  = $row['SemesterName'];
        $SemesterYear  = $row['SemesterYear'];
        $RegistrationTime  = $row['RegistrationTimeLimit'];
        $DroppingTimeLimit  = $row['DroppingLimit'];
    }
    $query = "Select * from Semester WHERE SemesterID = {$SemesterID} AND DroppingLimit >= '{$todaydate}';";
    $semester_lookup =mysqli_query($connection, $query);
    if (!$semester_lookup) {
        die("Query Failed " . mysqli_error($connection));
    }
    if (mysqli_num_rows($semester_lookup) == 0) {
        echo "Time has passed to Withdraw";
    } else {
        $New_Seat_Availbility = $SeatAvailability +1;
        $query = "Update Section SET SeatAvailability = {$New_Seat_Availbility} WHERE CRN = {$selected_crn};";
        $update_seat =mysqli_query($connection, $query);
        if (!$update_seat) {
            die("Query Failed " . mysqli_error($connection));
        }

        $query="Delete from Enrollment where StudentID = {$the_student_id} AND CRN ={$selected_crn} AND SemesterID = {$SemesterID};";
        $dropping_course =mysqli_query($connection, $query);
        if (!$dropping_course) {
            die("Query Failed " . mysqli_error($connection));
        } else {
          
            $query="Delete from ClassList where StudentID = {$the_student_id} AND CRN ={$selected_crn} AND SemesterID = {$SemesterID};";
            $dropping_course =mysqli_query($connection, $query);
            if (!$dropping_course) {
                die("Query Failed " . mysqli_error($connection));
            } else {
                echo "<h3 > Removed</h3>";
                header("Refresh:0");
            }
        }
    }
}

?>
              </div>

  

    <?php
  include "include_student/student_footer.php";
  ?>
