<!-- _______________________________________________________________________________________________ -->
<!-- ______________ ECRIRE DANS UN FICHIER TXT QUI SERVIRA DE TABLEAU PAR LA SUITE ________________  -->
<!-- _______________________________________________________________________________________________ -->
<?php 
		$contenu = fopen('score.txt', 'a+'); // $contenu accede un fichier score.txt et place le "curseur" au dernier caractere a cause du a+

		// Ajoute en une ligne dans $contenu(le fichier score.txt) : valeur de pseudo dans l'url, du texte, une autre valeur url, texte... 
		fputs($contenu, $_GET['pseudo'] . "," . $_GET['min'] . "," . $_GET['sec'] . ",\n");
										// Les virgules sont là pour délimité des collones si on veut en faire un tableau plus tard 
		fclose($contenu);

 ?>


<!-- ________________________________________________________________________________________________________________________ -->
<!-- ______________ PRENDRE LES DONNEES D'UN FICHIER TXT ET LES TRANSFORMER EN UN TABLEAU MULTIDIMENSIONNEL ________________  -->
<!-- ________________________________________________________________________________________________________________________ -->
<?php 

$fichier = file('score.txt'); 	// Met le contenu de 'score.txt' dans la variable $fichier
	$grosTableau = []; 	// Creation d'un nouveau tableau
	foreach ($fichier as $key => $value) { // boucle qui parcours les lignes du $fichier une à une
		$ligne = explode(',', $value);	   // creation d'un 1er tableau, lui incluant une valeur pour chaque champs apres une virgule dans la phrase

// POUR QUE LE TABLEAU SOIT ASSOCIATIF -> $ligneDeux //	
			//
			// Creer le tableau $ligneDeux qui possedera les mêmes valeurs que $ligne et au même endroit
			// mais on lui ajoute "pseudo" => "minute"=> et "seconde"=> pour que ce soit un tableau associatif(tableau avec une 'id' par collone)
			$ligneDeux = array("pseudo" => $ligne[0], "minute" => $ligne[1], "seconde" => $ligne[2]);


			array_push($grosTableau, $ligne);  
			// Push le tableau précedement crée(avec $ligne ou $ligneDeux, associatif ou non au choix) dans le gros tableau
							// Le gros tableau multidimensionnel contiendra autant de tableaux que de lignes dans le fichier txt
			}


		// FONCTION TRI PAR ORDRE CROISSANT - DECROISSANT ///
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ 
			$tri = Array(); 
			foreach($grosTableau as &$ma) 
   			$tri[] = &$ma[2];  // ou alors =&ma['seconde'] si on choisi de push $ligneDeux à la place de $ligne
			array_multisort($tri,SORT_ASC, $grosTableau);


	// Afficher le contenu en brut du tableau VERSION MULTIDIMENTIONNEL CLASSIQUE
	// On affiche la 5eme valeur -> [4] du premier tableau ->[0]
	// (équivalent à la valeur situé apres la 4eme virgule de la premiere ligne du fichier txt) 
	echo $grosTableau[0][4] . '</br>'; 
	echo $grosTableau[1][4] . '</br>'; // Selectionne le 2eme tableau (le [1]) et affiche sa 5eme collone ( le [4] du tableau [1])
	echo $grosTableau[2][4] . '</br>'; // Ect ect, 3eme tableau, 5eme collone, équivalent a la valeur situé apres la 4eme virgule
																				// à la ligne 3 du fichier txt

	//VERSION TABLEAU ASSOCIATIF afficher le contenu du tableau //
	for($i=0; $i < count($grosTableau); $i++){ // Parcours toutes les lignes du tableau et affiche des valeurs du tableau et du texte

			echo $grosTableau[$i]['pseudo'] . ' à terminé en ' . $grosTableau[$i]['minute'] . ' minute et ' . $grosTableau[$i]['seconde'] . ' secondes.' . '</br>'; 
			// Dans ce cas, ['pseudo'] revient au même que d'écrire [0], ['minute'] reviendrait à [1] ect...
			// mais c'est un tableau associatif donc ont utilise ['pseudo'], ['seconde'] à la place, à la maniere d'une ID
			// Des actions pourrons être effectuées facilement sur toutes les differente valeurs de la collone ['seconde'] par exemple
		}
?>
