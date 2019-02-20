<?php
        //php to get info from database `admin_user` and `admin_type`
        require "init.php";//needed for connection with database
        
         $sql_query =  "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'admin_role'ORDER BY ORDINAL_POSITION";
         //SQL command
         $result = mysqli_query($con,$sql_query);
         $count = 0;
        while($row=mysqli_fetch_array($result)){
                $count += 1; 

                echo " <th>".$row["COLUMN_NAME"]."</th>";
                

            //  echo "<tr><td id=".$row[0]."0".">".$row[0]."</td>
            //  <td id=".$row[0]."1".">".$row[1]."</td>
            //  <td id=".$row[0]."2".">".$row[2]."</td>
            //  <td ><input id=".$row[0]."3"."  type='password' class= hidetext value=".$row[3]." disabled='disabled'>"."</td>
            //  <td id=".$row[0]."4".">".$row[4]."</td>
            //  <td><button class='btn edit' onclick=editrow('edituser','$row[0]');></button><button class='btn delete' onclick= deleteUser($row[0])></button></td></tr>";
        //      <td><input id="."edit"." type="."checkbox"." name="."value"." value="."yes"." onClick="."onClicker();"."> Edit<br><input id="."delete"." type="."checkbox"." onclick="."myDeleteFunction(0);"."> Delete</td></tr>";
        //  echo $count;
        // echo json_encode($row["COLUMN_NAME"]);
        }
        echo ":";
        $result = mysqli_query($con,$sql_query);
        $count = 1 ;
       while($row=mysqli_fetch_array($result)){
               if($row["COLUMN_NAME"] != "id"){
                   if($row["COLUMN_NAME"] != "role name")
                   {
                    $count += 1;
                    // echo "<input  type='checkbox' name='".$row["COLUMN_NAME"]."' value='".$row["COLUMN_NAME"]."' > ".$row["COLUMN_NAME"]."";
                    echo "<input class='w3-check' id='formdata".$count."' type='checkbox'>
                    <label>".$row["COLUMN_NAME"]."</label> &nbsp;";
                }
               }
               
       }
        echo ":";
        $sql_query = "SELECT * FROM `admin_role` ";
        $result = mysqli_query($con,$sql_query);
        $count = 0;
       while($row=mysqli_fetch_array($result)){
               $count += 1; 
            echo "<tr><td id=".$row[0]."0".">".$row[0]."</td>
            <td id=".$row[0]."1".">".$row[1]."</td>
            <td id=".$row[0]."2".">".$row[2]."</td>
            <td id=".$row[0]."3".">".$row[3]."</td>
            <td id=".$row[0]."4".">".$row[4]."</td>
            <td id=".$row[0]."5".">".$row[5]."</td>
            <td id=".$row[0]."6".">".$row[6]."</td>";
            echo "<td><button class='btn edit' onclick=editRowRole('editrole','$row[0]');></button><button class='btn delete' onclick= deleteRole($row[0])></button></td>";

        //     <td ><input id=".$row[0]."3"."  type='password' class= hidetext value=".$row[3]." disabled='disabled'>"."</td>
        //     <td id=".$row[0]."4".">".$row[4]."</td>
        //     <td><button class='btn edit' onclick=editrow('edituser','$row[0]');></button><button class='btn delete' onclick= deleteUser($row[0])></button></td></tr>";
       //      <td><input id="."edit"." type="."checkbox"." name="."value"." value="."yes"." onClick="."onClicker();"."> Edit<br><input id="."delete"." type="."checkbox"." onclick="."myDeleteFunction(0);"."> Delete</td></tr>";
       //  echo $count;
       // echo json_encode($row["COLUMN_NAME"]);
       }
?> 