<?php
	require "init-admin.php"; 

    $id = $_POST["id"];
    $sql_query =  "SELECT * FROM `news` WHERE `ID` = $id";
    $result = $con->query($sql_query);
    if($result){
        $row = $result->fetch_array();
        echo $row['headline'].":".$row['subheadline'].":".$row['content'].":".$row['ID'];
    }
?>