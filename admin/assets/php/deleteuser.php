<?php
    $Uid = $_POST["uid"];

    require "init.php";//needed for connection with database

    $sql_query =  "DELETE FROM `admin_user` WHERE `id` = $Uid";//SQL command
    $result = mysqli_query($con,$sql_query);
    //     echo $Username. $Type.$Password;
     echo $result;

       
?> 