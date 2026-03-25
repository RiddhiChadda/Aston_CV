<?php

$host = "localhost";
$dbname = "dg240233844_P3";
$username = "dg240233844";
$password = "tI9Aqj6Nw9d6rCUg5OrFshcs3";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>