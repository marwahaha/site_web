
<?php
$formulaireestValide = FALSE;
if(isset($_POST['boutonOk'])) { //si le bouton Ok est pressé
	if(isset($_POST['titreR']) && trim($_POST['titreR']) != '') { //verifie si on a saisi une chaine de caractère associée à $titreR
		$titreRecette = mysqli_real_escape_string($connexion, $_POST['titreR']);//conserve les caractères spéciaux
		$nomCategorie = mysqli_real_escape_string($connexion, $_POST['categorieR']);
		$nbpersonnes = mysqli_real_escape_string($connexion, $_POST['nombrepersonnesR']);
		$description = mysqli_real_escape_string($connexion, $_POST['descriptionR']);
		$nom = mysqli_real_escape_string($connexion, $_POST['NomU']);
		$res = mysqli_query($connexion, 'SELECT titreR FROM recette WHERE titreR=\''.$titreRecette.'\';');
		if($res == TRUE && mysqli_num_rows($res) != 0) {
			echo '<p>Cette recette existe déjà dans la base !</p>';
		}
		else {

			$req = 'INSERT INTO recette VALUES(\''.$titreRecette.'\',\''.$nomCategorie.'\',\''.$nbpersonnes.'\',\''.$description.'\',\''.date('Y-m-d').'\',\''.$nom.'\');';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) {
			    echo '<p>Erreur lors de l\'insertion de la recette!</p>';
			    exit();
			}
			echo "<p>Confirmation de l'ajout de la recette: ".$titreRecette."</p>";
			$formulaireestValide = TRUE;
		}
	}
}

if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:20px; width:20%;">
	<legend style="font-size:10; font-weight:bold;">Ajoutez votre recette</legend>
		<form name="ajoutRecette" method="post" action="index.php?page=ajoutrecette.php">
		<table width="80%">
		<tr>
			<td><label style="font-weight:bold" for="idR">Nom de la recette : </label></td>
			<td><input type="text" name="titreR" id="idR" /></td>
		</tr>
		<tr>
			<td><label style="font-weight:bold" for="idCategorieR">Sa Categorie : </label></td>
			<td><input type="text" name="categorieR" id="idCategorieR" /></td>
		<tr/>
		<tr>
			<td><label style="font-weight:bold" for="idnbR">Pour combien de personnes ?</label></td>
			<td><input type="text" name="nombrepersonnesR" id="idnbR" /></td>
		<tr/>
		<tr>
			<td><label style="font-weight:bold" for="idDescr">Une petite description : </label></td>
			<td><input type="text" name="descriptionR" id="idDescr" /></td>
		<tr/>
			<td><label style="font-weight:bold" for="idnom">Votre nom : </label></td>
			<td><input type="text" name="NomU" id="idnom" /></td>
		<tr style="text-align:center;">
			<td colspan=2><br/><br/><input type="submit" name="boutonOk" value="Ok"></td>
		</tr></table>
		</form>
	</fieldset>
<?php
}
?>