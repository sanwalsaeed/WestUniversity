<?php
  include "include_admin/admin_header.php";
?>

<?php
  include "include_admin/admin_nav.php";
?>

  <section class="whatweoffer " style="margin: 0 auto; background-color: #2e004f; color: #fff; ">


  <br>

<ul class="nav justify-content-center text-light"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
      <h1 class="h2 text-warning">Welcome Administrator <?php
                echo $db_first_name . " " . $db_last_name;
            ?>
      </h1>
      </h1>
    </li>
    <div style="width: 50%; margin: 0 auto; border-radius: 5%; ">

    </div>
  </div>

</ul>

<br>

    <div class="container" >
      <div class="row bg-light text-dark" style = "border-radius: 5%;" >
        <div class="col" style = "text-align: center;"> <br>
          <h2>Departments</h2>
          <img src="../images/department.png" style="width: 250px; margin-left: 30px;">
          <h3 style="padding: 10px; text-align: center;">View the full list of departments at West University. This also
            includes information such as Department ID, E-mail, and office Room#. </h3> <br> <br> <br>
          <a href="view_department.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
        </div>
        <div class="col"> <br>
          <h2>Majors and Minors</h2>
          <img src="../images/cap.png" style="width: 225px; margin-left: 45px; margin-top: 40px;">
          <h3 style="padding: 10px; text-align: center; margin-top: 26px;">View all the majors and minors our school has
            to offer! From this page you may also see the required courses for each major or minor. </h3> <br> <br> <br>
          <a href="view_majors.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
        </div>
        <div class="col"> <br>
          <h2>Master Schedule</h2>
          <img src="../images/clock.png" style="width: 175px; margin-left: 70px; margin-top: 40px;"> <br> <br>
          <h3 style="padding: 10px; text-align: center; margin-top: 10px;">View the full list of the classes offered
            during the last four years. This includes information such as the CRN#, Section#, Course Name, Meeting
            Day/Time and the instructors name.</h3> <br>
          <a href="view_master_schedule.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
        </div>
        <br>
        <br>
      </div>
     
    </div><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



  </section>
  </div>

<?php
include "include_admin/admin_footer.php";
?>