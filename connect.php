<?php
	if (isset($_GET['deconnect']) && $_GET['deconnect']) {
		session_unset();
		header("Location: index.php");
		exit;
	}

	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
		exit;
	}