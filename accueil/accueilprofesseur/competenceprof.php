<?php
session_start();
require_once '../../BDD/init.php';

$fichierCSS = "competenceprof.css";
echo "<link rel='stylesheet' type='text/css' href='$fichierCSS'>";


?>

<!DOCTYPE html>
<html>

<head>
    <title>Compétences</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="competenceprof.css">
</head>

<body>
    <h2>Vous pouvez modifier/ajouter/supprimer des compétences</h2>
    <form action="competenceprof2.php" method="post">
        <table class="competences-table">
            <tr>
                <td size="20">Id</td>
                <td><input type="number" name="id" size="60" required ></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" size="60"></td>
            </tr>
            <tr>
                <td>Date de création</td>
                <td><input type="date" name="datecreation" size="60"></td>
            </tr>
            <tr>
                <td>Date limite</td>
                <td><input type="date" name="datelimite" size="60"></td>
            </tr>
            <tr>
                <td>Statut</td>
                <td><input type="text" name="statut" size="60"></td>
            </tr>
            <tr>
                <td>Ecole</td>
                <td><input type="text" name="ecole" size="60" value="ECE"></td>
            </tr>
            <tr>
                <td colspan="2" center="center">
                    <input type="submit" name="button1" value="Modifier">
                    <input type="submit" name="button2" value="Ajouter">
                    <input type="submit" name="button3" value="Supprimer">
                </td>
            </tr>
        </table><br><br>

        <?php
        $requete = mysqli_query($conn, ' SELECT * FROM competences ');
        if (mysqli_num_rows($requete) != 0) {
            echo "<h2>Voici le tableau des compétences avec leurs id afin de vous permettre de les modifier plus facilement :</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>nom</th>";
            echo "<th>datecreation</th>";
            echo "<th>datelimite</th>";
            echo "<th>statut</th>";
            echo "<th>ecole</th>";
            // afficher le resultat
            while ($data = mysqli_fetch_assoc($requete)) {
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
        ?>

    </form>
</body>

</html>

