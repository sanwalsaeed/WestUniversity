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
    <link href="https://fonts.googleapis.com/css2?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <!-- loading the style sheets -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/loginstyle.css">


    <!-- website title -->
    <title>West University | Portal Login</title>
    <!-- setting the tab logo -->
    <link rel="icon" href="images/wutablogo.png">
  </head>

  <body>
    <!-- Navigation Bar -->
    <?php
      include "view/nav.php";
    ?>

    <!-- Login Page --->


    <div class="login-wrapper">
    <div class="login-container">
                        <!-- Signup form -->
                        <div class="signup">
                            <div class="login-container" >
                              
                            <form  class="login-form" style = "float: none; margin-left: auto; margin-right: auto;text-align:center" action = "includes/login.php" method = "post">
                            
                            <br>
                            <div style = "text-align: center;">
                                  <label for="inputPassword" class="sr-only">Enter your Email</label>
                            </div>
           
                                 <!--  user name to post-->
                                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address"
                                    required autofocus>
                                <label for="inputPassword" class="sr-only">Password</label>
                                 <!-- Password to post -->
                                <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password"
                                    required>
                                <div class="checkbox mb-3">
                                    <label>
                                        <input type="checkbox" value="remember-me"> Remember me
                                    </label>
                                </div>
                                <br>
                                
                                <div class="form-group">
                                    <!-- Submit button to sign in  -->

                                    <button class="btn btn-primary btn-lg btn-block"
                                        type="submit" name="sign_in">Sign in</button>
                                        <br>
                                        
                                        <a href="reset_password.php">
                                            Forgot Password?
                                        </a>
</div>
                            </form>

  </body>

</html>
