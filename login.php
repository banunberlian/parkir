<?php
session_start();

if(isset($_SESSION['login'])){
  header("location:admin/index.php");
  exit;
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php require_once('template/css.php');?>
        <link rel="stylesheet" href="assets/css/style.css">

        <title>Login</title>
    </head>
    <body>

        <div class="login-page">
            <div class="form">
                <form class="register-form" method="post" action="config/do_register.php">
                    <input type="text" placeholder="username" name="username"/>
                    <input type="password" placeholder="password" name="password"/>
                    <input type="password" placeholder="re enter password" name="password2"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" method="post" action="config/do_login.php">
                    <input type="text" placeholder="username" name="username"/>
                    <input type="password" placeholder="password" name="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                    <p class="message"><a href="index.php">Homepage</a></p>
                </form>
                
            </div>
        </div>

        <?php require_once('template/js.php');?>
    </body>
</html>