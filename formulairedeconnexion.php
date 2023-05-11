
	<?php
	// Connexion à la base de données
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'omnesmyskills';
	$conn = mysqli_connect($host, $user, $pass, $dbname);

	// Vérification des identifiants de connexion
	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$query = "SELECT * FROM `admin` WHERE `email` = '$email' AND `mdp` = '$password'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1){
			// Redirection vers la page d'accueil après connexion réussie
			header('Location: page_accueil.php');
			exit;
		}
		else{
			echo "Email ou mot de passe incorrect";
		}
	}

	mysqli_close($conn);
	?> 

	





