<?php
$formulaireestValide = FALSE;
if(isset($_POST['boutonOk'])) {//si le bouton Ok est pressé
	if(isset($_POST['titreR']) && trim($_POST['titreR']) != '' && isset($_POST['Nometape'])) {//verifie si on a saisi une chaine de caractère associée à $titreR et à $Nometape
		$Nometape = mysqli_real_escape_string($connexion, $_POST['Nometape']);//conserve les caractères spéciaux
		$IngredientConcerne = mysqli_real_escape_string($connexion, $_POST['IngredientConcerne']);
		$OrdreE = mysqli_real_escape_string($connexion, $_POST['OrdreE']);
		$titreR = mysqli_real_escape_string($connexion, $_POST['titreR']);
		if ($_POST['Nometape'] == 'decouper')//si on choisi decouper
		{
		$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',1);';//insertion de l'etape par son identifiant
		$resInsertion = mysqli_query($connexion, $req);
		if($resInsertion == FALSE) 
		{
		    echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
		    exit();
		}
		echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
		$formulaireestValide = TRUE;
		}
		else if ($_POST['Nometape'] == 'emincer')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',2);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'melanger')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',3);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'frire')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',4);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'petrir')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',5);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'cuire')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',6);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'fondre')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',7);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'fouetter')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',8);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'eplucher')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',9);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'laver')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',10);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'disposer')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',11);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l\'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
				else if ($_POST['Nometape'] == 'casser')
		{
			$req = 'INSERT INTO composer VALUES(\''.$IngredientConcerne.'\',\''.$OrdreE.'\',\''.$titreR.'\',12);';
			$resInsertion = mysqli_query($connexion, $req);
			if($resInsertion == FALSE) 
			{
				echo '<p>Erreur lors de l\'insertion de l\'etape!</p>';
				exit();
			}
			echo "<p>Confirmation de l'ajout de l'etape dans la recette : ".$titreR."</p>";
			$formulaireestValide = TRUE;
		}
		
	}
}

if(!$formulaireestValide) {
?>
	<fieldset style="border:solid 3px orange; padding:20px; width:20%;"> <!--contour orange!-->
	<legend style="font-size:10; font-weight:bold;">Ajoutez votre recette</legend>
		<form name="ajoutEtape" method="post" action="index.php?page=ajoutetape.php"> <!--lien vers le même fichier!-->
		<table width="80%">
			<tr>
			<td><label style="font-weight:bold" for="idNometape">Veuillez indiquer le nom de l'etape</label></td>
			<td>
			<select name="Nometape" id="idNometape"><!--menu deroulant!-->
				<option value="decouper">decouper</option>
				<option value="emincer">emincer</option>
				<option value="melanger">melanger</option>
				<option value="frire">frire</option>
				<option value="petrir">petrir</option>
				<option value="cuire">cuire</option>
				<option value="fondre">fondre</option>
				<option value="fouetter">fouetter</option>
				<option value="eplucher">eplucher</option>
				<option value="laver">laver</option>
				<option value="disposer">disposer</option>
				<option value="casser">casser</option>
			</select>
			</td></tr>
		<tr>
			<td><label style="font-weight:bold" for="idIngredientConcerne">l'ingredient utilise</label></td>
			<td><input type="text" name="IngredientConcerne" id="idIngredientConcerne" /></td>
		</tr>
		<tr>
			<td><label style="font-weight:bold" for="idOrdreE">Place de l'etape dans la recette</label></td>
			<td><input type="text" name="OrdreE" id="idOrdreE" /></td>
		<tr/>
		<tr>
			<td><label style="font-weight:bold" for="idtitreR">Pour quelle recette ?</label></td>
			<td><input type="text" name="titreR" id="idtitreR" /></td>
		<tr/>
		<tr style="text-align:center;">
			<td colspan=2><br/><br/><input type="submit" name="boutonOk" value="Ok"></td>
		</tr></table>
		</form>
	</fieldset>
<?php
}
?>