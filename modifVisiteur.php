<?php
include "fonctions.php";

session_start();

$db = connexion();
if (isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $data = $db->query("SELECT * FROM utilisateur WHERE id = " . $id)->fetch();
    var_dump($data);
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $email = $data['email'];

}else{
    echo "Vous n'avez choisi de modifier aucun visiteur !";
}
if (check($_POST)) {
    $sql = "UPDATE utilisateur SET nom = ".$_POST['nom'].", prenom = ".$_POST['prenom'].", email = ".$_POST['email']." WHERE id = $id";
    var_dump($sql);
    $db->exec($sql);
    var_dump($_POST);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    header('Location: listeVisiteurs.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="" method="post">

            <input type="text" name="nom" value="<?php echo $nom; ?>">
            <input type="text" name="prenom" value="<?php echo $prenom; ?>">
            <input type="email" name="email" value="<?php echo $email; ?>">
            <input type="submit" name="valider" value="Valider">
        </form>
    </body>
</html>
