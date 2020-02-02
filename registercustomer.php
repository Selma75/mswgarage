<?php
//
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
//if(isset($_POST['login_button']))
{
    $email = $_POST['email'];
    $Name = $_POST['name3'];
    $Surname = $_POST['surname'];
    $Mob_phone = $_POST['phone'];  
    $password = $_POST['password'];

    $sql = "INSERT INTO CUSTOMER (EMAIL, NAME, SURNAME, PHONE, PASSWORD) 
  			  VALUES('$email', '$Name', '$Surname', '$Mob_phone', '$password')";
	$result = mysqli_query($conn, $sql);
	header('Location: login.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
      
    <title>Project Final </title>
    <link rel="stylesheet" type="text/css" href="css\myStyle.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Maria Selma">
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    <!-- ainda vou fazer outro ICON -->
    <link rel="icon" href="imagens/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Gelasio|Lobster|Mansalva|Playfair+Display|Roboto+Slab&display=swap" rel="stylesheet"> 
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:400,700|Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\stylesheet.css">
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <nav>
        <a href="#">Mechanical Services For Women</a>
        <ul>

		<li><a href="index.php">HOME</a></li>
    	<li><a href="registercustomer.php"><u>REGISTER CUSTOMER</u></a></li>                   

        </ul>
    </nav>

		<div class="container">
			
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="registercustomer.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name3" id="name3"  placeholder="Enter your name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="surname" class="cols-sm-2 control-label">Surname</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="surname" id="surname"  placeholder="Enter your surname"/>
								</div>
							</div>
						</div>

					
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your email" required/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="phone" class="cols-sm-2 control-label">Phone</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your phone"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your password"/>
								</div>
							</div>
						</div>

						
						<div class="form-group ">
							<button  type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
						</div>
						<!-- <div class="login-register">
				            <a href="index.php">Login</a>
				         </div> -->
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>