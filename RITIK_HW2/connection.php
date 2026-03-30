<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    echo "Database Not Connected.";
}else{
echo    "connected";
}
?>