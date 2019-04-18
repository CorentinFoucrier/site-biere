<?php
	/* Si PAS connecter alors on redirige vers index */
	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
		exit;
	}