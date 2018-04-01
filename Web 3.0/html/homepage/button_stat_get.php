<?php 
$host="localhost";
$user="root";
$password="Koko2009";
$db="buttonStat";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);

$query = sprintf("SELECT  jsonstring FROM button_table ORDER BY id DESC LIMIT 1");
$ans = mysqli_query($get,$query);

$data = array();
foreach ($ans as $row) {
	$data[] = $row;
}

//Print data in JSON format
echo implode($data[0]);

 ?>