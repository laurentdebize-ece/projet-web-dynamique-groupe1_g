<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'omnesmyskillsfinal';

$conn = mysqli_connect($host, $user, $pass, $dbname);


$competences = $conn->query('SELECT nom FROM competences');
echo 
for each($competences to $competences)

while ($row = $competences->fetch_assoc()) {
    echo '<p>Nom : ' . $row['nom'] . ',<br></p>';
}

$competences->free_result();
$conn->close();
?>