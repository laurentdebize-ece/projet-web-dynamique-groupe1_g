<!DOCTYPE html>
<html>
<head>
    <title>Auto-évaluation</title>
    <link rel="stylesheet" type="text/css" href="evaluation.css">
</head>
<body>
    <h1>Autoévaluation</h1>

    <form action="traitement_autoevaluation.php" method="POST">
        <label for="competence">Choisissez une compétence :</label>
        <select name="id" id="competence">
            <?php
            require_once '../../../BDD/init.php';

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
            ?>
        </select>

        <!-- Champ caché pour l'ID de la compétence -->
        <input type="hidden" name="competence_id" value="">

        <br><br>

        <label for="evaluation">Évaluation :</label>
        <select name="evaluation" id="evaluation">
            <option value="acquis">Acquis</option>
            <option value="non_acquis">Non acquis</option>
            <option value="en_cours">En cours d'acquisition</option>
        </select>

        <br><br>

        <label for="emaileleve">Adresse e-mail de l'étudiant :</label>
        <input type="email" name="emaileleve" id="emaileleve" required>

        <br><br>

        <label for="destinataire">Choisissez un destinataire :</label>
        <select name="destinataire" id="destinataire">
            <?php
            // Requête pour récupérer les professeurs depuis la base de données
            $queryProfesseur = "SELECT emailprof, Nom FROM professeur";
            $resultProfesseur = $conn->query($queryProfesseur);

            // Vérifier s'il y a des résultats
            if ($resultProfesseur->num_rows > 0) {
                // Afficher les options des professeurs
                while ($row = $resultProfesseur->fetch_assoc()) {
                    echo '<option value="' . $row["emailprof"] . '">' . $row["Nom"] . '</option>';
                }
            } else {
                echo '<option value="">Aucun professeur trouvé.</option>';
            }
            ?>
        </select>

        <br><br>
       


        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifier si l'évaluation a été enregistrée avec succès
    if (isset($_GET['success'])) {
        echo "<p>L'évaluation a été enregistrée avec succès.</p>";
    }

    // Vérifier si une erreur s'est produite lors de l'enregistrement de l'évaluation
    if (isset($_GET['error'])) {
        echo "<p>Erreur lors de l'enregistrement de l'évaluation : " . $_GET['error'] . "</p>";
    }

    $conn->close();
    ?>
</body>
</html>







