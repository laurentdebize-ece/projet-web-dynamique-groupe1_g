<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de modification</title>
</head>
<body>
    <!-- Formulaire de modification d'un étudiant -->
    <h2>Modifier un étudiant</h2>
    <form action="modifier2.php" method="post">
  <table>
    <tr>
      <th>Nom</th>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr>
      <th>Prénom</th>
      <td><input type="text" name="prenom"></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input type="text" name="emaileleve"></td>
    </tr>
    <tr>
      <th>Mot de passe</th>
      <td><input type="password" name="motdepasse"></td>
    </tr>
    <tr>
      <th>Numéro de classe</th>
      <td><input type="text" name="numeroclasse"></td>
    </tr>
    <tr>
      <th>ecole</th>
      <td><input type="text" name="ecole"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="valider1" value="Valider">
      </td>
    </tr>
  </table>
</form>
<!-- Formulaire de modification d'un prof -->
<h2>Modifier un professeur</h2>
    <form action="modifier2.php" method="post">
    <table>
    <tr>
      <th>Nom</th>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr>
      <th>Prénom</th>
      <td><input type="text" name="prenom"></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input type="text" name="emailprof"></td>
    </tr>
    <tr>
      <th>Mot de passe</th>
      <td><input type="password" name="motdepasse"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="modifier2" value="Valider">
      </td>
    </tr>
  </table>
</form>
<!-- Formulaire de modification d'une matière -->
<h2>Modifier une matière</h2>
<form action="modifer2.php" method="post">
  <table>
    <tr>
      <th>Nom de la matière</th>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr>
      <th>numero de la matière</th>
      <td><input type="text" name="numeromatiere"></td>
    </tr>
    <tr>
      <th>volume horaire</th>
      <td><input type="text" name="volumehoraire"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="modifier3" value="Valider">
      </td>
    </tr>
  </table>
</form>

</body>
</html>
