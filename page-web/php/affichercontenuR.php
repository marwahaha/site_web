<?php
$formulaireestValide = FALSE;
if(isset($_POST['BoutonOk'])) { //si on a cliqué sur Ok
	if(isset($_POST['Saisie']) && trim($_POST['Saisie']) != '') {//verifie si on a saisi une chaine de caractère
		$formulaireestValide = TRUE;
		$Saisie = mysqli_real_escape_string($connexion,$_POST['Saisie']); //conserve les caractères spéciaux
		$req = 'SELECT OrdreE,IngredientConcerne,instructionE,nomustensileE FROM etape NATURAL JOIN composer WHERE titreR LIKE \'%'.$Saisie.'%\' ORDER BY titreR,OrdreE;';
		if($formulaireestValide) {
			$res = mysqli_query($connexion,$req); //résultat de la requette stockée dans une variable
			if($res == FALSE || mysqli_num_rows($res) == 0) { //si pas de tuples ou si erreur
				echo '<p>Il n y a aucun resultat '.$Saisie.' !</p>';
			}
			else {
				echo '<p>Voici les resultats: '.$Saisie.'</p>';
				$nbChamps = mysqli_field_count($connexion); //nombre de colonnes de la derniere requete sql
				while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {//tant qu'on est pas au bout du tableau numérique de la requete
					for($i=0; $i<$nbChamps; $i++) // pour tous les champs de chaque recette
						echo $row[$i].'<br/>';//afficher le contenu à l'emplacement i
					echo '<br/><br/>';
				}
			}
		}
	}
}

if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:40px; width:40%;"> <!--contour orange!-->
		<form name="formRechercheDansLaBase" method="post" action="index.php?page=affichercontenuR.php"><!--lien vers le même fichier!-->
		<table width="100%">
		<tr>
			<td><label style="font-weight:bold" for="idSaisie">De quelle recette voulez-vous afficher les etapes</label></td>
			<td><input type="text" name="Saisie" id="idSaisie" /></td><!--zone de texte de $Saisie !-->
		</tr>
		<tr style="text-align:center;">
			<td colspan=2><br/><br/><input type="submit" style="font-variant: small-caps;" name="BoutonOk" value="BoutonOk"></td><!--créé le bouton Ok!-->
		</tr></table>
		</form>
	</fieldset>
<?php
}
?>