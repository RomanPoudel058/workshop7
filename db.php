<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'herald_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>