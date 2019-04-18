<?php
	/* Si déjà connecter alors on redirige vers index */
	if (isset($_SESSION['username'])) {
		header("Location: index.php");
		exit;
	}