
<?php

try
{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;
charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage())	;
}

if(isset($_POST['login'], $_POST['pwd'])){
	$login = htmlspecialchars($_POST['login']);
	$login = htmlspecialchars($_POST['pwd']);

	$reponse = $bdd->prepare('SELECT * FROM Person WHERE login = :login AND pwd = :pwd');
	$reponse->execute(array(
	'pwd'=> $pwd,
	'login'=> $login
	));

	var_dump($reponse);
	while ($donnes = $reponse->fetch()){
	?>
	<p> 
		Nom : <?php echo $donnees['lastname']; ?>,<br>
		Prénom : <?php echo $donnees['firstname']; ?>
	</p>
	<?php

}
$reponse->closeCursor();
}


