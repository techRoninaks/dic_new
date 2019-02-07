<?
	require "init-admin.php";

    $headline = $_POST["Headline"];
    $subheadline = $_POST["Subheadline"];
    $news = $_POST["News"];
    $date = date('Y-m-d');
    $editId = $_POST["editId"];
    $id = 0;
    $counter = 0; //check both data and image have been succesfully uploaded
    
    //DATA VALIDATION
    if($headline == ''||$news == ''){
        echo "<script>alert('*fields are required!');window.history.back();</script>";
    }
    else{
        if($editId!=""){
            $sql_query =  "UPDATE `news` SET `date`='$date',`headline`='$headline',`subheadline`='$subheadline',`content`='$news' WHERE `ID`='$editId';";//SQL command
            $result = mysqli_query($con,$sql_query);
            $id = $editId;
            $counter = -10;
        }
        else {
        //Updating database
                
                $sql_query =  "SELECT * FROM  `news`";
                $result = mysqli_query($con,$sql_query);
                
                while($row=mysqli_fetch_array($result)){
                    $id = $row[0];
                }
                $id+=1;
                $sql_query =  "INSERT INTO `news`(`ID`,`date`,`headline`, `subheadline`, `content`) VALUES ('$id','$date','$headline','$subheadline','$news')";//SQL command
                $result = mysqli_query($con,$sql_query);
                if($result){
                        $counter = 1;
                }
        }//end of else condition to check if we have to insert or edit
        
        //Updating image in folder
         if($_FILES["fileToUpload"]["name"]){       
                $target_dir = 'assets/img/news/';
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            	$uploadOk = 1;
            	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            	$target_file = $target_dir.(string)$id.'.'.$imageFileType;
            
            	// Check if image file is a actual image or fake image
            	if(isset($_POST["submit"])) {
            	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            	    if($check !== false) {
            	        echo "File is an image - " . $check["mime"] . ".";
            	        $uploadOk = 1;
            	    } else {
            	        echo "<script>alert(File is not an image!\nTry again!)";
            	        $uploadOk = 0;
            	    }
            	}
            // 	if ($_FILES["fileToUpload"]["size"] > 500000) {
            // 	    echo "Sorry, your file is too large.";
            // 	    $uploadOk = 0;
            // 	}
                //Allow certain file formats
            	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            	&& $imageFileType != "gif" ) {
            	    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            	    $uploadOk = 0;
            	}
            	// Check if $uploadOk is set to 0 by an error
            	if ($uploadOk == 0) {
            	    //echo "Sorry, your file was not uploaded.";
            	// if everything is ok, try to upload file
            	} else {
            	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            	        $counter+=1;
            	    } else {
            	        //echo "Sorry, there was an error uploading your file.";
            	    }
            	}
         }
         
        if ($counter == 2 || $counter == 1){
            echo "<script>alert('Upload successful!');window.location = 'http://understandable-blin.hostingerapp.com/zzDIC/admin/news-feed.html';</script>";
        }
    	else if ($counter < 0){
    	    echo "<script>alert('Edit successful!');window.location = 'http://understandable-blin.hostingerapp.com/zzDIC/admin/news-feed.html';</script>";
        }
        else{
            echo "<script>alert('Error uploading news.\nOK to reload!'); location.reload();</script>";
        }
    }
?>