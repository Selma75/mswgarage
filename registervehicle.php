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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
			<li><a href="index2.php">HOME</a></li>
			<li><a href="services1.php">SERVICES PRODUCTS</a></li>
			<li><a href="registervehicle.php"><u>REGISTER VEHICLE</u></a></li>
			<li><a href="booking.php">BOOKING</a></li>
			<li><a href="myhistory.php">MY HISTORY</a></li>
			<li><a href="logout.php">LOGOUT</a></li>


		</ul>
	</nav>

	<div class="container">

		<div class="main-login main-center">
			<form method="post" action="registervehicle.php">
				<div class="form-group">
					<label for="make">Make</label>
					<select class="form-control" id="make" name="make" onchange="ChangeCarList()">
						<option value="">-- Vehicle --</option>
						
						
						<option value="NISSAN">NISSAN</option>
						<option value="LEXUS">LEXUS</option>
						<option value="LAND ROVER">LAND ROVER</option>
						<option value="LANCIA">LANCIA</option>
						<option value="LANDA">LANDA</option>
						<option value="LAMBORGHINI">LAMBORGHINI</option>
						<option value="JENSEN">JENSEN</option>
						<option value="JEEP">JEEP</option>
						<option value="JAGUAR">JAGUAR</option>
						<option value="IVECO">IVECO</option>
						<option value="ALFA ROMEO">ALFA ROMEO</option>
						<option value="ASTON MARTIN">ASTON MARTIN</option>
						<option value="AUSTIN">AUSTIN</option>
						<option value="AUDI">AUDI</option>
						<option value="BEAUFORD">BEAUFORD</option>
						<option value="BENTLEY">BENTLEY</option>
						<option value="CADILLAC">CADILLAC</option>
						<option value="CATERHAM">CATERHAM</option>
						<option value="CHEVROLET">CHEVROLET</option>
						<option value="CHRYSLER">CHRYSLER</option>
						<option value="VOLVO">Volvo</option>
						<option value="VOLKSWAGEN">Volkswagen</option>
						<option value="BMW">BMW</option>
						<option value="CITROEN">CITROEN</option>
						<option value="FERRARI">FERRARI</option>
						<option value="FIAT">FIAT</option>
						<option value="HYNDAY">HYNDAY</option>
						<option value="DODGE">DODGE</option>
						<option value="ISUZU">ISUZU</option>	
						<option value="HUMMER">HUMMER</option>	
												
							
						
						
					</select>
					<br>

					<label for="type">Type</label>
					<select class="form-control" name="type" id="type" required>
					</select>
					<br>

					<label for="engine_type">Engine Type</label>
					<select class="form-control" name="engine_type" id="engine_type">
						<option>Diesel</option>
						<option>Petrol</option>
						<option>Hybrid</option>
						<option>Eletric</option>
					</select>
					<br>

					<div class="form-group">
						<label for="license">License:</label>
						<input name="license" type="license" class="form-control" placeholder="Enter License" id="license" required>
					</div>
					<br>

					<button name="reg_vehicle" type="submit" class="btn btn-primary">Register Vehicle</button>
				</div>

				<?php

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$license = $_POST['license'];
					$type = $_POST['type'];
					$engine_type = $_POST['engine_type'];
					$make = $_POST['make'];
					$cus_email = $_SESSION['login_mswgarage'];
					//echo '<script type="text/javascript">alert("'.$cus_email.'");</script>';//working

					$sql = "INSERT INTO vehicle (License, Type, Engine_type, Make, Customer_email) 
					VALUES('$license', '$type', '$engine_type', '$make', '$cus_email');";
					echo '<script type="text/javascript">alert("'.$sql.'");</script>';//working
					$result = mysqli_query($conn, $sql);
				}
				?>

			</form>
		</div>
	</div>


	<!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script>
		function appendText() {
			var txt1 = "<p>Text.</p>"; // Create text with HTML
			var txt2 = $("<p></p>").text("Text."); // Create text with jQuery
			var txt3 = document.createElement("p");
			txt3.innerHTML = "Text."; // Create text with DOM
			$("body").append(txt1, txt2, txt3); // Append new elements
		}
	</script> -->

	<script>
		var carsAndModels = {};
		

		carsAndModels['NISSAN'] = ['ALTIMA', 'JUKE', 'QASHQAI'];
		carsAndModels['LEXUS'] = ['CT 200H', 'ES 200', 'GS 200T', 'LS 350'];
		carsAndModels['LAND ROVER'] = ['ROVER', 'ROVER SPORT', 'EVOQUE'];
		carsAndModels['LANCIA'] = ['ZELA', 'YPSILON', 'THESIS'];
		carsAndModels['LANDA'] = ['110 SEDAN', '111 WAGON', '112 HATCHBACK', 'PRIORA SEDAN'];
		carsAndModels['LAMBORGHINI'] = ['LM002', 'DIABLO', 'GALLARDO'];
		carsAndModels['JENSEN'] = ['S-V8', 'S-V8', 'MARK II 5-SPEED'];
		carsAndModels['JEEP'] = ['CJ-5', 'CJ-6', 'CJ-7', 'CJ-8'];
		carsAndModels['JAGUAR'] = ['E-PACE', 'F-PACE', 'XE'];
		carsAndModels['IVECO'] = ['DAILY VAN', 'MASSIF', 'DAILY S2000 MINIBUS'];
		carsAndModels['ALFA ROMEO'] = ['BRERA', 'GIULIA', 'GIULIETTA', 'GT'];
		carsAndModels['ASTON MARTIN'] = ['DB5', 'RAPIDE', 'V8 VANTAGE'];
		carsAndModels['AUSTIN'] = ['ALLEGRO', 'BIG', 'MAESTRO'];
		carsAndModels['AUDI'] = ['A1', 'A2', 'A3', 'A4'];
		carsAndModels['BEAUFORD'] = ['TOURER', 'TOURER LONG BODIED', 'WEDDING CAR'];
		carsAndModels['BENTLEY'] = ['SPEED SIX', 'T-SERIES', 'MARK VI'];
		carsAndModels['CADILLAC'] = ['CT4', 'CT5', 'CT6', 'XT4'];
		carsAndModels['CATERHAM'] = ['SEVEN 420', 'SEVEN 620', 'ROADSPORT'];
		carsAndModels['CHEVROLET'] = ['SPARK', 'SONIC', 'BOLT'];
		carsAndModels['CHRYSLER'] = ['300', 'PACIFICA', '200', '300M'];
		carsAndModels['VOLVO'] = ['V70', 'XC60', 'XC90'];
		carsAndModels['VOLKSWAGEN'] = ['Golf', 'Polo', 'Scirocco', 'Touareg'];
		carsAndModels['BMW'] = ['M6', 'X5', 'Z3'];
		carsAndModels['CITROEN'] = ['C-ZERO', 'C1', 'C2'];
		carsAndModels['FERRARI'] = ['GTC4 LUSSO', '488 PISTA', 'ENZO', 'MONZA SP1'];
		carsAndModels['FIAT'] = ['PUNTO', 'BRAVO', 'IDEA'];
		carsAndModels['HYUNDAI'] = ['SANTA FE', 'TUCSON', 'KONA EV'];
		carsAndModels['DODGE'] = ['DART', 'DELUXE', 'DEMON'];
		carsAndModels['ISUZU'] = ['CROSSWIND', 'D-MAX', 'PANTHER', 'SL MT'];
		carsAndModels['HUMMER'] = ['H3', 'H3T'];
		

		
		

		function ChangeCarList() {
			var carList = document.getElementById("make");
			var modelList = document.getElementById("type");
			var selCar = carList.options[carList.selectedIndex].value;
			while (modelList.options.length) {
				modelList.remove(0);
			}
			var cars = carsAndModels[selCar];
			if (cars) {
				var i;
				for (i = 0; i < cars.length; i++) {
					var car = new Option(cars[i], carsAndModels[i]);
					modelList.options.add(car);
				}
			}
		}
	</script>





</body>

</html>