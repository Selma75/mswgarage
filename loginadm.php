<?php
//
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
//if(isset($_POST['login_button']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM USER_ADMIN WHERE EMAIL='$email' && PASSWORD='$password'";
    

    $result = mysqli_query($conn, $sql);
   
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $_SESSION['login_admin'] = $row['EMAIL'];
        header('Location: success.html');
        header('Location: index3.php');
    } else {
        echo '<script>alert("Your Login Name or Password is invalid!")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
 
  <title>Project Final </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login page">
    <meta name="author" content="Maria Selma">
        
    
    <link href="https://fonts.googleapis.com/css?family=Gelasio|Lobster|Mansalva|Playfair+Display|Roboto+Slab&display=swap" rel="stylesheet"> 
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:400,700|Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\stylesheet.css">
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!-- ainda vou fazer outro ICON -->
    <link rel="icon" href="imagens/favicon.ico">    
    <link rel="stylesheet" type="text/css" href="css\myStyle.css">

    
  </head>

<body>

<nav>
        <a href="#">Mechanical Services For Women</a>
        <ul>

            <li><a href="index.php">HOME</a></li>
            <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="services.php">SERVICES  PRODUCTS</a></li>           
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="login.php">LOGIN</a></li> 
            <li><a href="loginadm.php"><u>LOGIN ADM</u></a></li>
        </ul>
    </nav>

    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">AdmName:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>