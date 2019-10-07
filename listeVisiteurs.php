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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<section class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $row) {
        ?>
        <tr>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><a href="modifVisiteur.php"><input type="button" value="Modifier"></a><?php $_SESSION['id'] = $row['id']; ?>
            <a href="suppVisiteur.php"><input type="button" value="Supprimer"></a><?php $_SESSION['id'] = $row['id']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
    <a href="enregVisiteurs.php" class="btn btn-outline-secondary btn-sm float-right" role="button">
        Retourner à la page d'enregistrement
    </a>
</section>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>