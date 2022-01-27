<?php
  include "include_faculty/faculty_information_header.php";

?>
<div class='text-center'>
    <?php

if (isset($_GET['student_id'])) {
    if (isset(($_GET['crn']))) {
        $the_student_id  = $_GET['student_id'];
        $the_crn  = $_GET['crn'];

        $query="SELECT * FROM Student INNER JOIN users using (user_id) WHERE StudentID = {$the_student_id};";
        $view_student_information =mysqli_query($connection, $query);
        if (!$view_student_information) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($view_student_information)) {
            $StudentID = $row['StudentID'];
            $first_name =   $row['first_name'];
            $last_name =   $row['last_name'];
        }
        echo "<h2>Time and Attendance for $first_name $last_name</h2>";
        echo "<h4>Student ID : $StudentID</h4>";
        $query="SELECT * from Section inner join Courses using (CourseNumber) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Timeslot using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join timeslot_day using (TimeSlotID) inner join Room using (RoomID) inner join Building using (BuildingID) WHERE CRN = {$the_crn} AND SemesterID = 10;";
        $selected_crn =mysqli_query($connection, $query);
        if (!$selected_crn) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($selected_crn)) {
            $CRN = $row['CRN'] ;
            $FacultyID =   $row['FacultyID'] ;
            $RoomID =   $row['RoomID'];
            $SeatAvailabilty =   $row['SeatAvailability'] ;
            $Capacity =   $row['Capacity'];
            $start_time =   $row['start_time'] ;
            $end_time =   $row['end_time'];
            $day_name =   $row['day_name'] ;
            $SectionNumber =   $row['SectionNumber'];
            $first_name =   $row['first_name'] ;
            $last_name =   $row['last_name'];
            $CourseName =   $row['CourseName'];
            $RoomType =   $row['RoomType'];
            $BuildingName =   $row['BuildingName'];
            $RoomNumber =   $row['RoomNumber'];
        }
    }
}
if (isset($_POST['Attendancebtn'])) {
    if (isset($_POST['attendance'])) {
        $CRN = $_POST['CRN'];
        $StudentID = $_POST['StudentID'];
        $Date_of_Attendance = $_POST['Date_of_Attendance'];
        $Day_of_the_week = $_POST['Day_of_the_week'];
        $WeekNumber = $_POST['WeekNumber'];
        $Attendanceday = $_POST['Attendanceday'];
        $attendance_selected = $_POST['attendance'];

        $query = "UPDATE Attendance SET AbsentPresent = '{$attendance_selected}' WHERE StudentID = {$StudentID} 
        AND CRN = {$CRN} AND Date_of_Attendance = '{$Date_of_Attendance}' AND Day_of_the_week = '{$Day_of_the_week}'   
        AND WeekNumber = {$WeekNumber} AND Attendanceday = '{$Attendanceday}';";
       
        $set_attendance =mysqli_query($connection, $query);
        if (!$set_attendance) {
            die("Query Failed " . mysqli_error($connection));
        } else {
            header("Location: view_attendance.php?student_id={$StudentID}&crn={$CRN}");
        }
    }
}

?>






    <table class="table table-bordered text-warning text-center">
        <h3>Attendance</h3>
        <?php
$todays_date = date('Y-m-d');
?>
        <thead>
            <tr>
                <th>Mark Attendance for this Student</th>
                <th>Present/Absent</th>
                <th>Day</th>

            </tr>
        </thead>
        <tbody>

            <?php
$query="SELECT DISTINCT  * FROM Attendance Where StudentID = {$the_student_id} AND CRN = {$the_crn} ORDER BY Date_of_Attendance DESC;";

$view_student_information =mysqli_query($connection, $query);
if (!$view_student_information) {
    die("Query Failed " . mysqli_error($connection));
}
 while ($row=mysqli_fetch_assoc($view_student_information)) {
     $StudentID = $row['StudentID'];
     $CRN =   $row['CRN'];
     $Date_of_Attendance = $row['Date_of_Attendance'];
     $Day_of_the_week =   $row['Day_of_the_week'];
     $WeekNumber =   $row['WeekNumber'];
     $Attendanceday =   $row['Attendanceday'];
     $AbsentPresent =   $row['AbsentPresent'];
     echo "<tr>";
     if ($Date_of_Attendance === $todays_date) {
         echo "<td>  
        <form action='' method='post' enctype='multipart/form-data'>
        <select name='attendance' id='post_category'>
            <option value='Present'>Present for Class Meeting/Lecture</option>
             <option value='Absent'>Absent for Class Meeting/Lecture</option>
             </select>
        <input type='hidden' name='StudentID' value='$StudentID'>
        <input type='hidden' name='CRN' value='$CRN'>
        <input type='hidden' name='Date_of_Attendance' value='$Date_of_Attendance'>
        <input type='hidden' name='Day_of_the_week' value='$Day_of_the_week'>
        <input type='hidden' name='WeekNumber' value='$WeekNumber'>
        <input type='hidden' name='Attendanceday' value='$Attendanceday'>
        <input type='hidden' name='AbsentPresent' value='$AbsentPresent'>

        <input class='btn btn-warning' type='submit' name='Attendancebtn'
        value='Submit'>
    </td> 
    ";
     } elseif ($Date_of_Attendance < $todays_date) {
         echo "<td ></td>";
     }
     if ($AbsentPresent == "Present") {
         echo "<td>{$AbsentPresent}</td>";
     } elseif ($AbsentPresent == "Absent") {
         echo "<td class = 'bg-danger'>{$AbsentPresent}</td>";
     } else {
         echo "<td > {$AbsentPresent}</td>";
     }
     echo "<td>{$Day_of_the_week} , {$Date_of_Attendance}</td>";

     echo "</tr>"
    ?>

            <?php

?>

            <?php
 }


 echo "</thead>
 </table>";

 ?>
</div>