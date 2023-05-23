<?php
require_once '../../../BDD/init.php';
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$emaileleve = isset($_POST["emaileleve"]) ? $_POST["emaileleve"] : "";
$motdepasse = isset($_POST["motdepasse"]) ? $_POST["motdepasse"] : "";
$numeroclasse = isset($_POST["numeroclasse"]) ? $_POST["numeroclasse"] : "";
$ecole = isset($_POST["ecole"]) ? $_POST["ecole"] : "";

if (isset($_POST["valider1"])) {
    if ($conn) {
        // Vérifier si l'étudiant existe dans la base de données
        $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) != 0) {
            // Effectuer la modification de l'étudiant dans la base de données
            $sql = "UPDATE etudiant SET nom = '$nom', prenom = '$prenom', motdepasse = '$motdepasse', numeroclasse = '$numeroclasse', ecole = '$ecole' WHERE emaileleve = '$emaileleve'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Modification réussie.</p>";
            } else {
                echo "<p>Une erreur est survenue lors de la modification de l'étudiant.</p>";
            }
        } else {
            echo "<p>L'étudiant n'existe pas.</p>";
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}
?>