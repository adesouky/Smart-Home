<?php
$host="localhost";
$user="root";
$password="Koko2009";
$db="buttonStat";
 
$get=mysqli_connect($host,$user,$password);
mysqli_select_db($get,$db);

if(isset($_POST)){
	$post_string = json_encode($_POST);
	$sql="INSERT INTO `button_table` (`id`, `jsonstring`) VALUES (NULL,'".$post_string."')";
	mysqli_query($get,$sql);
	echo $post_string;
}

?>