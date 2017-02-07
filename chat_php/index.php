<form action="operation.php" method="post"> 
	<p><input type="text" name="pseudo"><label>Indiquez votre pseudo </label></p>
	<p><input type="text" name="message"><label>Votre message</label></p>
	<p><input type="submit" name="envoi"></p> <!-- Envoi les valeur des champs vers la page annoncé dans la balise form -->
</form>

<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion base de donnee
	$contenu = $bdd->query('SELECT * FROM message_chat ORDER BY id DESC LIMIT 7'); // Met dans $contenu tout le contenu du tableau message_chat
																		// Trier par odre décroissant de l'id, selectionne seulement 7 lignes !
	
	foreach ($contenu as $key => $dixLignes) { // Pour chaques lignes dans $contenu, donne une à une chaque valeur à $dixligne, et :
		echo '<p>' . $dixLignes['pseudo'] . ' : ' . $dixLignes['message'] . '</p>';
	}	// Inscrit dans le html chaque ligne une à une avec les valeurs obtenues au passage de la boucle foreach(equivalent à boucle for i++)


?>