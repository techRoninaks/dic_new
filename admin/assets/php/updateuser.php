<?php
    //php to update user info into database `admin_user`
    $Username = $_POST["username"];
    $Type = $_POST["type"];
    $Password = $_POST["password"];
    $Uid = $_POST["uid"];
    $Email = $_POST["email"];

    require "init.php";//needed for connection with database

    $sql_query =  "UPDATE `admin_user` SET `username`='$Username',`email`='$Email',`password`='$Password',`type`='$Type' WHERE `id`  = $Uid";//SQL command
    $result = mysqli_query($con,$sql_query);
    //     echo $Username. $Type.$Password;
     echo $result;

       
?> 