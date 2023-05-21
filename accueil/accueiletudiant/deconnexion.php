<?php
// Début de la session
session_start();

// Vérification si le bouton de déconnexion est cliqué
if (isset($_POST['logout'])) {
    //Destruction de toutes les variables de session
    session_unset();
    // Destruction de la session
    session_destroy();
    //echo "Vous avez été déconnecté avec succès.";
    // Redirection vers la page de connexion
    header("Location: ../../connexion/page_connexion.html");
    exit;
}
?>
