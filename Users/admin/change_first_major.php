<?php
if (isset($_POST['change_1st_major'])) {
        $major_id = $_POST['major_change_id'];
        $query="SELECT * FROM Student WHERE StudentID = {$the_student_id};";
        $select_department_id = mysqli_query($connection, $query);

        while ($row=mysqli_fetch_assoc($select_department_id)) {
            $StudentID=$row['StudentID'];
            $MajorID=$row['MajorID'];
            $Student_type = $row['Student_type'];
        }
        if ($Student_type === "Undergraduate") {
            $query="SELECT * FROM Major WHERE MajorID = {$major_id};";
            $select_department_id = mysqli_query($connection, $query);

            while ($row=mysqli_fetch_assoc($select_department_id)) {
                $MajorID=$row['MajorID'];
                $MajorProgram = $row['MajorProgram'];
                $MajorName = $row['MajorName'];
            }
            if ($MajorProgram === "M.S") {
                echo "<h6 class = 'text-center'>Error: Not a Graduate Student</h6>";
            } else {
                $count = 0;
                $query="SELECT * FROM Student WHERE StudentID = {$the_student_id};";
                $select_department_id = mysqli_query($connection, $query);
        
                while ($row=mysqli_fetch_assoc($select_department_id)) {
                    $count++;
                }

                $query = "UPDATE Student
              SET MajorID = {$major_id}
              WHERE StudentID = {$the_student_id};";

                $select_department_id = mysqli_query($connection, $query);
                $todays_date = date("Y-m-d");

                $query = "UPDATE StudentMajor
              SET MajorID = {$major_id}, DateAdded = '{$todays_date}' 
              WHERE StudentID = {$the_student_id} AND MajorNumber = 1;";

                $select_department_id = mysqli_query($connection, $query);

                echo "<h6 class = 'text-center'>Major Changed</h6>";
            }
        } elseif ($Student_type === "Graduate") {
            $query="SELECT * FROM Major WHERE MajorID = {$major_id};";
            $select_department_id = mysqli_query($connection, $query);

            while ($row=mysqli_fetch_assoc($select_department_id)) {
                $MajorID=$row['MajorID'];
                $MajorProgram = $row['MajorProgram'];
                $MajorName = $row['MajorName'];
            }
            if ($MajorProgram === "M.S") {
                $query = "UPDATE Student
                SET MajorID = {$major_id}
                WHERE StudentID = {$the_student_id};";
  
                $select_department_id = mysqli_query($connection, $query);
  
                $todays_date = date("Y-m-d");
                $query = "UPDATE StudentMajor
                SET MajorID = {$major_id}, DateAdded = '{$todays_date}'
                WHERE StudentID = {$the_student_id};";
  
                $select_department_id = mysqli_query($connection, $query);
                echo "<h6 class = 'text-center' >Major Changed</h6>";
                
            } else {
                echo "<h6 class = 'text-center'>Error: Not a Undergraduate</h6>";
                
            }
        }
    }