<?php
if (isset($_POST['change_minor'])) {
        if (isset($_POST['minor_change_id'])) {
            $selected_minor_id = $_POST['minor_change_id'];
            $previousMajorID = $_POST['previousMajorID'];
            $MinorNumber = $_POST['MinorNumber'];
            $query="SELECT * FROM Minor WHERE MinorID = {$selected_minor_id};";
            $select_department_id = mysqli_query($connection, $query);

            while ($row=mysqli_fetch_assoc($select_department_id)) {
                $MinorID=$row['MinorID'];
                $MinorName=$row['MinorName'];
                $txt = $MinorName;
            }
            $query="SELECT * FROM GraduateStudent WHERE StudentID = {$the_student_id};";
            $select_department_id = mysqli_query($connection, $query);
            if (mysqli_num_rows($select_department_id) > 0) { 
                echo "<h3 class = 'text-center'> Graduate Cannot have Minor</h3>";
            } else { 
                    
                    $query="SELECT * FROM Student Inner join StudentMinor using (StudentID) WHERE Student.StudentID = {$the_student_id} AND StudentMinor.MinorID = {$selected_minor_id};";
                    $view_student_information =mysqli_query($connection, $query);
                    if (!$view_student_information) {
                        die("Query Failed " . mysqli_error($connection));
                    }
                    if (mysqli_num_rows($view_student_information) > 0) {
                        echo "<h3 class = 'text-center' > Duplicate Minor.</h3>";
                    } else {
                        $todays_date = date("Y-m-d");
                        $query = "UPDATE StudentMinor SET MinorID = {$selected_minor_id}, DateAdded = '{$todays_date}' WHERE StudentID = {$the_student_id} AND MinorNumber = {$MinorNumber};";
                        $view_student_information =mysqli_query($connection, $query);
                        if (!$view_student_information) {
                            die("Query Failed " . mysqli_error($connection));
                        }
                        echo "<h3  class = 'text-center' > Minor Changed.</h3>";
                    }
            }
        }
    }
?>