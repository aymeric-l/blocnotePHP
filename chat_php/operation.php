<?php 
	
	if($_POST['pseudo'] != '' AND $_POST['message'] != ''){ // Si aucun champs du formulaire n'est vide, alors :


	$pseudo = htmlspecialchars($_POST['pseudo']); // $pseudo est égale à la valeur du champ 'pseudo' du formulaire
	$message = htmlspecialchars($_POST['message']); // $message est égale à la valeur du champ 'message' du formulaire
	// htmlspecialchars sert à ne pas comprendre en compte les balise html que l'utilisateur aurait pu ecrire dans un des champs du formulaire
	
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion base de donnee
	//
	// PREPARE la requete, qui est : ajoute une ligne au tableau mysql et rempli (collone pseudo et message) par des valeur indiqué plus tard
	$envoi = $bdd->prepare('INSERT INTO message_chat(pseudo, message) VALUES(:pseudo, :message) ');


	$envoi->execute(array(			// Execute la requete en lui indiquant
			'pseudo' => $pseudo,	// que la valeur pseudo ajouté est égale à la variable $pseudo
			'message' => $message   // que la valeur message ajouté est égale à la variable $message
		));
	}

	header('Location: index.php');	// Redirection vers la page index.php apres le traitement du tableau

?>
