
<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'omnesmyskillsnew';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Vérification des identifiants de connexion
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Vérifier si la requête s'est exécutée avec succès
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Redirection vers la page d'accueil après connexion réussie
            header('Location: page_accueil.html');
            exit;
        } else {
            echo "Email ou mot de passe incorrect";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
