<?php
    //php to add info into database `admin_user`
    $Username = $_POST["name"];
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];
    $value3 = $_POST["value3"];
    $value4 = $_POST["value4"];
    $value5 = $_POST["value5"];

    // echo $Username.$value1.$value2.$value3.$value4.$value5.$value6;
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

    
    // echo $Username.$value1.$value2.$value3.$value4.$value5;

    require "init.php";//needed for connection with database
    $count = 1;


    $sql_query =  "SELECT * FROM `admin_role` ORDER BY `id` ASC ";//SQL command
    $result = mysqli_query($con,$sql_query);
    while($row=mysqli_fetch_array($result)){
        $count = $row[0];
        // echo $row[0]." ";
        // $count +=1;
    }
    $count +=1;
    $sql_query =  "INSERT INTO `admin_role`(`id`, `role name`, `user`, `role manage`, `report`, `news`, `slider`) VALUES ($count,'$Username',$value1,$value2,$value3,$value4,$value5)";//SQL command
    $result = mysqli_query($con,$sql_query);
    //     echo $Username. $Type.$Password;
    //  echo "result= ".$result."count=".$count;

       
?> 