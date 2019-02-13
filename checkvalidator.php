<?php
 require "init.php";//needed for connection with database
 $name = $_POST["Name"];
 $Password = $_POST["Password"];
 $flag = 0;
 
 if($name !="" && $Password !="")
 {
     $sql_query =  "SELECT * FROM `admin_user` ORDER BY `id` ASC ";//SQL command
     $result = mysqli_query($con,$sql_query);
     while($row = mysqli_fetch_array($result)){
         if($name == $row[1])
         {
             if($Password == $row[3] ){
                 session_start();
                 $_SESSION["username"] = $row[1];
                 $_SESSION["password"] = $row[3];
                 $_SESSION["type"] = $row[4];
                 $_SESSION["check"] = "check";
                 session_commit();
                 echo "check:admin/dashboard.html" ;
                 $flag =1;
                 break;
             }
             else{
                 echo "invalid:Invalid Username or Password";
             }
         }
         if($name == $row[2])
         {
             if($Password == $row[3]){
                 session_start();
                 $_SESSION["username"] = $name;
                 $_SESSION["password"] = $Password;
                 session_commit();
                 echo "check:admin/dashboard.html" ;
                 $flag =1;
                 break;
             }
             else{
                 echo "invalid:Invalid Username or Password";
             }
         }
         else{
             $flag = 2;//username no match
         }
     }
     if ($flag == 2){
         echo "invalid:Invalid Username or Password";
     }
 }  
?> 