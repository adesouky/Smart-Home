<?php 	
$host="localhost";
$user="root";
$password="Koko2009";
$db="statusFlags";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);
$sql="UPDATE `openDoor` SET `status` = 'false' WHERE `openDoor`.`id` = 1";
mysqli_query($get,$sql);
	readfile("done.html");
 ?>