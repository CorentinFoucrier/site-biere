<?php
	/* Si PAS connecter alors on redirige vers index */
	if (!isset($_SESSION['id'])) {
		header("Location: index.php");
		exit;
	}