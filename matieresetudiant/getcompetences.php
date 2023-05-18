<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'omnesmyskillsfinal';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

// Vérification si le paramètre "matiere" est présent dans la requête GET
if (isset($_GET['matiere'])) {
    // Récupération du nom de la matière depuis la requête GET
    $matiere = $_GET['matiere'];

    // Requête pour récupérer les compétences associées à la matière
    $query = "SELECT c.nom FROM competences c INNER JOIN competences_matieres cm ON c.id = cm.id INNER JOIN matieres m ON cm.numeromatiere = m.numeromatiere WHERE m.nom = '$matiere'";
    $result = mysqli_query($conn, $query);

    // Vérification si la requête s'est exécutée avec succès
    if ($result) {
        // Vérification si des compétences ont été trouvées
        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Compétences de la matière : $matiere</h3>";
            echo "<ul>";
            // Parcours des compétences et affichage
            while ($row = mysqli_fetch_assoc($result)) {
                $competence = $row['nom'];
                echo "<li>$competence</li>";
            }
            echo "</ul>";
        } else {
            echo "Aucune compétence trouvée pour la matière : $matiere";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
    }
} else {
    echo "Aucune matière spécifiée.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
