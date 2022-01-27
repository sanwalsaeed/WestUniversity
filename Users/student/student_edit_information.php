<?php
  include "include_student/student_info_header.php";
?>
<?php
  include "include_student/student_reg_menu.php";
?>

<div class = 'text-warning text-center' style="background-color: #2e004f; height: 2000px;">
<br>
<br>


<?php
        $the_user_id = $_SESSION['user_id'];
        $query="SELECT * FROM users inner join login using (user_id) WHERE user_id = {$the_user_id}";
        $select_user_by_id =mysqli_query($connection, $query);

        while ($row=mysqli_fetch_assoc($select_user_by_id)) {
            $db_id=             $row['user_id'];
            $db_username =      $row['user_email'];
            $db_password =      $row['password'] ;
            $db_first_name =    $row['first_name'];
            $db_last_name  =     $row['last_name'];
            $db_dob =            $row['dob'];
            $db_add      =       $row['user_address'];
            $db_city =           $row['city'];
            $db_state =         $row['state'];
            $db_zip_code =       $row['zip_code'];
            $db_user_type =      $row['user_type'];
        } ?>
    <h2>Editing <?php echo $db_first_name . " " . $db_last_name ?>
        Information</h2>
    <br>


    <form class="bodycenter" action="" method="post" enctype="multipart/form-data">


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">User Email</label>
                <input style="text-align: center;" type="text"
                    value="<?php echo $db_username ?>"
                    class="form-control" name="user_email">
            </div>
            <div class="form-group col-md-6">
                <label for="title">User Password</label>
                <input style="text-align: center;"
                    value="<?php echo  $db_password?>" type="text"
                    class="form-control" name="password">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">First Name</label>
                <input style="text-align: center;"
                    value="<?php echo $db_first_name?>" type="text"
                    class="form-control" name="first_name">
            </div>
            <div class="form-group col-md-4">
                <label for="title">Last Name</label>
                <input style="text-align: center;" type="text"
                    value="<?php echo $db_last_name?>"
                    class="form-control" name="last_name">
            </div>
            <div class="form-group col-md-2">
                <label for="post_tags">Date of Birth</label>
                <input style="text-align: center;" type="date"
                    value="<?php echo $db_dob ?>"
                    class="form-control" name="dob">
            </div>
        </div>
        <div class="form-group">
            <label for="post_tags">User Address</label>
            <input style="text-align: center;" type="text"
                value="<?php echo $db_add ?>" class="form-control"
                name="user_address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="post_tags">User City</label>
                <input style="text-align: center;" type="text"
                    value="<?php echo $db_city ?>"
                    class="form-control" name="city">
            </div>
            <div class="form-group col-md-4">
                <label for="post_tags">User State</label>
                <input style="text-align: center;" type="text"
                    value="<?php echo $db_state ?>"
                    class="form-control" name="state">
            </div>
            <div class="form-group col-md-2">
                <label for="post_tags">Post Tags</label>
                <input style="text-align: center;" type="text"
                    value="<?php echo $db_zip_code ?>"
                    class="form-control" name="zip_code">
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-warning text-dark" type="submit" name="update_user" value="Update User Information">
        </div>
    </form>



    <?php
    if (isset($_POST['update_user'])) {
        $entered_username = mysqli_real_escape_string($connection, $_POST['user_email']);
        $entered_password = mysqli_real_escape_string($connection, $_POST['password']);
        $entered_first_name =mysqli_real_escape_string($connection, $_POST['first_name']);
        $entered_last_name  =mysqli_real_escape_string($connection, $_POST['last_name']);
        $entered_add       =mysqli_real_escape_string($connection, $_POST['user_address']);
        $entered_city     =mysqli_real_escape_string($connection, $_POST['city']);
        $entered_state    =mysqli_real_escape_string($connection, $_POST['state']);
        $entered_zip_code  =mysqli_real_escape_string($connection, $_POST['zip_code']);
        $dob = strtotime($_POST['dob']);
        $dob = date('m/d/Y', $dob);

        $entered_dob  =mysqli_real_escape_string($connection, $dob);
        $update_query =  "Update users inner join login using (user_id) SET ";
        $update_query .= "user_email = '{$entered_username}', ";
        $update_query .= "password = '{$entered_password}', ";
        $update_query .= "first_name = '{$entered_first_name}', ";
        $update_query .= "last_name = '{$entered_last_name}', ";
        $update_query .= "dob = '{$dob}', ";
        $update_query .= "user_address = '{$entered_add}', ";
        $update_query .= "city = '{$entered_city}', ";
        $update_query .= "state = '{$entered_state}' ,";
        $update_query .= "zip_code = '{$entered_zip_code}' ";
        $update_query .= "WHERE user_id = {$the_user_id} ";
        $result_of_update_query = mysqli_query($connection, $update_query);
        if (!$result_of_update_query) {
            die("Query Failed" . mysqli_error($connection));
        }
        header("location: index.php");
    }

?>
</div>