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

// Récupérer les paramètres de tri (s'ils sont présents)
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom';
$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';

// Construction de la requête SQL en fonction des paramètres de tri
$sql = "SELECT c.nom, c.datecreation, c.datelimite, c.statut, m.nom AS matiere
        FROM competences AS c
        JOIN competences_matieres AS cm ON c.id = cm.id
        JOIN matieres AS m ON cm.numeromatiere = m.numeromatiere
        ORDER BY $tri $ordre";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Parcours des résultats et stockage des compétences dans un tableau
    $competences = array();

    while ($row = $result->fetch_assoc()) {
        $competence = array(
            'nom' => $row['nom'],
            'datecreation' => $row['datecreation'],
            'datelimite' => $row['datelimite'],
            'statut' => $row['statut'],
            'matiere' => $row['matiere']
        );
        $competences[] = $competence;
    }

    // Renvoyer les compétences au format JSON
    header('Content-Type: application/json');
    echo json_encode($competences);
} else {
    echo "Aucune compétence trouvée.";
}

// Fermer la connexion à la base de données
$conn->close();
?>


