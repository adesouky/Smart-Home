 <?php 
 session_start();
 if(!($_SESSION['loggedIn'])){
 	header('Location: /landingmobile.php?invalidsess=1');
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

 	<title>Home</title>
 	<link rel="icon" href="img/pilogo.png">
 	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<!-- Scripts -->
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

 	<!-- Bootstrap core CSS -->
 	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="loadingButtonOverride.css">

 	<!-- Custom fonts for this template -->
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
 	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

 	<!-- https://codepen.io/mallendeo/pen/eLIiG-->
 	<link rel="stylesheet" type="text/css" href="toggleButton.css">
 	<link rel="stylesheet" type="text/css" href="loadingDiv.css">

 	<!-- Custom styles for this template -->
 	<link href="css/resume.css" rel="stylesheet">

 	<link rel="stylesheet" type="text/css" href="stylepopup.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

 	<style type="text/css">
 	.alignDiv{
 		padding-left: 42%;
 	}
 </style>

</head>

<body id="page-top" style="background-color: white;" onload="getGPIOstats();reloadCheck();websyncCheck();">


	<div style="vertical-align:middle; text-align:center;padding-top: 20px;padding-bottom: 60px;" id="main">
		<img src="img/pilogo.png" style="width: 144px;height: 180px;">  
		<h2 style="font-family: 'Saira Extra Condensed', serif;
		font-weight: 700;
		text-transform: uppercase;
		color: #343a40;">Smart
		<span style="color: black;">Home</span></h2>
	</div>

	<section class="resume-section p-3 p-lg-5 d-flex d-column" id="home">
		<divclass="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
		<nav class="menu">

			<input type="checkbox" href="#" name="menu-open" id="menu-open" class="menu-open">
			<label class="menu-open-button" for="menu-open">
				<span class="lines line-1"></span>
				<span class="lines line-2"></span>
				<span class="lines line-3"></span>
			</label>

			<a class="menu-item js-scroll-trigger" href="#temp"><i class="fa fa-fw fa-thermometer"></i></a>
			<a class="menu-item js-scroll-trigger" href="#hum"><i class="fa fa-fw fa-tint"></i></a>
			<a class="menu-item js-scroll-trigger" href="../dataLogging/dataTable.php"><i class="fa fa-fw fa-info-circle"></i></a>
			<a class="menu-item js-scroll-trigger" href="logout.php"><i class="fa fa-fw fa-sign-out-alt"></i></a>
			<a class="menu-item js-scroll-trigger" href="#frontd"><i class="fa fa-fw fa-camera-retro"></i></a>
			<a class="menu-item js-scroll-trigger" href="#ligtcont"><i class="fa fa-fw fa-lightbulb"></i></a>
		</nav>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

	</section>

	<form id="myform">
		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="temp">
			<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">

				<h2 class="mb-5">Temprature Controls</h2>

				<label for="ac1">A/C Living Room </label>
				<div class="alignDiv">

					<input class="tgl tgl-ios" id="ac1" name="ac1" type="checkbox"/ >
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac1"></label> 

				</div>
				<br>

				<label for="ac2">A/C Living BedRoom </label>
				<div class="alignDiv">

					<input class="tgl tgl-ios" id="ac2" name="ac2" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac2"></label>
				</div>
				<br>

				<label for="heat1">Heater Living Room </label>
				<div class="alignDiv">
					<input class="tgl tgl-ios" id="heat1" name="heat1"  type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat1"></label>
				</div>

				<br>

				<label for="heat2">Heater Bedroom </label>
				<div class="alignDiv">

					<input class="tgl tgl-ios" id="heat2" name="heat2" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat2"></label>
				</div>
				<br><br>

				<input name="submit" class="btn btn-primary btn-danger" id="send_pi4" type="button" value="Sync-pi">
				<br><br>
				<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('../homepage/tempChart/tempGraph.html')" value="Log">

				<div style="padding-top: 10px;">
					<span class="fa-stack fa-lg">
						<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
					</span>	
				</div>

			</div>

		</section>

		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="ligtcont">
			<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
				<h2 class="mb-5">Light Controls</h2>
				<label for="lamp1">Living Room </label>
				<div class="alignDiv">
					<input class="tgl tgl-ios" id="lamp1" name="lamp1" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp1"></label> 
				</div>
				<br>

				<label for="lamp2">Beedroom kids </label>
				<div class="alignDiv">
					<input class="tgl tgl-ios" id="lamp2" name="lamp2"  type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp2"></label> 
				</div>
				<br>
				<label for="cb7">Beedroom parents (Disabled)</label>
				<div class="alignDiv">
					<input class="tgl tgl-iosd" id="cb7" name="cb7" type="checkbox"/ disabled>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb7"></label>  
				</div>

				<br>

				<label for="cb8">Play room (Disabled)</label>
				<div class="alignDiv">
					<input class="tgl tgl-iosd" id="cb8" name="cb8" type="checkbox"/ disabled>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb8"></label> 
				</div>
				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi3" type="button" value="Sync-pi">


				<div style="padding-top: 10px;">
					<span class="fa-stack fa-lg">
						<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
					</span>	
				</div>
			</div>

		</section>

		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="hum">
			<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
				<h2 class="mb-5">Humidity Controls</h2>


				<label for="hum1">Living Room </label>
				<div class="alignDiv">
					<input class="tgl tgl-ios" id="hum1" name="hum1" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum1"></label> 
				</div>
				<br>

				<label for="hum2">Beedroom kids </label>
				<div class="alignDiv">
					<input class="tgl tgl-ios" id="hum2" name="hum2" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum2"></label>   
				</div>
				<br>

				<label for="cb11">Beedroom parents (Disabled)</label>
				<div class="alignDiv">
					<input class="tgl tgl-iosd" id="cb11" name="cb11" type="checkbox"/ disabled>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb11"></label> 
				</div>
				<br>

				<label for="cb12">Play room (Disabled)</label>
				<div class="alignDiv">
					<input class="tgl tgl-iosd" id="cb12"  name="cb12" type="checkbox"/ disabled>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb12"></label> 
				</div>

				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi2" type="button" value="Sync-pi">
				<br><br>
				<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('../homepage/humidityChart/humidityGraph.html')" value="log">
				<div style="padding-top: 10px;">
					<span class="fa-stack fa-lg">
						<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
					</span>	
				</div>
			</div>
		</section>
</form>
		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="frontd">
			<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
				<h2 class="mb-5">Front Door Controls</h2>
				<div>
 							<label for="door1">Front Door</label><br>
 							<button class="tester" id="door1" onclick="loadDoor();">Force Open</button>
 						</div>

 						<br>
 						<div>
 							<label for="door2">Back Door (Disabled) </label><br>
 							<button class="tester" style="background-color: #ab8487" id="door2" disabled>Force Open</button>
 						</div>
				<br><br>
				<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('http://192.168.137.242:5000')" value="Log"> 
				
				<div style="padding-top: 10px;">
					<span class="fa-stack fa-lg">
						<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
					</span>	
				</div>
			</div>

		</section>
	


 	<!-- Bootstrap core JavaScript -->
 	<script src="vendor/jquery/jquery.min.js"></script>
 	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 	<!-- Plugin JavaScript -->
 	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 	<!-- Custom scripts for this template -->
 	<script src="js/resume.min.js"></script>
 	<div id="loaddiv"><div class="loading-wheel"></div></div>

 	<!-- JavaScript syncronization control -->
 	<script type="text/javascript" src="syncControl.js"></script>


</body>

</html>
