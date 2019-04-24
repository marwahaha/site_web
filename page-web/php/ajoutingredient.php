
<?php
$formulaireestValide = FALSE;
if(isset($_POST['boutonOk'])) {//si le bouton Ok est pressé
	if(isset($_POST['nomI']) && trim($_POST['nomI']) != '') { //verifie si on a saisi une chaine de caractère associée à $nomI
		$nomIngredient = mysqli_real_escape_string($connexion, $_POST['nomI']);//conserve les caractères spéciaux
		$nomCategorie = mysqli_real_escape_string($connexion, $_POST['categorieI']);
		$lieu = mysqli_real_escape_string($connexion, $_POST['lieuI']);
		$quantite = mysqli_real_escape_string($connexion, $_POST['quantiteStockI']);
		$unite = mysqli_real_escape_string($connexion, $_POST['nomUN']);
		$res = mysqli_query($connexion, 'SELECT nomI FROM ingredient WHERE nomI=\''.$nomIngredient.'\';');
		if($res == TRUE && mysqli_num_rows($res) != 0) {//si la requete s'est effectuée mais que le nombre de tuples est nul
			echo '<p>Cet ingredient existe déjà dans la base !</p>';
		}
		else {

			$req = 'INSERT INTO ingredient VALUES(\''.$nomIngredient.'\',\''.$nomCategorie.'\',\''.date('Y-m-d').'\',\''.$lieu.'\',\''.$quantite.'\',NULL,NULL,\''.$unite.'\');';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) {
			    echo '<p>Erreur lors de l\'insertion de l\'ingredient!</p>';
			    exit();
			}
			echo "<p>Confirmation de l'ajout de l'ingredient: ".$nomIngredient."</p>";
			$formulaireestValide = TRUE;
		}
	}
}
if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:40px; width:40%;"> <!--contour orange!-->
	<legend> Ajout ingredient </legend>
		<form name="ajoutIngredient" method="post" action="index.php?page=ajoutingredient.php">
		<table width="100%">
			<tr><td><label style="font-weight:bold" for="idNomI">Nom de l'ingredient : </label></td></tr>
			<tr><td><input type="text" name="nomI" id="idNomI" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idCategorieI">Sa Categorie : </label></td></tr>
			<tr><td><input type="text" name="categorieI" id="idCategorieI" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idlieuI">D'ou il vient (mettre NULL si inconnu)</label></td></tr>
			<tr><td><input type="text" name="lieuI" id="idlieuI" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idquantiteStockI">Une quantite qui serait envisageable </label></td></tr>
			<tr><td><input type="text" name="quantiteStockI" id="idquantiteStockI" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idnomUN">Une unite (cuilliere a cafe, cuilliere a soupe, gramme, kilogramme, litre, piece, pot de yahourt, tranche) </label></td></tr>
			<tr><td><input type="text" name="nomUN" id="idnomUN" /></td></tr>
		<tr style="text-align:center;">
			<td colspan=2><br/><br/><input type="submit" name="boutonOk" value="Ok"></td>
		</tr></table>
		</form>
	</fieldset>
<?php
}
?>