<?php
    include "includes/database.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- importing fonts from google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


        <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <!-- loading the style sheets -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/whatweofferstyle.css">

    <!-- website title -->
    <title>West University | What We Offer</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="images/wutablogo.png">
  </head>

  <body>
    <!-- Navigation Bar -->
    <?php
      include "view/nav.php";
    ?>


    <section class="whatweoffer"   style = "height : 1100px;">

      <h1>What West University Has To Offer</h1>

      <div class="container">
        <div class="row">
          <div class="col"> <br>
            <h2>Academic Calendar</h2>
            <img src="images/calendar.png" style="width: 225px; margin-left: 40px; margin-top: 25px;">
            <h3 style="padding: 10px; text-align: center;">View the full schedule of all the events and important dates that may occur during the academic year. This includes suggested exam dates, holidays and even due dates/dealines.</h3> <br> <br>
            <a href="academiccalendar.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
          </div>
          <div class="col"> <br>
            <h2>Departments</h2>
            <img src="images/department.png" style="width: 250px; margin-left: 30px;">
            <h3 style="padding: 10px; text-align: center;">View the full list of departments at West University. This also includes information such as Department ID, E-mail, and office Room#. </h3> <br> <br> <br>
            <a href="departments.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
          </div>
          <div class="col"> <br>
            <h2>Majors and Minors</h2>
            <img src="images/cap.png" style="width: 225px; margin-left: 45px; margin-top: 40px;">
            <h3 style="padding: 10px; text-align: center; margin-top: 26px;">View all the majors and minors our school has to offer! From this page you may also see the required courses for each major or minor. </h3> <br> <br> <br>
            <a href="majorsandminors.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
          </div>
          <div class="col"> <br>
            <h2>Master Schedule</h2>
            <img src="images/clock.png" style="width: 175px; margin-left: 70px; margin-top: 40px;"> <br> <br>
            <h3 style="padding: 10px; text-align: center; margin-top: 10px;">View the full list of the classes offered during the last four years. This includes information such as the CRN#, Section#, Course Name, Meeting Day/Time and the instructors name.</h3> <br>
            <a href="masterschedule.php"><button class="button" style="margin-left: 75px;">View Details >></button></a>
          </div>
        </div>
      </div>
    </section>
  </body>

  <?php
include "view/footer.php"

?>
</html>
