<?php
require_once '../../../BDD/init.php';

// Vérif la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer les compétences avec le nom de l'école
$query = "SELECT c.nom, c.ecole FROM competences c";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    
    $competences = array();

    // Parcourir les résultats de la requête et ajouter les compétences au tableau
    while ($row = $result->fetch_assoc()) {
        $competence = array(
            "nom" => $row["nom"],
            "ecole" => $row["ecole"]
        );

        $competences[] = $competence;
    }

   
    $response = array(
        "status" => "success",
        "data" => $competences
    );

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Aucune compétence trouvée
    $response = array(
        "status" => "error",
        "message" => "Aucune compétence trouvée."
    );

    header("Content-Type: application/json");
    echo json_encode($response);
}

// Fermer la connexion à la base de données
$conn->close();
?>



