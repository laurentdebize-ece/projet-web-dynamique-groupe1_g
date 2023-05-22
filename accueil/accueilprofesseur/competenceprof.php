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
// si bouton1  est cliqué
if (isset($_POST["button1"])) {
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
//end 
//***********************************
//si le bouton2  est cliqué
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
//si le bouton3  est cliqué
if (isset($_POST["button3"])) {
    if ($conn) {
        $sql = "SELECT * FROM competences WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "<p> La compétence n'a pas été trouvé.</p>";
        } else {
        //on supprime cet item
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
        }
        //on supprime cet item par son ID
        $sql = "DELETE FROM competences WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $sql1 = "SELECT * FROM competences WHERE id ='$id'";
        if($result){
            echo "<p>la compétence a bien été supprimé.</p>";
        }
        else {
            echo"non non ";
        }
        //on affiche le reste des livres dans notre BDD
        $sql = "SELECT * FROM competences";
        $result = mysqli_query($conn, $sql);
        
            echo "<h2>" . "Les compétences restantes sont:" . "</h2>";
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
    echo "<p>erreur.</p>";
    }
}

//fermer la connexion
mysqli_close($conn);
?>


