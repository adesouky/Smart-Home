<?php
    $host="localhost";
    $user="root";
    $password="Koko2009";
    $db="smartdoordb";
 
    $get=mysqli_connect($host,$user,$password);
    $selected = mysqli_select_db($get,$db);

    // Prepare the SQL statement
    $SQL = "INSERT INTO `smartdoortable` (`ID`, `content`, `start`) VALUES (NULL,'".$_GET["con"]."','".$_GET["star"]."')"; 
    // Execute SQL statement
    mysqli_query( $get,$SQL);
?>