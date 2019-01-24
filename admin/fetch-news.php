<?php
	$dbname = "u694003942_dicd";
    $username = "u694003942_dicd";
    $password = "qwerty";
    $servername = "localhost";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	   // die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM `news`";
	$result = $conn->query($sql);
	$number = 4;
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<thead><th>ID</th><th>DATE</th><th>HEADLINE</th><th>SUBHEADLINE</th><th>ACTIONS</th><th>CONTENT</th></thead><tbody>";
        while($row = $result->fetch_array()) {
    		echo "<tr>";
    		$n = 0;
    		while($n<$number){  
    		   
    			echo "<td>".$row[$n]."</td>";
    		    $n+=1;
    		}
    		
    		echo "<td><img src='assets/img/camera-button.png'>        ";
    		echo "<img src='assets/img/edit-button.png' >       ";
    		echo "<img src='assets/img/delete-button.png' onclick='delete_news($row[0])'></td></tr>";
    	}
    	echo "</tbody>";
	} else {
	   echo "<tr></tr></table><pre align='middle'>News Box Empty</pre><table>";
	}
	// 	$conn->close();
	?> 
