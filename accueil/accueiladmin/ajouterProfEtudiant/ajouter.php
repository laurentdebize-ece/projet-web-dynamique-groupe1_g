<?php
require_once '../../../BDD/init.php';


$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$emaileleve = isset($_POST["emaileleve"]) ? $_POST["emaileleve"] : "";
$motdepasse = isset($_POST["motdepasse"]) ? $_POST["motdepasse"] : "";
$numeroclasse = isset($_POST["numeroclasse"]) ? $_POST["numeroclasse"] : "";
$ecole = isset($_POST["ecole"]) ? $_POST["ecole"] : "";
$emailprof = isset($_POST["emailprof"]) ? $_POST["emailprof"] : "";
$numeromatiere = isset($_POST["numeromatiere"]) ? $_POST["numeromatiere"] : "";
$volumehoraire = isset($_POST["volumehoraire"]) ? $_POST["volumehoraire"] : "";
    

// POUR ETUDIANT
if (isset($_POST["ajouter1"])) {
    if ($conn) {
        // Vérifier si l'étudiant existe déjà dans la base de données
        $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p> l'éleve existe déjà.</p>";
        } else {
            // Ajouter l'étudiant à la base de données
            $sql = "INSERT INTO etudiant(nom, prenom, emaileleve, motdepasse, numeroclasse, ecole)
              VALUES('$nom', '$prenom', '$emaileleve', '$motdepasse', '$numeroclasse', '$ecole')";
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
                    echo "<th>ecole</th>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "<td>" . $data['emaileleve'] . "</td>";
                        echo "<td>" . $data['motdepasse'] . "</td>";
                        echo "<td>" . $data['numeroclasse'] . "</td>";
                        echo "<td>" . $data['ecole'] . "</td>";
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

//POUR PROF
if (isset($_POST["ajouter2"])) {
   
    if ($conn) {
        // Vérifier si le professeur existe déjà dans la base de données
        $sql = "SELECT * FROM professeur WHERE emailprof = '$emailprof'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) != 0) {
            echo "<p>Le professeur existe déjà.</p>";
        } else {
            // Ajouter le professeur à la base de données
            $sql = "INSERT INTO professeur(nom, prenom, emailprof, motdepasse) VALUES ('$nom', '$prenom', '$emailprof', '$motdepasse')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Ajout réussi.</p>";

                // Afficher les informations sur le nouveau professeur ajouté
                $sql = "SELECT * FROM professeur WHERE emailprof = '$emailprof'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "<h2>Informations sur le nouveau professeur :</h2>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Nom</th>";
                    echo "<th>Prénom</th>";
                    echo "<th>Email</th>";
                    echo "<th>Mot de passe</th>";
                    echo "</tr>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "<td>" . $data['emailprof'] . "</td>";
                        echo "<td>" . $data['motdepasse'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            } else {
                echo "<p>Une erreur est survenue lors de l'ajout du professeur.</p>";
            }
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}


//POUR MATIERES
if (isset($_POST["ajouter3"])) {
    if ($conn) {
        // Vérifier si la matiere existe déjà dans la base de données
        $sql = "SELECT * FROM matieres WHERE numeromatiere = '$numeromatiere'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) != 0) {
            echo "<p>La matiere existe déjà.</p>";
        } else {
            // Ajouter matiere à la base de données
            $sql = "INSERT INTO matieres(nom, numeromatiere, volumehoraire) VALUES ('$nom', '$numeromatiere', '$volumehoraire')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Ajout réussi.</p>";

                // Afficher les informations sur la nouvelle matière ajouté
                $sql = "SELECT * FROM matieres WHERE numeromatiere = '$numeromatiere'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "<h2>Informations sur la nouvelle matiere :</h2>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Nom de la matiere</th>";
                    echo "<th>Numero matiere</th>";
                    echo "<th>volume horaire</th>";
                    echo "</tr>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['numeromatiere'] . "</td>";
                        echo "<td>" . $data['volumehoraire'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            } else {
                echo "<p>Une erreur est survenue lors de l'ajout de la matiere.</p>";
            }
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}
?>