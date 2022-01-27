<?php
  include "include_admin/admin_output_top.php";
?>

<div class="text-center">
    <?php


if(isset($_GET['faculty_id'])){ 

    $FacultyID = $_GET['faculty_id'];
    $user_id = $_GET['user_id'];
    
}

$query="select * from  Faculty inner join users using (user_id) WHERE user_id = {$user_id};";
$select_faculty_by_id =mysqli_query($connection, $query);
if(!$select_faculty_by_id){
 die("Query Failed " . mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($select_faculty_by_id)) { 
      $FacultyID =   $row['FacultyID'] ;
}

$the_faculty_id = $FacultyID;


$query="select * from  Faculty inner join users using (user_id) inner join login using (user_id) WHERE FacultyID = {$the_faculty_id};";
$select_faculty_by_id =mysqli_query($connection, $query);
if(!$select_faculty_by_id){
 die("Query Failed " . mysqli_error($connection));
}
 while($row=mysqli_fetch_assoc($select_faculty_by_id)) { 
      $facultytype =   $row['Faculty_type'] ;
      $fname =   $row['first_name'] ;
      $lname =   $row['last_name'] ;

      $dob =   $row['dob'] ;
      $user_address =   $row['user_address'] ;

      $city =   $row['city'] ;
      $state =   $row['state'] ;

      $zip_code =   $row['zip_code'] ;
      $user_type =   $row['user_type'] ;

      $user_email =   $row['user_email'] ;
      $password =   $row['password'] ;
 }

 echo "<h1>Viewing Faculty Information:</h1>";



$query="select * from  Faculty inner join users using (user_id) WHERE FacultyID = {$the_faculty_id};";
$select_faculty_by_id =mysqli_query($connection, $query);
if(!$select_faculty_by_id){
 die("Query Failed " . mysqli_error($connection));
}
 while($row=mysqli_fetch_assoc($select_faculty_by_id)) { 
      $facultytype =   $row['Faculty_type'] ;
      $fname =   $row['first_name'] ;
      $lname =   $row['last_name'] ;
 }
?>
    <table class="table table-striped table-sm text-warning">
        <thead>
            <tr>
                <th>
                    <h2 class="bodycenter">View All Classes Taught by <?php echo $fname . " " . $lname;?>
                    </h2>
                </th>
            </tr>
            <tr>
            </tr>
        </thead>
    </table>



    <h5 class= "text-center" >Semester Fall 2021</h5>
<?php

$semesterid_selected = 10;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;

                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;


                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;


                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>




            <h5 class= "text-center" >Semester Spring 2021</h5>
            <?php

$semesterid_selected = 9;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;

                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;


                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>



            <h5 class= "text-center" >Semester Fall 2020</h5>
            <?php

$semesterid_selected = 7;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>


            <h5 class= "text-center" >Semester Spring 2020</h5>
            <?php

$semesterid_selected = 8;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>

            
            <h5 class= "text-center" >Semester Fall 2019</h5>
            <?php

$semesterid_selected = 7;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>


            
            <h5 class= "text-center" >Semester Fall 2019</h5>
            <?php

$semesterid_selected = 6;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>


            <h5 class= "text-center" >Semester Spring 2019</h5>
            <?php

$semesterid_selected = 5;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>


            <h5 class= "text-center" >Semester Fall 2018</h5>
            <?php

$semesterid_selected = 4;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View The Roster for this Class </a></td></tr>";
               }
               ?>
               </tbody>
            </table>


            <h5 class= "text-center" >Semester Spring 2018</h5>
            <?php

$semesterid_selected = 3;
?>
    <table class="table table-bordered  text-warning ">
        <thead>
            <tr>
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
                <th>Semester Name</th>
                <th>Year</th>
                <th>Professor First Name</th>
                <th>Professor Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query= "SELECT * FROM Section inner join Faculty on Section.FacultyID = Faculty.FacultyID INNER JOIN Courses on Courses.CourseNumber = Section.CourseNumber INNER JOIN Timeslot on Timeslot.TimeSlotID = Section.TimeSlotID INNER JOIN timeslot_day on Timeslot.TimeSlotID = timeslot_day.TimeSlotID inner join timeslot_period on Timeslot.TimeSlotID = timeslot_period.TimeSlotID inner join period using (periodNumber) inner join Room on Section.RoomID = Room.RoomID inner join Building on Building.BuildingID = Room.BuildingID INNER JOIN users using (user_id) inner join Department on Department.DepartmentID = Courses.DepartmentID inner join Semester on Section.SemesterId = Semester.SemesterID Where Section.SemesterID = {$semesterid_selected} AND Section.FacultyID = {$the_faculty_id}";

        
               $select_facultyFULL_by_id =mysqli_query($connection, $query);
               if (!$select_facultyFULL_by_id) {
                   die("Query Failed " . mysqli_error($connection));
               }

               while ($row=mysqli_fetch_assoc($select_facultyFULL_by_id)) {

                   $CRN             =  $row['CRN'] ;
                   $SectionNumber      = $row['SectionNumber'] ;
                   $CourseNumber        = $row['CourseNumber'] ;
                   $CourseName          = $row['CourseName'] ;
                   $DepartmentName          = $row['DepartmentName'] ;

                   $day_name           =  $row['day_name'] ;
                   $start_time         = $row['start_time'] ;
                   $end_time           = $row['end_time'] ;
                   $RoomNumber         = $row['RoomNumber'] ;
                   $BuildingName        = $row['BuildingName'] ;
                   $last_name          = $row['last_name'] ;
                   $first_name          = $row['first_name'] ;
                   $SemesterName        = $row['SemesterName'] ;
                   $SemesterYear        = $row['SemesterYear'] ;

                   echo "<tr>";
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
                   echo "<td>{$SemesterName}</td>";
                   echo "<td>{$SemesterYear}</td>";
                   echo "<td>{$last_name}</td>";
                   echo "<td>{$first_name}</td>";

                   echo "<td><a class = 'btn btn-warning text-dark' href = 'view_class_roster.php?crn={$CRN}&semester={$semesterid_selected}'>View Roster </a></td></tr>";
               }
               ?>
               </tbody>
            </table>

