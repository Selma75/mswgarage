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

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

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

  <div class="container">


    <?php
    //Our select statement. This will retrieve the data that we want.
    $email = $_SESSION["login_mswgarage"];

    $sql = "SELECT * FROM BOOKING
              WHERE CUSTOMER_EMAIL = '$email' ORDER BY DATE;";


    //  $sql = "SELECT * FROM booking where Customer_email = '$email' ORDER BY DATE;";

    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        echo "  <table class='table'>
        <thead>
        <tr>
        <th>Date</th>
        <th>ID Booking</th>
        <th>Service Type</th>
        <th>License</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" .
            $row["DATE"] . "</td><td>" .
            $row["BOOKING_ID"] . "</td><td>" .
            $row["SERVICE_TYPE"] . "</td><td>" .
            $row["VEHICLE_LICENSE"] . "</td><td>" .
            $row["STATUS"] . "</td><td>" .
            "</td></tr>";
        }
        echo "</tbody>
        </table>";
      } else {
        echo "0 Result";
      }
    }
    ?>

  </div>
</body>

</html>