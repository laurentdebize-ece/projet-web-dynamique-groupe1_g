<?php
session_start();

if (!isset($_SESSION['emailprof'])) {
    echo "Vous devez vous connecter pour accéder à cette page.";
    exit;
}

require_once '../../../BDD/init.php';

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$profEmail = $_SESSION['emailprof'];
$competenceId = isset($_POST['competence']) ? $_POST['competence'] : null;
$eleveEmail = isset($_POST['eleve']) ? $_POST['eleve'] : null;


$sql = "INSERT INTO demandes_autoeval (competence_id, prof_email, eleve_email)
        VALUES ('$competenceId', '$profEmail', '$eleveEmail')";

if ($conn->query($sql) === TRUE) {
    echo "Demande d'auto-évaluation enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de la demande d'auto-évaluation : " . $conn->error;
}

$conn->close();
?>
