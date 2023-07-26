<?php

$hostname = 'localhost'; // Replace with your database hostname
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$dbname = 'ems_php_app';   // Replace with your database name

// Create a MySQLi instance
$mysqli = new mysqli($hostname, $username, $password, $dbname);

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
