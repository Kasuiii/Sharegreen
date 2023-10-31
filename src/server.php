<?php
$name = "localhost";
$username = "root";
$password = "";
$dbName = "sharegreen";

$conn = new mysqli($name, $username, $password, $dbName);


if ($conn->connect_errno) {
    echo $conn->connect_error;
    exit;
}
