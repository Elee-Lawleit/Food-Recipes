<?php

$host = "localhost";
$admin = "root";
$password = "";
$database = "foodrecipes";

$conn = mysqli_connect($host, $admin, $password, $database);

if(!$conn){
    die("Database Connection Error: " . mysqli_connect_error());
}