<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueiletudiant.css">
  
</head>
<?php
require_once '../../BDD/init.php';
//session_start();
// Vérification si l'utilisateur est connecté et s'il est administrateur
//if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur'] == 'username') {
    // Utilisateur connecté en tant qu'administrateur
   // echo "Vous êtes connecté en tant qu'administrateur.";
//} else {
    // Utilisateur non connecté ou non administrateur
    //echo "Vous n'êtes pas autorisé à accéder à cette page.";
    //exit;
//}
?>
<body>
  <header>
    <div class="flex-container">
      <div><a href="#">Accueil</a></div>
<<<<<<< HEAD
      <div><a href="../accueiletudiant/matieresetudiant/matieres.html">Matière</a></div>
      <div><a href="../accueiletudiant/mescompetences/mescompetences.html">Mes Compétences</a></div>
=======
      <div><a href="../matieresetudiant/matieres.html">Matière</a></div>
      <div><a href="">Mes Compétences</a></div>
>>>>>>> a5ca209d3eb634901d9c970c6c02b6823f85b7dd
      <div><a href="#">Compétences Transverses</a></div>
      <div><a href="../accueiletudiant/toutescompetences/toutescompetences.html">Toutes les compétences</a></div>
    </div>
    <div class="flex-container1">
      <div class="right"><a href="#">Mon Compte étudiant</a></div>
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
        <?php while ($donnees= mysqli_fetch_assoc($requete)){
         ?>
            <th> 
                <td> 
                    <?php echo $donnees['nom']; ?> </td>
        </th> 
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


  <footer>
    <p>Copyright © 2023 Omnes MySkills.</p>
  </footer>
  
  <script src="pageaccueiletudiant.js"></script>
</body>

</html>


