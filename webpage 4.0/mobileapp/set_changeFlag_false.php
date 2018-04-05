<?php 	
$host="localhost";
$user="root";
$password="Koko2009";
$db="statusFlags";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);
$sql="UPDATE `changeFlag` SET `status` = 'false' WHERE `changeFlag`.`id` = 1";
mysqli_query($get,$sql);
	echo "Successfully Set change flag status to false";
 ?>