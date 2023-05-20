<?php
//connectez-vous dans BDD. ATTENTION $database="books" ici va s appeler $dbname = 'omnesmyskillsfinal';

require_once '../../BDD/init.php';
//ajouter de style css
$fichierCSS = "competenceprof.css";
echo "<link rel='stylesheet' type='text/css' href='$fichierCSS'>";
//saisir les données du formulaire
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$datecreation = isset($_POST["datecreation"]) ? $_POST["datecreation"] : "";
$datelimite = isset($_POST["datelimite"]) ? $_POST["datelimite"] : "";
$statut = isset($_POST["statut"]) ? $_POST["statut"] : "";


//*************************************
// si bouton1 (Rechercher) est cliqué
if (isset($_POST["button1"])) {
    //commencer le query
    $sql = "SELECT * FROM book";
    if ($titre != "") {
        //on recherche le livre par son titre
        $sql .= " WHERE Titre LIKE '%$titre%'";
        //on cherche ce livre par son auteur aussi
        if ($auteur != "") {
            $sql .= " AND Auteur LIKE '%$auteur%'";
        }
    }
    $result = mysqli_query($db_handle, $sql);
    //regarder s'il y a des resultats
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Book not found.</p>";
    } else {
        //on trouve le livre
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>" . "ID" . "</th>";
        echo "<th>" . "Titre" . "</th>";
        echo "<th>" . "Auteur" . "</th>";
        echo "<th>" . "Annee" . "</th>";
        echo "<th>" . "Editeur" . "</th>";
        echo "<th>" . "Couverture" . "</th>";
        //afficher le resultat
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Titre'] . "</td>";
            echo "<td>" . $data['Auteur'] . "</td>";
            echo "<td>" . $data['Annee'] . "</td>";
            echo "<td>" . $data['Editeur'] . "</td>";
            $image = $data['Couverture'];
            echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    echo "<p>Database not found.</p>";
}
//end Rechercher
//***********************************
//si le bouton2 (Ajouter) est cliqué
if (isset($_POST["button2"])) {
    if ($conn) {
        $sql = "SELECT * FROM competences WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            echo "<p> La compétence existe déjà.</p>";
        } else {

            $sql = "INSERT INTO competences(id, nom, datecreation, datelimite, statut)
            VALUES('$id', '$nom', '$datecreation', '$datelimite', '$statut')";
            
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<p> Voici la compétence que vous avez ajouté</p>";
                
                $sql = "SELECT * FROM competences WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "<h2>" . "Informations sur la nouvelle compétence ajoutée:" . "</h2>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>" . "id" . "</th>";
                    echo "<th>" . "nom" . "</th>";
                    echo "<th>" . "datecreation" . "</th>";
                    echo "<th>" . "datelimite" . "</th>";
                    echo "<th>" . "statut" . "</th>";
                    // afficher le resultat
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['id'] . "</td>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['datecreation'] . "</td>";
                        echo "<td>" . $data['datelimite'] . "</td>";
                        echo "<td>" . $data['statut'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } else {
                echo "<p>Erreur. Veuillez resaisir une compétence.</p>";
            }
        }
    } else {
        echo "<p> Base de donées introuvable.</p>";
    }
}



//*************************************
//si le bouton3 (Supprimer) est cliqué
if (isset($_POST["button3"])) {

    //on cherche le livre
    $sql = "SELECT * FROM book";
    //avec son titre et auteur
    if ($titre != "") {
        $sql .= " WHERE Titre LIKE '%$titre%'";
        if ($auteur != "") {
            $sql .= " AND Auteur LIKE '%$auteur%'";
        }
    }
    $result = mysqli_query($db_handle, $sql);
    //regarder s'il y a de resultat
    if (mysqli_num_rows($result) == 0) {
        //ce livre n'existe pas
        echo "<p>Cannot delete. Book not found.</p>";
    } else {
        //on supprime cet item
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['ID'];
        }
        //on supprime cet item par son ID
        $sql = "DELETE FROM book WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);
        echo "<p>Delete successful.</p>";
        //on affiche le reste des livres dans notre BDD
        $sql = "SELECT * FROM book";
        $result = mysqli_query($db_handle, $sql);
        echo "<h2>" . "Les livres restant dans la bibliothèque:" . "</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>" . "ID" . "</th>";
        echo "<th>" . "Titre" . "</th>";
        echo "<th>" . "Auteur" . "</th>";
        echo "<th>" . "Annee" . "</th>";
        echo "<th>" . "Editeur" . "</th>";
        echo "<th>" . "Couverture" . "</th>";
        //afficher le resultat
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Titre'] . "</td>";
            echo "<td>" . $data['Auteur'] . "</td>";
            echo "<td>" . $data['Annee'] . "</td>";
            echo "<td>" . $data['Editeur'] . "</td>";
            $image = $data['Couverture'];
            echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    echo "<p>Database not found.</p>";
}

//fermer la connexion
mysqli_close($conn);


