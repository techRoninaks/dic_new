<?php
        // require "init.php";//needed for connection with database
        session_start();
        if($_SESSION["username"] != "")
        {
            echo "check";
        }
        else
            echo "`../login.html"
       
?> 