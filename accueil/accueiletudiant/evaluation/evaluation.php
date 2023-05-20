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
            $query = "SELECT id, nom FROM competences";
            $result = $conn->query($query);

            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Afficher les options de compétences
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
                }
            } else {
                echo '<option value="">Aucune compétence trouvée.</option>';
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




