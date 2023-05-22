<?php
session_start();

require_once '../../BDD/init.php';
$requete2 = mysqli_query($conn,' SELECT nom FROM competences ');
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
       <?php while ($donnees= mysqli_fetch_assoc($requete2)){
         ?>
            <tr> 
                <td> 
                    <?php echo $donnees['nom']; ?> </td>
        </tr>
        <?php } ?>
      
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
          <li><span class="texte-color">Nom:</span> <?php echo $_SESSION['nomEtudiant']; ?></li>
          <li><span class="texte-color">Prénom:</span> <?php echo $_SESSION['prenomEtudiant']; ?></li>
          <li><span class="texte-color">E-mail:</span> <?php echo $_SESSION['emaileleve']; ?></li>
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
