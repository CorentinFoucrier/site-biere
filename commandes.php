<?php 
	require_once 'includes/function.php';
	require_once 'db.php';

	if (isConnect(false)) { //si n'est pas connecter retour index
		header('Location: index.php');
	}
	/* Connexion bdd et SELECT tout la table biere */
	$reqBiere = "SELECT * FROM biere";
	$statement = $pdo->query($reqBiere);
	$bieres = $statement->fetchAll(); // le résultat de la requête est dans $biere[] qui est un tableau.
	/* Connexion bdd et SELECT tout la ligne OU est l'id passé en _SESSION */
	$reqUsers = 'SELECT * FROM users WHERE id = ?';
	$state = $pdo->prepare($reqUsers);
	$state->execute([$_SESSION['id']]);
	$user = $state->fetch(); // le résultat de la requête est dans $user[] qui est un tableau.

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="tire">Commandes</title>
		<?php require 'includes/head.php'; ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php require 'includes/header.php'; ?>

			<form method="post" action="confirmation_commande.php" class="border border-white rounded p-5">
				<fieldset>
					<legend>Formulaire de commande</legend>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="nom">Nom</label>
							<input type="text" class="form-control" name="nom" value="<?= $user['nom'] ?>"> <!-- affichage nom etc. partout-->
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="prenom">Prénom</label>
							<input type="text" class="form-control" name="prenom" value="<?= $user['prenom'] ?>">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-3">
							<label for="tel">Téléphone</label>
							<input type="text" class="form-control" name="tel" value="<?= $user['telephone'] ?>">
						</div>
						<div class="form-group col">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" value="<?= $user['email'] ?>">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-lg">
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" name="adresse" value="<?= $user['adresse'] ?>">
						</div>
						<div class="form-group col-12 col-lg-3">
							<label for="ville">Ville</label>
							<input type="text" class="form-control" name="ville" value="<?= $user['ville'] ?>">
						</div>
						<div class="form-group col-12 col-lg-2">
							<label for="pays">Pays</label>
							<input type="text" class="form-control" name="pays" value="<?= $user['pays'] ?>">
						</div>
						<div class="form-group col-12 col-lg-2">
							<label for="codePostal">Code postale</label>
							<input type="text" class="form-control" name="codePostal" value="<?= $user['codePostal'] ?>">
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped mt-5">
							<thead>
								<tr>
									<th scope="col">Nom de la bière</th>
									<th scope="col">Prix HT</th>
									<th scope="col">Prix TTC</th>
									<th scope="col">Quantité</th>
								</tr>
							</thead>
							<tbody>
								<?php //Boucle sur $bieres[] qui est un tableau sortie de SQL ?>
								<?php foreach ($bieres as $biere) : //foreach $key as $value ?>
								<?php /* L'id pour les childNodes passé à la fonction pomme() */ ?>
								<tr id="<?= $biere['id'] ?>">
									<th scope="row"><?= $biere['titre'] ?></th>
									<?php /* affichage des prixHT et prixTTC */ ?>
									<td class="prixHT">€ <?= number_format($biere['prix'], 2, ',', '.'); ?></td>
									<td class="prixTTC">€ <?= number_format($biere['prix']*1.2, 2, ',', '.'); ?></td>
									<td>
										<?php 	/* fonction pomme() avec en param l'id le la biere à l'instant T de la boucle 
												l'attibut name prends beerName concaténée avec l'id 'bouclé' qui nous servira
											   	dans la page de confirmation pour pointé la quantité. */
										?>
										<input class="form-control quantite" onclick="pomme(<?= $biere['id'] ?>)" type="number" value="0" min="0" name="<?= 'beerName'.$biere['id'] ?>">
										<?php /* input caché pour JS sert de référence */ ?>
										<input class="prixInitial" id="prixInitial<?= $biere['id'] ?>" type="hidden" value="<?= $biere['prix'] ?>">
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<button type="submit" class="btn btn-light float-left">Envoyer</button>
				</fieldset>
			</form>


			<?php require 'includes/footer.php'; ?>
		</div>
		<script type="text/javascript" src="assets/js/table_ttc.js"></script>
		<?php require 'includes/scripts.php'; ?>
	</body>
</html>