<?php
session_start();

require_once '../../BDD/init.php';
// Recup l'e-mail de l'admin
$requete = $conn->prepare("SELECT email FROM admin WHERE email = ?");
$requete->bind_param("s", $_SESSION['email']);
$requete->execute();
$requete->store_result();

// Recup nom et le prénom de l'admin
$requeteAdmin = $conn->prepare("SELECT nom, prenom FROM admin WHERE email = ?");
$requeteAdmin->bind_param("s", $_SESSION['email']);
$requeteAdmin->execute();
$requeteAdmin->store_result();

// Vérif
if ($requete->num_rows > 0) {
    // Récup de l'e-mail de l'administrateur
    $requete->bind_result($email);
    $requete->fetch();

    // Stockage de l'e-mail dans la variable de session
    $_SESSION['email'] = $email;
} else {
    // en cas d'erreur
    $_SESSION['email'] = '';
}

// Vérif
if ($requeteAdmin->num_rows > 0) {
    // Récup du nom et du prénom de l'administrateur
    $requeteAdmin->bind_result($nom, $prenom);
    $requeteAdmin->fetch();

    // Stockage du nom et du prénom dans les variables de session
    $_SESSION['nomAdmin'] = $nom;
    $_SESSION['prenomAdmin'] = $prenom;
} else {
    // En cas d'erreur
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
  <link rel="stylesheet" type="text/css" href="pageaccueiladmin.css">
  
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

    <p class="article"><br>

      Omnes Skills est une plateforme en ligne qui révolutionne la façon dont les individus développent et présentent leurs compétences.</br>
      <br> Omnes Skills est l'outil idéal pour mettre en avant vos talents et voir dans quelles matières vous performer le plus.

      Grâce à Omnes Skills, vous pouvez mettre en évidence vos compétences clés. La plateforme propose une large gamme de catégories, allant des compétences techniques telles que la programmation ou la gestion de projet, aux compétences interpersonnelles comme la communication et le travail en groupe.

      Ce qui rend Omnes Skills vraiment unique, c'est sa fonctionnalité de validation des compétences. Les utilisateurs peuvent demander à leurs collègues, superviseurs ou clients de témoigner de leurs compétences spécifiques. Ces validations fournissent une preuve tangible de vos aptitudes.</br>

      <br> En résumé, Omnes Skills est bien plus qu'une simple plateforme de gestion de compétences. En tant qu'étudiant, Omnes Skills est là pour vous aider à atteindre vos objectifs.</br>
    </p>

    

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
  </main>


  <footer>
    <p>Copyright © 2023 Omnes MySkills.</p>
  </footer>
  
  <script src="pageaccueiladmin1.js"></script>
 
</body>
</html>