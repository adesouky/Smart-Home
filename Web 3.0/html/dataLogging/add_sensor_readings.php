<?php
    $host="localhost";
    $user="root";
    $password="Koko2009";
    $db="sensordata";
 
    $get=mysqli_connect($host,$user,$password);
    $selected = mysqli_select_db($get,$db);

    // Prepare the SQL statement
    date_default_timezone_set('Europe/Athens');
    $dateS = date('m/d/Y h:i:s', time());
    echo $dateS;
    $SQL = "INSERT INTO `sensorReadings` (`ID`, `date`, `temperature`, `humidity`, `pressure`) VALUES (NULL,'$dateS','".$_GET["temp"]."','".$_GET["hum"]."','".$_GET["pr"]."')"; 

    // Execute SQL statement
    mysqli_query( $get,$SQL);
    header("Location: dataTable.php");
?>