<?php
        require "init.php";//needed for connection with database
        
         $sql_query =  "SELECT * FROM `data_db`";//SQL command
         $result = mysqli_query($con,$sql_query);
        while($row=mysqli_fetch_array($result)){
            //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
             echo nl2br("<td class=body-item mbr-fonts-style display-7>".$row[0] ."</td><td class=body-item mbr-fonts-style display-7>".$row[1]."</td><td class=body-item mbr-fonts-style display-7>".$row[2]."</td><td class=body-item mbr-fonts-style display-7>".$row[3]."</td><td class=body-item mbr-fonts-style display-7>".$row[4]."</td></tr>");
        }
        echo ":";
        $sql_query =  "SELECT * FROM `data_gala` ";//SQL command
        $result = mysqli_query($con,$sql_query);
       while($row=mysqli_fetch_array($result)){
            //  echo $row[0] ."`". $row[1]."`".$row[2];//returning results 
             echo nl2br("<td class=body-item mbr-fonts-style display-7>".$row[0] ."</td><td class=body-item mbr-fonts-style display-7>".$row[1] ."</td><td class=body-item mbr-fonts-style display-7>".$row[2] ."</td></tr>");
       }
       echo ":";
        $sql_query =  "SELECT * FROM `data_iemini` ";//SQL command
        $result = mysqli_query($con,$sql_query);
       while($row=mysqli_fetch_array($result)){
           //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
            echo nl2br("<td class=body-item mbr-fonts-style display-7>".$row[0] ."</td><td class=body-item mbr-fonts-style display-7>".$row[1] ."</td><td class=body-item mbr-fonts-style display-7>".$row[2] ."</td><td class=body-item mbr-fonts-style display-7>".$row[3] ."</td></tr>");
       }
       echo ":";
        $sql_query =  "SELECT * FROM `data_mie`  ";//SQL command
        $result = mysqli_query($con,$sql_query);
       while($row=mysqli_fetch_array($result)){
           //  echo  nl2br($row[0] .":". $row[1].":".$row[2].":".$row[3].":".$row[4]."\n");//returning results 
            echo nl2br("<td class=body-item mbr-fonts-style display-7>".$row[0] ."</td><td class=body-item mbr-fonts-style display-7>".$row[1] ."</td><td class=body-item mbr-fonts-style display-7>".$row[2] ."</td></tr>");
       }
       
?> 