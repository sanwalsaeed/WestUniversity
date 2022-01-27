<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "westuniversity";

  $connect = mysqli_connect($hostname, $username, $password, $databaseName);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- importing fonts from google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- loading the style sheets -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/facultyinformationstyle.css">

    <!-- website title -->
    <title>West University | View Course Students</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="../images/wutablogo.png">
  </head>

  <body>
    <!-- Navigation Bar -->
    <nav class="navigation-bar">
      <a href="../index.html"><img class="navlogo" src="../images/newwulogo.png"></a>
      <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../whatweoffer.html">What We Offer</a></li>
        <li><a href="../about.html">About Us</a></li>
        <li><a href="../login.php">Login</a></li>
      </ul>
    </nav>

    <section class="faculty-information">
      <div class="first-container">
        <nav class="faculty-nav1">
          <ul>
            <li><a href="facultylogin.php">Home Dashboard</a></li>
            <li><a href="facultycoursemanagement.php" style="color:white;">View Your Courses</a></li>
            <li><a href="facultycourseattendance.php">Course Attendance</a></li>
            <li><a href="facultycoursegrading.php">Course Grading</a></li>
          </ul>
        </nav><br>
        <h1 style="font-size: 35px">View Students In Course</h1>
      </div>
      <div class="second-container">
        <div class="division2"></div> <br>
        <a href="facultycoursemanagement.php"><h2 style="font-size: 15px;">Previous Page</h2></a> <br>
        <h2 style="font-size: 20px;">Course Information: </h2>
        <!-- Display the course information that was selected form the last screen. -->
        <table class="faculty-course-student-table">
          <tr>
            <th>CRN</th>
            <td>3188</td>
          </tr>
          <tr>
            <th>Section#</th>
            <td>3</td>
          </tr>
          <tr>
            <th>Course#</th>
            <td>4020</td>
          </tr>
          <tr>
            <th>Course Name</th>
            <td>Database Mangement Systems</td>
          </tr>
          <tr>
            <th>Department</th>
            <td>Mathematics/Computer Science</td>
          </tr>
          <tr>
            <th>Meeting Day</th>
            <td>Tuesday/Thursday</td>
          </tr>
          <tr>
            <th>Start Time</th>
            <td>12:50 PM</td>
          </tr>
          <tr>
            <th>End Time</th>
            <td>2:20 PM</td>
          </tr>
          <tr>
            <th>Room</th>
            <td>103</td>
          </tr>
          <tr>
            <th>Building</th>
            <td>New Academic Building</td>
          </tr>
          <tr>
            <th># of Students</th>
            <td>24</td>
          </tr>
          <tr>
            <th>Max Capacity</th>
            <td>32</td>
          </tr>
        </table> <br> <br>
        <!-- This is example data, the table has to be populated with php calls to the database instead -->
        <!-- Each row will have a number, which in this case is called Student# -->
        <!-- Maybe we can also add buttons to view student grade/attendance from this page as well. -->
        <!-- Or they can just click the nav button on the top for grades or attendance -->
        <h2 style="font-size: 20px;">Students:</h2>
        <table class="faculty-schedule-table">
          <tr>
            <th>Student#</th>
            <th>Student ID#</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Major</th>
            <th>Department</th>
          </tr>
          <tr>
            <td>1</td>
            <td>700999548</td>
            <td>johnjackson@westuniversity.edu</td>
            <td>John</td>
            <td>Jackson</td>
            <td>Computer Information Science</td>
            <td>Mathematics/Computer Science</td>
          </tr>
          <tr>
            <td>2</td>
            <td>700689555</td>
            <td>andrewsmith@westuniversity.edu</td>
            <td>Andrew</td>
            <td>Smith</td>
            <td>Computer Information Science</td>
            <td>Mathematics/Computer Science</td>
          </tr>
        </table>
      </div>
    </section>
  </body>
</html>
