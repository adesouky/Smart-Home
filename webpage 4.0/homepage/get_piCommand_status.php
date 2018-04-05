<?php 	
$host="localhost";
$user="root";
$password="Koko2009";
$db="statusFlags";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);
$sql="SELECT status FROM `isPiCommandDone` WHERE `id` = 1";
$ans= mysqli_query($get,$sql);

$data = array();
foreach ($ans as $row) {
	$data[] = $row;
}

//Print data in JSON format
echo implode($data[0]);

?>