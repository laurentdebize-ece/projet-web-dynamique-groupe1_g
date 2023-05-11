
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=omnesmyskillsnew;
charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage())	;
}

if(isset($_POST['username'], $_POST['password'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	$reponse = $bdd->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
	$reponse->execute(array(
	'password'=> $password,
	'username'=> $username
	));

	var_dump($reponse);
	while ($donnes = $reponse->fetch()){
	?>
	<p> 
		Nom : <?php echo $donnees['password']; ?>,<br>
		Prénom : <?php echo $donnees['username']; ?>
	</p>
	<?php

}
$reponse->closeCursor();
}


