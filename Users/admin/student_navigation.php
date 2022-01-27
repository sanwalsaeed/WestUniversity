<div class="text-center">

        <ul class="nav justify-content-center">
                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="studentinformation" value="Student Information">
                        </form>
                </li>
                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewschedule" value="Current Schedule">
                        </form>
                </li>
                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="view_next_schedule" value="View Next Semester Schedule">
                        </form>
                </li>
                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewtranscript" value="View Transcript ">
                        </form>
                </li>
                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="graduation_audit" value="View Graduation Audit ">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewattendance" value="Attendance">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewmajor" value="View/Edit Major ">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewholdbtn" value="View Holds">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="viewminor" value="View / Edit Minor ">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="view_all_sections" value="View All Current Semester Sections Fall 2021">
                        </form>
                </li>

                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="view_next_semester_sections"
                                        value="View All Spring 2022 Semester Sections">
                        </form>
                </li>


                <li class="nav-item">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input class="text-warning btn" style="background-color: #2e004f;" type="submit"
                                        name="clickHold" value="Add Hold">
                        </form>
                </li>
        </ul>
</div>
<?php
        if (isset($_POST['clickHold'])) {
            ?>
<form class=" text-center" action="" method="post" enctype="multipart/form-data">
        <br>
        <br>
        <h2>Add a Hold</h2>

        <select name="hold_selected" id="post_category" value="Select a Semester">
                <option value="" disabled selected>Select Hold Type</option>
                <?php

                           $query="SELECT * FROM Holds;";
            $select_department_id = mysqli_query($connection, $query);
                
            while ($row=mysqli_fetch_assoc($select_department_id)) {
                $MajorID=$row['HoldID'];
                $MajorName=$row['HoldTypes'];
                $txt = $MajorName;
                echo "<option value = '{$MajorID}'>{$txt}</option>";
            } ?>
        </select>
        <input class="btn btn-warning" type="submit" name="add_hold_clicked" value="Add Hold">
        <br>
        <br>
        <br>
        <br>
</form>
<?php
        }
        if (isset($_POST['add_hold_clicked'])) {
            $hold_id_selected = $_POST['hold_selected'];
            $timenow = date('Y-m-d H:i:s');

            $query ="INSERT INTO StudentHolds (StudentID, HoldsDate, HoldID) values ({$the_student_id }, '{$timenow}', {$hold_id_selected});";
            $add_hold = mysqli_query($connection, $query);
            if (!$add_hold) {
                die("Query Failed " . mysqli_error($connection));
            } else {
                echo "<h4 class = 'text-center' >Added a Hold<h4>";
            }
        }
