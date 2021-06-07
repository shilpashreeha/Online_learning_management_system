<?php
$db_host = "localhost";
$db_user = "elearn";
$db_password = "elearn@123";
$db_name = "online_learning";

//Create Connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

//Check Connection
if($conn->connect_error){
    die("connection failed");
}

?>