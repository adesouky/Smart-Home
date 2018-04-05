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

<body id="page-top" onload="getGPIOstats();reloadCheck();">
	<div style="padding-top: 20px;padding-left: 10px;">
		<div>
			<img src="img/pilogo.png" width="120" height="150">
		</div>

	</div>	
	<div>
		<form id="myform">

			<!-- Temp control section -->

			<div class="boxFix"> 
				<h2 class="mb-5">Temprature </h2>
				<div class="sizeFix">
					<label for="cb1">Living Room </label>
					<input class="tgl tgl-ios" id="cb1" name="cb1" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb1"></label> 


				</div>
				<br>
				<div class="sizeFix">
					<label for="cb2">Beedroom kids </label>
					<input class="tgl tgl-ios" id="cb2" name="cb2" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb2"></label>
				</div>
				<br>
				<div class="sizeFix">
					<label for="cb3">Beedroom parents </label>
					<input class="tgl tgl-ios" id="cb3" name="cb3"  type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb3"></label>
				</div>

				<br>
				<div class="sizeFix">
					<label for="cb4">Play room </label>
					<input class="tgl tgl-ios" id="cb4" name="cb4" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb4"></label>
				</div>
				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi4" type="button" value="Sync-pi">
			</div>




			<!-- Light control section -->


			<div class="boxFix">
				<h2 class="mb-5">Light</h2>
				<div class="sizeFix">
					<label for="cb5">Living Room </label>
					<input class="tgl tgl-ios" id="cb5" name="cb5" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb5"></label> 
				</div>
				<br>
				<div class="sizeFix">
					<label for="cb6">Beedroom kids </label>
					<input class="tgl tgl-ios" id="cb6" name="cb6"  type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb6"></label> 
				</div>
				<br>
				<div class="sizeFix">
					<label for="cb7">Beedroom parents </label>
					<input class="tgl tgl-ios" id="cb7" name="cb7" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb7"></label>  
				</div>

				<br>
				<div class="sizeFix">
					<label for="cb8">Play room </label>
					<input class="tgl tgl-ios" id="cb8" name="cb8" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb8"></label> 
				</div>
				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi3" type="button" value="Sync-pi">
			</div>



			<!-- Humidity control section -->

			<div class="boxFix">
				<h2 class="mb-5">Humidity</h2>
				<div>
					<label for="cb9">Living Room </label>
					<input class="tgl tgl-ios" id="cb9" name="cb9" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb9"></label> 
				</div>
				<br>
				<div>
					<label for="cb10">Beedroom kids </label>
					<input class="tgl tgl-ios" id="cb10" name="cb10" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb10"></label>   
				</div>
				<br>
				<div>
					<label for="cb11">Beedroom parents </label>
					<input class="tgl tgl-ios" id="cb11" name="cb11" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb11"></label> 
				</div>
				<br>

				<div>
					<label for="cb12">Play room </label>
					<input class="tgl tgl-ios" id="cb12"  name="cb12" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb12"></label> 
				</div>
				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi2" type="button" value="Sync-pi">
			</div>




			<!-- Front door section -->
			<div class="boxFix">
				<h2 class="mb-5">Front Door</h2>
				<div>
					<label for="cb13">Door 1: </label>
					<input class="tgl tgl-ios" id="cb13" name="cb13" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb13"></label> 	
				</div>
				<br>
				<div >
					<label for="cb14">Door 2: </label>
					<input class="tgl tgl-ios" id="cb14" name="cb14" type="checkbox"/>
					<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb14"></label> 	
				</div>
				<br><br>
				<input name="submit" class="btn btn-primary btn-danger" id="send_pi1" type="button" value="Sync-pi"> 
				<br><br>
				<input  class="btn btn-primary btn-danger" type="button" onclick="window.location.replace('http://4b2896c5.ngrok.io/')" value="doorGui"> <br><br>
				<input class="btn btn-primary btn-danger"  type="button" value="Back" onclick="window.location.replace('home.php')">

			</div>





		</form>
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
