<?php
         if (isset($_POST['view_all_sections'])) {
             ?>
<div class="text-center">
    <h3 class="bodycenter text-warning text-center">All Sections Available in Fall 2021<h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input class="btn btn-warning text-dark text-center " type="submit" name="select_from_all_sections_btn"
                    value="Select Course for Registration">
</div>


<table class="table  text-light" style="background-color: #2e004f;">
    <thead class="text-warning" style="background-color: #2e004f;">
        <th>Register</th>
        <th>CRN</th>
        <th>Section</th>
        <th>Course#</th>
        <th>Course</th>
        <th>Dep</th>
        <th>Day</th>
        <th>Start</th>
        <th>End</th>
        <th>Room</th>
        <th>Building</th>
        <th>Credits</th>
        <th>Professor First Name</th>
        <th>Professor Last Name</th>
        <th>Semester Name</th>
        <th>Semester Year</th>
        <th>Availability</th>
        </tr>
    </thead>

    <?php
                      $query="
                      select * from Section
                      inner join Courses using (CourseNumber) 
                      inner join Major using (MajorID)
                      INNER JOIN Faculty using (FacultyID) 
                      inner join Department on Department.DepartmentID = Faculty.DepartmentID
                      INNER JOIN Timeslot using (TimeslotID)
                      inner join users using (user_id)
                      inner join timeslot_day using (TimeslotID)
                      inner join timeslot_period using (TimeslotID)
                      inner join period using (periodNumber)
                      inner join Semester using (SemesterID)
                      inner join Room on Section.RoomID = Room.RoomID
                      inner join Building on Building.BuildingID = Room.BuildingID
                      AND Section.SemesterID = 10
                      Order by CRN ;";

             $select_sections =mysqli_query($connection, $query);
             if (!$select_sections) {
                 die("Query Failed " . mysqli_error($connection));
             }
             while ($row=mysqli_fetch_assoc($select_sections)) {
                 $CRN             =  $row['CRN'] ;
                 $SectionNumber      = $row['SectionNumber'] ;
                 $CourseNumber        = $row['CourseNumber'] ;
                 $CourseName          = $row['CourseName'] ;
                 $DepartmentName          = $row['DepartmentName'] ;
                 $CourseCredits          = $row['CourseCredits'] ;

                 $SemesterName          = $row['SemesterName'] ;
                 $SemesterYear          = $row['SemesterYear'] ;

                 $day_name           =  $row['day_name'] ;
                 $start_time         = $row['start_time'] ;
                 $end_time           = $row['end_time'] ;
                 $RoomNumber         = $row['RoomNumber'] ;
                 $BuildingName        = $row['BuildingName'] ;
                 $last_name          = $row['last_name'] ;
                 $first_name          = $row['first_name'] ;
                 $SeatAvailabilty     = $row['SeatAvailability'] ;
                 $capacity    =       $row['Capacity'] ;

                 echo "<tr>";
                 echo "<td><input type='radio' name='select_crn' value='{$CRN}'/><h6 class = 'text-warning'>Register</h6></td>";
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
                 echo "<td>{$CourseCredits}</td>";
                 echo "<td>{$last_name}</td>";
                 echo "<td>{$first_name}</td>";
                 echo "<td>{$SemesterName}</td>";
                 echo "<td>{$SemesterYear}</td>";
                 echo "<td>{$SeatAvailabilty}</td>";
                 echo "</tr>";
             } ?>
    </form>
    <?php
         }
