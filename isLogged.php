<?php
	/* Si déjà connecter alors on redirige vers index */
	if (isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	}