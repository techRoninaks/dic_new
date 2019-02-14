<?php 
    $dbname = "u694003942_dicd";
    $username = "u694003942_dicd";
    $password = "qwerty";
    $servername = "localhost";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
    }
?>