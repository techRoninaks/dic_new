<?php 
    $dbname = "dictcrco_admin";
    $username = "dictcrco_admin";
    $password = "P@ssw0rd";
    $servername = "localhost";
    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
    }
?>
