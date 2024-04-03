<?php


$serverName = "localhost";
$userName = "root";
$pass = "";
$DB = "market";

$con = mysqli_connect($serverName,$userName,$pass,$DB);

//checking for the errors in the database connections
if(mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}


?>