<?php 

	session_start();
	require 'isNotLogged.php';
	require 'db.php';

	$reqBiere = "SELECT * FROM biere";
	$statement = $pdo->query($reqBiere);
	$bieres = $statement->fetchAll();

	$reqUsers = 'SELECT * FROM users WHERE id = ?';
	$state = $pdo->prepare($reqUsers);
	$state->execute([$_SESSION['id']]);
	$user = $state->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="tire">Commandes</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>

			<form method="post" action="confirmation_commande.php" class="border border-white rounded p-5">
				<fieldset>
					<legend>Formulaire de commande</legend>

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
								<?php foreach ($bieres as $biere) : ?>
								<tr id="<?= $biere['id'] ?>">
									<th scope="row"><?= $biere['titre'] ?></th>
									<td>€ <?= number_format($biere['prix'], 2, ',', '.'); ?></td>
									<td>€ <?= number_format($biere['prix']*1.2, 2, ',', '.'); ?></td>
									<td>
										<input class="form-control" onclick="pomme(<?= $biere['id'] ?>)" type="number" value="0" min="0" name="<?= 'beerName'.$biere['id'] ?>">
										<input id="prixInitial<?= $biere['id'] ?>" type="hidden" value="<?= $biere['prix'] ?>">
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<button type="submit" class="btn btn-light float-left">Envoyer</button>
				</fieldset>
			</form>


			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="assets/js/table_ttc.js"></script>
		<?php include('scripts.php'); ?>
	</body>
</html>