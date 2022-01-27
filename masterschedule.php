<?php
      include "view/header.php";
    ?>
    <?php
      include "view/nav.php";
    ?>

<div class = "" style="text-align: center; background-color: #2e004f;" >
<br>
<ul class="nav justify-content-center text-warning"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
      <h1 class="h2">Currently Viewing The Master Schedule </h1>
      <br>
  <form action="" method="post" enctype="multipart/form-data">
                        <h3>Select Semester</h3>
                        <select name="semester_id" id="post_category" value="Select a Semester">
                            <option value="10" selected>Select a Semester</option>
                            <?php
                                // THIS CODE MAKES A DROP DOWN MENU OF THE CATEGORY NAMES AND NOT THE ID NUMBERS
                                $query="SELECT * FROM Semester WHERE SemesterID > 2;";
                                $select_department_id = mysqli_query($connection, $query);

                                while ($row=mysqli_fetch_assoc($select_department_id)) {
                                    $SemesterID=$row['SemesterID'];
                                    $SemesterName=$row['SemesterName'];
                                    $SemesterYear=$row['SemesterYear'];
                                  $txt = $SemesterName . " " . $SemesterYear;
                                       echo "<option value = '{$SemesterID}' required>{$txt}</option>";
                                }
        ?>
                        </select>
                        <input class="btn btn-primary" type="submit" name="semesterbtn" value="Select Semester" required>
</form>
                        <br>
    </li>

</ul>
  
                        <?php
$current = true;
$future = false;
if (isset($_POST['semesterbtn'])) {
  $selected_semester =  $_POST['semester_id'];
  $query="SELECT * FROM Semester WHERE SemesterID = {$selected_semester};";
 $select_department_id = mysqli_query($connection, $query);

 while ($row=mysqli_fetch_assoc($select_department_id)) {
     $SemesterID=$row['SemesterID'];
     $SemesterName=$row['SemesterName'];
     $SemesterYear=$row['SemesterYear'];

     $txt = ucwords($SemesterName) . " " . $SemesterYear;
 }
 echo  "<h3 style = 'text-align : center;' class = 'text-warning'>Currently Viewing the $txt Semester.</h3>";
?>
<?php
 $current= 10;
 $future_sem = 11;

      if ($selected_semester == $current) {
          $current = true;
          $future = false;
         // echo  "<h3 style ='color: green;'>Current Semester Selected </h3>";
      }
      else if ($selected_semester ==  $future_sem){
        $future = true;
        $current = false;
       // echo  "<h3 style ='color: green;'>Next Semester Selected Fall 2021</h3>";
      }
      else{
        ?>
<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>CRN</th>
                        <th>Section</th>
                        <th>Course#</th>
                        <th>Course Name</th>
                        <th>Room Number</th>
                        <th>Building Name</th>
                        <th>Professor First Name</th>
                        <th>Professor Last Name</th>
                        <th>Department</th>
                        <th>Days</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Semester</th>
                        <th>Year</th>
                       
                       
                        <!-- <th></th>  -->
                        </tr>
                        </thead>
                        <tbody >


        <?php
        $current = false;
        $query=" Select Distinct
        *
        from Section 
        inner join Courses using (CourseNumber)
        inner join Timeslot using (TimeSlotID) 
        inner join timeslot_day using (TimeSlotID)
        inner join timeslot_period using (TimeSlotID)
        inner join period using (periodNumber)
        inner join Semester using (SemesterID)
        inner join Faculty using (FacultyID)
        inner join Department on Courses.DepartmentID = Department.DepartmentID
        inner join users using (user_id)
        inner join Room on Section.RoomID = Room.RoomID
        inner join Building on Building.BuildingID = Room.BuildingID
        WHERE Section.SemesterID ={$selected_semester}
        ORDER BY CRN;";
      
       
        $select_department_id = mysqli_query($connection, $query);

        while ($row=mysqli_fetch_assoc($select_department_id)) {
            $CRN             =  $row['CRN'] ;
            $SectionNumber      = $row['SectionNumber'] ;
            $CourseNumber        = $row['CourseNumber'] ;
            $CourseName          = $row['CourseName'] ;
            $DepartmentName          = $row['DepartmentName'] ;
            $SemesterName           =  $row['SemesterName'] ;
            $SemesterYear           =  $row['SemesterYear'] ;
            $SemesterID           =  $row['SemesterID'] ;

            $day_name           =  $row['day_name'] ;
            $start_time         = $row['start_time'] ;
            $end_time           = $row['end_time'] ;
            $RoomNumber         = $row['RoomNumber'] ;
            $BuildingName        = $row['BuildingName'] ;
            $last_name          = $row['last_name'] ;
            $first_name          = $row['first_name'] ;

            $SemesterName = ucwords($SemesterName);
            echo "<tr>";
            echo "<td>{$CRN}</td>";
            echo "<td>{$SectionNumber}</td>";
            echo "<td>{$CourseNumber}</td>";
            echo "<td>{$CourseName}</td>";
            echo "<td>{$RoomNumber}</td>";
            echo "<td>{$BuildingName}</td>";
            echo "<td>{$last_name}</td>";
            echo "<td>{$first_name}</td>";
            echo "<td>{$DepartmentName}</td>";
            echo "<td>{$day_name}</td>";
            echo "<td>{$start_time}</td>";
            echo "<td>{$end_time}</td>";
            echo "<td >{$SemesterName}</td>";
            echo "<td >{$SemesterYear}</td>";
            
            //echo "<td>{$SeatAvailability}</td>";
            ///echo "<td><a class = 'btn btn-outline-dark' href = 'view_class_list.php?crn={$CRN}&semester={$SemesterID}'>View Class List </a></td>";
        }
      }
}
?>
<?php
if ($future) {
  ?>

<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>CRN</th>
                        <th>Section</th>
                        <th>Course#</th>
                        <th>Course Name</th>
                        <th>Room Number</th>
                        <th>Building Name</th>
                        <th>Professor First Name</th>
                        <th>Professor Last Name</th>
                        <th>Department</th>
                        <th>Days</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Semester</th>
                        <th>Year</th>
                       
                       
                        <th>Seats</th>
                        <!-- <th></th>  -->
                        </tr>
                        </thead>
                        <tbody >
                      <?php
                      
  $semesterselected = 11;
  $query=" Select Distinct
  *
  from Section 
  inner join Courses using (CourseNumber)
  inner join Timeslot using (TimeSlotID) 
  inner join timeslot_day using (TimeSlotID)
  inner join timeslot_period using (TimeSlotID)
  inner join period using (periodNumber)
  inner join Semester using (SemesterID)
  inner join Faculty using (FacultyID)
  inner join Department on Courses.DepartmentID = Department.DepartmentID
  inner join users using (user_id)
  inner join Room on Section.RoomID = Room.RoomID
  inner join Building on Building.BuildingID = Room.BuildingID
  WHERE Section.SemesterID ={$semesterselected}
  ORDER BY CRN;";

  $select_faculty_schedule = mysqli_query($connection, $query);
  if (!$select_faculty_schedule) {
      die("Query Failed " . mysqli_error($connection));
  }
  while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
      $CRN             =  $row['CRN'] ;
      $SectionNumber      = $row['SectionNumber'] ;
      $CourseNumber        = $row['CourseNumber'] ;
      $CourseName          = $row['CourseName'] ;
      $DepartmentName          = $row['DepartmentName'] ;
      $SemesterName           =  $row['SemesterName'] ;
      $SemesterYear           =  $row['SemesterYear'] ;
      $SeatAvailability           =  $row['SeatAvailability'] ;
      $Capacity           =  $row['Capacity'] ;
      $day_name           =  $row['day_name'] ;
      $start_time         = $row['start_time'] ;
      $end_time           = $row['end_time'] ;
      $RoomNumber         = $row['RoomNumber'] ;
      $BuildingName        = $row['BuildingName'] ;
      $last_name          = $row['last_name'] ;
      $first_name          = $row['first_name'] ;

      $SemesterName = ucwords($SemesterName);

      echo "<tr>";
      echo "<td>{$CRN}</td>";
      echo "<td>{$SectionNumber}</td>";
      echo "<td>{$CourseNumber}</td>";
      echo "<td>{$CourseName}</td>";
      echo "<td>{$RoomNumber}</td>";
      echo "<td>{$BuildingName}</td>";
      echo "<td>{$last_name}</td>";
      echo "<td>{$first_name}</td>";
      echo "<td>{$DepartmentName}</td>";
      echo "<td>{$day_name}</td>";
      echo "<td>{$start_time}</td>";
      echo "<td>{$end_time}</td>";
      echo "<td >{$SemesterName}</td>";
      echo "<td >{$SemesterYear}</td>";
      
      echo "<td>{$SeatAvailability}</td>";
      echo "</tr>";
  } ?>

                      </tr>
                      </tbody>
                      </table>
                      <a href = 'view_all_department.php'>Jump Back to top</a>


                      <?php
}

?>

<?php

if ($current) {
    ?>

<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>CRN</th>
                        <th>Section</th>
                        <th>Course#</th>
                        <th>Course Name</th>
                        <th>Room Number</th>
                        <th>Building Name</th>
                        <th>Professor First Name</th>
                        <th>Professor Last Name</th>
                        <th>Department</th>
                        <th>Days</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Semester</th>
                        <th>Year</th>
                       
                       
                        <th>Seats</th>
                        <!-- <th></th>  -->
                        </tr>
                        </thead>
                        <tbody>

<?php
     $semesterselected = 10;
     $query=" Select Distinct
     *
     from Section 
     inner join Courses using (CourseNumber)
     inner join Timeslot using (TimeSlotID) 
     inner join timeslot_day using (TimeSlotID)
     inner join timeslot_period using (TimeSlotID)
     inner join period using (periodNumber)
     inner join Semester using (SemesterID)
     inner join Faculty using (FacultyID)
     inner join Department on Courses.DepartmentID = Department.DepartmentID
     inner join users using (user_id)
     inner join Room on Section.RoomID = Room.RoomID
     inner join Building on Building.BuildingID = Room.BuildingID
     WHERE Section.SemesterID ={$semesterselected}
     ORDER BY CRN;";

    $select_faculty_schedule = mysqli_query($connection, $query);
    if (!$select_faculty_schedule) {
        die("Query Failed " . mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
        $CRN             =  $row['CRN'] ;
        $SectionNumber      = $row['SectionNumber'] ;
        $CourseNumber        = $row['CourseNumber'] ;
        $CourseName          = $row['CourseName'] ;
        $DepartmentName          = $row['DepartmentName'] ;
        $SemesterName           =  $row['SemesterName'] ;
        $SemesterYear           =  $row['SemesterYear'] ;
        $SeatAvailability           =  $row['SeatAvailability'] ;
        $Capacity           =  $row['Capacity'] ;

        $day_name           =  $row['day_name'] ;
        $start_time         = $row['start_time'] ;
        $end_time           = $row['end_time'] ;
        $RoomNumber         = $row['RoomNumber'] ;
        $BuildingName        = $row['BuildingName'] ;
        $last_name          = $row['last_name'] ;
        $first_name          = $row['first_name'] ;

        $SemesterName = ucwords($SemesterName);

        echo "<tr>";

        echo "<td>{$CRN}</td>";
        echo "<td>{$SectionNumber}</td>";
        echo "<td>{$CourseNumber}</td>";
        echo "<td>{$CourseName}</td>";
        echo "<td>{$RoomNumber}</td>";
        echo "<td>{$BuildingName}</td>";
        echo "<td>{$last_name}</td>";
        echo "<td>{$first_name}</td>";
        echo "<td>{$DepartmentName}</td>";
        echo "<td>{$day_name}</td>";
        echo "<td>{$start_time}</td>";
        echo "<td>{$end_time}</td>";
        echo "<td >{$SemesterName}</td>";
        echo "<td >{$SemesterYear}</td>";
        
        echo "<td>{$SeatAvailability}</td>";
        // echo "<td>{$Capacity}</td>";
       
       // echo "<td><a class = 'btn btn-outline-dark'  href = 'view_class_list.php?crn={$CRN}&semester={$semesterselected}'>View Class List </a></td>";

        echo "</tr>";
    }
} ?>

                        </tr>
                        </tbody>
                        </table>
