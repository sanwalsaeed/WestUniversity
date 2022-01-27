<?php
  include "include_faculty/faculty_information_header.php";

?>

<?php
if (isset($_GET['crn'])) {
    $crn_selected = $_GET['crn'];
    if (isset($_GET['semester'])) {
        $semester_selected = $_GET['semester'];
    } else {
        $semester_selected = 10;
    }
}

echo "<br>";
if ($semester_selected == 10) {
    $query="SELECT * from Section inner join Courses using (CourseNumber) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Timeslot using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join timeslot_day using (TimeSlotID) inner join Room using (RoomID) inner join Building using (BuildingID) INNER JOIN Semester on Semester.SemesterID = Section.SemesterID WHERE CRN = {$crn_selected} AND Section.SemesterID = {$semester_selected};";
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
        $SemesterName =   $row['SemesterName'];
        $SemesterYear =   $row['SemesterYear'];
    } ?>
<table class="table table-bordered text-warning">
    <tbody>
    <tbody>
        <?php
                   
                   echo
                   "<tr><td>Course Name</td><td>$CourseName</td></tr>
                   <tr><td>CRN</td><td>$CRN </td></tr>
                   <tr><td>Start Time</td><td>$start_time </td></tr>
                   <tr><td>End Time</td><td>$end_time </td></tr>
                   <tr><td>Day</td><td>$day_name </td></tr>
                   <tr><td>Location</td><td>$BuildingName Room $RoomNumber</td></tr> 
                    "; ?>
    </tbody>
</table>

<table class="table table-bordered table-sm text-warning text-center">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Major</th>
            <th>Grade Student</th>
            <th>Give Attendance</th>

        </tr>
    </thead>
    <tbody>

        <?php
    if (isset($_POST['gradebtn'])) {
        $grade = $_POST['grade'];

        $student_id = $_POST['student_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $crn_selected = $_POST['crn_selected'];
        
        $query= "Select * from Section WHERE CRN = {$crn_selected};";
        $student_list = mysqli_query($connection, $query);
        if (!$student_list) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($student_list)) {
            $CRN = $row['CRN'] ;
            $SemesterID =   $row['SemesterID'] ;
        }

        $query= "Select * from Courses inner join Section using (CourseNumber) WHERE CRN = {$crn_selected} AND SemesterID =  {$SemesterID};";
        $student_list = mysqli_query($connection, $query);
        if (!$student_list) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($student_list)) {
            $CourseNumber = $row['CourseNumber'] ;
        }
        $todaydate = date("Y-m-d");
        $query= "Select * from Semester WHERE SemesterID = {$SemesterID};";
        $SemesterID_look_up = mysqli_query($connection, $query);
        if (!$student_list) {
            die("Query Failed " . mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($SemesterID_look_up)) {
            $GradeTimeLimit = $row['GradeTimeLimit'] ;
            $SemesterEndTime = $row['SemesterEndTime'] ;
        }
        $query = "Select * from Semester WHERE SemesterID = {$SemesterID} AND SemesterEndTime <= '{$todaydate}' ;";
        $time_limit =mysqli_query($connection, $query);
        if (!$time_limit) {
            die("Query Failed " . mysqli_error($connection));
        }
        if (mysqli_num_rows($time_limit) > 0) {
            $query = "Select * from Semester WHERE SemesterID = {$SemesterID} AND GradeTimeLimit >= '{$todaydate}' ;";
            $time_limit =mysqli_query($connection, $query);
            if (!$time_limit) {
                die("Query Failed " . mysqli_error($connection));
            }

            if (mysqli_num_rows($time_limit) > 0) {
                $query = "DELETE from Enrollment WHERE SemesterID = {$SemesterID} AND StudentID = {$student_id} AND CRN = {$crn_selected};";
                $time_limit =mysqli_query($connection, $query);
                if (!$time_limit) {
                    die("Query Failed " . mysqli_error($connection));
                } else {
                    $query = "Select * from StudentHistory Where CRN = {$crn_selected} AND StudentID =  {$student_id} AND CourseNumber = {$CourseNumber} AND SemesterID = {$SemesterID};";
                    $time_limit =mysqli_query($connection, $query);
                    if (!$time_limit) {
                        die("Query Failed " . mysqli_error($connection));
                    } else {
                        if (mysqli_num_rows($time_limit) > 0) {
                            $query = "UPDATE StudentHistory SET GradeRecieved = '{$grade}'  Where CRN = {$crn_selected} AND StudentID =  {$student_id} AND CourseNumber = {$CourseNumber} AND SemesterID = {$SemesterID};";
                            $time_limit =mysqli_query($connection, $query);
                            if (!$time_limit) {
                                die("Query Failed " . mysqli_error($connection));
                            } else {
                                echo "<h3 class = 'text-center' > Grade has been Updated</h3>";
                            }
                        } else {
                            $query = "INSERT INTO StudentHistory ( CRN , StudentID , CourseNumber, SemesterID, GradeRecieved ) VALUES ( {$crn_selected} , {$student_id} , {$CourseNumber}, {$SemesterID} , '{$grade}');";
                            $time_limit =mysqli_query($connection, $query);
                            if (!$time_limit) {
                                die("Query Failed " . mysqli_error($connection));
                            } else {
                                echo "<h3 class = 'text-center'> Grade has been Added</h3>";
                            }
                        }
                    }
                }

                if (!$student_list) {
                    die("Query Failed " . mysqli_error($connection));
                }
            } else {
                echo "<h3 class = 'text-center' > Not in grade time limit.</h3>";
            }
        } else {
            echo "<h3 class = 'text-center' >Not in grade time limit.</h3>";
        }
    }

    $query="SELECT * from ClassList INNER JOIN Student using (StudentID) INNER JOIN users using (user_id) INNER JOIN Major using (MajorID) WHERE SemesterID = {$semester_selected} AND CRN = {$crn_selected};";
    $student_list =mysqli_query($connection, $query);
    if (!$student_list) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($student_list)) {
        $StudentID = $row['StudentID'] ;
        $first_name =   $row['first_name'] ;
        $last_name =   $row['last_name'];
        $MajorName =   $row['MajorName'];
        echo "<tr>";
        echo "<td>{$StudentID}</td>";
        echo "<td>{$first_name}</td>";
        echo "<td>{$last_name}</td>";
        echo "<td>{$MajorName}</td>"; ?>

        <td class="text-center">
            <form action="" method="post" enctype="multipart/form-data">
                <select name="grade" id="post_category" required>
                    <?php
        if ($semester_selected == 10) {
            echo "
            <option value='none' selected disabled hidden>
            Select a Grade
            </option>
            <option value='A'>A</option>
            <option value='A-'>A-</option>
            <option value='B+'>B+</option>
            <option value='B'>B</option>
            <option value='B-'>B-</option>
            <option value='C+'>C+</option>
            <option value='C'>C</option>
            <option value='C-'>C-</option>
            <option value='D'>D</option>
            <option value='F'>F</option>";
        } ?>
                </select>
                <?php
echo "    
<input type='hidden' name='student_id' value='$StudentID' />
<input type='hidden' name='first_name' value='$first_name' /> 
<input type='hidden' name='last_name' value='$last_name' />     
<input type='hidden' name='crn_selected' value='$crn_selected' />";

        echo "<input class='btn btn-warning' type='submit' name='gradebtn'
value='Grade'>";
        echo "</td></form>";


        echo "<td class = 'text-center' ><a class = 'text-center text-dark btn btn-warning' href = 'view_attendance.php?student_id={$StudentID}&crn={$crn_selected}'>Attendance</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    ?>
                <table class="table table-bordered text-warning text-center">
                    <tbody>
                        <?php

    $query="SELECT * from Section inner join Courses using (CourseNumber) inner join Faculty using (FacultyID) inner join users using (user_id) inner join Timeslot using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) inner join timeslot_day using (TimeSlotID) inner join Room using (RoomID) inner join Building using (BuildingID) Inner join Semester on Section.SemesterID = Semester.SemesterID WHERE CRN = {$crn_selected} AND Section.SemesterID = {$semester_selected};";

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
        $SemesterName =   $row['SemesterName'];
        $SemesterYear =   $row['SemesterYear']; ?>
                        <?php
               echo
               "<tr><td>Course Name</td><td>$CourseName</td></tr>
               <tr><td>CRN</td><td>$CRN </td></tr>
               <tr><td>Start Time</td><td>$start_time </td></tr>
               <tr><td>End Time</td><td>$end_time </td></tr>
               <tr><td>Day</td><td>$day_name </td></tr>
               <tr><td>Location</td><td>$BuildingName Room $RoomNumber</td></tr>
            "; ?>
                    </tbody>
                </table>
                <?php
    } ?>

                <table class="table table-bordered table-sm text-warning">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Major</th>
                            <th>Grade Student</th>
                            <th>Give Attendance</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
    $query="SELECT * from ClassList INNER JOIN Student using (StudentID) INNER JOIN users using (user_id) INNER JOIN Major using (MajorID) WHERE SemesterID = {$semester_selected} AND CRN = {$crn_selected};";
    $student_list =mysqli_query($connection, $query);
    if (!$student_list) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($student_list)) {
        $StudentID = $row['StudentID'] ;
        $first_name =   $row['first_name'] ;
        $last_name =   $row['last_name'];
        $MajorName =   $row['MajorName'];
    }

    $query="SELECT * from ClassList INNER JOIN Student using (StudentID) INNER JOIN users using (user_id) INNER JOIN Major using (MajorID) WHERE SemesterID = {$semester_selected} AND CRN = {$crn_selected};";
    $student_list =mysqli_query($connection, $query);
    if (!$student_list) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($student_list)) {
        $StudentID = $row['StudentID'] ;
        $first_name =   $row['first_name'] ;
        $last_name =   $row['last_name'];
        $MajorName =   $row['MajorName'];

        echo "<tr>";
        echo "<td>{$StudentID}</td>";
        echo "<td>{$first_name}</td>";
        echo "<td>{$last_name}</td>";
        echo "<td>{$MajorName}</td>"; ?>
                        <?php
                    ?>
                        <td class="text-center">
                            <form action="" method="post" enctype="multipart/form-data">
                                <select name="grade" id="post_category" required>
                                    <?php
    if ($semester_selected == 10) {
        echo "
    <option value='none' selected disabled hidden>
    Select a Grade
    </option>
    <option value='A'>A</option>
    <option value='A-'>A-</option>
    <option value='B+'>B+</option>
    <option value='B'>B</option>
    <option value='B-'>B-</option>
    <option value='C+'>C+</option>
    <option value='C'>C</option>
    <option value='C-'>C-</option>
    <option value='D'>D</option>
    <option value='F'>F</option>
    ";
    } ?>
                                </select>

                                <?php
        echo "    
        <input type='hidden' name='student_id' value='$StudentID' />
        <input type='hidden' name='first_name' value='$first_name' /> 
        <input type='hidden' name='last_name' value='$last_name' />     
        <input type='hidden' name='crn_selected' value='$crn_selected' />";

        echo "<input class='btn btn-warning' type='submit' name='gradebtn'
value='Grade'>";
        echo "</td></form>";
        echo "<td class = 'text-center' ><a class = 'text-center text-dark btn btn-warning' href = 'view_attendance.php?student_id={$StudentID}&crn={$crn_selected}'>Attendance</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
