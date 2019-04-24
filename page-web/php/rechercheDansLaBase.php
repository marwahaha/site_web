<h1>Recherche dans le catalogue</h1>
<?php
$formulaireestValide = FALSE;
if(isset($_POST['BoutonOk'])) { //si le bouton Ok est pressé
	if(isset($_POST['Saisie']) && trim($_POST['Saisie']) != '' && isset($_POST['Nomdetable'])) { //verifie si on a saisi une chaine de caractère associée à $Saisie,$Nomdetable
		$Saisie = mysqli_real_escape_string($connexion,$_POST['Saisie']); //conserve les caractères spéciaux
		$Nomdetable = mysqli_real_escape_string($connexion,$_POST['Nomdetable']);

		if($_POST['Nomdetable'] == 'ingredient') {
			$req = 'SELECT * FROM '.$Nomdetable.' WHERE nomI LIKE \'%'.$Saisie.'%\';';
			$formulaireestValide = TRUE;
		}
		else if($_POST['Nomdetable'] == 'recette') {
			$req = 'SELECT * FROM '.$Nomdetable.' WHERE titreR LIKE \'%'.$Saisie.'%\';';
			$formulaireestValide = TRUE;
		}
		else if($_POST['Nomdetable'] == 'produit')
		{
			$req = 'SELECT * FROM '.$Nomdetable.' WHERE nomP LIKE \'%'.$Saisie.'%\';';
			$formulaireestValide = TRUE;
		}

		if($formulaireestValide) {
			$res = mysqli_query($connexion, $req);
			if($res == FALSE || mysqli_num_rows($res) == 0) {
				echo '<p>Il n y a aucun resultat '.$Saisie.' !</p>';
			}
			else {
				echo '<p>Voici les resultats: '.$Saisie.'</p>';
				$nbChamps = mysqli_field_count($connexion);
				while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
					for($i=0; $i<$nbChamps; $i++)
						echo $row[$i].'<br/>';
					echo '<br/><br/>';
				}
			}
		}
	}
}

if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:40px; width:40%;">
		<form name="formRechercheDansLaBase" method="post" action="index.php?page=rechercheDansLaBase.php">
		<table width="100%">
		<tr>
			<td><label style="font-weight:bold" for="idNomdetable">Dans quelle base voulez-vous cherchez</label></td>
			<td>
			<select name="Nomdetable" id="idNomdetable">
				<option value="ingredient">ingredient</option>
				<option value="produit">produit</option>
				<option value="recette">recette</option>
			</select>
			</td>
			<td><label style="font-weight:bold" for="idSaisie">la valeur</label></td>
			<td><input type="text" name="Saisie" id="idSaisie" /></td>
		</tr>
		<tr style="text-align:center;">
			<td colspan=2><br/><br/><input type="submit" style="font-variant: small-caps;" name="BoutonOk" value="BoutonOk"></td>
		</tr></table>
		</form>
	</fieldset>
<?php
}
?>

