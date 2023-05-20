<!DOCTYPE html>
<html>
<head>
    <title>Autoévaluation</title>
</head>
<body>
    <h1>Autoévaluation</h1>

    <form action="traitement_autoevaluation.php" method="POST">
        <label for="competence">Choisissez une compétence :</label>
        <select name="competence" id="competence">
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

            // Récupérer les compétences depuis la base de données
            $queryCompetences = "SELECT id, nom FROM competences";
            $resultCompetences = $conn->query($queryCompetences);

            // Vérifier s'il y a des résultats
            if ($resultCompetences->num_rows > 0) {
                // Afficher les options de compétences
                while ($row = $resultCompetences->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
                }
            } else {
                echo '<option value="">Aucune compétence trouvée.</option>';
            }

            // Récupérer les professeurs depuis la base de données
            $queryProfesseur = "SELECT id, nom FROM professeur";
            $resultProfesseur = $conn->query($queryProfesseur);

            // Vérifier s'il y a des résultats
            if ($resultProfesseur->num_rows > 0) {
                echo '</select><br><br><label for="professeur">Choisissez un professeur :</label><select name="professeur" id="professeur">';
                // Afficher les options des professeurs
                while ($row = $resultProfesseur->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
                }
            } else {
                echo '<option value="">Aucun professeur trouvé.</option>';
            }

            // Fermer la connexion à la base de données
            $conn->close();
            ?>
        </select>

        <br><br>

        <label for="evaluation">Évaluation :</label>
        <select name="evaluation" id="evaluation">
            <option value="acquis">Acquis</option>
            <option value="non_acquis">Non acquis</option>
            <option value="en_cours">En cours d'acquisition</option>
        </select>

        <br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>



