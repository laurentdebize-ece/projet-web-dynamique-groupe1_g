<?php
session_start();

require_once '../../BDD/init.php';
// Requête SQL pour récupérer l'e-mail de l'admin
$requete = $conn->prepare("SELECT email FROM admin WHERE email = ?");
$requete->bind_param("s", $_SESSION['email']);
$requete->execute();
$requete->store_result();

// Requête SQL pour récupérer le nom et le prénom de l'admin
$requeteAdmin = $conn->prepare("SELECT nom, prenom FROM admin WHERE email = ?");
$requeteAdmin->bind_param("s", $_SESSION['email']);
$requeteAdmin->execute();
$requeteAdmin->store_result();

// Vérification de la réussite de la requête
if ($requete->num_rows > 0) {
    // Récupération de l'e-mail de l'administrateur
    $requete->bind_result($email);
    $requete->fetch();

    // Stockage de l'e-mail dans la variable de session
    $_SESSION['email'] = $email;
} else {
    // Gestion de l'erreur si aucun administrateur n'est trouvé
    $_SESSION['email'] = '';
}

// Vérification de la réussite de la requête pour le nom et le prénom de l'administrateur
if ($requeteAdmin->num_rows > 0) {
    // Récupération du nom et du prénom de l'administrateur
    $requeteAdmin->bind_result($nom, $prenom);
    $requeteAdmin->fetch();

    // Stockage du nom et du prénom dans les variables de session
    $_SESSION['nomAdmin'] = $nom;
    $_SESSION['prenomAdmin'] = $prenom;
} else {
    // Gestion de l'erreur si aucun administrateur n'est trouvé
    $_SESSION['nomAdmin'] = '';
    $_SESSION['prenomAdmin'] = '';
}

// Fermeture de la requête
$requete->close();
$requeteAdmin->close();

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueiladmin2.css">
  
</head>

<body>
  <header>
    
      <div class="flex-container">
        <div><a href="#">Accueil</a></div>
        <div><a href="./ajouterProfEtudiant/ajouter.html"> Modification - Professeurs, Etudiants, Matieres </a></div>
      </div>
    <div class="flex-container1">
      <div><button id="open-popup">Mon compte admin </button>
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
      <tr>
        <td> Compétence1</td>
        <td> vvbfb </td>
        <td> vfbrbr </td>

      </tr>
      <tr>
        <td> Compétence 2 </td>
        <td> bbrbrfe </td>
        <td> grvefe </td>

      </tr>
      <tr>
        <td> Compétence 3 </td>
        <td> feefev </td>
        <td> vrvrrb </td>
      </tr>
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
      <h2><span class="texte-color">Mon Compte Admin</span></h2>
      <p>
        <ul>
          <li><p class="texte-color">Nom: <?php echo $_SESSION['nomAdmin']; ?></p> </li>
          <li><p class="texte-color">Prénom: <?php echo $_SESSION['prenomAdmin']; ?></p> </li>
          <li><p class="texte-color">E-mail: <?php echo $_SESSION['email']; ?></p> </li>
        </ul>
      </p>
      <button id="close-popup">Fermer</button>
      <form method="post" action="deconnexion.php">
        <button type="submit" name="logout">Se déconnecter</button>
      </form>
    </div>
  </div>


  <footer>
    <p>Copyright © 2023 Omnes MySkills.</p>
  </footer>
  
  <script src="pageaccueiladmin1.js"></script>
 
</body>
</html>