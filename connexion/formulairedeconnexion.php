<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'omnesmyskillsfinal';

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Vérification des identifiants de connexion
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Requête pour vérifier les identifiants dans la table "admin"
    $query_admin = "SELECT * FROM admin WHERE email = '$username' AND mdp = '$password'";
    $result_admin = mysqli_query($conn, $query_admin);

    // Requête pour vérifier les identifiants dans la table "etudiant"
    $query_etudiant = "SELECT * FROM etudiant WHERE emaileleve = '$username' AND `mot de passe` = '$password'";
    $result_etudiant = mysqli_query($conn, $query_etudiant);

    // Requête pour vérifier les identifiants dans la table "professeur"
    $query_professeur = "SELECT * FROM professeur WHERE emailprof = '$username' AND `mot de passe` = '$password'";
    $result_professeur = mysqli_query($conn, $query_professeur);

    // Vérification si la connexion est réussie pour l'une des tables
    if ($result_admin && mysqli_num_rows($result_admin) == 1) {
        // Redirection vers la page d'accueil après connexion réussie pour l'administrateur
        header("Location: ../accueil/accueiladmin/pageaccueiladmin.html");
       
        exit;
    } elseif ($result_etudiant && mysqli_num_rows($result_etudiant) == 1) {
        // Redirection vers la page d'accueil après connexion réussie pour l'étudiant
        header("Location: ../accueil/accueiletudiant/pageaccueiletudiant.html");
        exit;
    } elseif ($result_professeur && mysqli_num_rows($result_professeur) == 1) {
        // Redirection vers la page d'accueil après connexion réussie pour le professeur
        header("Location: ../accueil/accueilprof/pageaccueilprof.html");
        exit;
    } else {
        echo "Email ou mot de passe incorrect";
    }
}

mysqli_close($conn);
?>


