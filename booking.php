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


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<!------ Include the above in your HEAD tag ---------->

<body>

    <nav>
        <a href="#">Mechanical Services For Women </a>
        <ul>

            <li><a href="index2.php">HOME</a></li>
            <li><a href="services1.php">SERVICES PRODUCTS</a></li>
            <li><a href="registervehicle.php">REGISTER VEHICLE</a></li>
            <li><a href="booking.php"><u>BOOKING</u></a></li>
            <li><a href="myhistory.php">MY HISTORY</a></li>
            <li><a href="logout.php">LOGOUT</a></li>

        </ul>
    </nav>

    <div class="container"> 
        <form method="post">
            <div class="form-group">
                <label for="sel1">Select Your Vehicle: </label>
                <?php
                //Our select statement. This will retrieve the data that we want.
                $email = $_SESSION["login_mswgarage"];

                $sql = "SELECT * FROM VEHICLE where CUSTOMER_EMAIL = '$email';";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<select class='form-control' id='vehicle_license' name='vehicle_license' required>";
                        echo "<option></option>";
                        while ($row = mysqli_fetch_array($result)) {

                            echo "<option>" . $row['TYPE'] . "</option>";
                        }
                        echo "</select>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "No records matching your query were found.";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                ?>
                <br>

                <label for="service_type">Service Type</label>
                <select class="form-control" name="service_type" id="service_type" required>
                    <option></option>
                    <option value="Annual Service">Annual Service</option>
                    <option value="Major Service">Major Service</option>
                    <option value="Repair / Fault">Repair / Fault</option>
                    <option value="Major Repair">Major Repair</option>
                </select>
                <br>

                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" name="comment" rows="3" id="comment"></textarea>
                </div>

                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <!-- Form code begins -->
                                <form method="post">
                                    <div class="form-group">
                                        <!-- Date input -->
                                        <label class="control-label" for="date">Date</label>
                                        <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required />
                                    </div>
                                    <div class="form-group">
                                        <!-- Submit button -->
                                        <button class="btn btn-primary " id="submit" name="submit" onclick="ChangeCarList()" type="submit">Book</button>

                                        <?php

                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            $service_type = $_POST['service_type'];
                                            $comment = $_POST['comment'];
                                            $date = $_POST['date'];
                                            $cus_email = $_SESSION["login_mswgarage"];
                                            $vehicle_name = $_POST['vehicle_license'];
                                           
                                            $result = mysqli_query($conn, $sql);
                                            $count1 = mysqli_fetch_row($result);
                                            $count = implode(" ", $count1);
                                            // echo '<script type="text/javascript">alert("' . $count . '");</script>'; //working


                                            $sql2 = "SELECT DISTINCT License FROM vehicle 
                                            where Customer_email = '$cus_email' and Type = '$vehicle_name';";

                                            $result1 = mysqli_query($conn, $sql2);
                                            $vehicle_license1 = mysqli_fetch_row($result1); //array
                                            $vehicle_license11 = implode(" ", $vehicle_license1);

                                            // echo '<script type="text/javascript">alert("'.$vehicle_license11.'");</script>';//working
                                            $sql3 = "INSERT INTO `booking` ( `Service_type`, `Comment`, `Date`, `Customer_email`, `vehicle_License`, `status`) 
                                            VALUES('$service_type', '$comment', '$date','$cus_email', '$vehicle_license11', 'Booked');";
                                            $result = mysqli_query($conn, $sql3);

                                        } else {
                                           // echo '<script>alert("There is no available time")</script>';
                                        }

                                        ?>

                                    </div>
                                </form>
                                <!-- Form code ends -->

                            </div>
                        </div>
                    </div>
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

            </div>
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




</body>

</html>