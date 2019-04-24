<?php 
$req = "SELECT * FROM recette" ;
$resultat = mysqli_query($connexion, $req);
if($resultat == FALSE) {
	printf("<p style='font-color: red;'>Erreur : problème d'exécution de la requête.</p>");
}
else {
	if(mysqli_num_rows($resultat) == 0) 
	{
		echo "<p>Il n'y a aucune recette dans la base.</p>";
	}
	else 
	{
		echo "<p><table style='width:100%' id='table'><tr><td id='td'><h7><b>titre de la recette</b></h7></td><td id='td'><h7><b>categorie</b></h7></td><td id='td'><h7><b>nombre de personnes</b></h7></td><td id='td'><h7><b>description</b></h7></td><td id='td'><h7><b>date</b></h7></td><td id='td'><h7><b>nom du cuisinier</b></h7></td></tr>";
		while ($row = mysqli_fetch_assoc($resultat)) 
		{
			echo "<tr><td id='td'>".$row['titreR']."</td><td id='td'>".$row['categorieR']."</td><td id='td'>".$row['nombrepersonnesR']."</td><td id='td'>".$row['descriptionR']."</td><td id='td'>".$row['dateprop']."</td><td id='td'>".$row['NomU']."</td></tr>";
		}
		echo "</table></p>";
	}
}
//même procédé que pour affichageingredient.php
?>