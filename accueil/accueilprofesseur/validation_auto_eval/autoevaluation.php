<?php
session_start();

// Vérifier si l'utilisateur est un professeur
if (!isset($_SESSION['emailprof'])) {
    echo "Accès non autorisé";
    exit;
}

require_once '../../../BDD/init.php';

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer l'email du professeur
$emailProfesseur = $_SESSION['emailprof'];

// Récupérer les données d'évaluation de la table evaluations
$query = "SELECT * FROM evaluations WHERE emailprof = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $emailProfesseur);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si des résultats ont été retournés
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $numEval = $row['numeval'];
        $emailEleve = $row['emaileleve'];
        $numNiveauEval = $row['numniveval'];
        $idCompetence = $row['id'];
        $evaluation = $row['evaluation'];
       
        // Afficher les données de l'évaluation
        echo "Numéro d'évaluation: $numEval<br>";
        echo "Email de l'élève: $emailEleve<br>";
        echo "Numéro de niveau d'évaluation: $numNiveauEval<br>";
        echo "ID de compétence: $idCompetence<br>";
        echo "Évaluation: $evaluation<br><br><br>";
        
       

    }
} else {
    echo "Aucune donnée trouvée.";
}

$stmt->close();
$conn->close();
?>


