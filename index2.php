<?php
include('session.php');
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
        <a href="#">Mechanical Services For Women </a>
        <ul>

            <li><a href="index2.php"><u>HOME</u></a></li>
            <li><a href="services1.php">SERVICES PRODUCTS</a></li>
            <li><a href="registervehicle.php">REGISTER VEHICLE</a></li> 
            <li><a href="booking.php">BOOKING</a></li>          
            <li><a href="myhistory.php">MY HISTORY</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
                     
        </ul>
    </nav>
    
    <!-- <header> -->
        <h3>By Women Just For Women</h3>
        <!-- procurar o carrosel  -->
        <div id="mycarousel">
        <div id="carouselHome" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselHome" data-slide-to="1"></li>
                  <li data-target="#carouselHome" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="image\image0h.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="image\image1h.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="image\image2h.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <!-- </header> -->

    <footer>
        <h3>Here is the right place for you to leave your car and relax!</h3>       
        
    </footer>





    
</body>
</html>