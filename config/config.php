<?php

$hostname = 'codeminz.com'; // Replace with your database hostname
$username = 'u908018477_root'; // Replace with your database username
$password = '*Us8N&>jb@m'; // Replace with your database password
$dbname = 'u908018477_ems_ajax_php';   // Replace with your database name

// Create a MySQLi instance
$mysqli = new mysqli($hostname, $username, $password, $dbname);

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
