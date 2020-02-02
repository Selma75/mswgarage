<?php
include('session1.php');
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

            <li><a href="index3.php"><u>CHECK BOOKINGS</u></a></li>
            <li><a href="invoice.php">INVOICE</a></li>
            <li><a href="liststaff.php">LIST STAFF</a></li>
            <li><a href="logout1.php">LOGOUT</a></li>

        </ul>
    </nav>

    <div class="container">


        <form method="post">
            <div class="form-group">
                <!-- Date input -->
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required />
            </div>
            <div class="form-group">
                <!-- Submit button -->
                <button class="btn btn-primary " id="submit" name="submit" type="submit">Check Booking</button>
            </div>

        </form>

        <?php
        //Our select statement. This will retrieve the data that we want.

        if (isset($_POST['submit'])) {

            $date = $_POST["date"];

            $sql = "SELECT * FROM BOOKING
              WHERE DATE = '$date' ORDER BY DATE;";

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
        }
        ?>

    </div>





    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                daysOfWeekDisabled: [0],
            };
            date_input.datepicker(options);
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />





</body>

</html>

