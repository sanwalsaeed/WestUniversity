<?php
  include "include_admin/admin_output_top.php";
?>
<div class="text-center">
    <h2 class="text-center">Section Creation</h2>
    <br><br>


    <?php
  if (!( isset($_POST['create_section']) || isset($_POST['submit_btn'])  ||isset($_POST['depbtn']) || isset($_POST['coursebtn']) || isset($_POST['majorbtn']) || isset($_POST['creditbtn']) || isset($_POST['confirmbtn'])  || isset($_POST['gradebtn']))) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="exampleInputEmail1" class="form-label ">
            <h3>Select the Department to create a Section in.</h3>
        </label>
        <div class="row">
            <div class="col-sm ">
                <select name="department_id" id="post_category">
                    <?php
                            $query="SELECT * FROM Department;";
                            $select_department_id = mysqli_query($connection, $query);

                            while ($row=mysqli_fetch_assoc($select_department_id)) {
                                $department_id=$row['DepartmentID'];
                                $department_name=$row['DepartmentName'];
                                echo "<option value = '{$department_id}'>{$department_name}</option>";
                            }
                        ?>
                </select>
                <input class="btn btn-warning" type="submit" name="depbtn" value="Confirm">
            </div>
        </div>
        <br><br>
    </form>
</div>
<?php
  }
?>

<?php

if (isset($_POST['depbtn'])) {
  if (isset($_POST['department_id'])) {
      $department_id = $_POST['department_id'];

      $department_selected = $department_id;
      $query="SELECT * FROM Department WHERE DepartmentID = {$department_id};";
      $select_department_id = mysqli_query($connection, $query);

      while ($row=mysqli_fetch_assoc($select_department_id)) {
          $department_name=$row['DepartmentName'];
      } ?>
<label for="exampleInputEmail1" class="form-label">
    <h3 class="text-center">Select the Course from the <?php echo $department_name; ?> department.</h3>
</label>
<div class="row">
    <div class="col-sm">

        <form action="" method="post" enctype="multipart/form-data" class="text-center">
            <input class="btn btn-warning text-center" type="submit" name="coursebtn" value="Select Course">
            <table class="table  text-light" style="background-color: #2e004f;">
                <thead class="text-warning" style="background-color: #2e004f;">
                    <tr>
                        <th>Course Number</th>
                        <th>Course Name</th>
                        <th>Major Name</th>
                        <th>Credits</th>
                        <th>Department Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
        $query="SELECT * FROM Courses inner join Major using (MajorID) inner join Department on Department.DepartmentID = Major.DepartmentID Where Department.DepartmentID = {$department_id} Group by CourseName  ORDER BY CourseNumber;";
        $select_courses =mysqli_query($connection, $query);
        if(!$select_courses){
            die("Query Failed " . mysqli_error($connection));
        }
       while($row=mysqli_fetch_assoc($select_courses)) {
            $course_id =  $row['CourseNumber'] ;
            $credits =  $row['CourseCredits'] ;
            $MajorName =  $row['MajorName'] ;
            $CourseName = $row['CourseName'];
            $DepartmentName =  $row['DepartmentName'];
       
       echo "<td>{$course_id}</td>";
       echo "<td>{$CourseName}</td>";
       echo "<td>{$MajorName}</td>";
       echo "<td>{$credits}</td>";
       echo "<td>{$DepartmentName}</td>";
       echo "<input type='hidden' id='custId' name='CourseName' value='{$CourseName}'>";
        echo "<input type='hidden' id='custId' name='department_name' value='{$department_name}'>";
        echo "<input type='hidden' id='custId' name='department_id' value='{$department_id}'>";
     echo "<td><input type='radio' name='CourseNumber' value='{$course_id}'/><h6 >Select</h6></td>";
       echo "</tr>";
       }
                        ?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<br>
<?php
                                 }
                  }

?>

<?php
if (isset($_POST['coursebtn'])) {
     $CourseNumber = $_POST['CourseNumber'];
     $department_id = $_POST['department_id'];
?>
<?php
                    $query="SELECT * FROM Courses WHERE CourseNumber = {$CourseNumber};";
                    $select_department_id = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $CourseNumber=$row['CourseNumber'];
                        $CourseType = $row['CourseType'];
                        $CourseName =$row['CourseName'];
                        $department_id =$row['DepartmentID'];
                    }

                    $query="SELECT * FROM Department WHERE DepartmentID = {$department_id};";
                    $select_department_id = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $department_name =$row['DepartmentName'];
                        $department_id =$row['DepartmentID'];
                    }
                
                    echo "<h4>Course $CourseName</h4>";
                    ?>

<form action="" method="post" enctype="multipart/form-data">
    <h5>Assign Timeslot for Class Meeting</h5>
    <select name="Timeslot" id="post_category">
        <?php

                             $query="SELECT * FROM Timeslot inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) Order by periodOrder  ASC;";
                             $select_department_id = mysqli_query($connection, $query);
                             if(!$select_department_id ){
                                die("Query Failed " . mysqli_error($connection));
                            }
                         while ($row=mysqli_fetch_assoc($select_department_id)) {

                             $TimeSlotID=$row['TimeSlotID'];
                             $day_name = $row['day_name'];
                             $start_time =$row['start_time'];
                             $end_time =$row['end_time'];

                             $output_text = $start_time . " - " . $end_time . "  " . $day_name;
                             echo "<option value = '{$TimeSlotID}'>{$output_text}</option>";
                         }

                          ?>
    </select>

    <br>
    <h5>Assign a Room for New Section</h5>
    <select name="Room" id="post_category">
        <?php
                             $query="SELECT * FROM Room inner join Building using (BuildingID) Order by BuildingID DESC;";
                             $select_department_id = mysqli_query($connection, $query);
         
                         while ($row=mysqli_fetch_assoc($select_department_id)) {
                             $RoomID=$row['RoomID'];
                             $RoomNumber = $row['RoomNumber'];
                             $BuildingName = $row['BuildingName'];
                             $output = "Building Name : $BuildingName Room : $RoomNumber  ";

                             echo "<option value = '{$RoomID}'>{$output}</option>";
                         }
                         echo "<input type='hidden' id='custId' name='CourseNumber' value='{$CourseNumber}'>";
                         echo "<input type='hidden' id='custId' name='department_name' value='{$department_name}'>";
                         echo "<input type='hidden' id='custId' name='department_id' value='{$department_id}'>";

                          ?>
    </select>
    <br>
    <h5>Assign a <?php echo $department_name; ?> Professor to teach
        this Section.</h5>

    <select name="FacultyID" id="post_category">
        <?php
                        $query="SELECT DISTINCT * FROM Faculty inner join users using (user_id) WHERE Faculty.DepartmentID = $department_id AND Faculty.FacultyID < 383684580 Order by FacultyID;";
                        $select_department_id = mysqli_query($connection, $query);
    
                         while ($row=mysqli_fetch_assoc($select_department_id)) {
                             $department_id=$row['DepartmentID'];
                             $first_name = $row['first_name'];
                             $last_name = $row['last_name'];
                             $FacultyID =   $row['FacultyID'] ;
                             $name_output = "$first_name $last_name";
     
                             echo "<option value = '{$FacultyID}'>Professor : {$name_output}</option>";
                    }
                     ?>
    </select>

    <h5>Assign the Total Seats for this New Section.</h5>
    <select name="seats_selected" id="post_category">
        <?php
                        $c = 1;
                    while ($c <= 100) {
                        echo "<option value = '{$c}'>{$c}</option>";
                        $c++;
                    } ?>
    </select>

    <?php
                   $the_chosen_CourseNumber = $CourseNumber;
                   echo "<input type='hidden' id='custId' name='CourseNumber' value='{$the_chosen_CourseNumber}'>"; 
                    echo "<input type='hidden' id='custId' name='department_id' value='{$department_id}'>";
                    echo "<input type='hidden' id='custId' name='RoomID' value='{$RoomID}'>";


                    $_FacultyID = $FacultyID;
                    $the_selected_CourseNumber = $the_chosen_CourseNumber;


                    $query = "Select * from Courses WHERE CourseNumber = {$the_selected_CourseNumber};";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $the_course_name =$row['CourseName'];
                        $the_course_number =$row['CourseNumber'];
                    }


                    $query = "Select * from Department WHERE DepartmentID = {$department_id};";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $department_name=$row['DepartmentName'];
                    }

                    $query = "Select * FROM Faculty INNER JOIN users using (user_id) WHERE FacultyID = {$_FacultyID};";
                    $select_faculty_schedule = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                        $last_name  = $row['last_name'] ;
                        $first_name  = $row['first_name'] ;
                        $FacultyID  = $row['FacultyID'] ;
                    }
                    ?>
    <input class="btn btn-warning" type="submit" name="submit_btn" value="Submit">
</form>
</table>
<?php
                }


                if(isset($_POST['submit_btn'])){
                    $_FacultyID = $_POST['FacultyID'];
                    $department_id = $_POST['department_id'];
                    $TimeslotID = $_POST['Timeslot'];
                    $RoomID = $_POST['Room'];
                    $SeatAvailabilty = $_POST['seats_selected'];
                    $the_selected_CourseNumber = $_POST['CourseNumber'];
                    $CourseNumber = $the_selected_CourseNumber;

                    $query="SELECT * FROM Faculty inner join (users) on Faculty.user_id = users.user_id WHERE FacultyID = {$_FacultyID};";
                    $select_department_id = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $first_name=$row['first_name'];
                        $last_name=$row['last_name'];
                    }

                    $query="SELECT * FROM Room inner join Building using (BuildingID) Where Room.RoomID = {$RoomID};";
                    $select_department_id = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $RoomID=$row['RoomID'];
                        $RoomNumber = $row['RoomNumber'];
                        $BuildingName = $row['BuildingName'];
                        $Buildingoutput = "Building Name : $BuildingName Room : $RoomNumber  ";
                    }

                    $query="SELECT * FROM Section WHERE SemesterID = 11 ORDER BY CRN;";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $CRN = $row['CRN'];
                    }
                    $CountSections = 1;
                    $query="SELECT * FROM Section WHERE CourseNumber = {$the_selected_CourseNumber} AND SemesterID = 11;";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $CountSections++;
                    }
                    $NewCRN = $CRN + 1;

                    $query="SELECT * FROM Timeslot inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) WHERE TimeslotID = {$TimeslotID};";
                    $select_department_id = mysqli_query($connection, $query);

                while ($row=mysqli_fetch_assoc($select_department_id)) {

                    $TimeSlotID=$row['TimeSlotID'];
                    $day_name = $row['day_name'];
                    $start_time =$row['start_time'];
                    $end_time =$row['end_time'];

                    $output_time = $start_time . " - " . $end_time . "  " . $day_name;
                }
                    ?>


<div class="text-center">
    <table class="table table-bordered text-warning">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td>CRN</td>
                <td><?php echo $NewCRN; ?>
                </td>
            <tr>

            <tr>
                <td>Section Number</td>
                <td><?php echo $CountSections; ?>
                </td>
            <tr>

            <tr>
                <td>Time</td>
                <td><?php echo $output_time; ?>
                </td>
            <tr>

            <tr>
                <td>Faculty First Name</td>
                <td><?php echo $first_name; ?>
                </td>
            <tr>
            <tr>
                <td>Faculty Last Name</td>
                <td><?php echo $last_name; ?>
                </td>
            <tr>

            <tr>
                <td>Location</td>
                <td><?php echo $Buildingoutput; ?>
                </td>
            <tr>

            <tr>
                <td>Semester</td>
                <td>Spring 2022</td>
            <tr>

            <tr>
                <td>Seats</td>
                <td><?php echo $SeatAvailabilty; ?>
                </td>
            <tr>

        </tbody>
    </table>
</div>

<?php
                    

                    $query="SELECT * FROM Timeslot inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) WHERE TimeSlotID = {$TimeslotID};";
                    $select_department_id = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        //$department_id=$row['DepartmentID'];
                        $TimeSlotID=$row['TimeSlotID'];
                        $_the_day_name = $row['day_name'];
                        $_the_start_time =$row['start_time'];
                        $_the_end_time =$row['end_time'];
                    }

                    $query = "Select * from Courses WHERE CourseNumber = {$the_selected_CourseNumber};";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $the_course_name =$row['CourseName'];
                        $the_course_number =$row['CourseNumber'];
                    }


                    $query = "Select * from Department WHERE DepartmentID = {$department_id};";
                    $select_department_id = mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_department_id)) {
                        $department_name=$row['DepartmentName'];
                    }

                    $query = "Select * FROM Faculty INNER JOIN users using (user_id) WHERE FacultyID = {$_FacultyID};";
                    $select_faculty_schedule = mysqli_query($connection, $query);

                    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                        $last_name          = $row['last_name'] ;
                        $first_name          = $row['first_name'] ;
                        $FacultyID          = $row['FacultyID'] ;
                    }
                    
                    $query = "Select * FROM Faculty WHERE FacultyID = {$_FacultyID};";
                    $select_faculty_schedule = mysqli_query($connection, $query);
                   
                    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                        $Faculty_type          = $row['Faculty_type'] ;
                    }

                    if ($Faculty_type == "full time") {

                        $query = "Select * FROM Section WHERE FacultyID = {$_FacultyID} and SemesterID = 11;";
                        $select_faculty_schedule = mysqli_query($connection, $query);
                        $count_how_many_courses = 0;
                        while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                            $FacultyID          = $row['FacultyID'] ;
                            $count_how_many_courses++;
                        }
                        $left_to_teach =  4 - $count_how_many_courses;
                        if ($count_how_many_courses < 4) {
                            // Professor is less than 4 so they can teach still.
                            $query = "Select * FROM Section WHERE FacultyID = {$_FacultyID} AND TimeSlotID = {$TimeslotID} AND SemesterID = 11;";
                            $select_faculty_schedule = mysqli_query($connection, $query);
                            if (mysqli_num_rows($select_faculty_schedule) == 0) {

                                $query = "Select * FROM Section WHERE RoomID = {$RoomID} AND TimeSlotID = {$TimeslotID} AND SemesterID = 11;";
                                $select_faculty_schedule = mysqli_query($connection, $query);
                                if (mysqli_num_rows($select_faculty_schedule) == 0) {
                                    echo "<form action='' method='post' enctype='multipart/form-data'>";

                                    echo "<input type='hidden' id='custId' name='CRN' value='{$NewCRN}'>";
                                    echo "<input type='hidden' id='custId' name='CourseNumber' value='{$CourseNumber}'>";
                                    echo "<input type='hidden' id='custId' name='SectionNumber' value='{$CountSections}'>";
                                    echo "<input type='hidden' id='custId' name='FacultyID' value='{$FacultyID}'>";
                                    echo "<input type='hidden' id='custId' name='RoomID' value='{$RoomID}'>";
                                    echo "<input type='hidden' id='custId' name='TimeslotID' value='{$TimeslotID}'>";
                                    echo "<input type='hidden' id='custId' name='SeatAvailabilty' value='{$SeatAvailabilty}'>";
                                    echo "<input type='hidden' id='custId' name='Capacity' value='{$SeatAvailabilty}'>";
                                    echo "<h5>Create this Section</h5>"; ?>
<?php
                               
                                echo "<input class='btn btn-warning' type='submit' name='create_section'
                                value='Confirm'>
                                </form>";
                                }
                                else{
                                    echo "<form action='' method='post' enctype='multipart/form-data'>";
                                    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                                        $CRN =  $row['CRN'] ;
    
                                        echo "<h5 >ERROR: This Professor is Time Conflict / Room Conflict with CRN : $CRN.</h5>"; ?>
<?php
                                    }
    
                                    include "failed_timeslot_add.php"; ?>
</form>
<br>
<br>

<?php
                                }
                            } else {

                                echo "<form action='' method='post' enctype='multipart/form-data'>";
                                while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                                    $CRN =  $row['CRN'] ;

                                    echo "<h5 >ERROR: This Professor is Time Conflict / Room Conflict with CRN : $CRN.</h5>"; ?>
<?php
                                }

                                
                                include "failed_timeslot_add.php";
                                
                                ?>

</form>
<br>
<br>
<?php
                            }
                        } else {

                            echo "<h5>This professor is unavailable to Teach anymore courses.</h5>";
                            include "failed_timeslot_add.php";

                        }
                    }elseif ($Faculty_type == "part time") {

                        $query = "Select * FROM Section WHERE FacultyID = {$_FacultyID} and SemesterID = 11;";
                        $select_faculty_schedule = mysqli_query($connection, $query);
                        $count_how_many_courses = 0;
                        while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                            $FacultyID          = $row['FacultyID'] ;
                            $count_how_many_courses++;
                        }
                        $left_to_teach =  2 - $count_how_many_courses;
                        if ($count_how_many_courses < 2) {

                            $query = "Select * FROM Section WHERE FacultyID = {$_FacultyID} AND TimeSlotID = {$TimeslotID} AND SemesterID = 11;";
                            $select_faculty_schedule = mysqli_query($connection, $query);
                            if (mysqli_num_rows($select_faculty_schedule) == 0) {

                                $query = "Select * FROM Section WHERE RoomID = {$RoomID} AND TimeSlotID = {$TimeslotID} AND SemesterID = 11;";
                                $select_faculty_schedule = mysqli_query($connection, $query);
                                if (mysqli_num_rows($select_faculty_schedule) == 0) {
                                    echo "<form action='' method='post' enctype='multipart/form-data'>";

                                    echo "<input type='hidden' id='custId' name='CRN' value='{$NewCRN}'>";
                                    echo "<input type='hidden' id='custId' name='CourseNumber' value='{$CourseNumber}'>";
                                    echo "<input type='hidden' id='custId' name='SectionNumber' value='{$CountSections}'>";
                                    echo "<input type='hidden' id='custId' name='FacultyID' value='{$FacultyID}'>";
                                    echo "<input type='hidden' id='custId' name='RoomID' value='{$RoomID}'>";
                                    echo "<input type='hidden' id='custId' name='TimeslotID' value='{$TimeslotID}'>";
                                    echo "<input type='hidden' id='custId' name='SeatAvailabilty' value='{$SeatAvailabilty}'>";
                                    echo "<input type='hidden' id='custId' name='Capacity' value='{$SeatAvailabilty}'>";
                                    echo "<h5>Create this Section</h5>"; ?>
<?php
                               
                                echo "<input class='btn btn-warning' type='submit' name='create_section'
                                value='Confirm'>
                                </form>";
                                }
                                else{
                                    echo "<form action='' method='post' enctype='multipart/form-data'>";
                                    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                                        $CRN =  $row['CRN'] ;
    
                                        echo "<h5 >ERROR: This Professor is Time Conflict / Room Conflict with CRN : $CRN.</h5>"; ?>
<?php
                                    }
                                    include "failed_timeslot_add.php"; ?>
</form>
<br>
<br>

<?php
                                }
                            } else {
                                echo "<form action='' method='post' enctype='multipart/form-data'>";
                                while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
                                    $CRN =  $row['CRN'] ;
                                    echo "<h5 >ERROR: This Professor is Time Conflict / Room Conflict with CRN : $CRN.</h5>"; ?>
<?php
                                }
                                include "failed_timeslot_add.php";
                                ?>
</form>
<br>
<br>
<?php
                            }
                        } else {
                            echo "<h5>This professor is unavailable to Teach anymore courses.</h5>";
                            include "failed_timeslot_add.php";
                        }
                    } 
                }
?>

<?php
  if (isset($_POST['create_section'])) {
    $SeatAvailabilty = $_POST['SeatAvailabilty'];
    $Capacity = $_POST['Capacity'] ;
    $CRN =   $_POST['CRN'];
    $CourseNumber        = $_POST['CourseNumber'] ;
    $SectionNumber          = $_POST['SectionNumber'] ;
    $FacultyID =   $_POST['FacultyID'] ;
    $RoomID =   $_POST['RoomID'];
    $TimeslotID = $_POST['TimeslotID'] ;
    $SeatAvailabilty     = $_POST['SeatAvailabilty'] ;
    $Capacity = $_POST['Capacity'];


    $query = "Select * FROM Courses WHERE CourseNumber = {$CourseNumber};";
    $select_faculty_schedule = mysqli_query($connection, $query);
    $count_how_many_courses = 0;
    while ($row=mysqli_fetch_assoc($select_faculty_schedule)) {
        $CourseName          = $row['CourseName'] ;
    }

    $query = "INSERT INTO Section (CRN, CourseNumber, SectionNumber, FacultyID, RoomID, SemesterID, TimeSlotID, SeatAvailability, Capacity) VALUES ( {$CRN}, {$CourseNumber}, {$SectionNumber}, {$FacultyID}, {$RoomID}, 11, {$TimeslotID}, {$SeatAvailabilty}, {$SeatAvailabilty});";
    $select_faculty_schedule = mysqli_query($connection, $query);
    if (!$select_faculty_schedule) {
        die("Query Failed " . mysqli_error($connection));
    }
    else{
        echo "<h5 > CRN : $CRN is Added to the Spring 2022 Master Schedule.</h5>";
    }
 }


?>

</div>









<?php
include "include_admin/admin_output_bottom.php"
?>