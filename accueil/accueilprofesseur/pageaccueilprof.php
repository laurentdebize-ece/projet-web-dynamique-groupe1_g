<?php
session_start();

require_once '../../BDD/init.php';
// Requête SQL pour récupérer l'e-mail du professeur
$requete = $conn->prepare("SELECT emailprof FROM professeur WHERE emailprof = ?");
$requete->bind_param("s", $_SESSION['emailprof']);
$requete->execute();
$requete->store_result();

// Requête SQL pour récupérer le nom et le prénom du professeur
$requeteProfesseur = $conn->prepare("SELECT Nom, prenom FROM professeur WHERE emailprof = ?");
$requeteProfesseur->bind_param("s", $_SESSION['emailprof']);
$requeteProfesseur->execute();
$requeteProfesseur->store_result();

// Vérification de la réussite de la requête
if ($requete->num_rows > 0) {
    // Récupération de l'e-mail du professeur
    $requete->bind_result($emailprof);
    $requete->fetch();

    // Stockage de l'e-mail dans la variable de session
    $_SESSION['emailprof'] = $emailprof;
} else {
    // Gestion de l'erreur si aucun professeur n'est trouvé
    $_SESSION['emailprof'] = '';
}

// Vérification de la réussite de la requête pour le nom et le prénom du professeur
if ($requeteProfesseur->num_rows > 0) {
    // Récupération du nom et du prénom du professeur
    $requeteProfesseur->bind_result($nom, $prenom);
    $requeteProfesseur->fetch();

    // Stockage du nom et du prénom dans les variables de session
    $_SESSION['nomProfesseur'] = $nom;
    $_SESSION['prenomProfesseur'] = $prenom;
} else {
    // Gestion de l'erreur si aucun professeur n'est trouvé
    $_SESSION['nomProfesseur'] = '';
    $_SESSION['prenomProfesseur'] = '';
}

// Fermeture de la requête
$requete->close();
$requeteProfesseur->close();

// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueilprof2.css">
</head>
<body>
  <header>
    <div class="flex-container">
      <div><a href="#">Accueil</a></div>
      <div><a href="competenceprof.html">Compétences</a></div>
      <div><a href="validation_auto_eval/autoevaluation.php">Auto évaluation</a></div>
    </div>
    <div class="flex-container1">
      <div><button id="open-popup">Mon compte professeur</button></div>
    </div>
  </header>
  <main>
    <h1>Bienvenue sur Omnes MySkills</h1>
    <div class="carousel">
      <img src="lyon1.jpg" class="slide active" />
      <img src="lyondenuit.png" class="slide" />
      <img src="lyon2.jpg" class="slide" />
      <div class="controls">
        <span id="prev">&lt;</span>
        <span id="next">&gt;</span>
      </div>
    </div>
    <h2>Ici, vous pouvez trouver les différentes compétences pour vous améliorer</h2>
    <h3>Compétences populaires</h3>
    <table>
      <tr>
        <td>Compétence1</td>
        <td>vvbfb</td>
        <td>vfbrbr</td>
      </tr>
      <tr>
        <td>Compétence 2</td>
        <td>bbrbrfe</td>
        <td>grvefe</td>
      </tr>
      <tr>
        <td>Compétence 3</td>
        <td>feefev</td>
        <td>vrvrrb</td>
      </tr>
    </table>
    <h3>Dernières compétences ajoutées</h3>
    <table>
      <tr>
        <td>Compétence 4</td>
        <td>vvbfb</td>
        <td>vfbrbr</td>
      </tr>
      <tr>
        <td>Compétence 5</td>
        <td>bbrbrfe</td>
        <td>grvefe</td>
      </tr>
      <tr>
        <td>Compétence 6</td>
        <td>feefev</td>
        <td>vrvrrb</td>
      </tr>
    </table>
  </main>

  <footer>
    <p>© 2023 Omnes MySkills. Tous droits réservés.</p>
  </footer>
  <script src="pageaccueilprof.js"></script>
  <div class="popup-overlay">
    <div class="popup-content">
      <h2><span class="texte-color">Mon Compte Professeur</span></h2>
      <p>
        <ul>
          <li><p class="texte-color">Nom:<?php echo $_SESSION['nomProfesseur']; ?></p></li>
          <li><p class="texte-color">Prénom:<?php echo $_SESSION['prenomProfesseur']; ?></p></li>
          <li><p class="texte-color">E-mail<?php echo $_SESSION['emailprof']; ?></p></li>
        </ul>
      </p>
      <button id="close-popup">Fermer</button>
      <form method="post" action="deconnexion.php">
        <button type="submit" name="logout" id="close-popup">Se déconnecter</button>
      </form>
    </div>
  </div>
</body>
</html>