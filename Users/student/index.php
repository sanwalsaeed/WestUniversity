
<?php
  include "include_student/student_header.php";
?>


    <nav class="navigation-bar-left">

    </nav>

    <section class="studentlogin">
      <div class="banner1">
        <h1>Welcome back, Student <?php
                echo $db_first_name . " " . $db_last_name;
            ?></h1>

        <p class="datetime">Date:
        <?php date_default_timezone_set('America/New_York'); ?>
        <span style="color: green;"><?php echo(strftime("%A - %B %d, %Y")); ?></span> <br>
        Time:
        <span style="color: green;"><?php echo(strftime("%I:%M:%S %p")); ?></span></p>
      </div>

      <div class="banner2">
        <div class="row">
          <div class="col" onclick="location.href='../student/studentinformation.php';" style="cursor: pointer;"> <br>
            <img src="../images/user.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Student Info/Dashboard</h1>
          </div>
          <div class="col" onclick="location.href='../student/studentregistration.php';" style="cursor: pointer;"> <br>
            <img src="../images/online-registration.png" style="width: 100px; margin-left: 70px;"><br><br>
            <h1>Course Registration</h1>
          </div>
          <div class="col" onclick="location.href='../student/studentdeclaremajorminor.php';" style="cursor: pointer;"> <br>
            <img src="../images/majorandminor.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Declare Major and Minor</h1>
          </div>
          <div class="col" onclick="location.href='../student/studentadvisors.php';" style="cursor: pointer;"> <br>
            <img src="../images/talking.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Advisors</h1>
          </div>
        </div>
        <div class="row">
          <div class="col" onclick="location.href='../student/view_all_buildings.php';" style="cursor: pointer;"> <br>
            <img src="../images/building.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Buildings</h1>
          </div>
          <div class="col" onclick="location.href='../student/view_all_department.php';" style="cursor: pointer;"> <br>
            <img src="../images/networking.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Departments</h1>
          </div>
          <div class="col" onclick="location.href='../student/view_master_schedule.php';" style="cursor: pointer;"> <br>
            <img src="../images/online-course.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>View Master Schedule</h1>
          </div>
          <div class="col" onclick="location.href='../student/studentsemesters.php';" style="cursor: pointer;"> <br>
            <img src="../images/semester.png" style="width: 100px; margin-left: 65px;"><br><br>
            <h1>Semesters</h1>
          </div>
        </div>
      </div>



      
    </section>

    <br />  <br />  <br />  <br />  <br />  <br />
<br />  <br />  <br />  <br />  <br />  <br />
<!-- Footer -->
<footer class="page-footer font-large bg-dark pt-4" style = "position: sticky;
  bottom: 0;
  width: 100%;">


  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">West University</h5>
        <p>System Design Project Fall 2021.</p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Designed By</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!"><h3>Sanwal Saeed</h3></a>
          </li>
          <li>
          <a href="#!"><h3>Cole Piscione</h3></a>
          </li>
          <li>
          <a href="#!"><h3>Diego Pereira</h3></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
     
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="index.php"> westuniversity.co</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

