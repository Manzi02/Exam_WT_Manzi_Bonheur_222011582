<?php
// Connection details
$host = "localhost";
$user = "MANZI09";
$pass = "bonheur$07";
$database = "online_project_management_training_platform";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>