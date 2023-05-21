<?php
session_start();

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "omnesmyskillsfinal";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer le mail de l'utilisateur
if (isset($_SESSION['email'])) {
    $emailProfesseur = $_SESSION['email'];
} else {
    echo "Erreur : L'email de l'utilisateur n'est pas disponible.";
    exit;
}

// Préparer et exécuter la requête pour récupérer les données
$stmt = $conn->prepare("SELECT * FROM evaluation WHERE destinataire = ?");
$stmt->bind_param("s", $emailProfesseur);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si des résultats ont été retournés
if ($result) {
    // Parcourir les résultats et afficher les données
    while ($row = $result->fetch_assoc()) {
        // Accéder aux données par leurs noms de colonnes
        $idCompetence = $row['id'];
        $evaluation = $row['evaluation'];
        $emailEleve = $row['email_eleve'];
        
        // Faire quelque chose avec les données récupérées
        // ...
    }
} else {
    echo "Aucune donnée trouvée.";
}

$stmt->close();
$conn->close();
?>
