<?php
	require "init-admin.php"; 

    $id = $_POST["id"];
    $sql_query =  "SELECT * FROM `news` WHERE `ID` = $id";
    $result = $con->query($sql_query);
    if($result){
        $row = $result->fetch_array();
        echo $row['headline'].":".$row['subheadline'].":".$row['content'].":".$row['ID'];
    }
    else{
        echo "<script>alert('Edit failed!');window.location = 'http://understandable-blin.hostingerapp.com/zzDIC/admin/news-feed.html';</script>";
    }
?>