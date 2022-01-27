<?php
include "database.php"; 
?> 

<?php session_start(); ?> 

<?php

if (isset($_POST['sign_in'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);

    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users inner join login using (user_id) WHERE user_email =  '{$username}'; ";
    $select_user_query = mysqli_query($connection, $query);
   
    if (!$select_user_query) {
        die("Query Failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_id = $row['user_id'];
        $db_email = $row['user_email'];
        $db_password = $row['password'];
        $db_first_name = $row['first_name'];
        $db_last_name = $row['last_name'];
        $db_dob = $row['dob'];
        $db_city = $row['city'];
        $db_state = $row['state'];
        $db_zip_code = $row['zip_code'];
        $db_user_type = $row['user_type'];
        $db_failed = $row['failed_attempts'];

        if ($username === $db_email && $password != $db_password) {
            $db_failed++;

            $update_query =  "Update login SET ";
            $update_query .= " failed_attempts = {$db_failed}  WHERE user_id = {$db_id} ";
            $result_of_update_query = mysqli_query($connection, $update_query);
            if (!$result_of_update_query) {
                die("Query Failed" . mysqli_error($connection));
            }
            header("Location: ../index.php");
        }
        if ($db_failed >= 3) {
        } elseif ($username === $db_email && $password === $db_password && $db_user_type == "admin") {

            $_SESSION['user_id'] = $db_id;
            $_SESSION['user_email'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name ;
            $_SESSION['dob'] = $db_dob;
            $_SESSION['city'] =  $db_city;
            $_SESSION['state'] = $db_state ;
            $_SESSION['zip_code'] = $db_zip_code;
            $_SESSION['user_type'] = $db_user_type;

            header("Location: ../admin/index.php");


        } elseif ($username === $db_email && $password === $db_password && $db_user_type == "student") {
 
            $_SESSION['user_id'] = $db_id;
            $_SESSION['user_email'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name ;
            $_SESSION['dob'] = $db_dob;
            $_SESSION['city'] =  $db_city;
            $_SESSION['state'] = $db_state ;
            $_SESSION['zip_code'] = $db_zip_code;
            $_SESSION['user_type'] = $db_user_type;

            header("Location: ../student/index.php");


        } elseif ($username === $db_email && $password === $db_password && $db_user_type == "faculty") {
            // CORRECT CREDENTIALS SUCCESSFUL LOG IN USE CASE
            $_SESSION['user_id'] = $db_id;
            $_SESSION['user_email'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name ;
            $_SESSION['dob'] = $db_dob;
            $_SESSION['city'] =  $db_city;
            $_SESSION['state'] = $db_state ;
            $_SESSION['zip_code'] = $db_zip_code;
            $_SESSION['user_type'] = $db_user_type;

            header("Location: ../faculty/index.php");


        } elseif ($username === $db_email && $password === $db_password && $db_user_type == "researcher") {
            // CORRECT CREDENTIALS SUCCESSFUL LOG IN USE CASE
            $_SESSION['user_id'] = $db_id;
            $_SESSION['user_email'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name ;
            $_SESSION['dob'] = $db_dob;
            $_SESSION['city'] =  $db_city;
            $_SESSION['state'] = $db_state ;
            $_SESSION['zip_code'] = $db_zip_code;
            $_SESSION['user_type'] = $db_user_type;

            header("Location: ../researcher/index.php");

        } elseif ($username !== $db_email && $password == $db_password) {
            header("Location: ../index.php");
        } elseif ($username == $db_email && $password !== $db_password) {
            header("Location: ../index.php");
        } elseif ($username != $db_email && $password !== $db_password) {
            header("Location: ../index.php");
        }
    }
}

?>