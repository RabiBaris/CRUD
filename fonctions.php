<?php 

function connexion(){
	try {
 	return $db = new PDO('mysql:host=localhost; dbname=users', 'root', '');
  }

  catch(exception $e) {

    die('Erreur '.$e->getMessage());

  }
}

function check($post) {
	if (isset($post['valider'])) {
		if (!empty($post['nom']) && !empty($post['prenom']) && !empty($post['email'])) {
			return true;
		}
	}

	return false;
}