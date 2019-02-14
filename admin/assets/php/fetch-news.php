<?php
	require "init.php";
    
    $sql = "SELECT * FROM `news`";
	$result = $con->query($sql);
	$number = 4;
	
	if ($result->num_rows > 0) {
	    //output data of each row
	    echo "<thead><th>ID</th><th>DATE</th><th>HEADLINE</th><th>SUBHEADLINE</th><th>CONTENT</th><th>ACTIONS</th></thead><tbody>";
        while($row = $result->fetch_array()) {
    		echo "<tr>";
    		$n = 0;
    		while($n<$number){  
    		   
    			echo "<td>".$row[$n]."</td>";
    		    $n+=1;
    		}
    		echo "<td><a href='javascript:read_news($row[0])'>Read News...</a></td>";
    		echo "<td><img src='assets/img/camera-button.png' onclick='show_image($row[0])'>        ";
    		echo "<img src='assets/img/edit-button.png' onclick='edit_news($row[0])'>       ";
    		echo "<img src='assets/img/delete-button.png' onclick='delete_news($row[0])'></td></tr>";
    	}
	} else {
        echo "<tr></tr></table><pre align='middle'>News Box Empty</pre><table>";

	}
	// 	$conn->close();
 ?>