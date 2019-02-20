<?php
    //php to update user info into database `admin_user`
    $Username = $_POST["name"];
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];
    $value3 = $_POST["value3"];
    $value4 = $_POST["value4"];
    $value5 = $_POST["value5"];
    $Uid = $_POST["uid"];

    if($value1 == "true"){
        $value1 = 1;}
    else{
        $value1 = 0;}
    if($value2 == "true"){
        $value2 = 1;}
    else{
        $value2 = 0;}
    if($value3 == "true"){
        $value3 = 1;}
    else{
        $value3 = 0;}
    if($value4 == "true"){
        $value4 = 1;}
    else{
        $value4 = 0;}
    if($value5 == "true"){
        $value5 = 1;}
    else{
        $value5 = 0;}

    require "init.php";//needed for connection with database

    $sql_query =  "UPDATE `admin_role` SET `role name`='$Username',`user`=$value1,`role manage`=$value2,`report`=$value3,`news`=$value4,`slider`=$value5 WHERE `id`  = $Uid";//SQL command
    $result = mysqli_query($con,$sql_query);
    //     echo $Username. $Type.$Password;
     echo $result ;

       
?> 