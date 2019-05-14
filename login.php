<?php
	require_once 'includes/function.php';
	require_once 'assets/vendor/autoload.php';
	require_once 'db.php';
	if (isConnect()) { //Si connecter goto index
		header('Location: index.php');
	}
	if (isset($_GET['t'])) {
		require_once 'db.php';
		$reqUser = 'SELECT * FROM users WHERE id = ?';
		$state = $pdo->prepare($reqUser);
		$state->execute([$_GET['id']]);
		$user = $state->fetch();
		if ($user) {
			/* si token est validé alors on passe en get pour afficher l'alert */
			if ($_GET['t'] == $user['token'] && time() < ($user['tokenCreatedAt']+3600)) {
				require_once 'db.php';
				$sql = "UPDATE `users` SET `tokenVerify` = 'true' WHERE `users`.`id` = :id";
				$statement = $pdo->prepare($sql);
				$result = $statement->execute([':id' => $_GET['id']]);
				if (session_status() != PHP_SESSION_ACTIVE){
					session_start();
				}
				$_SESSION['tvalid'] = 'true';
			} else {
				/* sinon alert pas valide */
				if (session_status() != PHP_SESSION_ACTIVE){
					session_start();
				}
				$_SESSION['tvalid'] = 'false';
			}
		}else{
			if (session_status() != PHP_SESSION_ACTIVE){
				session_start();
			}
			$_SESSION['tvalid'] = 'false';
		}
	}
	#################################
	############# LOGIN #############
	#################################
	if(!empty($_POST['sendForm1'])){
		$email = htmlentities(strtolower($_POST['email']));
		$password = htmlentities($_POST['password']);
		/* verif que les champs ne sont pas vides */
		if (!empty($email && $password)) {
			/* récupération de l'utilisateur */
			require_once 'db.php';
			$sql = 'SELECT * FROM users WHERE email = ?';
			$statement = $pdo->prepare($sql);
			$statement->execute([$email]);
			$user = $statement->fetch();
			/* Si $user est true alors on verif que le mdp est pareil qu'en BDD */
			if ($user) {
				if (password_verify($password, $user['password'])){
					/* Si token est true on le connecte et redirige vers index */
					if ($user['tokenVerify'] == 'true') {
						if (session_status() != PHP_SESSION_ACTIVE){
							session_start();
						}
						$_SESSION['id'] = $user['id'];
						header('Location: index.php');
					} else {
						if (session_status() != PHP_SESSION_ACTIVE){
							session_start();
						}
						$_SESSION['tverify'] = 'false';
					}
				}else{
					// TODO : afficher erreur flash
					header('Location: login.php');
				}
			}else{
				// TODO : afficher erreur flash
				header('Location: login.php');
			}
		}else{
			if (empty($username)) {
				// TODO : afficher erreur flash
				header('Location: login.php');
			}
			if (empty($password)) {
				// TODO : afficher erreur flash
				header('Location: login.php');
			}
		}
	}
	#################################
	########## INSCRIPTION ##########
	#################################
	if(!empty($_POST['sendForm2'])){
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
			$sql = 'SELECT `email`, `username` FROM `users` WHERE `email` = :email AND `username` = :username';
			$statement = $pdo->prepare($sql);
			$statement->execute([
				':username' => $username,
				':email'	=> $email
			]);
			$user = $statement->fetch();

			/* Si $user est false (l'utilisateur et email existe pas) */
			if (!$user) {
				/* Verif que le mdp soit dans le format désiré */
				if (strlen($password) <= 10 && strlen($password) >= 5) { // Format à déposer dans la condition
					/* Si mot de passe identiques = true */
					if ($password === $passwordConfirmed) {
						$passwordhash = password_hash($password, PASSWORD_BCRYPT);
						require_once 'db.php';

						$token = generateRandomString();
						$tokenCreatedAt = time();

						$sql = "INSERT INTO `users` (
								`nom`, `prenom`, `telephone`, 
								`email`, `adresse`, `ville`, 
								`pays`, `codePostal`, `username`, 
								`password`, `token`, `tokenCreatedAt`) 
								VALUES (
								:nom, :prenom, :telephone, 
								:email, :adresse, :ville, 
								:pays, :codePostal, :username, 
								:password, :token, :tokenCreatedAt)";
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
							':password' => $passwordhash,
							':token' => $token,
							':tokenCreatedAt' => $tokenCreatedAt
						]);
						if ($result) {
							/* Tout s'est bien passé */
							require_once 'db.php';
							$reqUser = 'SELECT * FROM users WHERE username = ?';
							$state = $pdo->prepare($reqUser);
							$state->execute([$username]);
							$user = $state->fetch();
							if ($user) {
								sendMail('foucrier.corentin@gmail.com', [$email], 'Confirmation bread beer shop !', '<html><body>Pour activer votre compte cliquez <a href="http://github.local/site-biere/login.php?t='.$token.'&id='.$user['id'].'">ici</a> !</body></html>', 'Lien d\'activation => http://github.local/site-biere/login.php?t='.$token.'&id='.$user['id'].'');
								// $sendMailReturn = var_dump(sendMail());
								//if ($numSent == 1) {
			                        if (session_status() != PHP_SESSION_ACTIVE){
										session_start();
									}
									$_SESSION['cw'] = 'true';
								//}else{
								//	die('Erreur envoie mail');
								//}
							}else{
								die('Erreur SQL');
							}
						}else{
							die('Erreur enregistrement en base de donnée');
							/* TODO : Signaler l'erreur */
						}
					}else{
						die('Les mot de passe ne sont pas identiques');
						/* TODO : Les mot de passe ne sont pas identiques */
					}
				}else{
					die('Mot de passe n\'est pas entre 5 et 10 caractères');
					/* TODO : Mot de passe n'est pas entre 5 et 10 caractères */
				}
			}else{
				die('L\'uilisateur ou l\'email existe déjà');
				/* TODO : L'uilisateur ou l'email existe déjà */
			}
		}else{
			die('Tout est vide !');
		}
	}
	#################################
	###### RESEND EMAIL TOKEN #######
	#################################
	if(!empty($_POST['resendEmailForm'])){
		$email = htmlentities($_POST['email']);
		if (!empty($email)) {
			require_once 'db.php';

			$token = generateRandomString();
			$tokenCreatedAt = time();

			$sql = "UPDATE `users` SET `token`= :token, `tokenCreatedAt`= :tokenCreatedAt WHERE `email` = :email";
			$statement = $pdo->prepare($sql);
			$result = $statement->execute([
				':token' => $token,
				':tokenCreatedAt' => $tokenCreatedAt,
				':email' => $email
			]);
			if ($result) {
				$reqUser = 'SELECT * FROM users WHERE email = ?';
				$state = $pdo->prepare($reqUser);
				$state->execute([$email]);
				$user = $state->fetch();
				if ($user) {
					sendMail('foucrier.corentin@gmail.com', [$email], 'Confirmation bread beer shop !', '<html><body>Pour activer votre compte cliquez <a href="http://github.local/site-biere/login.php?t='.$token.'&id='.$user['id'].'">ici</a> !</body></html>', 'Lien d\'activation => http://github.local/site-biere/login.php?t='.$token.'&id='.$user['id'].'');
					if (session_status() != PHP_SESSION_ACTIVE){
						session_start();
					}
					$_SESSION['resendEmail'] = 'true';
				}else{
					die('Erreur lecture sql');
				}
			}else{
				die('Erreur sql');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Connexion | Inscription</title>
		<?php require 'includes/head.php'; ?>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<div class="container">
			<?php if (isset($_SESSION['cw']) && ($_SESSION['cw'] == 'true')) : ?>
			<div class="alert alert-info mt-3" role="alert">
				Inscription prise en compte. Un email de confirmation vous a été envoyé.
			</div>
			<?php unset($_SESSION['cw']); ?>
			<?php endif ?>

			<?php if (isset($_SESSION['tvalid']) && ($_SESSION['tvalid'] == 'true')) : ?>
			<div class="alert alert-success mt-3" role="alert">
				Inscription prise en compte. Vous pouvez vous connecter !
			</div>
			<?php session_unset($_SESSION['tvalid']); ?>
			<?php endif ?>

			<?php if (isset($_SESSION['tvalid']) && ($_SESSION['tvalid'] == 'false')) : ?>
			<div class="alert alert-danger mt-3" role="alert">
				Token invalide ! Pour renvoyer l'email <a href="login.php?resendEmail" class="alert-link">ici</a> !
			</div>
			<?php session_unset($_SESSION['tvalid']); ?>
			<?php endif ?>

			<?php if (isset($_SESSION['resendEmail']) && ($_SESSION['resendEmail'] == 'true')) : ?>
			<div class="alert alert-success mt-3" role="alert">
				Nouvelle email envoyer ! Veuillez verifier vos email !
			</div>
			<?php session_unset($_SESSION['resendEmail']); ?>
			<?php endif ?>

			<?php if (isset($_SESSION['tverify']) && ($_SESSION['tverify'] == 'false')) : ?>
			<div class="alert alert-danger mt-3" role="alert">
				Votre compte n'a pas été activé, veuillez vérifier vos emails !
			</div>
			<?php session_unset($_SESSION['tverify']); ?>
			<?php endif ?>
			<div class="row mt-4">
				<?php if (!isset($_GET['pwd']) && !isset($_GET['resendEmail'])) : ?>
				<div class="col-md-6 px-md-5 mb-5">
					<div class="loginForm">
						<div class="pt-3 pl-3">
							<h1>Connexion</h1>
						</div>
						<div>
							<form class="p-4" name="form1" method="post" action="">
								<div class="form-group">
									<label for="email">Votre Email</label> 
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-at"></i>
											</div>
										</div> 
										<input id="email" name="email" placeholder="example@example.com" type="text" class="form-control" required="required">
									</div>
								</div>

								<div class="form-group">
									<label for="text">Votre mot de passe</label> 
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-unlock-alt"></i>
											</div>
										</div> 
										<input id="text" name="password" placeholder="********" type="password" class="form-control" aria-describedby="textHelpBlock" required="required">
									</div> 
									<span class="form-text"><a class="text-muted" href="?pwd=pass_lost">Mot de passe perdu ?</a>
									<span class="float-md-right float-left"><a class="text-muted" href="?resendEmail">Renvoyer email de confirmation</a></span></span>
								</div>

								<div class="form-group">
									<button type="submit" name="sendForm1" value="sendForm1" for="form1" class="btn btn-primary">Connexion</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-6 px-md-5 mb-5">
					<div class="loginForm">
						<div class="pt-3 pl-3">
							<h1>S'inscrire</h1>
						</div>
						<div>
							<form method="post" action="" name="form2" class="p-4">
								<div class="form-row">
									<div class="form-group col-12">
										<label for="nom">Nom d'utilisateur</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<input type="text" class="form-control" required="required" name="username">
										</div>
									</div>
									<div class="form-group col-12">
										<label for="email">Email</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-at"></i>
												</div>
											</div>
											<input type="email" class="form-control" required="required" name="email">
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="prenom">Mot de passe</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-unlock-alt"></i>
												</div>
											</div>
											<input type="password" class="form-control" required="required" name="password">
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="prenom">Confirmation mot de passe</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-unlock-alt"></i>
												</div>
											</div>
											<input type="password" class="form-control" required="required" name="passwordConfirmed">
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-12 col-md-6">
										<label for="nom">Nom</label>
										<input type="text" class="form-control" required="required" name="nom">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="prenom">Prénom</label>
										<input type="text" class="form-control" required="required" name="prenom">
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-12 col-md-6">
										<label for="tel">Téléphone</label>
										<input type="text" class="form-control" required="required" name="tel">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="ville">Ville</label>
										<input type="text" class="form-control" required="required" name="ville">
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-12">
										<label for="adresse">Adresse</label>
										<input type="text" class="form-control" required="required" name="adresse">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="pays">Pays</label>
										<input type="text" class="form-control" required="required" name="pays">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="codePostal">Code postale</label>
										<input type="text" class="form-control" required="required" name="codePostal">
									</div>
								</div>
								<button type="submit" name="sendForm2" value="sendForm2" for="form2" class="btn btn-primary">Inscription</button>
							</form>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if (isset($_GET['pwd'])) : ?>
				<div class="col-md-6 offset-md-3 col-12 px-md-5 mb-5">
					<div class="loginForm">
						<div class="pt-3 pl-3">
							<h1>Reset mot de passe</h1>
						</div>
						<div>
							<form class="p-4" name="reset">
								<div class="form-group">
									<label for="email">Votre Email</label> 
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-at"></i>
											</div>
										</div> 
										<input id="email" name="email" placeholder="example@example.com" type="text" class="form-control" required="required">
									</div>
								</div>

								<div class="form-group">
									<button type="submit" name="sendFormReset" value="sendFormReset" for="reset" class="btn btn-danger">Reset</button>
									<a href="login.php"><span class="btn btn-secondary">Retour</span></a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if (isset($_GET['resendEmail'])) : ?>
				<div class="col-md-6 offset-md-3 col-12 px-md-5 mb-5">
					<div class="loginForm">
						<div class="pt-3 pl-3">
							<h1>Renvoyer l'email de confirmation</h1>
						</div>
						<div>
							<form class="p-4" name="resendEmail" method="post" action="">
								<div class="form-group">
									<label for="email">Votre Email</label> 
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-at"></i>
											</div>
										</div> 
										<input id="email" name="email" placeholder="example@example.com" type="text" class="form-control" required="required">
									</div>
								</div>

								<div class="form-group">
									<button type="submit" name="resendEmailForm" value="resendEmailForm" for="resendEmail" class="btn btn-success">Revoyer</button>
									<a href="login.php"><span class="btn btn-secondary">Retour</span></a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endif ?>

			</div>
		</div>
		<?php require 'includes/footer.php'; ?>
		<?php require 'includes/scripts.php'; ?>
	</body>
</html>

