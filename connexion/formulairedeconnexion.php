
<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$pass = '';
//$pass = 'root';
$dbname = 'omnesmyskillsfinal';
//$dbname = 'omnesmyskills';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Vérification des identifiants de connexion
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars( $_POST['password']);

    //echo 'username : ' . $username . ' pwd : ' . $password . '<br>';

    $query = "SELECT * FROM admin WHERE email = '$username' AND mdp = '$password'";
    $result = mysqli_query($conn, $query);


    // Vérifier si la requête s'est exécutée avec succès
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Redirection vers la page d'accueil après connexion réussie
            header("Location: ../accueil/pageaccueil.html");
            //echo "Email ou mot de passe correct";
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
