<?php
include "fonctions.php";

session_start();

$db = connexion();
var_dump($_POST);
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
if (isset($_POST['envoyer'])) {
    $sql = "UPDATE utilisateur SET nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."', email = '".$_POST['email']."' WHERE id = $id";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row text-white">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <div class="info-form">
                        <form action="" method="post" class="form-inlin justify-content-center mt-5">
                            <div class="form-group">
                                <label class="sr-only">Nom</label>
                                <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Prénom</label>
                                <input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            </div>
                            <button type="submit" name="envoyer" class="btn btn-success ">Modifier</button>
                        </form>
                    </div>
                    <br>

                    <a href="listeVisiteurs.php" class="btn btn-outline-secondary btn-sm" role="button">
                        Annuler la modification
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
