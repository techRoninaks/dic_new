<?
	<?php
	$dbname = "u694003942_dicd";
    $username = "u694003942_dicd";
    $password = "qwerty";
    $servername = "localhost";

	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
	   // die("Connection failed: " . $conn->connect_error);
	}

	$id = $_POST['id']
	$sql = "SELECT * FROM `news` WHERE `ID`= $id";

	$result = $con->query($sql);
	if($result){
        $row = $result->fetch_array();
        echo "<script>document.getElementById('Headline').innerHTML = $row['headline']";
        echo "<script>document.getElementById('Subheadline').innerHTML = $row['subheadline']";
        echo "<script>document.getElementById('News').innerHTML = $row['news']";
        exec('read-news.php');
    }
    else{
    	echo "Can't find data!"
    }
?>