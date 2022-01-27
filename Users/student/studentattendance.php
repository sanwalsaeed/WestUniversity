<?php
  include "include_student/student_info_header.php";
?>
<?php
  include "include_student/student_information_bar.php";
?>
<div class="text-center">
  <h1 style="font-size: 35px">Viewing Student Attendance</h1>
  <?php
        $num_present = 0;
    $num_absent = 0;
    $total_days_passed = 0;
    $days_passed_so_far = 0;

    $query="SELECT * FROM Attendance inner join Section on Section.CRN = Attendance.CRN INNER JOIN Courses using (CourseNumber) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) Where Attendance.StudentID = {$the_student_id} AND Section.SemesterID = 10 ORDER BY Date_of_Attendance;";

    $view_student_information =mysqli_query($connection, $query);
    if (!$view_student_information) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($view_student_information)) {
        $CRN = $row['CRN'];
        $CourseName = $row['CourseName'];
        $StudentID = $row['StudentID'];
        $Date_of_Attendance = $row['Date_of_Attendance'];
        $AbsentPresent =   $row['AbsentPresent'];
        $Day_of_the_week =   $row['Day_of_the_week'];
        $start_time =   $row['start_time'];
        $end_time =   $row['end_time'];
        $WeekNumber =   $row['WeekNumber'];
        $total_days_passed++;
        
        if ($AbsentPresent == "Present") {
            $num_present++;
            $days_passed_so_far++;
        } elseif ($AbsentPresent == "Absent") {
            $num_absent++;
            $days_passed_so_far++;
        }
    }


    $coursestaken = [];

    $query="SELECT DISTINCT  * FROM Enrollment Where SemesterID = 10 AND StudentID = {$StudentID};";

    $view_student_information =mysqli_query($connection, $query);
    if (!$view_student_information) {
        die("Query Failed " . mysqli_error($connection));
    }
    $i = 0;
    while ($row=mysqli_fetch_assoc($view_student_information)) {
        $CRN =   $row['CRN'];
        $coursestaken[$i] = $CRN;
        $i++;
    }

    for ($j = 0; $j < $i ; $j++) {
        $course = $coursestaken[$j];
        $query="SELECT * FROM Enrollment inner join Section on Section.CRN = Enrollment.CRN INNER JOIN Courses using (CourseNumber) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) Where Enrollment.StudentID = {$the_student_id} AND Section.SemesterID = 10 AND Section.CRN = {$course};"; ?>
  <?php
        if (!$view_student_information) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($view_student_information)) {
            $CRN = $row['CRN'];
            $CourseName = $row['CourseName'];
        } ?>
  <br>
  <table class="table table-bordered text-warning">
    <h3 class="text-center">Attendance for : <?php echo  "CRN: " . $CRN . " " . $CourseName ; ?>
    </h3>
    <thead>
      <tr>
        <th>Present / Absent </th>
        <th>Day and Date of Class Session</th>
        <th>Time of Class Session</th>

      </tr>
    </thead>
    <tbody>
      <?php

$query="SELECT * FROM Attendance inner join Section on Section.CRN = Attendance.CRN INNER JOIN Courses using (CourseNumber) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) Where Attendance.StudentID = {$the_student_id} AND Section.SemesterID = 10 AND Section.CRN = {$course} ORDER BY Date_of_Attendance;";

        $view_student_information =mysqli_query($connection, $query);
        if (!$view_student_information) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($view_student_information)) {
            $CRN = $row['CRN'];
            $CourseName = $row['CourseName'];
            $StudentID = $row['StudentID'];
            $Date_of_Attendance = $row['Date_of_Attendance'];
            $AbsentPresent =   $row['AbsentPresent'];
            $Day_of_the_week =   $row['Day_of_the_week'];
            $start_time =   $row['start_time'];
            $end_time =   $row['end_time'];
            $WeekNumber =   $row['WeekNumber']; ?>

      <?php
            echo "<tr>";
            
            if ($AbsentPresent == "Present") {
                echo "<td > {$AbsentPresent}</td>";
            } elseif ($AbsentPresent == "Absent") {
                echo "<td class = 'bg-danger'> {$AbsentPresent}</td>";
            } else {
                echo "<td > {$AbsentPresent}</td>";
            }
            echo "<td>{$Day_of_the_week}, {$Date_of_Attendance}</td>";
            echo "<td>{$start_time} - {$end_time}</td>";

            echo "</tr>"; ?>
      <?php
        }
        echo "</tbody></table>";
    }
?>
</div>