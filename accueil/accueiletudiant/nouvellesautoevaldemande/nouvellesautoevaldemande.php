<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "omnesmyskillsfinal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

if (!isset($_SESSION['emaileleve'])) {
    echo "Vous devez vous connecter pour accéder à cette page.";
    exit;
}

$eleveEmail = $_SESSION['emaileleve'];

$sql = "SELECT competences.nom, prof_email FROM demandes_autoeval
        INNER JOIN competences ON demandes_autoeval.competence_id = competences.id
        WHERE eleve_email = '$eleveEmail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Mes demandes d'auto-évaluation</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Compétence : " . $row['nom'] . "</li>";
        echo "<li>Professeur : " . $row['prof_email'] . "</li>";
        echo "<br>";
    }
    echo "</ul>";
} else {
    echo "Aucune demande d'auto-évaluation trouvée.";
}

$conn->close();
?>
