<?php 
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "Userlist";

$conn = new mysqli($servername,$user,$password,$dbname) or die("connection".$conn->errno);
if ($conn->connect_error){
    die($conn->connect_error);
}
?>