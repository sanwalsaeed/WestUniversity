
<br><h5>Select New Information<h5>
<form action="" method="post" enctype="multipart/form-data">
        <h5>Assign Timeslot for Class Meeting</h5>
        <select name="Timeslot" id="post_category">
            <?php

                             $query="SELECT * FROM Timeslot inner join timeslot_day using (TimeSlotID) inner join timeslot_period using (TimeSlotID) inner join period using (periodNumber) Order by periodOrder  ASC;";
                             $select_department_id = mysqli_query($connection, $query);
         
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
                             //$department_id=$row['DepartmentID'];
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
    <h5>Assign a <?php echo $department_name; ?> Professor to teach this Section.</h5>
    <select name="FacultyID" id="post_category">
        <?php
                        $query="SELECT DISTINCT * FROM Faculty inner join users using (user_id) WHERE Faculty.DepartmentID = $department_id Order by FacultyID;";
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

    
    <?php
                   $the_chosen_CourseNumber = $CourseNumber;
                   echo "<input type='hidden' id='custId' name='CourseNumber' value='{$the_chosen_CourseNumber}'>"; 
                    echo "<input type='hidden' id='custId' name='department_id' value='{$department_id}'>";

                   echo "<input type='hidden' id='custId' name='seats_selected' value='{$SeatAvailabilty}'>";
                    echo "<input type='hidden' id='custId' name='RoomID' value='{$RoomID}'>";
                    ?>
    <input class="btn btn-warning" type="submit" name="submit_btn" value="Submit">


    <form>