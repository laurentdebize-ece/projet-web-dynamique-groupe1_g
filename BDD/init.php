<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'omnesmyskillsfinal';

$conn = mysqli_connect($host, $user, $pass, $dbname);
$db_found = mysqli_select_db($conn, $dbname);
?>