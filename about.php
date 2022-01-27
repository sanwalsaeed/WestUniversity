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



    
    <!-- loading the style sheets -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aboutstyle.css">

    <!-- website title -->
    <title>West University | About Us</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="images/wutablogo.png">
  </head>

  <body>
    <!-- Navigation Bar -->
    <nav class="navigation-bar" style = "height: 1100px;">
    <?php
      include "view/nav.php";
    ?>


    <section class="about-us" style = "height: 1100px;">

      <h1>About West University</h1>
      <div class="division" ></div> <br><br>
      <div class="container" style = "height: 1100px;">
        <div class="row" >
          <div class="col"> <br>
            <h2>Our Vision</h2>
            <p style="text-indent: 40px;">All of us here at West University are committed to providing you with a quality, yet affordable education in a supportive environment. For more than sixty years, West University has served students like you by providing the strong foundation necessary to begin the pursuit of your academic and career goals. All of our faculty members are motivated by seeing our students suceeed not only in their coursework, but also in their life pursuits. We've worked extremely hard throughout the last sixty years to build not only a beautiful campus out here in the suburbs, but also a strong academic chair of brilliant and eager faculty. We know that all of our alumnis will hold the highest level of acaedemic foundation that will carry them to great success down their career paths.</p>
          </div>
          <div class="col-3"> <br>
            <h2>Latest Message From Our President</h2><br>
            <p style="text-align: right; margin-right: 10px;">August 06, 2021</p>
            <p style="margin-left: 10px;">Dear Campus Community,</p>
            <p style="text-indent: 40px; margin-left: 10px; margin-right: 10px;">Today, I write to share a brief message for our upcoming semester, which will officially begin Wednesday, September 1st. <br><br> After a rather complicated last two semesters, we believe that West University has laid the proper path ahead of us for an excellent Fall 2021 Semester. With COVID-19 being a shocker to us all, we quickly adapted and managed to put in place policies that allowed our students to still recieve top level education throughout this rough time period. <br><br> After a lot of thought and consideration, together with the board, we have decided to hold in-person campus lectures for roughly twenty percent of all courses. The majority of these courses have lab requirements, which are easier operated with the control of our faculty, here on campus. <br><br> I truly hope that you were able to enjoy a healthy and somewhat normal summer, given the circumstances and we are extremely eager to see some of you back here on campus! <br><br> Sincerely, <br> President Jerome F. Fox </p>
          </div>
        </div>
        <div class="row">
          <div class="col-2"> <br>
            <h2>Our History</h2>
            <p style="text-indent: 40px;">West University was founded in 1959 by board President Wolford, who combined with his passion for teaching, wanted to bring the highest level of education to the suburbs of New York City. With that goal in mind, over the next few years, Wolford was able to join together the brightest and most eager board members across the island. In the mid 1980s, West University had a period of bad economic decisions, which led to the closure of the university. During July of 1991, there was a new President that took charge and alongside him was a group of new board members that were all eager to get West University back to the prestigious college that it once was. This included constructing a new academic building, along with the dorming halls our students still use today. Fast forward to the present day and West University is now ranked amongst the top five best New York State universities.</p>
          </div>
        </div>
      </div>
    </section>
  </body>

  

</html>
