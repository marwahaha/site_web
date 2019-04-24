
<?php
$formulaireestValide = FALSE;
if(isset($_POST['boutonOk'])) { //si le bouton Ok est pressé
	if(isset($_POST['nomP']) && trim($_POST['nomP']) != '') {  //verifie si on a saisi une chaine de caractère associée à $nomP
		$nomProduit = mysqli_real_escape_string($connexion, $_POST['nomP']);//conserve les caractères spéciaux
		$nomCategorie = mysqli_real_escape_string($connexion, $_POST['categorieP']);
		$lieu = mysqli_real_escape_string($connexion, $_POST['lieuP']);
		$quantite = mysqli_real_escape_string($connexion, $_POST['quantiteP']);
		$unite = mysqli_real_escape_string($connexion, $_POST['nomUN']);
		$res = mysqli_query($connexion, 'SELECT nomP FROM produit WHERE nomP=\''.$nomProduit.'\';');
		if($res == TRUE && mysqli_num_rows($res) != 0) {
			echo '<p>Ce produit existe déjà dans la base !</p>';
		}
		else {

			$req = 'INSERT INTO produit VALUES(\''.$nomProduit.'\',\''.$quantite.'\',\''.date('Y-m-d').'\',\''.$lieu.'\',\''.$nomCategorie.'\',\''.$unite.'\',NULL,NULL);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) {
			    echo '<p>Erreur lors de l\'insertion du produit!</p>';
			    exit();
			}
			echo "<p>Confirmation de l'ajout du produit: ".$nomProduit."</p>";
			$formulaireestValide = TRUE;
		}
	}
}
if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:40px; width:40%;">
	<legend> Ajout produit </legend>
		<form name="ajoutProduit" method="post" action="index.php?page=ajoutproduit.php">
		<table width="100%">
			<tr><td><label style="font-weight:bold" for="idNomP">Nom du produit : </label></td></tr>
			<tr><td><input type="text" name="nomP" id="idNomP" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idCategorieP">Sa Categorie : </label></td></tr>
			<tr><td><input type="text" name="categorieP" id="idCategorieP" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idlieuP">D'ou il vient (mettre NULL si inconnu)</label></td></tr>
			<tr><td><input type="text" name="lieuP" id="idlieuP" /></td></tr>
			<tr><td><label style="font-weight:bold" for="idquantiteP">Une quantite qui serait envisageable </label></td></tr>
			<tr><td><input type="text" name="quantiteP" id="idquantiteP" /></td></tr>
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

