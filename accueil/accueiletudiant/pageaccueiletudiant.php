<?php
session_start();

// Connexion à la base de données
$host = "localhost"; // Remplacez par l'adresse de votre serveur de base de données
$utilisateur = "root"; // Remplacez par votre nom d'utilisateur
$motDePasse = "root"; // Remplacez par votre mot de passe
$nomBaseDeDonnees = "omnesmyskillsfinal"; // Remplacez par le nom de votre base de données

$connexion = new PDO("mysql:host=$host;dbname=$nomBaseDeDonnees;charset=utf8", $utilisateur, $motDePasse);

// Requête SQL pour récupérer l'e-mail du professeur
$requete = $connexion->prepare("SELECT emaileleve FROM etudiant WHERE emaileleve = :emaileleve");
$requete->bindParam(":emaileleve", $_SESSION['emaileleve']);
$requete->execute();

// Requête SQL pour récupérer le nom et le prénom du professeur
$requeteEtudiant = $connexion->prepare("SELECT nom, prenom FROM etudiant WHERE emaileleve = :emaileleve");
$requeteEtudiant->bindParam(":emaileleve", $_SESSION['emaileleve']);
$requeteEtudiant->execute();

// Vérification de la réussite de la requête
if ($requete->rowCount() > 0) {
    // Récupération de l'e-mail de l'étudiant
    $donneesEtudiant = $requete->fetch(PDO::FETCH_ASSOC);

    // Stockage de l'e-mail dans la variable de session
    $_SESSION['emaileleve'] = $donneesEtudiant['emaileleve'];
} else {
    // Gestion de l'erreur si aucun étudiant n'est trouvé
    $_SESSION['emaileleve'] = '';
}

// Vérification de la réussite de la requête pour le nom et le prénom de l'étudiant
if ($requeteEtudiant->rowCount() > 0) {
    // Récupération du nom et du prénom de l'étudiant
    $donneesEtudiant = $requeteEtudiant->fetch(PDO::FETCH_ASSOC);

    // Stockage du nom et du prénom dans les variables de session
    $_SESSION['nomEtudiant'] = $donneesEtudiant['nom'];
    $_SESSION['prenomEtudiant'] = $donneesEtudiant['prenom'];
} else {
    // Gestion de l'erreur si aucun étudiant n'est trouvé
    $_SESSION['nomEtudiant'] = '';
    $_SESSION['prenomEtudiant'] = '';
}

// Fermeture de la connexion à la base de données
$connexion = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueil4.css">
</head>
<body>
  <header>
    <div class="flex-container">
      <div><a href="#">Accueil</a></div>
      <div><a href="../accueiletudiant/matieresetudiant/matieres.html">Matière</a></div>
      <div><a href="../accueiletudiant/mescompetences/mescompetences.html">Mes Compétences</a></div>
      <div><a href="#">Compétences Transverses</a></div>
      <div><a href="../accueiletudiant/toutescompetences/toutescompetences.html">Toutes les compétences</a></div>
      <div><a href="../accueiletudiant/evaluation/evaluation.php">Evaluation</a></div>
    </div>
    <div class="flex-container1">
      <div><button id="open-popup">Mon Compte Etudiant</button></div>
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

    <h2> Ici, vous pouvez trouver les différentes compétences pour vous améliorer</h2>
    <h3>Compétences populaires</h3>
    
     <table>
       <th>Noms des compétences:</th>
     </table>
        
    <h3>Dernières compétences ajoutées</h3>

    <table>
      <tr>
        <td> Compétence 4</td>
        <td> vvbfb </td>
        <td> vfbrbr </td>
      </tr>
      <tr>
        <td> Compétence 5 </td>
        <td> bbrbrfe </td>
        <td> grvefe </td>
      </tr>
      <tr>
        <td> Compétence 6 </td>
        <td> feefev </td>
        <td> vrvrrb </td>
      </tr>
    </table>
  </main>
  
  <div class="popup-overlay">
    <div class="popup-content">
      <h2><span class="texte-color">Mon Compte Etudiant</span></h2>
      <p>
        <ul>
          <li><p class="texte-color">Nom:<?php echo $_SESSION['nomEtudiant']; ?></p></li>
          <li><p class="texte-color">Prénom: <?php echo $_SESSION['prenomEtudiant']; ?></p></li>
          <li><p class="texte-color">E-mail:<?php  echo $_SESSION['emaileleve']; ?></p></li>
        </ul>
      </p>
      <button id="close-popup">Fermer</button>
      <form method="post" action="deconnexion.php">
        <button type="submit" name="logout">Se déconnecter</button>
      </form>
    </div>
  </div>
  
  <footer>
    <p>© 2023 Omnes MySkills. Tous droits réservés.</p>
  </footer>

  <script src="pageaccueiletudiant1.js"></script>
</body>
</html>



