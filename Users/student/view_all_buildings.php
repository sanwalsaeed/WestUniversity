<?php
  include "include_student/student_info_header.php";
?>

<div class = "text-warning text-center" style = "background-color: #2e004f;">

<br>
<br>
<h3>Viewing All of the Buildings on Campus</h3>
<br>
<br>
<table class = "table text-light text-center" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
        <tr>
        <th>Building Name</th>
        </tr>
        </thead>

        <tbody>

        <?php 
            $query="SELECT * FROM Building ;";
            $select_building =mysqli_query($connection, $query);
            if(!$select_building){
                die("Query Failed " . mysqli_error($connection));
            }
           while($row=mysqli_fetch_assoc($select_building)) 
           {
                $building_name = $row['BuildingName'] ;

           echo "<tr>";
           echo "<td>{$building_name}</td>";
           echo "</tr>";
        }
        ?>

        </tr>
        </tbody>
        </table>
        <?php


        ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>