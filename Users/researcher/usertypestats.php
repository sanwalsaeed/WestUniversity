<?php

include "include_researcher/researcher_info_header.php";

?>

    <section class="researcher-information">
      <div class="first-container">
        <h1 style="font-size: 35px">User Statistics</h1>
      </div>
      <div class="second-container">
        <div class="division2"></div> <br>
        <div class="banner">
          <div class="row">
            <div class="col">
              <h2>User Type Statistics</h2>
              <!-- input graph showing the percentage of each user type. (admin, faculty, student, researcher) -->

                <?php         
            $counter= 0;
            $query="select * from Student ;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter++;
            }
            $counter -= 106;
            echo "<h2>There are $counter Total Students</h2>";
            ?>

<?php         
            $counter= 0;
            $query="select * from Faculty;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter++;
            }

            echo "<h2>There are $counter Total Faculty</h2>";
            ?>

            
<?php         
            $counter= 0;
            $query="select * from researcher;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter++;
            }
          
            echo "<h2>There are $counter Total Faculty</h2>";
            ?>

            
<?php         
            $counter= 0;
            $query="select * from users ;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter++;
            }
            $counter -= 17;
            echo "<h2>There are $counter Total Users</h2>";
            ?>

            </div>
            <div class="col">
              <h2>Student Type Statistics</h2>
              <!-- input graph showing the the percentage of graduate/undergrade part time and full time students -->

              <?php         
            $counter1= 0;
            $query="select * from UndergraduateStudent ;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter1++;
            }

            echo "<h2>There are $counter1 Total Undergraduate Student</h2>";
            ?>

            
<?php         
            $counter= 0;
            $query="select * from GraduateStudent ;";
            $select_student =mysqli_query($connection, $query);
            if(!$select_student){
                die("Query Failed " . mysqli_error($connection));
            }
            while ($row=mysqli_fetch_assoc($select_student)) {
                $counter++;
            }
            $counter = 1500 - $counter1;

            echo "<h2>There are $counter Total Users</h2>";
            ?>




            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
