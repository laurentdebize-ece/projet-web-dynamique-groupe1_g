<?php
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
?>
<?php
// Supposons que vous avez déjà récupéré l'e-mail du professeur dans une variable $emailProfesseur

// Préparer et exécuter la requête de sélection
$stmt = $conn->prepare("SELECT * FROM evaluation WHERE destinataire = ?");
$stmt->bind_param("s", $emailProf);
$stmt->execute();

// Récupérer les résultats de la requête
$result = $stmt->get_result();

// Parcourir les résultats et afficher les données
while ($row = $result->fetch_assoc()) {
    // Afficher les données comme vous le souhaitez
    echo "ID : " . $row['id'] . "<br>";
    echo "Évaluation : " . $row['evaluation'] . "<br>";
    echo "E-mail de l'élève : " . $row['email_eleve'] . "<br>";
    echo "Destinataire : " . $row['destinataire'] . "<br>";
    echo "<br>";
}

$stmt->close();
$conn->close();
?>








