


<?php
  include "include_faculty/faculty_header.php";

?>

    <nav class="navigation-bar-left">

    </nav>

    <section class="facultylogin">
      <div class="banner1">
      <h1>Welcome back, Faculty <?php
                echo $db_first_name . " " . $db_last_name;
            ?></h1>

        <p class="datetime">Date:
        <?php date_default_timezone_set('America/New_York'); ?>
        <span style="color: yellow;"><?php echo(strftime("%A - %B %d, %Y")); ?></span> <br>
        Time:
        <span style="color: yellow;"><?php echo(strftime("%I:%M:%S %p")); ?></span></p>
      </div>

      <div class="banner2 text-center">
        <div class="row text-center">
          <div class="col text-center" onclick="location.href='../faculty/facultyinformation.php';" style="cursor: pointer;"> <br>
            <img src="../images/professor.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Faculty Information</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultycoursemanagement.php';" style="cursor: pointer;"> <br>
            <img src="../images/course.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Course Management</h1>
          </div>

          <!-- <div class="col text-center" onclick="location.href='../faculty/facultystudentinfolookup.php';" style="cursor: pointer;"> <br>
            <img src="../images/studentlookup.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Student Info Lookup</h1>
          </div> -->

          <div class="col text-center" onclick="location.href='../faculty/facultyadvisormanagement.php';" style="cursor: pointer;"> <br>
            <img src="../images/talking.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Advisor Management</h1>
          </div>
        </div>
        <div class="row text-center">
          <div class="col text-center" onclick="location.href='../faculty/facultybuildings.php';" style="cursor: pointer;"> <br>
            <img src="../images/building.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>View all Buildings</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/view_department.php';" style="cursor: pointer;"> <br>
            <img src="../images/networking.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Departments</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/view_master_schedule.php';" style="cursor: pointer;"> <br>
            <img src="../images/online-course.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>View Master Schedule</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultysemesters.php';" style="cursor: pointer;"> <br>
            <img src="../images/semester.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Semesters</h1>
          </div>
        </div>
      </div>


      <!-- <div class="banner2">
        <div class="row text-center">
          <div class="col text-center" onclick="location.href='../faculty/facultyinformation.php';" > <br>
            <img src="../images/professor.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Faculty Information</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultycoursemanagement.php';" > <br>
            <img src="../images/course.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Course Management</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultystudentinfolookup.php';" > <br>
            <img src="../images/studentlookup.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Student Info Lookup</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultyadvisormanagement.php';" > <br>
            <img src="../images/talking.png" style="width: 100px; margin-left: 60px;"><br><br>
            <h1>Advisor Management</h1>
          </div>
        </div>
        <div class="row text-center">
          <div class="col text-center" onclick="location.href='../faculty/facultybuildings.php';" style="cursor: pointer;"> <br>
            <img src="../images/building.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>View all Buildings</h1>
          </div>
          <div class="col text-center" onclick="location.href='../departments.php';" style="cursor: pointer;"> <br>
            <img src="../images/networking.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Departments</h1>
          </div>
          <div class="col text-center" onclick="location.href='../masterschedule.html';" style="cursor: pointer;"> <br>
            <img src="../images/online-course.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>View Master Schedule</h1>
          </div>
          <div class="col text-center" onclick="location.href='../faculty/facultysemesters.php';" style="cursor: pointer;"> <br>
            <img src="../images/semester.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Semesters</h1>
          </div>
        </div> -->



      </div>



    </section>
  </body>
</html>
