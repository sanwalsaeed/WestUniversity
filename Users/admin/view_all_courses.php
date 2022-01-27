<?php
  include "include_admin/admin_output_top.php";
?>

<br>
<ul class="nav justify-content-center " style="color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
      <h1 class="h2">Currently Viewing All Courses Offered </h1>
    </li>
</ul>
<br>

<table class="table  text-light" style="background-color: #2e004f;">
  <thead class="text-warning" style="background-color: #2e004f;">
    <tr>


      <th>Course Number</th>
      <th>Course Name</th>
      <th>Major Name</th>
      <th>Credits</th>
      <th>Department Name</th>

      <th>View Sections for this course</th>
      <th>Edit Prerequisites for this Course</th>
      <th>Remove this Course</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $query="SELECT * FROM Courses inner join Major using (MajorID) inner join Department on Department.DepartmentID = Major.DepartmentID Group by CourseName ORDER BY CourseNumber;";
        $select_courses =mysqli_query($connection, $query);
        if(!$select_courses){
            die("Query Failed " . mysqli_error($connection));
        }
       while($row=mysqli_fetch_assoc($select_courses)) {
            $course_id =  $row['CourseNumber'] ;//courses
            $credits =  $row['CourseCredits'] ;
            $MajorName =  $row['MajorName'] ;
            $CourseName = $row['CourseName'];
            $DepartmentName =  $row['DepartmentName'];
       

       echo "<td>{$course_id}</td>";
       echo "<td>{$CourseName}</td>";
       echo "<td>{$MajorName}</td>";
       echo "<td>{$credits}</td>";
       echo "<td>{$DepartmentName}</td>";

       //echo "<td><a class=' text-warning '  href = 'edit_a_course.php?coursenum={$course_id}'>Edit this Course</a></td>";

       echo "<td><a class=' text-warning '  href = 'view_sections_for_a_course.php?coursenum={$course_id}'>View all Sections for this Course</a></td>";
       echo "<td><a class=' text-warning '  href = 'view_prerequisites_for_a_course.php?coursenum={$course_id}'>Edit Prerequisites for this Course</a></td>"; 
       echo "<form action='' method='post' enctype='multipart/form-data'>";

       echo "</form>";
       echo "<form action='' method='post' enctype='multipart/form-data'>
       <input type='hidden' id='custI' name='course_number' value='$course_id'>
       <input type='hidden' id='custI' name='course_name' value='$CourseName'>
       
       <td><input class='btn-warning' type='submit' name='removebtn' value='Remove Course'></td>";
      
       echo "</tr></form>";
       }
                        ?>
    </tr>
  </tbody>
</table>



<?php 
     if(isset($_POST['removebtn'])){
      $course_number = $_POST['course_number'];

      $query = "SELECT * FROM Prerequisite WHERE PrerequisiteCourseNumber = $course_number";
      $select_course =mysqli_query($connection, $query);
      if (!$select_course) {
          die("Query Failed " . mysqli_error($connection));
      }
      if (mysqli_num_rows($select_course) > 0) {
             while ($row=mysqli_fetch_assoc($select_course)) {
                 $course_Number =  $row['CourseNumber'] ;
                 echo "<h3 >:" . $course_Number . " uses this course as a prerequisite.</h3>";
             }
             echo "<h3 >Cannot remove this course.</h3>";
      }
      else{
        $query = "DELETE FROM Prerequisite WHERE CourseNumber = {$course_number};";
        $delete_enrollment =mysqli_query($connection, $query);
        if (!$delete_enrollment) {
          die("Query Failed 1" . mysqli_error($connection));
        }
        else{

        }

        $query = "DELETE FROM Enrollment WHERE CourseNumber = {$course_number} AND Enrollment.SemesterID = 11;";
        $delete_enrollment =mysqli_query($connection, $query);
        if (!$delete_enrollment) {
          die("Query Failed 2" . mysqli_error($connection));
        }
        else{
 

          $query = "DELETE FROM ClassList WHERE CourseNumber = {$course_number} AND SemesterID = 11;";
          $delete_enrollment =mysqli_query($connection, $query);
          if (!$delete_enrollment) {
            die("Query Failed 3" . mysqli_error($connection));
          }
          else{
            $query = "DELETE FROM Section WHERE CourseNumber = {$course_number} AND Section.SemesterID = 11;";
            $delete_section =mysqli_query($connection, $query);
            if (!$delete_section) {
              die("Query Failed 4" . mysqli_error($connection));
            }
            else{
              $query = "DELETE FROM Courses WHERE CourseNumber = {$course_number};";
            $delete_course =mysqli_query($connection, $query);
            if (!$delete_course) {
                die("Query Failed 5" . mysqli_error($connection));
            }
            else{
              header("Refresh:0");
            }
            }
            }
          }
        }
    }
    ?>

<?php
include "include_admin/admin_output_bottom.php"

?>