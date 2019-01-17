<?php
        require "init.php";//needed for connection with database
        $name = $_POST["Name"];
        $Password = $_POST["Password"];
        
        if($name !="" && $Password !="")
        {
            session_start();
            $_SESSION["username"] = $name;
            $_SESSION["password"] = $Password;
            session_commit();
             echo "admin/dashboard.html" ;
            // $ch = curl_init();

            // // set URL and other appropriate options
            // curl_setopt($ch, CURLOPT_URL, "http://www.google.com/");
            // curl_setopt($ch, CURLOPT_HEADER, 0);

            // // grab URL and pass it to the browser
            // curl_exec($ch);
        }
        else
            echo "check";
       
?> 