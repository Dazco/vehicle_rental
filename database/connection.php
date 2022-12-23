<?php
$servername = "localhost";
$dbname = "vehicleDB";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error());
}