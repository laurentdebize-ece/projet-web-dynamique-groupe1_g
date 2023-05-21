<?php
session_start();

// Connexion à la base de données
$host = "localhost"; // Remplacez par l'adresse de votre serveur de base de données
$utilisateur = "root"; // Remplacez par votre nom d'utilisateur
$motDePasse = "root"; // Remplacez par votre mot de passe
$nomBaseDeDonnees = "omnesmyskillsfinal"; // Remplacez par le nom de votre base de données

$connexion = new PDO("mysql:host=$host;dbname=$nomBaseDeDonnees;charset=utf8", $utilisateur, $motDePasse);

// Requête SQL pour récupérer l'e-mail du professeur
$requete = $connexion->prepare("SELECT emailprof FROM professeur WHERE emailprof = :emailprof");
$requete->bindParam(":emailprof", $_SESSION['emailprof']);
$requete->execute();

// Requête SQL pour récupérer le nom et le prénom du professeur
$requeteProfesseur = $connexion->prepare("SELECT Nom, prenom FROM professeur WHERE emailprof = :emailprof");
$requeteProfesseur->bindParam(":emailprof", $_SESSION['emailprof']);
$requeteProfesseur->execute();

// Vérification de la réussite de la requête
if ($requete->rowCount() > 0) {
    // Récupération de l'e-mail du professeur
    $donneesProfesseur = $requete->fetch(PDO::FETCH_ASSOC);

    // Stockage de l'e-mail dans la variable de session
    $_SESSION['emailprof'] = $donneesProfesseur['emailprof'];
} else {
    // Gestion de l'erreur si aucun professeur n'est trouvé
    $_SESSION['emailprof'] = '';
}

// Vérification de la réussite de la requête pour le nom et le prénom du professeur
if ($requeteProfesseur->rowCount() > 0) {
    // Récupération du nom et du prénom du professeur
    $donneesProfesseur = $requeteProfesseur->fetch(PDO::FETCH_ASSOC);

    // Stockage du nom et du prénom dans les variables de session
    $_SESSION['nomProfesseur'] = $donneesProfesseur['Nom'];
    $_SESSION['prenomProfesseur'] = $donneesProfesseur['prenom'];
} else {
    // Gestion de l'erreur si aucun professeur n'est trouvé
    $_SESSION['nomProfesseur'] = '';
    $_SESSION['prenomProfesseur'] = '';
}

// Fermeture de la connexion à la base de données
$connexion = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueilprof.css">
</head>
<body>
  <header>
    <div class="flex-container">
      <div><a href="#">Accueil</a></div>
      <div><a href="competenceprof.html">Compétence</a></div>
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
      <h2><span class="texte-color">Mon Compte</span></h2>
      <p>
        <ul>
          <li><span class="texte-color">Nom:</span> <?php echo $_SESSION['nomProfesseur']; ?></li>
          <li><span class="texte-color">Prénom:</span> <?php echo $_SESSION['prenomProfesseur']; ?></li>
          <li><span class="texte-color">E-mail:</span> <?php echo $_SESSION['emailprof']; ?></li>
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







