<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "TimePerfume_database";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
} 

//echo "Database connected successfully";
///الى هنا الكود دايم نفسه اللهم اغير db 

