<?php
session_start();

require_once '../../BDD/init.php';
$requete2 = mysqli_query($conn, ' SELECT nom FROM competences ');
// Requête SQL pour récupérer l'e-mail de l'étudiant
$requete = $conn->prepare("SELECT emaileleve FROM etudiant WHERE emaileleve = ?");
$requete->bind_param("s", $_SESSION['emaileleve']);
$requete->execute();
$requete->store_result();

// Requête SQL pour récupérer le nom et le prénom de l'étudiant
$requeteEtudiant = $conn->prepare("SELECT nom, prenom FROM etudiant WHERE emaileleve = ?");
$requeteEtudiant->bind_param("s", $_SESSION['emaileleve']);
$requeteEtudiant->execute();
$requeteEtudiant->store_result();

// Vérification de la réussite de la requête
if ($requete->num_rows > 0) {
  // Récupération de l'e-mail de l'étudiant
  $requete->bind_result($emaileleve);
  $requete->fetch();

  // Stockage de l'e-mail dans la variable de session
  $_SESSION['emaileleve'] = $emaileleve;
} else {
  // Gestion de l'erreur si aucun étudiant n'est trouvé
  $_SESSION['emaileleve'] = '';
}

// Vérification de la réussite de la requête pour le nom et le prénom de l'étudiant
if ($requeteEtudiant->num_rows > 0) {
  // Récupération du nom et du prénom de l'étudiant
  $requeteEtudiant->bind_result($nom, $prenom);
  $requeteEtudiant->fetch();

  // Stockage du nom et du prénom dans les variables de session
  $_SESSION['nomEtudiant'] = $nom;
  $_SESSION['prenomEtudiant'] = $prenom;
} else {
  // Gestion de l'erreur si aucun étudiant n'est trouvé
  $_SESSION['nomEtudiant'] = '';
  $_SESSION['prenomEtudiant'] = '';
}

// Fermeture de la requête
$requete->close();
$requeteEtudiant->close();

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueiletudiant5.css">
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
      <div><a href="../accueiletudiant/nouvellesautoevaldemande/nouvellesautoevaldemande.php">Nouvelles auto eval demande</a></div>
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
    <p class="article"><br>

      Omnes Skills est une plateforme en ligne qui révolutionne la façon dont les individus développent et présentent leurs compétences.</br>
      <br> Omnes Skills est l'outil idéal pour mettre en avant vos talents et voir dans quelles matières vous performer le plus.

      Grâce à Omnes Skills, vous pouvez mettre en évidence vos compétences clés. La plateforme propose une large gamme de catégories, allant des compétences techniques telles que la programmation ou la gestion de projet, aux compétences interpersonnelles comme la communication et le travail en groupe.

      Ce qui rend Omnes Skills vraiment unique, c'est sa fonctionnalité de validation des compétences. Les utilisateurs peuvent demander à leurs collègues, superviseurs ou clients de témoigner de leurs compétences spécifiques. Ces validations fournissent une preuve tangible de vos aptitudes.</br>

      <br> En résumé, Omnes Skills est bien plus qu'une simple plateforme de gestion de compétences. En tant qu'étudiant, Omnes Skills est là pour vous aider à atteindre vos objectifs.</br>
    </p>
    <h2> Ici, vous pouvez trouver les différentes compétences pour vous améliorer</h2>
    

    <table>
      <th>Noms des compétences:</th>
      <?php while ($donnees = mysqli_fetch_assoc($requete2)) {
      ?>
        <tr>
          <td>
            <?php echo $donnees['nom']; ?> </td>
        </tr>
      <?php } ?>

    </table>

  </main>

  <div class="popup-overlay">
    <div class="popup-content">
      <h2><span class="texte-color">Mon Compte Etudiant</span></h2>
      <p>
      <ul>
        <li>
          <p class="texte-color">Nom: <?php echo $_SESSION['nomEtudiant']; ?></p>
        </li>
        <li>
          <p class="texte-color">Prénom: <?php echo $_SESSION['prenomEtudiant']; ?></p>
        </li>
        <li>
          <p class="texte-color">E-mail: <?php echo $_SESSION['emaileleve']; ?></p>
        </li>
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