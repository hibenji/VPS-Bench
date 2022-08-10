<?php

$servername = "localhost";
$username = "mysql_user";
$password = "mysql_password";
$dbname = "mysql_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>