<?php
$host = "localhost";
$user = "root";   // default for XAMPP
$pass = "";       // leave empty unless you set a password
$dbname = "hospital_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>