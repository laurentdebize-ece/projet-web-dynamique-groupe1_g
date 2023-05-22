<?php
require_once '../../../BDD/init.php';

// Saisir les données du formulaire
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$emaileleve = isset($_POST["emaileleve"]) ? $_POST["emaileleve"] : "";
$motdepasse = isset($_POST["motdepasse"]) ? $_POST["motdepasse"] : "";
$numeroclasse = isset($_POST["numeroclasse"]) ? $_POST["numeroclasse"] : "";

if (isset($_POST["ajouter"])) {
    if ($conn) {
        // Vérifier si l'étudiant existe déjà dans la base de données
        $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p> l'éleve existe déjà.</p>";
        } else {
            // Ajouter l'étudiant à la base de données
            $sql = "INSERT INTO etudiant(nom, prenom, emaileleve, motdepasse, numeroclasse)
              VALUES('$nom', '$prenom', '$emaileleve', '$motdepasse', '$numeroclasse')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Ajout réussi.</p>";

                // Afficher les informations de l'étudiant ajouté
                $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "<h2>Informations sur le nouvel étudiant ajouté :</h2>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Nom</th>";
                    echo "<th>Prénom</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mot de passe</th>";
                    echo "<th>Numéro de classe</th>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "<td>" . $data['emaileleve'] . "</td>";
                        echo "<td>" . $data['motdepasse'] . "</td>";
                        echo "<td>" . $data['numeroclasse'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            } else {
                echo "<p>Une erreur est survenue lors de l'ajout de l'étudiant.</p>";
            }
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}
?>
