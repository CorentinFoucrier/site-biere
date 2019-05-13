<?php 
	session_start();
	require 'isLogged.php';
	/* Vérif que le formulaire ($_POST) n'est pas vide */
	if(!empty($_POST)){
		$username = htmlentities(strtolower($_POST['username']));
		$password = htmlentities($_POST['password']);
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
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="assets/css/connexion.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	</head>
	<body class="container">
		<section class="login-form">
			<div class="cotainer">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Connexion</div>
							<div class="card-body">
								<form action="" method="post">
									<div class="form-group row">
										<label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
										<div class="col-md-6">
											<input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
										</div>
									</div>

									<div class="form-group row">
										<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
										<div class="col-md-6">
											<input type="password" id="password" class="form-control" name="password" required>
										</div>
									</div>

									<!-- <div class="form-group row">
										<div class="col-md-6 offset-md-4">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember"> Se souvenir de moi
												</label>
											</div>
										</div>
									</div> -->

									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											Se connecter
										</button>
										<a href="#" class="btn btn-link">
											Mot de passe oublié ?
										</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
