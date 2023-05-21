<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "omnesmyskillsfinal";

// Récupérer les données du formulaire
$idCompetence = $_POST['id'];
$evaluation = $_POST['evaluation'];
$emailEleve = $_POST['emaileleve'];
$destinataire = $_POST['destinataire'];

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO evaluations (id, evaluation, emaileleve, emailprof) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $idCompetence, $evaluation, $emailEleve, $destinataire);

if ($stmt->execute()) {
    echo "L'évaluation a été enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de l'évaluation : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>





