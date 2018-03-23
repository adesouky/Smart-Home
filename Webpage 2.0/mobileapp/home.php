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
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<title>Home</title>
 	<link rel="icon" href="img/pilogo.png">
 	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

 	<!-- Bootstrap core CSS -->
 	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 	<!-- Custom fonts for this template -->
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
 	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

 	<!-- Custom styles for this template -->
 	<link href="css/resume.css" rel="stylesheet">

 	<link rel="stylesheet" type="text/css" href="stylepopup.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

 </head>

 <body id="page-top" style="background-color: white;">


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
 			<a class="menu-item js-scroll-trigger" href="#main"><i class="fa fa-fw fa-info-circle"></i></a>
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


 	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="temp">
 		<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
 			<h2 class="mb-5">Temprature Controls</h2>


 			<div>
 				<label for="Checkbox1">Living Room </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox1" data-onstyle="danger"  data-width="70" data-height="30" >	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox2">Beedroom kids </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox2" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox3">Beedroom parents </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox3" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>

 			<br>
 			<div>
 				<label for="Checkbox4">Play room </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox4" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<div style="padding-top: 10px;">
 				<ul class="list-inline list-social-icons mb-0"> 
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
 						</span>
 					</li>
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-sync"></i></a>
 						</span>
 						
 					</li>
 				</ul>		
 			</div>
 			
 		</div>

 	</section>

 	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="ligtcont">
 		<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
 			<h2 class="mb-5">Light Controls</h2>


 			<div>
 				<label for="Checkbox5">Living Room </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox5" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox6">Beedroom kids </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox6" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox7">Beedroom parents </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox7" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>

 			<br>
 			<div>
 				<label for="Checkbox8">Play room </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox8" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<div style="padding-top: 10px;">
 				
 				<ul class="list-inline list-social-icons mb-0"> 
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
 						</span>
 					</li>
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-sync"></i></a>
 						</span>

 					</li>
 				</ul>
 			</div>
 		</div>

 	</section>

 	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="hum">
 		<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
 			<h2 class="mb-5">Humidity Controls</h2>


 			<div>
 				<label for="Checkbox9">Living Room </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox9" data-onstyle="danger" data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox10">Beedroom kids </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox10" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox11">Beedroom parents </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox11" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox12">Play room </label>
 				<input type="checkbox"  data-toggle="toggle" data-size="large" id="Checkbox12" data-onstyle="danger"  data-width="70" data-height="30">	
 			</div>

 			<div style="padding-top: 10px;">
 				<ul class="list-inline list-social-icons mb-0"> 
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
 						</span>
 					</li>
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-sync"></i></a>
 						</span>
 						
 					</li>
 				</ul>		
 			</div>
 		</div>
 	</section>

 	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="frontd">
 		<div class="my-auto" style="vertical-align:middle; text-align:center;padding-top: 40px;padding-bottom: 60px;">
 			<h2 class="mb-5">Front Door Controls</h2>


 			<div>
 				<label for="Checkbox13">Lights 1: </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox13" data-onstyle="danger" data-width="70" data-height="30">	
 			</div>
 			<br>
 			<div>
 				<label for="Checkbox14">Lights 2: </label>
 				<input type="checkbox" data-toggle="toggle" data-size="large" id="Checkbox14" data-onstyle="danger" data-width="70" data-height="30">	
 			</div>
 			<div style="padding-top: 10px;">
 				<ul class="list-inline list-social-icons mb-0"> 
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-chevron-up"></i></a>
 						</span>
 					</li>
 					<li class="list-inline-item">
 						<span class="fa-stack fa-lg">
 							<a class="menu-item js-scroll-trigger" href="#main" style="background: none;color: black;"><i class="fa fa-fw fa-sync"></i></a>
 						</span>
 						
 					</li>
 				</ul>	
 			</div>
 		</div>
 	</section>

 </div>

 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Plugin JavaScript -->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for this template -->
 <script src="js/resume.min.js"></script>

</body>

</html>
