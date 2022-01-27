<?php
if (isset($_POST['add_major'])) {
    $add_major_id = $_POST['add_major_id'];
    $query="SELECT * FROM Major WHERE MajorID = {$add_major_id};";
    $select_department_id = mysqli_query($connection, $query);

    while ($row=mysqli_fetch_assoc($select_department_id)) {
        $MajorID=$row['MajorID'];
        $MajorName=$row['MajorName'];
        $txt = $MajorName;
    }
    $query="SELECT * FROM StudentMajor WHERE StudentID = {$the_student_id};";
    $view_student_information =mysqli_query($connection, $query);
    if (!$view_student_information) {
        die("Query Failed " . mysqli_error($connection));
    }
    if (mysqli_num_rows($view_student_information) >= 2) {
        echo "<h3>Over Limit of Majors</h3>";
    } else {
        $query="SELECT * FROM StudentMajor Inner join Major using (MajorID) WHERE StudentID = {$the_student_id} AND MajorID = {$add_major_id};";
        $view_student_information =mysqli_query($connection, $query);
        if (!$view_student_information) {
            die("Query Failed " . mysqli_error($connection));
        }
        if (mysqli_num_rows($view_student_information) == 0) {
            $query="SELECT * FROM Student WHERE StudentID = {$the_student_id} AND MajorID = {$add_major_id};";
            $view_student_information =mysqli_query($connection, $query);
            if (!$view_student_information) {
                die("Query Failed " . mysqli_error($connection));
            }

            if (mysqli_num_rows($view_student_information) == 0) {
                $todays_date = date("Y-m-d");

                $query="SELECT * FROM Student WHERE StudentID = {$the_student_id};";
                $select_department_id = mysqli_query($connection, $query);
                while ($row=mysqli_fetch_assoc($select_department_id)) {
                    $StudentID=$row['StudentID'];
                    $MajorID=$row['MajorID'];
                    $Student_type = $row['Student_type'];
                }
                if ($Student_type === "Undergraduate") {
                    $query="SELECT * FROM Major WHERE MajorID = {$add_major_id};";
                    $select_department_id = mysqli_query($connection, $query);
            
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $MajorID=$row['MajorID'];
                        $MajorProgram = $row['MajorProgram'];
                        $MajorName = $row['MajorName'];
                    }
                    if ($MajorProgram === "M.S") {
                        echo "<h3 class = 'text-center' > Not a Graduate Student</h3>";
                    } else {
                        $query="Insert INTO StudentMajor  ( StudentID , MajorID , DateAdded ,  MajorNumber) VALUES ( {$the_student_id}, {$add_major_id} , '{$todays_date}' , 2 );";
                        $view_student_information =mysqli_query($connection, $query);
                        if (!$view_student_information) {
                            die("Query Failed " . mysqli_error($connection));
                        }
                    }
                }// Graduate Major selected
                elseif ($Student_type === "Graduate") {
                    $query="SELECT * FROM Major WHERE MajorID = {$add_major_id};";
                    $select_department_id = mysqli_query($connection, $query);
            
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $MajorID=$row['MajorID'];
                        $MajorProgram = $row['MajorProgram'];
                        $MajorName = $row['MajorName'];
                    }
                    if ($MajorProgram === "M.S") {
                        $query="Insert INTO StudentMajor  ( StudentID , MajorID , DateAdded ,  MajorNumber) VALUES ( {$the_student_id}, {$add_major_id} , '{$todays_date}' , 2 );";
                        $view_student_information =mysqli_query($connection, $query);
                        if (!$view_student_information) {
                            die("Query Failed " . mysqli_error($connection));
                        }
                    } else {
                        echo "<h3 class = 'text-center' > Not an Undergraduate Student</h3>";
                    }
                }
            }
        } else {
            echo "<h3 class = 'text-center' >Cannot Duplicate the Same Major</h3>";
        }
    }
}
