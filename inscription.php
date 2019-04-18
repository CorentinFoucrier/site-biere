<?php 
	session_start();
	require 'isLogged.php';
	/*
		Définition des variable pour contrer l'erreur
		undefined en cas d'utilisation du debugeur "xdebug".
	*/
	$errUsername = "";
	$errPassword = "";
	$errPasswordConfirmed = "";
	$errUsernamePwd = false;
	/* Vérif que le formulaire ($_POST) n'est pas vide */
	if(!empty($_POST)){
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);
		$password = htmlentities($_POST['password']);
		$passwordConfirmed = htmlentities($_POST['passwordConfirmed']);
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$tel = htmlentities($_POST['tel']);
		$ville = htmlentities($_POST['ville']);
		$adresse = htmlentities($_POST['adresse']);
		$pays = htmlentities($_POST['pays']);
		$codePostal = htmlentities($_POST['codePostal']);
		/* verif que les champs ne sont pas vides */
		if (!empty($username && $password && $passwordConfirmed && $nom && $prenom && $tel && $ville && $adresse && $pays && $codePostal)) {
			/* récupération de l'utilisateur et de l'email */
			require_once 'db.php';
			$sql = 'SELECT * FROM users WHERE username = ?, email = ?';
			$statement = $pdo->prepare($sql);
			$statement->execute([$username, $email]);
			$user = $statement->fetch();
			/* Si $user est false (l'utilisateur et email existe pas) */
			if (!$user) {
				/* Verif que le mdp soit dans le format désiré */
				if (strlen($password) <= 10 && strlen($password) >= 5) { // Format à déposer dans la condition
					/* Si mot de passe identiques = true */
					if ($password === $passwordConfirmed) {
						$passwordhash = password_hash($password, PASSWORD_BCRYPT);
						require_once 'db.php';
						$sql = "INSERT INTO `users` (`nom`, `prenom`, `telephone`, `email`, `adresse`, `ville`, `pays`, `codePostal`, `username`, `password`) VALUES (:nom, :prenom, :telephone, :email, :adresse, :ville, :pays, :codePostal, :username, :password)";
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
							':nom' => $nom,
							':prenom' => $prenom,
							':telephone' => $tel,
							':email' => $email,
							':adresse' => $adresse,
							':ville' => $ville,
							':pays' => $pays,
							':codePostal' => $codePostal,
							':username' => $username,
							':password' => $passwordhash
						]);
						if ($result) {
							/* Tout s'est bien passé */
							session_start();
							$_SESSION['username'] = $username;
							header("Location: index.php");
						}else{
							die('erreur enregistrement en base de donnée');
							/* TODO : Signaler l'erreur */
						}
					}else{
						/* TODO : Les mot de passe ne sont pas identiques */
					}
				}else{
					/* TODO : Mot de passe n'est pas entre 5 et 10 caractères */
				}
			}else{
				/* TODO : L'uilisateur ou l'email existe déjà */
			}
		}else{
			/* Si le champs utilisateur est envoyer vide alors class="danger" */
			if (empty($username)) {
				$errUsername = "is-invalid";
			}
			/* Si le champs mot de passe est envoyer vide alors class="danger" */
			if (empty($password)) {
				$errPassword = "is-invalid";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Présentation entreprise</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<form method="post" action="" class="border border-white rounded p-5">
						<fieldset>
							<legend>Formulaire d'inscription</legend>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="nom">Nom d'utilisateur</label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="form-group col-12">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Mot de passe</label>
									<input type="password" class="form-control" name="password">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Confirmation mot de passe</label>
									<input type="password" class="form-control" name="passwordConfirmed">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="adresse">Adresse</label>
									<input type="text" class="form-control" name="adresse">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="pays">Pays</label>
									<input type="text" class="form-control" name="pays">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="codePostal">Code postale</label>
									<input type="text" class="form-control" name="codePostal">
								</div>
							</div>
							<button type="submit" class="btn btn-light float-left">Envoyer</button>
						</fieldset>
					</form>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>