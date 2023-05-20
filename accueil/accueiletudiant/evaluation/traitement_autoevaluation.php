<?php
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

// Récupérer les valeurs du formulaire
$competence = $_POST['competence'];
$professeur = $_POST['professeur'];

// Requête pour récupérer les informations du compte professeur associé à la compétence sélectionnée
$query = "SELECT professeur.emailprof, professeur.nom FROM professeur
          JOIN enseigner ON professeur.emailprof = enseigner.emailprof
          WHERE enseigner.numeromatiere = '$competence'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Récupérer les informations du compte professeur
    $row = $result->fetch_assoc();
    $emailProfesseur = $row['emailprof'];
    $nomProfesseur = $row['nom'];

    // Envoyer les données à l'email du professeur ou effectuer d'autres actions souhaitées
    // Par exemple, envoi d'un e-mail
    $to = $emailProfesseur;
    $subject = "Autoévaluation : $competence";
    $message = "Un étudiant a effectué une autoévaluation pour la compétence $competence.";
    $headers = "From: votre_adresse_email@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Autoévaluation envoyée au professeur $nomProfesseur.";
    } else {
        echo "Erreur lors de l'envoi de l'autoévaluation.";
    }
} else {
    echo "Aucun compte professeur trouvé pour la compétence et le professeur sélectionnés.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
