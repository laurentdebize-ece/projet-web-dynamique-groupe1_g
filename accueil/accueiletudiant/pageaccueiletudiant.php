<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'omnesmyskillsfinal';
// ATTENTION lena tu dois mettre 'root'

$conn = mysqli_connect($host, $user, $pass, $dbname);

$competences = $bdd->query(’SELECT nom FROM competences’);

$competences->closeCursor();
?>