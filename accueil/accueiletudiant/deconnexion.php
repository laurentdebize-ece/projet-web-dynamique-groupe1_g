<?php
// Début de la session
session_start();

if (isset($_POST['logout'])) {
    
    session_unset();
  
    session_destroy();
  
    header("Location: ../../connexion/page_connexion.html");
    exit;
}
?>
