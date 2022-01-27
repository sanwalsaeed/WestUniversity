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
    <title>West University | Departments</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="images/wutablogo.png">
  </head>



  <body class = "text-warning" style = "background-color: #2e004f;">
    <!-- Navigation Bar -->
    <?php
      include "view/nav.php";
    ?>


    <section style = "background-color: #2e004f;">
     
<br>
<ul class="nav justify-content-center"
  style="width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;">

    <li class="nav-item dropdown">
    <h2>Viewing all Departments</h2>
    </li>
</ul>
<br>

<table class = "table text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
        <tr>
        <th scope="col">Department Name</th>
        <th scope="col">Department Email</th>
        <th scope="col">Contact Number</th>

        <th scope="col">Room</th>
        <th scope="col">Building Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
              $query="SELECT * FROM Department inner join (Building) on Building.BuildingID = Department.BuildingID inner join (Room) on Room.RoomID = Department.RoomID;";
              $select_department_id = mysqli_query($connection, $query);

              while ($row=mysqli_fetch_assoc($select_department_id)) {
                  $DepartmentName=$row['DepartmentName'];
                  $DepartmentEmail=$row['DepartmentEmail'];
                  $ContactNumber =$row['ContactNumber'];
                  $BuildingName =$row['BuildingName'];
                  $RoomNumber =$row['RoomNumber'];
                  echo "<tr>";
                  echo "<td style = ''>{$DepartmentName}</td>";
                  echo "<td style = ''>{$DepartmentEmail}</td>";
                  echo "<td style = ''>{$ContactNumber}</td>";
                  echo "<td style = ''>{$RoomNumber}</td>";
                  echo "<td style = ''>{$BuildingName}</td>";
                  
                  echo "</tr>";
              }
      ?>

    </tbody>
    </table>
      </div>
    </section>
  </body>
</html>
