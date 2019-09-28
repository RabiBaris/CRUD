<?php

include "fonctions.php";

session_start();

$db = connexion();

$data = $db->query("SELECT * FROM utilisateur")->fetchAll();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Email</th>
			<th>Supprimer</th>
			<th>Modifier</th>
		</tr>
		<?php
		foreach ($data as $row) {
			?>
			<tr>
				<td><?php echo $row['nom'] ?></td>
				<td><?php echo $row['prenom'] ?></td>
				<td><?php echo $row['email'] ?></td>
                <td><a href="suppVisiteur.php"><input type="button" value="Supprimer"></a><?php $_SESSION['id'] = $row['id']; ?></td>
                <td><a href="modifVisiteur.php"><input type="button" value="Modifier"></a><?php $_SESSION['id'] = $row['id']; ?></td>
			</tr>
			<?php
		}
		?>
	</table>     


	<a href="enregVisiteurs.php">Retourner à la page d'enregistrement</a>


</body>
</html>