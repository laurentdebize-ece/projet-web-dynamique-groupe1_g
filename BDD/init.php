<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'omnesmyskillsfinal';

$conn = mysqli_connect($host, $user, $pass, $dbname);
$requete = mysqli_query($conn,' SELECT nom FROM competences ');

?>