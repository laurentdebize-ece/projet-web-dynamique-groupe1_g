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
// POUR ETUDIANT
if (isset($_POST["supprimer1"])) {
    if ($conn) {
        // Vérifier si l'étudiant existe dans la base de données
        $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            // Supprimer l'étudiant de la base de données
            $sql = "DELETE FROM etudiant WHERE emaileleve = '$emaileleve'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Suppression réussie.</p>";
      // Afficher les étudiants restants dans la base de données
        $sql = "SELECT * FROM etudiant";
        $result = mysqli_query($conn, $sql);
        echo "<h3>Étudiants restants :</h3>";
        echo "<table>";
        echo "<tr><th>Nom</th><th>Email</th><th>Numéro de classe</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['nom']."</td><td>".$row['emaileleve']."</td><td>".$row['numeroclasse']."</td></tr>";
        }
        echo "</table>";
            } else {
                echo "<p>Une erreur est survenue lors de la suppression de l'étudiant.</p>";
            }
        } else {
            echo "<p>L'étudiant n'existe pas.</p>";
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}

// POUR PROF
if (isset($_POST["supprimer2"])) {
    if ($conn) {
        // Vérifier si le professeur existe dans la base de données
        $sql = "SELECT * FROM professeur WHERE emailprof = '$emailprof'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            // Supprimer le professeur de la base de données
            $sql = "DELETE FROM professeur WHERE emailprof = '$emailprof'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Suppression réussie.</p>";
        // Afficher les professeurs restants dans la base de données
        $sql = "SELECT * FROM professeur";
        $result = mysqli_query($conn, $sql);
        echo "<h3>Professeurs restants :</h3>";
        echo "<table>";
        echo "<tr><th>Nom</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['nom']."</td><td>".$row['emailprof']."</td></tr>";
        }
        echo "</table>";
            } else {
                echo "<p>Une erreur est survenue lors de la suppression du professeur.</p>";
            }
        } else {
            echo "<p>Le professeur n'existe pas.</p>";
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}

// POUR MATIERES
if (isset($_POST["supprimer3"])) {
    if ($conn) {
        // Vérifier si la matière existe dans la base de données
        $sql = "SELECT * FROM matieres WHERE numeromatiere = '$numeromatiere'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            // Supprimer la matière de la base de données
            $sql = "DELETE FROM matieres WHERE numeromatiere = '$numeromatiere'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p>Suppression réussie.</p>";
        // Afficher les matières restantes dans la base de données
        $sql = "SELECT * FROM matieres";
        $result = mysqli_query($conn, $sql);
        echo "<h3>Matières restantes :</h3>";
        echo "<table>";
        echo "<tr><th>Nom</th><th>Numéro de matière</th><th>Volume horaire</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['nom']."</td><td>".$row['numeromatiere']."</td><td>".$row['volumehoraire']."</td></tr>";
        }
        echo "</table>";
            } else {
                echo "<p>Une erreur est survenue lors de la suppression de la matière.</p>";
            }
        } else {
            echo "<p>La matière n'existe pas.</p>";
        }
    } else {
        echo "<p>Base de données introuvable.</p>";
    }
}

if (isset($_POST["modifier1"])) {
    if ($conn) {
        // Vérifier si l'étudiant existe déjà dans la base de données
        $sql = "SELECT * FROM etudiant WHERE emaileleve = '$emaileleve'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
           // echo "<p> l'éleve existe vous pouvez le modifier.</p>";
            header("Location: modifier.php");
        }  else {
                echo "<p>Cette elève n'existe pas dans la base de donnée. Veuillez saisir un autre email.</p>";
            }
        }
     else {
        echo "<p>Base de données introuvable.</p>";
    }
}
if (isset($_POST["modifier2"])) {
    if ($conn) {
        // Vérifier si le prof existe déjà dans la base de données
        $sql = "SELECT * FROM professeur WHERE emailprof = '$emailprof'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
           // echo "<p> l'éleve existe vous pouvez le modifier.</p>";
            header("Location: modifier.php");
        }  else {
                echo "<p>Ce prof n'existe pas dans la base de donnée. Veuillez saisir un autre email.</p>";
            }
        }
     else {
        echo "<p>Base de données introuvable.</p>";
    }
}

if (isset($_POST["modifier3"])) {
    if ($conn) {
        // Vérifier si la matiere existe déjà dans la base de données
        $sql = "SELECT * FROM matieres WHERE numeromatiere = '$numeromatiere'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
           // echo "<p> la matiere existe vous pouvez le modifier.</p>";
            header("Location: modifier.php");
        }  else {
                echo "<p>Cette matiere n'existe pas dans la base de donnée. Veuillez saisir un autre numero de matiere.</p>";
            }
        }
     else {
        echo "<p>Base de données introuvable.</p>";
    }
}
?>