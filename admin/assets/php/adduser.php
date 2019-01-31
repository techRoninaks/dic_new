<?php
    //php to add info into database `admin_user`
    $Username = $_POST["username"];
    $Type = $_POST["type"];
    $Password = $_POST["password"];
    $Email = $_POST["email"];

    $count = 0;

    require "init.php";//needed for connection with database

    $sql_query =  "SELECT * FROM `admin_user` ORDER BY `id` ASC ";//SQL command
    $result = mysqli_query($con,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $count = $row[0];
        echo $row[0]." ";
        // $count +=1;
    }
    $count +=1;
    $sql_query =  "INSERT INTO `admin_user`(`id`, `username`,`email`, `password`, `type`) VALUES ('$count','$Username','$Email','$Password','$Type')";//SQL command
    $result = mysqli_query($con,$sql_query);
    //     echo $Username. $Type.$Password;
     echo "result= ".$result."count=".$count;

       
?> 