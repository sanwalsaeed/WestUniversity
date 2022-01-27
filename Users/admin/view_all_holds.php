<?php
  include "include_admin/admin_output_top.php";
?>

<br>
<ul class="nav justify-content-center text-warning"
  style=" color : white; width: 50%; margin: 0 auto; border-radius: 20%;">
  <div style="text-align: center;" >

    <li class="nav-item dropdown" >
    <h2>Viewing all Holds</h2>
    </li>
</ul>

<table class = "table  text-light" style = "background-color: #2e004f;" >
                        <thead class= "text-warning" style = "background-color: #2e004f;">
                        <tr>
                        <th>Hold Types</th>
                        <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query="SELECT * FROM Holds";
                            $select_holds =mysqli_query($connection, $query);
                            if(!$select_holds){
                                die("Query Failed " . mysqli_error($connection));
                            }
                           while($row=mysqli_fetch_assoc($select_holds)) {
                                $hold_type       = $row['HoldTypes'] ;
                                $hold_description       = $row['HoldDescription'] ;

                           echo "<td>{$hold_type}</td>";
                           echo "<td>{$hold_description}</td>";

                           echo "</tr>";
                        }
                        ?>
                        </tr>
                        </tbody>
                        </table>

                        
<?php
include "include_admin/admin_output_bottom.php"
?>