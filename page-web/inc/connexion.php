<?php
	$connexion = NULL;

	function connectionBD() {
		global $connexion;
		$connexion = mysqli_connect(serveur, user, mdp, basedonnee);
		if (mysqli_connect_errno()) {
		    printf("Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
		}
	}

	function deconnectionBD() {
		global $connexion;
		mysqli_close($connexion);
	}

?>
