<?php
if(isset($_GET['prix'])){ // Si prix est declaré dans l'url "index.php?prix="" , alors :
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', ''); // Connexion a la base de donnee
// requete simple sans execute
//  $donnees = $bdd->query('SELECT * FROM jeux_video ORDER BY console DESC');


	$donnees = $bdd->prepare(('SELECT * FROM jeux_video WHERE prix = ?')); // Donnees contient jeux_video mais SEULEMENT les lignes qui auront
																		   // la valeur de prix égale à l'execute plus bas 
	$donnees -> execute(array($_GET['prix']));	// Recherche la valeur de prix dans l'url

while($contenu = $donnees->fetch()){	// Boucle pour afficher tout le contenu de $donnees ligne par ligne

	echo $contenu['nom'] . ' est à ' . $contenu['prix'] . ' euros</br>'; // Ecriture des valeurs de la collone 'nom' et 'prix' qui
}																		 // qui ont été retenu dans $donnees malgres le 'WHERE prix = ?'
}	// Affichera le nom du jeu et son prix si le chiffre choisi dans l'url 
	// avec index.php?prix=votreChiffre correspond au prix d'un jeu dans le tableau
?>