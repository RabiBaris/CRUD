<?php 

include "fonctions.php";

session_start();

$db = connexion();

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_SESSION['data'])) {
	$_SESSION['data'] = [];
}

if (check($_POST)) {
	$user = [$_POST['nom'], $_POST['prenom'], $_POST['email']];
	var_dump($user);

	$data = [
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
		'email' => $_POST['email'],
	];

	$sql = "INSERT INTO utilisateur (id, nom, prenom, email) VALUES (null,:nom,:prenom,:email)";
	$stmt= $db->prepare($sql);
	$stmt->execute($data);
	var_dump($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="nom" placeholder="Nom">
		<input type="text" name="prenom" placeholder="Prénom">
		<input type="email" name="email" placeholder="Email">
		<input type="submit" name="valider" value="Valider">
	</form>
	<a href="listeVisiteurs.php">
		<input type="button" value="Voir les visiteurs enregistrés" />
	</a>
</body>
</html>

<?php 



?>