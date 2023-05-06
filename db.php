<?php
$servername="localhost";
$username="root";
$password="";
$database="shopping";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("connection cannot be established".mysqli_connect_error());
}

?>