<section>
<img id = "Photo1" src="img/Homer-Simpson.png" width="50%" height="40%" />
<img id = "Photo2" src="img/cuisine.png" width="47%" height="90%" />
<p id = "TexteAcceuil" />Bienvenue dans un nouveau restaurant unique en son genre. 
Il permet de passer un bon moment en famille ou avec ses amis.<br/>
Nous avons décidé de réunir les concepts de fast-food et de restaurant classique.<br/>
Nous vous proposons de goûter soit à des burgers soit de déguster un bon plat de pâtes.<br/>
A vous de choisir. Bon Appétit!!!!!!!!!!!!!!!!
</section>
<?php
$req = 'SELECT COUNT(nomI) FROM ingredient;'; //compteur du nombre d'ingrédients ...
$req2 = 'SELECT COUNT(nomP) FROM produit;';//... de produits ...
$req3 = 'SELECT COUNT(titreR) FROM recette;';//... et de recettes
$resultat = mysqli_query($connexion, $req);//retourne le résultat de la requête ou FALSE si erreur d'execution
$resultat2 = mysqli_query($connexion, $req2);
$resultat3 = mysqli_query($connexion, $req3);
if(($resultat == FALSE)||($resultat2 == FALSE)||($resultat3 == FALSE)) { //si erreur d'execution d'un résultat
	printf("<p style='font-color: red;'>Erreur : problème d'exécution de la requête.</p>");
}
else
{
	$row = mysqli_fetch_assoc($resultat); //récupère le résultat dans un tableau associatif
	$row2 = mysqli_fetch_assoc($resultat2);
	$row3 = mysqli_fetch_assoc($resultat3);
	echo "<p id = 'stats' />Notre Site propose un total de ".$row['COUNT(nomI)']." ingrédients, " //affiche ce résultat dans une phrase
	.$row2['COUNT(nomP)']." produits ainsi que ".$row3['COUNT(titreR)']." recettes.";
}

?>