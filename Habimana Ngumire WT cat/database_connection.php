<?php
// Database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "food_wastage_reduction_management_system";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>