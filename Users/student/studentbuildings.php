

<?php
  include "include_student/student_info_header.php";
?>


    <section class="student-information">
      <div class="first-container">
        <h1 style="font-size: 35px">Viewing all buildings</h1>
      </div>
      <div class="second-container">
        <div class="division2"></div> <br>
        <h2 style="font-size: 18px; margin-bottom: 5px;">Your current advisor: </h2>
        <!-- Sample data, this table needs to be populated with php calls to the database -->
        <table class="student-advisor-table" style="width: 900px;">
          <tr>
            <th>BuildingID</th>
            <th>Building Name</th>
            <th>Building Status</th>
          </tr>
          <tr>
            <td>1</td>
            <td>New Academic Building</td>
            <td style="background-color: green;">Open</td>
          </tr>
        </table>
      </div>
    </section>
  </body>
</html>
