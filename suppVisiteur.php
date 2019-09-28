<?php
include "fonctions.php";

session_start();

$db = connexion();

$id = $_SESSION['id'];

$sql = "DELETE FROM utilisateur WHERE id = ". $id;
$db->exec($sql);

header('Location: listeVisiteurs.php');
