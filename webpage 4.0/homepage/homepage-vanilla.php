 <?php 
 session_start();
 if(!($_SESSION['loggedIn'])){
 	header('Location: /landing.php?invalidsess=1');
 }

 ?>
 <!DOCTYPE html>

 <html lang="en">

 <head>

 	<!-- meta data -->
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<title>Home</title>

 	<!-- Style sheets -->
 	<link rel="icon" href="img/pilogo.png">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
 	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
 	<link href="css/resume.css" rel="stylesheet">
 	<link href="css/override-style.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="loadingButtonOverride.css">
 	<!-- https://codepen.io/mallendeo/pen/eLIiG-->
 	<link rel="stylesheet" type="text/css" href="toggleButton.css">
 	<link rel="stylesheet" type="text/css" href="loadingDiv.css">


 	<!-- Scripts -->
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


 </head>

 <style type="text/css">
 .sizeFix{
 	width: 230px;
 }
</style>

<body id="page-top" onload="getGPIOstats();reloadCheck();websyncCheck();" style="padding-left: 25rem;background:linear-gradient(45deg, #ffffff, #efecec)">

	<div style="padding-top: 20px;padding-left: 10px;">
		<div>
			<img src="img/pilogo.png" width="120" height="150">
			<span style="padding-left: 30px;"">
			<input class="btn btn-primary btn-lg btn-danger"  type="button" value="Back" onclick="window.location.replace('home.php')">
		</span>


	</div>

</div>	
<div>
	<form id="myform">

		<!-- Temp control section -->

		<div class="boxFix"> 
			<h2 class="mb-5">Temprature </h2>
			<div class="sizeFix">
				<label for="ac1">Living Room </label>
				<input class="tgl tgl-ios" id="ac1" name="ac1" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac1"></label> 


			</div>
			<br>
			<div class="sizeFix">
				<label for="ac2">Beedroom kids </label>
				<input class="tgl tgl-ios" id="ac2" name="ac2" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac2"></label>
			</div>
			<br>
			<div class="sizeFix">
				<label for="heat1">Beedroom parents </label>
				<input class="tgl tgl-ios" id="heat1" name="heat1"  type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat1"></label>
			</div>

			<br>
			<div class="sizeFix">
				<label for="heat2">Play room </label>
				<input class="tgl tgl-ios" id="heat2" name="heat2" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat2"></label>
			</div>
			<br>
			<input name="submit" class="btn btn-primary btn-danger" id="send_pi4" type="button" value="Sync-pi">
			<br><br>
			<input class="btn btn-primary btn-danger"  type="button" value="Log" onclick="window.location.replace('tempChart/tempGraph.html')">
		</div>




		<!-- Light control section -->


		<div class="boxFix">
			<h2 class="mb-5">Light</h2>
			<div class="sizeFix">
				<label for="lamp1">Living Room </label>
				<input class="tgl tgl-ios" id="lamp1" name="lamp1" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp1"></label> 
			</div>
			<br>
			<div class="sizeFix">
				<label for="lamp2">Beedroom kids </label>
				<input class="tgl tgl-ios" id="lamp2" name="lamp2"  type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp2"></label> 
			</div>
			<br>
			<div class="sizeFix">
				<label for="cb7">Beedroom parents </label>
				<input class="tgl tgl-iosd" id="cb7" name="cb7" type="checkbox"/ disabled>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb7"></label>  
			</div>

			<br>
			<div class="sizeFix">
				<label for="cb8">Play room </label>
				<input class="tgl tgl-iosd" id="cb8" name="cb8" type="checkbox"/ disabled>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb8"></label> 
			</div>
			<br>
			<input name="submit" class="btn btn-primary btn-danger" id="send_pi3" type="button" value="Sync-pi">
			<br><br>
		</div>



		<!-- Humidity control section -->

		<div class="boxFix">
			<h2 class="mb-5">Humidity</h2>
			<div>
				<label for="hum1">Living Room </label>
				<input class="tgl tgl-ios" id="hum1" name="hum1" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum1"></label> 
			</div>
			<br>
			<div>
				<label for="hum2">Beedroom kids </label>
				<input class="tgl tgl-ios" id="hum2" name="hum2" type="checkbox"/>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum2"></label>   
			</div>
			<br>
			<div>
				<label for="cb11">Beedroom parents </label>
				<input class="tgl tgl-iosd" id="cb11" name="cb11" type="checkbox"/ disabled>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb11"></label> 
			</div>
			<br>

			<div>
				<label for="cb12">Play room </label>
				<input class="tgl tgl-iosd" id="cb12"  name="cb12" type="checkbox"/ disabled>
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb12"></label> 
			</div>
			<br>
			<input name="submit" class="btn btn-primary btn-danger" id="send_pi2" type="button" value="Sync-pi">
			<br><br>
			<input class="btn btn-primary btn-danger"  type="button" value="Log" onclick="window.location.replace('home.php')">
		</div>


	</form>

		<!-- Front door section -->
		<div class="boxFix">
			<h2 class="mb-5">Front Door</h2>
				<div>
 							<label for="door1">Front Door</label><br>
 							<button class="tester" id="door1" onclick="loadDoor();">Force Open</button>
 						</div>

 						<br>
 						<div>
 							<label for="door2">Back Door (Disabled) </label><br>
 							<button class="tester" style="background-color: #ab8487" id="door2" disabled>Force Open</button>
 						</div>
			<br><br><br><br><br><br><br>
			
			<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('http://192.168.137.242:5000')" value="doorGui"> <br><br>
			<input class="btn btn-primary btn-danger"  type="button" value="Timeline" onclick="window.location.replace('../smartDoorTimeline/timeline.html')"><br><br>
			<input class="btn btn-primary btn-danger"  type="button" value="Full-Log" onclick="window.location.replace('../dataLogging/dataTable.php')">

		</div>






	<div id="loaddiv"><div class="loading-wheel"></div></div>
</div>




<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>


<!-- JavaScript syncronization control -->
<script type="text/javascript" src="syncControl.js"></script>

</body>
</html>
