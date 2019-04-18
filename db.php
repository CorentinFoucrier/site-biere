<?php
	require 'config.php';

	$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';charset=UTF8';
	

	try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}