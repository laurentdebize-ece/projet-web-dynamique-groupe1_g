<?php
require_once '../BDD/init.php';

// Vérification des identifiants de connexion
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Requête pour vérifier les identifiants dans la table "admin"
    $query_admin = "SELECT * FROM admin WHERE email = '$username' AND mdp = '$password'";
    $result_admin = mysqli_query($conn, $query_admin);

    // Requête pour vérifier les identifiants dans la table "etudiant"
    $query_etudiant = "SELECT * FROM etudiant WHERE emaileleve = '$username' AND `motdepasse` = '$password'";
    $result_etudiant = mysqli_query($conn, $query_etudiant);

    // Requête pour vérifier les identifiants dans la table "professeur"
    $query_professeur = "SELECT * FROM professeur WHERE emailprof = '$username' AND `motdepasse` = '$password'";
    $result_professeur = mysqli_query($conn, $query_professeur);

    if (($result_admin && mysqli_num_rows($result_admin) == 1) || ($result_etudiant && mysqli_num_rows($result_etudiant) == 1) || ($result_professeur && mysqli_num_rows($result_professeur) == 1)) {
        session_start();
        $_SESSION['utilisateur'] = $username;

        // Vérification si la connexion est réussie pour l'une des tables
        if ($result_admin && mysqli_num_rows($result_admin) == 1) {
            // Redirection vers la page d'accueil après connexion réussie pour l'administrateur
            header("Location: ../accueil/accueiladmin/pageaccueiladmin.php");
            exit;
        } elseif ($result_etudiant && mysqli_num_rows($result_etudiant) == 1) {
            // Récupération des données de l'étudiant
            $row_etudiant = mysqli_fetch_assoc($result_etudiant);
            
            // Récupération de l'e-mail de l'étudiant
            $emailEtudiant = $row_etudiant['emaileleve'];
        
            // Stockage de l'e-mail dans la variable de session
            $_SESSION['emaileleve'] = $emailEtudiant;
        
            // Redirection vers la page d'accueil après connexion réussie pour l'étudiant
            header("Location: ../accueil/accueiletudiant/pageaccueiletudiant.php");
            exit;
        } elseif ($result_professeur && mysqli_num_rows($result_professeur) == 1) {
            // Récupération de l'e-mail du professeur
            $row_professeur = mysqli_fetch_assoc($result_professeur);
            $emailProfesseur = $row_professeur['emailprof'];

            // Stockage de l'e-mail dans la variable de session
            $_SESSION['emailprof'] = $emailProfesseur;

            // Redirection vers la page d'accueil après connexion réussie pour le professeur
            header("Location: ../accueil/accueilprofesseur/pageaccueilprof.php");
            exit;
        }
    } else {
        echo "Email ou mot de passe incorrect";
    }
}

mysqli_close($conn);
?>

