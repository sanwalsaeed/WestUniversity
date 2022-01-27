<?php
  include "include_admin/admin_output_top.php";
?>

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
                           echo "</tr>";
                        }
                        ?>
                        </tr>
                        </tbody>
                        </table>

                        
<?php
include "include_admin/admin_output_bottom.php"
?>