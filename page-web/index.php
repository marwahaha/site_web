<?php
/*LEVEQUE Vincent 11510244 BURDIN Kévin 11507706*/
	session_start(); //démarre une nouvelle session php
	include('inc/constantes.php');
	include('inc/connexion.php');
	connectionBD();
?>

<!DOCTYPE html>
<html lang=”fr”>
<head>
<meta charset = "utf-8"/>
<link href="css/styles.css" rel="stylesheet" media="all" type="text/css"><!-- lien vers le css !-->
<link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
<title>MacD'Oh</title><!--nom de l'onglet!-->
</head>
<body>
	<?php include('static/header.php'); //inclusion du fichier header.php?>
<main>
<?php include('static/nav.php'); ?>
		<section id="contenu">
		<?php
			$page = 'static/accueil.php';
			if(isset($_GET['page'])) { //vérifie l'existence de la variable page
				if(file_exists(addslashes('php/'.$_GET['page'])))//ajoute des antislashs au fichier et obtient le contenu de la variable page 
					$page = addslashes('php/'.$_GET['page']); //ajoute des antislashs à la variable page.
			}
			include($page); //inclue la page à l'index
		?>
		</section>
</main>
<?php include('static/footer.php'); ?>
</body>
</html>

<?php 
deconnectionBD();
?>