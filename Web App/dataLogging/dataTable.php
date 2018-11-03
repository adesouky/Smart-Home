<?php 
$host="localhost";
$user="root";
$password="Koko2009";
$db="sensordata";

$get=mysqli_connect($host,$user,$password);
$selected = mysqli_select_db($get,$db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sensor Data</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--=https://colorlib.com/wp/css3-table-templates/======-->	
	<!--===============================================================================================-->	
	<link rel="icon" href="../loginAssets/pilogo.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="container-table100">

		<div class="wrap-table100">
			<div class="table100">
				<table>
					<thead>
						<h1 style="font-family:'Saira Extra Condensed', serif; color: grey;">DATA-LOG <input class="btn btn-primary btn-danger "  type="button" value="Back" onclick="window.location.replace('../homepage/homepage-vanilla.php')"></h1>
						<tr class="table100-head">
							<th class="column1">Time stamp</th>
							<th class="column2">Temprature</th>
							<th class="column3">Humidity</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = mysqli_query($get,"SELECT * FROM sensorReadings ORDER BY ID DESC");
						while( $row = mysqli_fetch_array($query) )
						{
							echo '<tr>';
							echo '   <td class="column1">'.$row["date"].'</td>';
							echo '   <td class="column2">'.$row["temperature"].'</td>';
							echo '   <td class="column3">'.$row["humidity"].'</td>';
							echo '</tr>';
						}
						?>					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>