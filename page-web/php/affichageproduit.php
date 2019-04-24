<?php 
$req = "SELECT * FROM produit NATURAL JOIN unite" ;
$resultat = mysqli_query($connexion, $req);
if($resultat == FALSE) {
	printf("<p style='font-color: red;'>Erreur : problème d'exécution de la requête.</p>");
}
else {
	if(mysqli_num_rows($resultat) == 0) 
	{
		echo "<p>Il n'y a aucun ingredient dans la base.</p>";
	}
	else 
	{
		echo "<p><table style='width:100%' id='table'><tr><td id='td'><h7><b>nom du produit</b></h7></td><td id='td'><h7><b>categorie</b></h7></td><td id='td'><h7><b>date</b></h7></td><td id='td'><h7><b>localisation</b></h7></td><td id='td'><h7><b>quantite</b></h7></td></tr>";
		while ($row = mysqli_fetch_assoc($resultat)) 
		{
			echo "<tr><td id='td'>".$row['nomP']."</td><td id='td'>".$row['categorieP']."</td><td id='td'>".$row['dateP']."</td><td id='td'>".$row['lieuP']."</td><td id='td'>".$row['quantiteP']."".$row['abreviationUN']."</tr>";
		}
		echo "</table></p>";
	}
}
//même procédé que pour affichageingredient.php
?>