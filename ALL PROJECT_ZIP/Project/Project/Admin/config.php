<?php
session_start();
$host="localhost";
$user="root";
$password="";
$database="php44";
$port="3306";
$con=mysqli_connect($host, $user, $password, $database, $port);
if(!$con){
    echo "Error in database connection";
}
?>