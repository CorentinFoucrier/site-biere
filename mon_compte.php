<?php
	require_once 'includes/function.php';
	require_once 'db.php';

	if (!isConnect()) { //si n'est pas connecter retour index
		header('Location: index.php');
	}
	/*
		Définition des variable pour contrer l'erreur
		undefined en cas d'utilisation du debugeur "xdebug".
	*/
	$returnMsgForm1 = "";
	$returnMsgForm2 = "";
	/* Connexion BDD où est l'id SESSION['id'] déposer dans SESSION à la connexion */
	$reqUsers = 'SELECT * FROM users WHERE id = ?';
	$state = $pdo->prepare($reqUsers);
	$state->execute([$_SESSION['id']]);
	$user = $state->fetch();

	#################################
	###### PREMIER  FORMULAIRE ######
	#################################
	if (!empty($_POST['sendForm1'])) { //Si le 1er formulaire est présent;
		$id = $user['id'];
		$username = htmlentities($_POST['username']);
		$password = htmlentities($_POST['password']);
		$passwordConfirmed = htmlentities($_POST['passwordConfirmed']);
		/* Si tous les champs sont rempli Alors on les update tous */
		if (!empty($id && $username && $password && $passwordConfirmed)) {
			if ($passwordConfirmed === $password) { //Si les mdp sont identique on continue;
				$passwordHash = password_hash($password, PASSWORD_BCRYPT); //Cryptage du mdp;
				require_once 'db.php';
				$sql = "UPDATE `users` SET `username` = :username, `password` = :password WHERE `users`.`id` = :id";
				$statement = $pdo->prepare($sql);
				$result = $statement->execute([
					":username"	=>	$username,
					":password"	=>  $passwordHash,
					":id"		=>	$id
				]);
				/* Si $result est TRUE ? Alors 1er msg : Sinon 2nd msg */
				$returnMsgForm1 = ($result) ? "Votre nom d'utilisateur et mot de passe ont bien été changer !" : "Erreur: veuillez réessayer !";
				/* (L'opérateur ternaire) */
			}
		}else{
			$returnMsgForm1 = "/!\Le formulaire ne peut pas être vide !/!\ ";
		}
		/* Si seulement les champs mot de passe sont rempli Alors on l'update */
		if (!empty($id && $password && $passwordConfirmed) && empty($username)) {
			if ($passwordConfirmed === $password) { //Si les mdp sont identique on continue;
				$passwordHash = password_hash($password, PASSWORD_BCRYPT); //Cryptage du mdp;
				require_once 'db.php';
				$sql = "UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id";
				$statement = $pdo->prepare($sql);
				$result = $statement->execute([
					":password"	=>  $passwordHash,
					":id"		=>	$id
				]);
				/* Si $result est TRUE ? Alors 1er msg : Sinon 2nd msg */
				$returnMsgForm1 = ($result) ? "Votre mot de passe a bien été changer !" : "Erreur: veuillez réessayer !";
				/* (L'opérateur ternaire) */
			}
		}
		/* Si les mdp sont vide on update que le nom d'utilisateur */
		if (!empty($id && $username) && empty($password && $passwordConfirmed)) {
			if ($passwordConfirmed === $password) { //Si les mdp sont identique on continue;
				$passwordHash = password_hash($password, PASSWORD_BCRYPT); //Cryptage du mdp;
				require_once 'db.php';
				$sql = "UPDATE `users` SET `username` = :username WHERE `users`.`id` = :id";
				$statement = $pdo->prepare($sql);
				$result = $statement->execute([
					":username"	=>	$username,
					":id"		=>	$id
				]);
				/* Si $result est TRUE ? Alors 1er msg : Sinon 2nd msg */
				$returnMsgForm1 = ($result) ? "Votre nom d'utilisateur a bien été changer !" : "Erreur: veuillez réessayer !";
				/* (L'opérateur ternaire) */
			}
		}
	}
	#################################
	####### SECOND FORMULAIRE #######
	#################################
	if (!empty($_POST['sendForm2'])) { //Si le second formulaire est présent;
		$id = $user['id'];
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$tel = htmlentities($_POST['tel']);
		$ville = htmlentities($_POST['ville']);
		$adresse = htmlentities($_POST['adresse']);
		$pays = htmlentities($_POST['pays']);
		$codePostal = htmlentities($_POST['codePostal']);
		if (!empty($id && $nom && $prenom && $tel && $ville && $adresse && $pays && $codePostal)) {
			require_once 'db.php';
			$sql = "UPDATE `users` SET `nom` = :nom, `prenom` = :prenom, `telephone` = :telephone, `adresse` = :adresse, `ville` = :ville, `pays` = :pays, `codePostal` = :codePostal WHERE `users`.`id` = :id";
			$statement = $pdo->prepare($sql);
			$result = $statement->execute([
				":nom"			=>	$nom,
				":prenom"		=>	$prenom,
				":telephone"	=>	$tel,
				"adresse"		=>	$adresse,
				"ville"			=>	$ville,
				"pays"			=>	$pays,
				"codePostal" 	=> 	$codePostal,
				":id"			=>	$id
			]);
			$returnMsgForm2 = ($result) ? "Vos coordonnées ont bien été changés !" : "Erreur: veuillez réessayer !";
		}else{

		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Présentation entreprise</title>
		<?php require 'includes/head.php'; ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php require 'includes/header.php'; ?>
			<div class="row">
				<div class="col-lg-6">
					<form name="form1" method="post" action="" class="p-2">
						<fieldset>
							<legend id="returnMsgForm1">
								Modidier nom et mot de passe<br />
								<?= $returnMsgForm1 ?>
							</legend>
							<div class="form-row">
								<div class="form-group col-12">
									<label for="nom">Nom d'utilisateur</label>
									<input type="text" class="form-control" name="username" placeholder="<?= $user['username'] ?>">
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
							<button type="submit" name="sendForm1" value="sendForm1" for="form1" class="btn btn-light float-left">Envoyer</button>
						</fieldset>
					</form>
					<form method="post" action="" name="form2" class="p-2">
						<fieldset>
							<legend>
								Modidier vos coordonnées<br />
								<?= $returnMsgForm2 ?>
							</legend>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom" value="<?= $user['nom'] ?>">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom" value="<?= $user['prenom'] ?>">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel" value="<?= $user['telephone'] ?>">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville" value="<?= $user['ville'] ?>">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="adresse">Adresse</label>
									<input type="text" class="form-control" name="adresse" value="<?= $user['adresse'] ?>">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="pays">Pays</label>
									<input type="text" class="form-control" name="pays" value="<?= $user['pays'] ?>">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="codePostal">Code postale</label>
									<input type="text" class="form-control" name="codePostal" value="<?= $user['codePostal'] ?>">
								</div>
							</div>
							<button type="submit" name="sendForm2" value="sendForm2" for="form2" class="btn btn-light float-left">Envoyer</button>
						</fieldset>
					</form>
				</div>
				<?php 
					require_once 'db.php';
					$reqCommandes = 'SELECT `id_products`, `prix_ttc`, `id` FROM `commandes` WHERE `id_client` = ?';
					$state = $pdo->prepare($reqCommandes);
					$state->execute([$_SESSION['id']]);
					$resultCommandes = $state->fetchAll();
					// var_dump($resultCommandes);die;

					if ($resultCommandes) :
				?>
				<div class="col-lg-6">
					<div class="table-responsive">
						<table class="table table-striped mt-5">
							<thead>
								<tr>
									<th>Numero de commande</th>
									<th>Vos produis</th>
									<th>Total TTC</th>
								</tr>
							</thead>
							<tbody>
							<?php for ($i=0; $i < count($resultCommandes) ; $i++) : 

								$unserialize = unserialize($resultCommandes[$i]['id_products']); // $unserialize est un tableau[];
								$prixTTC = $resultCommandes[$i]['prix_ttc']; 
							?>
								<tr>
									<td><?= $resultCommandes[$i]['id'] ?></td>
									<td>
									<?php foreach ($unserialize as $id_products => $quantite) : 

									$reqBiere = "SELECT `titre` FROM biere WHERE id = :id";
									$statement = $pdo->prepare($reqBiere);
									$statement->execute([
										':id' => $id_products
									]);
									$bieres = $statement->fetch(); 
									
									echo $quantite.", ".$bieres['titre']." <br />";?>
									<?php endforeach; ?>
									</td>
									<td><?= number_format($prixTTC, 2, ',', '.') ?></td>
								</tr>
							<?php endfor; ?>
							</tbody>
						</table>
					</div><!-- Fin table responsive -->
				</div><!-- Fin col -->
				<?php endif; ?>
			</div>
			<?php require 'includes/footer.php'; ?>
		</div>
	<?php require 'includes/scripts.php'; ?>
	</body>
</html>