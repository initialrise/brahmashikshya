<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "brahmashikshya";
$conn = mysqli_connect($host,$user,$pass,$dbname);

if(!$conn){
    die("Connection failed");
}
?>