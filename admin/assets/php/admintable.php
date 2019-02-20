<?php
        //php to get info from database `admin_user` and `admin_type`
        require "init.php";//needed for connection with database
        
         $sql_query =  "SELECT * FROM `admin_user` ORDER BY `id` ASC ";//SQL command
         $result = mysqli_query($con,$sql_query);
         $count = 0;
        while($row=mysqli_fetch_array($result)){
                $count += 1; 
             echo "<tr><td id=".$row[0]."0".">".$row[0]."</td>
             <td id=".$row[0]."1".">".$row[1]."</td>
             <td id=".$row[0]."2".">".$row[2]."</td>
             <td ><input id=".$row[0]."3"."  type='password' class= hidetext value=".$row[3]." disabled='disabled'>"."</td>
             <td id=".$row[0]."4".">".$row[4]."</td>
             <td><button class='btn edit' onclick=editrow('edituser','$row[0]');></button><button class='btn delete' onclick= deleteUser($row[0])></button></td></tr>";
        //      <td><input id="."edit"." type="."checkbox"." name="."value"." value="."yes"." onClick="."onClicker();"."> Edit<br><input id="."delete"." type="."checkbox"." onclick="."myDeleteFunction(0);"."> Delete</td></tr>";
        // echo $count;
        }
        echo ":";
        $sql_query = "SELECT * FROM `admin_role` ";
        $result =  mysqli_query($con,$sql_query);
        while($row=mysqli_fetch_array($result)){
                echo "<li><a onclick="."replaceText('$row[1]');".">".$row[1]."</a></li>";
        }
       
?> 