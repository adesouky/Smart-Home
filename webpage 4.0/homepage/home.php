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
 	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
 	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
 	<link href="css/resume.css" rel="stylesheet">
 	<link href="css/override-style.css" rel="stylesheet">
 	<!-- https://codepen.io/mallendeo/pen/eLIiG-->
 	<link rel="stylesheet" type="text/css" href="toggleButton.css">
 	<link rel="stylesheet" type="text/css" href="loadingDiv.css">
 	<link rel="stylesheet" type="text/css" href="loadingButtonOverride.css">
 	<!-- Scripts -->
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 	<script type="text/javascript" src="mobile_detect.js"></script>

 </head>
 <body id="page-top" onload="getGPIOstats();reloadCheck();websyncCheck();">

 	<!-- Left navigation bar -->
 	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
 		<a class="navbar-brand js-scroll-trigger" href="#page-top">
 			<span class="d-block d-lg-none">G3 Project 2</span>

 			<span class="d-none d-lg-block">
 				<img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/pilogo.png" alt="">
 			</span>
 		</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse" id="navbarSupportedContent">
 			<ul class="navbar-nav">
 				<li class="nav-item">
 					<a class="nav-link js-scroll-trigger" href="#home">Home</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link js-scroll-trigger" href="#tempc">Temprature Control</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link js-scroll-trigger" href="#lightc">Light Control</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link js-scroll-trigger" href="#humc">Humidity Control</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link js-scroll-trigger" href="#fdc">Front Door Control</a>
 				</li>

 			</ul>
 		</div>

 		<input class="btn btn-primary btn-danger"  type="button" value="Vanilla" onclick="window.location.replace('homepage-vanilla.php')"> <br>
 		<input class="btn btn-primary btn-danger"  type="button" value="Logout" onclick="window.location.replace('logout.php')"> <br>

 		<div>
 			<h6 id="dateTime" class="hcolor"></h6>
 			<script>
 				var dt = new Date();
 				document.getElementById("dateTime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."
 				+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
 			</script>
 		</div>


 	</nav>

 	<div class="container-fluid p-0">

 		<!-- Home section -->
 		<section class="resume-section p-3 p-lg-5 d-flex d-column" id="home">
 			<div class="my-auto">

 				<h1 class="mb-0">Smart
 					<span class="text-primary">Home</span>
 				</h1>

 				<div class="subheading mb-5">
 					G3 Project 2 , Pi WebControl
 				</div>
 				<p class="mb-5">This website is a basic GUI to control our Smart home model</p>
 			</div>
 		</section>

 		<form id="myform">

 			<!-- Temp control section -->
 			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tempc">
 				<div class="my-auto">
 					<h2 class="mb-5">Temprature Controls</h2>
 					<div class="box"> 
 						<div>
 							<label for="ac1">A/C Living Room </label>
 							<input class="tgl tgl-ios" id="ac1" name="ac1" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac1"></label> 


 						</div>
 						<br>
 						<div>
 							<label for="ac2">A/C Bedroom</label>
 							<input class="tgl tgl-ios" id="ac2" name="ac2" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="ac2"></label>
 						</div>
 						<br>
 						<div>
 							<label for="heat1">Heater Living Room </label>
 							<input class="tgl tgl-ios" id="heat1" name="heat1"  type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat1"></label>
 						</div>

 						<br>
 						<div>
 							<label for="heat2">Heater Bedroom</label>
 							<input class="tgl tgl-ios" id="heat2" name="heat2" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="heat2"></label>
 						</div>
 						<br><br>
 						<input name="submit" class="btn btn-primary btn-danger" id="send_pi4" type="button" value="Sync-pi">
 					</div>

 					<div class="t-left box" data-tooltip="Log">
 						<a href="tempChart/tempGraph.html"><img src="img/Thermometre.png"  class="imgs" style="width:30%;height:30%;padding-top: 16%;"></a>
 					</div>


 				</div>
 			</section>

 			<!-- Light control section -->
 			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="lightc">
 				<div class="my-auto">
 					<h2 class="mb-5">Light Controls</h2>
 					<div class="box">
 						<div>
 							<label for="lamp1">Living Room </label>
 							<input class="tgl tgl-ios" id="lamp1" name="lamp1" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp1"></label> 
 						</div>
 						<br>
 						<div>
 							<label for="lamp2">Beedroom</label>
 							<input class="tgl tgl-ios" id="lamp2" name="lamp2"  type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="lamp2"></label> 
 						</div>
 						<br>
 						<div>
 							<label for="cb7">Beedroom parents (Disabled) </label>
 							<input class="tgl tgl-iosd" id="cb7" name="cb7" type="checkbox" disabled />
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb7"></label>  
 						</div>

 						<br>
 						<div>
 							<label for="cb8">Play room (Disabled) </label>
 							<input class="tgl tgl-iosd" style="background: grey;" id="cb8" name="cb8" type="checkbox" disabled />
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb8"></label> 
 						</div>
 						<br><br>
 						<input name="submit" class="btn btn-primary btn-danger" id="send_pi3" type="button" value="Sync-pi">
 					</div>
 					<div class="t-left box">
 					<img src="img/light.png" class="imgs" style="width:30%;height:30%;padding-top: 16%;">
 					</div>   
 				</div>
 			</section>

 			<!-- Humidity control section -->
 			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="humc">
 				<div class="my-auto">
 					<h2 class="mb-5">Humidity Controls</h2>
 					<div class="box">
 						<div>
 							<label for="hum1">Living Room </label>
 							<input class="tgl tgl-ios" id="hum1" name="hum1" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum1"></label> 
 						</div>
 						<br>
 						<div>
 							<label for="hum2">Beedroom</label>
 							<input class="tgl tgl-ios" id="hum2" name="hum2" type="checkbox"/>
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="hum2"></label>   
 						</div>
 						<br>
 						<div>
 							<label for="cb11">Beedroom parents (Disabled) </label>
 							<input class="tgl tgl-iosd" id="cb11" name="cb11" type="checkbox" disabled="" />
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb11"></label> 
 						</div>
 						<br>

 						<div>
 							<label for="cb12">Play room (Disabled) </label>
 							<input class="tgl tgl-iosd" id="cb12"  name="cb12" type="checkbox" disabled />
 							<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb12"></label> 
 						</div>
 						<br><br>
 						<input name="submit" class="btn btn-primary btn-danger" id="send_pi2" type="button" value="Sync-pi">
 					</div>
 					<div class="t-left box" data-tooltip="Log">
 						<a href="humidityChart/humidityGraph.html"><img src="img/rain.jpg" class="imgs" style="width:20%;height:20%;padding-top: 20%;"></a>
 					</div>

 				</div>
 			</section>
 					</form>
 			<!-- Front door section -->
 			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="fdc">
 				<div class="my-auto">
 					<h2 class="mb-5">Front Door Controls</h2>

 					<div class="box">
 						<div>
 							<label for="door1">Front Door</label><br>
 							<button class="tester" id="door1" onclick="loadDoor();">Force Open</button>
 						</div>

 						<br>
 						<div>
 							<label for="door2">Back Door (Disabled) </label><br>
 							<button class="tester" style="background-color: #ab8487" id="door2" disabled>Force Open</button>
 						</div>

 						<br><br><br><br><br><br>
 						<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('http://192.168.137.242:5000')" value="doorGui"> 

 					</div>
 					<div class="t-left box" data-tooltip="Log">
 						<a  href="../smartDoorTimeline/timeline.html" ><img src="img/clock.png" class="imgs" style="width:20%;height:20%;padding-top: 10%;"></a>
 					</div>



 				</div>
 			</section>

 
 	</div>
 	
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
