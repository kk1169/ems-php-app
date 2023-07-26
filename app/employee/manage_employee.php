<?php

$data = array();
$error = "";
include "../../config/config.php";

if (isset($_GET['action'])) {

    $action = $_GET['action'];

    switch ($action) {
        case 'create':

            $name = $_POST['name'];
            $email = $_POST['email'];

            // This is server side validation
            if (empty($name) && empty($email)) {
                $data["status"] = FALSE;
                $data["error"] = "All fields required";
            } else {
                $query = "INSERT INTO employee(name, email) VALUES('$name', '$email')";
                $result = $mysqli->query($query);
                $data["status"] = TRUE;
                $data["message"] = "Employee added successfully";
            }

            break;
        case 'update':

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            // This is server side validation
            if (empty($name) && empty($email)) {
                $data["status"] = FALSE;
                $data["error"] = "All fields required";
            } else {
                $query = "UPDATE employee SET name='$name', email='$email' WHERE id=$id";
                $result = $mysqli->query($query);
                $data["status"] = TRUE;
                $data["message"] = "Employee updated successfully";
            }

            break;

        case 'delete':

            $id = $_GET['id'];
            $query = "DELETE FROM employee WHERE id=$id";
            $result = $mysqli->query($query);
            $data["status"] = TRUE;
            $data["message"] = "Employee deleted successfully";

            break;

        case 'get':

            $id = $_GET['id'];
            $query = "SELECT * FROM employee WHERE id=$id";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $data["data"] = $row;
            $data["status"] = TRUE;

            break;
        default:

            $query = "SELECT * FROM employee";
            $result = $mysqli->query($query);

            while ($row = $result->fetch_assoc()) {
                $data["data"][] = $row;
            }
            $data["status"] = TRUE;
            break;
    }
}




echo json_encode($data);
