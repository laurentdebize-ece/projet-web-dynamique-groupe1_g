<?php
// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'omnesmyskillsfinal';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
}

// Requête SQL pour récupérer les compétences
$sql = 'SELECT nom, datedecreation, datelimite, statut FROM competences';
$result = $conn->query($sql);

// Tableau pour stocker les compétences
$competences = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $competence = array(
            'nom' => $row['nom'],
            'datedecreation' => $row['datedecreation'],
            'datelimite' => $row['datelimite'],
            'statut' => $row['statut']
        );
        $competences[] = $competence;
    }
}

// Renvoyer les compétences au format JSON
header('Content-Type: application/json');
echo json_encode($competences);

// Fermer la connexion à la base de données
$conn->close();
?>
