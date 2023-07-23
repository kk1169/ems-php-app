<?php

$data = array();
include "../../config/config.php";

// SQL query to fetch data
$query = "SELECT * FROM employee";

// Execute the query
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $data["data"][] = $row;
}
$data["status"] = TRUE;

echo json_encode($data);
