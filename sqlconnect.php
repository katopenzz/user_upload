<?php

$DBServer = 'localhost';
//'server name or IP address'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'root';
//$DBPass   = 'rewr1t3';
$DBPass   = '';
$DBName   = 'user_upload';

$conn = new mysqli("localhost", "root", "passwddb", "user_upload");
//$conn = new mysqli("localhost", "root", "rewr1t3", "developerexercise");

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $mysqli->connect_error ;
}
?>