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
    <link rel="stylesheet" href="css/majorsandminorsstyle.css">

    <!-- website title -->
    <title>West University | Majors and Minors</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="images/wutablogo.png">
  </head>

  <body>
    <!-- Navigation Bar -->
    <?php
      include "view/nav.php";
    ?>

    <section class="masterschedule text-warning" style = "background-color: #2e004f;">
      <div class="first-container">
        <h1 style="font-size: 35px">View All Majors and Minors Offered at West University</h1> <br>
        <div class="division"></div> <br>
        <h2 style="font-size: 25px">Majors</h2>
      <div class="second-container">
        <div class="division2"></div> <br>
        <br>
<ul class="nav justify-content-center"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
    <h2>Viewing all Minors</h2>
    </li>
</ul>

<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>Minor Name</th>
                        <th>Department Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query="SELECT * FROM Minor inner join (Department) on Minor.DepartmentID = Department.DepartmentID;";
                            $select_holds =mysqli_query($connection, $query);
                            if(!$select_holds){
                                die("Query Failed " . mysqli_error($connection));
                            }
                           while($row=mysqli_fetch_assoc($select_holds)) {
                                $hold_id        = $row['MinorName'] ;
                                $hold_type       = $row['DepartmentName'] ;

                           echo "<tr>";
                           echo "<td>{$hold_id }</td>";
                           echo "<td>{$hold_type}</td>";

                        //    echo "<td class = 'bg-light' style = 'text-align: center;'><a class = 'btn btn-dark' href = 'view_users.php?source=edit_user&user_id={$hold_id}'>Edit</a></td>"; 
                           echo "</tr>";
                        }
                        ?>
                        </tr>
                        </tbody>
                        </table>

                        <br>
<ul class="nav justify-content-center text-warning"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;" >

    <li class="nav-item dropdown" >
    <h2>Viewing all Majors</h2>
    </li>
</ul>




            <br>
        <div class="row text-dark">


        <br>



        <table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                    <tr>
                        <th>Major Name</th>
                        <th>Department Name</th>
                    </tr>
                </thead>
                <tbody>
           <?php
           $query="select * from Major inner join Department using (DepartmentID) Order By MajorName ASC;";
           $select_department_by_id =mysqli_query($connection, $query);
           if (!$select_department_by_id) {
               die("Query Failed " . mysqli_error($connection));
           }
          while ($row=mysqli_fetch_assoc($select_department_by_id)) {
              $department_id= $row['DepartmentID'];
              $department_name = $row['DepartmentName'];
              $major_id =      $row['MajorID'] ;
              $major_name =    $row['MajorName']; ?>
                    <?php
                echo "<tr>";
                echo "<td>{$major_name}</td>";
                echo "<td>{$department_name}</td>";
                // echo "<td><a class = 'btn btn-dark' href = 'view_courses_from_major.php?major_id={$major_id}'>View Required Courses</a></td>";
                echo "</tr>";
            }
                        ?>
                    </tr>
                </tbody>
            </table>





      </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </section>
  <?php
include "view/footer.php"

?>
  </body>

  
</html>
