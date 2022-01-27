<?php
 include "include_admin/admin_output_top.php";
?>

<div class = "text-center text-warning" style="background-color: #2e004f; height : 2000px;">

<?php
if(isset($_GET['semester_id'])){ 
    $the_semester_id =  $_GET['semester_id'];

    $query="Select * from Semester Where SemesterID = {$the_semester_id};";
    $select_semester =mysqli_query($connection, $query);
       if(!$select_semester){
        die("Query Failed " . mysqli_error($connection));
       }
       while ($row=mysqli_fetch_assoc($select_semester)) {
           $semester_id = $row['SemesterID'] ;
           $semester_name = $row['SemesterName'] ;
           $semester_year = $row['SemesterYear'] ;
           $semester_start_time = $row['SemesterStartTime'] ;
           $semester_end_time = $row['SemesterEndTime'] ;
           $GradingTimeLimit = $row['GradeTimeLimit'] ;
           $RegistrationTime = $row['RegistrationTimeLimit'] ;
           $DroppingTimeLimit = $row['DroppingLimit'] ;
           $semester_name = ucwords($semester_name);
       }
       echo "<h5>Editing Semester : " . $semester_name . " " . $semester_year . "</h5>";
       $today = date("Y-m-d");
      
       if ($the_semester_id > 10) {
           ?>
            <form class="bodycenter" action="" method="post" enctype="multipart/form-data">
           <h5>Edit Semester Start Date<h5>
            <input type="date" id="start" name="semester_start_date"
            value="<?php echo $semester_start_time; ?>"
            min="2022-01-01" max="2022-03-01">

            <h5>Edit Semester Grading Time Limit<h5>
            <input type="date" id="start" name="semester_grading_limit"
            value="<?php echo $GradingTimeLimit; ?>"
            min="2022-03-01" max="2022-07-20">

            <input class="btn btn-warning" type="submit" name="update_next_semester"
                    value="Update Semester Times">

            </form>
       <?php
       }else if($the_semester_id == 10){
       ?>
            <form class="bodycenter" action="" method="post" enctype="multipart/form-data">
            <h5>Edit Semester Grading Time Limit<h5>
            <input type="date" id="start" name="semester_grading_limit"
            value="<?php echo $GradingTimeLimit; ?>"
            min="<?php echo $today; ?>" max="2022-01-01">

            <input class="btn btn-warning" type="submit" name="update_current_semester"
                    value="Update Semester Time">

            </form>

       <?php
       }
}
else{
    echo "No Semester Found";
}

?>

<?php

 if (isset($_POST['update_next_semester'])) {

     $semester_start_date = mysqli_real_escape_string($connection, $_POST['semester_start_date']);
    $semester_grading_limit = mysqli_real_escape_string($connection,$_POST['semester_grading_limit']);

     $query="Update Semester SET SemesterStartTime = '{$semester_start_date}' , GradeTimeLimit = '{$semester_grading_limit}' Where SemesterID = {$the_semester_id};";
    // echo $query;
        $select_semester =mysqli_query($connection, $query);
        if(!$select_semester){
            die("Query Failed " . mysqli_error($connection));
        }
        else{
            echo "<h3>Semester Updated</h3>";
           header("location: view_semester_information.php"); 
        }
 }



 
 if (isset($_POST['update_current_semester'])) {

   $semester_grading_limit = mysqli_real_escape_string($connection,$_POST['semester_grading_limit']);

    $query="Update Semester SET GradeTimeLimit = '{$semester_grading_limit}' Where SemesterID = {$the_semester_id};";
       $select_semester =mysqli_query($connection, $query);
       if(!$select_semester){
           die("Query Failed " . mysqli_error($connection));
       }
       else{
           echo "<h3>Semester Updated</h3>";
          header("location: view_semester_information.php"); 
       }
}
?>



</div>

