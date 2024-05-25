<?php 
$hostname="localhost";
$dbusername = "ahmed";
$dbpassword = "password";
$dbname = "mysql";

try{
    $connection = mysqli_connect("localhost", "ahmed", "password", "mysql");
    echo "";
}
catch (Exception $e){
    echo $e->getMessage();
    exit();
}









?>