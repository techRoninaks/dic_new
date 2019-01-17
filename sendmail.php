<?php
require "init.php";

$to = "ashishkamal17@gmail.com";
$from = $_POST["email"];
$subject = $_POST["name"];
$from2 = $_POST["phone"];
$message = $_POST["message"];

$count  =0 ;

$sql =  "INSERT INTO `data_contact`(`email`, `name`, `phone`, `message`) VALUES ('$from','$subject','$from2','$message')";


if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
// $message .= $from2; 

// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// $headers .= "From: <$from>" . "\r\n";
// // echo $from.":".$from1.":".$from2.":".$from3;

// if (mail($to,$subject,$message,$headers))
// {
//     echo "success1";
// }


?>

