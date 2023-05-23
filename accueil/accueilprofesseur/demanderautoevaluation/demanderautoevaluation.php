<?php
session_start();

if (!isset($_SESSION['emailprof'])) {
    echo "Vous devez vous connecter pour accéder à cette page.";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "omnesmyskillsfinal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$profEmail = $_SESSION['emailprof'];

$sql = "SELECT id, nom FROM competences";
$result = $conn->query($sql);

$sql = "SELECT emaileleve FROM etudiant";
$result2 = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demander une auto-évaluation</title>
    <link rel="stylesheet" type="text/css" href="demanderautoeval.css">
</head>
<body>
    <h1>Demander une auto-évaluation</h1>
    <form action="processevaluation.php" method="POST">
        <label for="competence">Compétence :</label>
        <select name="competence" id="competence">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <label for="eleve">Élève :</label>
        <select name="eleve" id="eleve">
            <?php
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    echo "<option value='" . $row['emaileleve'] . "'>" . $row['emaileleve'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Demander">
    </form>
</body>
</html>
