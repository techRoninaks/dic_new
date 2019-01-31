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

    $headline = $_POST["Headline"];
    $subheadline = $_POST["Subheadline"];
    $news = $_POST["News"];
    $date = date('Y-m-d');
    $id = 0;
    //$img = '';
    
    $sql_query =  "SELECT * FROM  `news`";//SQL command
    $result = mysqli_query($con,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $id = $row[0];
    }//
    $id+=1;
    //$img = (string)$id;
    
    $sql_query =  "INSERT INTO `news`(`ID`,`date`,`headline`, `subheadline`, `content`) VALUES ('$id','$date','$headline','$subheadline','$news')";//SQL command
    
    $result = mysqli_query($con,$sql_query);
    echo $result;
?> 