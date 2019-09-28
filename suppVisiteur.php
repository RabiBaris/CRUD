<?php
include "fonctions.php";

session_start();

$db = connexion();
if (isset($_SESSION['id']))
{
    $id = $_SESSION['id'];

    $sql = "DELETE FROM utilisateur WHERE id = ". $id;
    $db->exec($sql);
}else{
    echo "Vous n'avez choisis de supprimer aucun visiteur !";
}

header('Location: listeVisiteurs.php');
