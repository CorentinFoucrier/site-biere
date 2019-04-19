<?php 
	session_start();
	require 'isLogged.php';
	/* Vérif que le formulaire ($_POST) n'est pas vide */
	if(!empty($_POST)){
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];
		/* verif que les champs ne sont pas vides */
		if (!empty($username && $password)) {
			/* récupération de l'utilisateur */
			require_once 'db.php';
			$sql = 'SELECT * FROM users WHERE username = ?';
			$statement = $pdo->prepare($sql);
			$statement->execute([$username]);
			$user = $statement->fetch();
			/* Si $user est true alors on verif que le mdp est pareil qu'en BDD */
			if ($user) {
				if (password_verify($password, $user["password"])){
					$_SESSION["id"] = $user['id'];
					header("Location: index.php");
				}else{
					header('Location: index.php');
				}
			}else{
				header('Location: index.php');
			}
		}else{
			if (empty($username)) {
				header('Location: index.php');
			}
			if (empty($password)) {
				header('Location: index.php');
			}
		}
	} else {
		header('Location: index.php');
	}
?>