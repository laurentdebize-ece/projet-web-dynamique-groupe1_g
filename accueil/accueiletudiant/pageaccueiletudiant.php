<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'omnesmyskillsfinal';

$conn = mysqli_connect($host, $user, $pass, $dbname);
$requete = mysqli_query($conn,' SELECT nom FROM competences ');
    
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Omnes MySkills - Accueil</title>
  <link rel="stylesheet" type="text/css" href="pageaccueiletudiant.css">
  
</head>

<body>
  <header>
  
    <div class="flex-container">
      <div><a href="#">Accueil</a></div>
      <div><a href="http://localhost:8000/laurentdebize-ece/projet-web-dynamique-groupe1_g/accueil/accueiletudiant/matieresetudiant/matieres.html">Matière</a></div>
      <div><a href="http://localhost:8000/laurentdebize-ece/projet-web-dynamique-groupe1_g/accueil/accueiletudiant/mescompetences/mescompetences.html">Mes Compétences</a></div>
      <div><a href="#">Compétences Transverses</a></div>
      <div><a href=" ../toutescompetences/toutescompetences.html">Toutes les compétences</a></div>
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
        <label>Nom de la compétence:</label>
        <?php while ($donnees= mysqli_fetch_assoc($requete)){
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


  <footer>
    <p>Copyright © 2023 Omnes MySkills.</p>
  </footer>
  
  <script src="pageaccueiletudiant.js"></script>
</body>

</html>


