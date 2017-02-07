<?php 

$fichier = file('score.txt'); 	// Met le contenu de 'score.txt' dans la variable $fichier
		$grosTableau = []; 	// Creation d'un nouveau tableau
		foreach ($fichier as $key => $value) { // boucle qui parcours les lignes du $fichier une à une
			$ligne = explode(',', $value);	   // creation d'un 1er tableau, lui incluant une nouvelle valeur apres chaque virgule dans la phrase
			array_push($grosTableau, $ligne);  // Push le tableau  précedement crée (donc équivalent à une ligne du texte) dans le gros tableau
										// Les gros tableau multidimensionnel contiendra autant de tableaux que de lignes dans le fichier txt
			}

		// On affiche la 5eme valeur -> [4] du premier tableau ->[0]
		// (équivalent à la valeur situé apres la 4eme virgule de la premiere ligne du fichier txt) 
		echo $grosTableau[0][4] . '</br>'; 
		echo $grosTableau[1][4] . '</br>'; // Selectionne le 2eme tableau (le [1]) et affiche sa 5eme collone ( le [4] du tableau [1])
		echo $grosTableau[2][4] . '</br>'; // Ect ect, 3eme tableau, 5eme collone, équivalent a la valeur situé apres la 4eme virgule
																				// à la ligne 3 du fichier txt
?>