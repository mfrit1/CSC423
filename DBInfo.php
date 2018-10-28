<?php

$servername = "localhost";
$username = "root";
$password = "fku";
$database = "test_database";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>