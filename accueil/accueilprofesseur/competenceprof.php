<?php
require_once '../../BDD/init.php';

$fichierCSS = "competenceprof.css";
echo "<link rel='stylesheet' type='text/css' href='$fichierCSS'>";

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$datecreation = isset($_POST["datecreation"]) ? $_POST["datecreation"] : "";
$datelimite = isset($_POST["datelimite"]) ? $_POST["datelimite"] : "";
$statut = isset($_POST["statut"]) ? $_POST["statut"] : "";
$ecole = isset($_POST["ecole"]) ? $_POST["ecole"] : "";


//*************************************
// si bouton1 est cliqué
if (isset($_POST["button1"])) {
    $sql = "SELECT * FROM competences WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    //regarder s'il y a des resultats
    if (mysqli_num_rows($result) == 0) {
        echo "<p>La compétence n'a pas été trouvé.</p>";
    } else {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>" . "id" . "</th>";
        echo "<th>" . "nom" . "</th>";
        echo "<th>" . "datecreation" . "</th>";
        echo "<th>" . "datelimite" . "</th>";
        echo "<th>" . "statut" . "</th>";
        echo "<th>" . "ecole" . "</th>";
        //afficher le resultat
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['datecreation'] . "</td>";
            echo "<td>" . $data['datelimite'] . "</td>";
            echo "<td>" . $data['statut'] . "</td>";
            echo "<td>" . $data['ecole'] . "</td>";
        }
        echo "</table>";
    }
} else {
    echo "<p>La compétence n'existe pas.</p>";
}
//end 
//***********************************
//si le bouton2 est cliqué
if (isset($_POST["button2"])) {
    if ($conn) {
        $sql = "SELECT * FROM competences WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            echo "<p>La compétence existe déjà.</p>";
        } else {
            $sql = "INSERT INTO competences(id, nom, datecreation, datelimite, statut)
            VALUES('$id', '$nom', '$datecreation', '$datelimite', '$statut')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Voici la compétence que vous avez ajoutée</p>";

                $sql = "SELECT * FROM competences WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "<h2>Informations sur la nouvelle compétence ajoutée :</h2>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>nom</th>";
                    echo "<th>datecreation</th>";
                    echo "<th>datelimite</th>";
                    echo "<th>statut</th>";
                    echo "<th>ecole</th>";
                    // afficher le resultat
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['id'] . "</td>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['datecreation'] . "</td>";
                        echo "<td>" . $data['datelimite'] . "</td>";
                        echo "<td>" . $data['statut'] . "</td>";
                        echo "<td>" . $data['ecole'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } else {
                echo "<p>Erreur. Veuillez ressaisir une compétence.</p>";
            }
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}

//*************************************
//si le bouton3 est cliqué
if (isset($_POST["button3"])) {
    if ($conn) {
        $sql = "SELECT * FROM competences WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<p>La compétence n'existe pas.</p>";
        } else {
            $sql = "DELETE FROM competences WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                echo "Vous avez supprimé une compétences";
            } else {
                echo "<p>Erreur. Veuillez ressaisir une compétence.</p>";
            }
        }
    }
}

mysqli_close($conn);
