<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "omnesmyskillsfinal";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête pour récupérer les résultats des autoévaluations
$query = "SELECT * FROM autoevaluations";

$result = $conn->query($query);

$rows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Renvoyer les données des autoévaluations sous forme de JSON
header('Content-Type: application/json');
echo json_encode($rows);
?>


