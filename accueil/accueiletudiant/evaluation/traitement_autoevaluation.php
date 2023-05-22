<?php
session_start();

require_once '../../../BDD/init.php';

// Vérifier si l'utilisateur est connecté et si son e-mail est disponible dans $_SESSION
if (!isset($_SESSION['emaileleve'])) {
    echo "Erreur : L'e-mail de l'utilisateur n'est pas disponible.";
    exit;
}

// Récupérer l'e-mail de l'utilisateur à partir de $_SESSION
$emailEleve = $_SESSION['emaileleve'];

// Récupérer les données du formulaire
$idCompetence = $_POST['id'];
$evaluation = $_POST['evaluation'];
$destinataire = $_POST['destinataire'];


// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer le dernier numéro d'évaluation enregistré
$query = "SELECT MAX(numeval) as last_eval FROM evaluations";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$lastEval = $row['last_eval'];
$newEvalNum = $lastEval + 1;

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO evaluations (numeval, id, evaluation, emaileleve, emailprof) VALUES (?, ?, ?, ?, ?)");

// Vérifier si la préparation de la requête a échoué
if (!$stmt) {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
    exit;
}

$stmt->bind_param("iisss", $newEvalNum, $idCompetence, $evaluation, $emailEleve, $destinataire);

if ($stmt->execute()) {
    echo "L'évaluation a été enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de l'évaluation : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


