<?php
/**
 * Filename: timelinedata.php
 * Description: This collects the data of the history of acceses of smart door that are  stored in a mySQl db 
 * and print it in JSON format
 */

//Setting header to json
header('Content-Type: application/json');

//Database Definition
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'smartdoordb');

//Establish Connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//SQL Query to get data from the table
$query = sprintf("SELECT id, content, start FROM smartdoortable ORDER BY id");

//Execute query
$result = $mysqli->query($query);

//Loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//Free the memory associated with result
$result->close();

//Close connection
$mysqli->close();

//Print data in JSON format
print json_encode($data);