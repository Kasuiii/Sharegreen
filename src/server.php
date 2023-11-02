<?php
$name = "localhost";
$username = "root";
$password = "";
$dbName = "sharegreen";

// $name = "localhost";
// $username = "u152702107_sharegreenth";
// $password = "f]K8k66w47";
// $dbName = "u152702107_sharegreenth";

$conn = new mysqli($name, $username, $password, $dbName);


if ($conn->connect_errno) {
    echo $conn->connect_error;
    exit;
}
