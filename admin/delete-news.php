<?php
	require "init-admin.php";
    $id = $_POST["id"];
    $counter = 0;
    $target_dir = "assets/img/news";
    if($id == -1){
        $sql_query =  "DELETE FROM `news`;";//SQL command
        $result = mysqli_query($con,$sql_query);
        $counter = 1;
    }
    else{
        $sql_query =  "DELETE FROM `news` WHERE `ID` = $id";//SQL command
        $result = mysqli_query($con,$sql_query);
    }
    if(file_exists($target_dir) && $counter == 0){ //check if image file exists
        $files = glob($target_dir."/*"); // get all file names
        foreach($files as $file){
            $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $bname = basename($file,".".$imageFileType);
            if($bname == (string)$id){
                unlink($file);
            }
        }
    }
    else if(file_exists($target_dir) && $counter == 1){
        $files = glob($target_dir."/*"); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                unlink($file); 
                //delete file
            }
        }
    }
    else{
        //echo "no file";
    }
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
    
	    $sql_query =  "INSERT INTO `news`(`ID`) VALUES = 0";//SQL command
        $result = mysqli_query($con,$sql_query);
        echo "<tr></tr></table><pre align='middle'>News Box Empty</pre><table>";

	}
	// 	$conn->close();
 ?>