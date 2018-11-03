<?php 	
$host="localhost";
$user="root";
$password="Koko2009";
$db="statusFlags";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);
$sql="UPDATE `push-botton` SET `status` = 'true' WHERE `push-botton`.`id` = 1";
mysqli_query($get,$sql);
echo "Successfully pushButton status to true";

?>