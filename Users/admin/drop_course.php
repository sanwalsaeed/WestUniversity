<?php
if (isset($_POST['dropcourse'])) {
    $selected_crn = $_POST['select_crn'];
    $query="Select * from Courses inner join Section using (CourseNumber) Where CRN = {$selected_crn};";
    $select_coursename =mysqli_query($connection, $query);
    if (!$select_enrollment) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($select_coursename)) {
        $CourseName = $row['CourseName'];
    }

    $query="Delete from Enrollment where StudentID = {$the_student_id} AND CRN ={$selected_crn} AND SemesterID = 10;";
    $dropping_course =mysqli_query($connection, $query);
    if (!$dropping_course) {
        die("Query Failed " . mysqli_error($connection));
    } else {
        echo "<h3 class = 'text-center' > Dropped Course: $CourseName</h3>";
                    
        $query="Delete from ClassList where StudentID = {$the_student_id} AND CRN ={$selected_crn} AND SemesterID = 10;";
        $dropping_course =mysqli_query($connection, $query);
        if (!$dropping_course) {
            die("Query Failed " . mysqli_error($connection));
        } else {
            echo "<h3 class= 'text-center' > Dropped Course : $CourseName</h3>";
        }
    }
}
