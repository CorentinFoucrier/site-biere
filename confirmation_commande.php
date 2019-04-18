<?php

	require 'db.php';

	if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['tel'] &&  $_POST['email'] && $_POST['adresse'] && $_POST['ville'] && $_POST['pays'] && $_POST['codePostal'])) {

		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$tel = htmlentities($_POST['tel']);
		$email = htmlentities($_POST['email']);
		$adresse = htmlentities($_POST['adresse']);
		$ville = htmlentities($_POST['ville']);
		$pays = htmlentities($_POST['pays']);
		$codeP = htmlentities($_POST['codePostal']);

		$arrayTotalAmount = array();

		require_once 'db.php';
		$sql = "SELECT * FROM biere";
		$statement = $pdo->query($sql);
		$bieres = $statement->fetchAll();

	} else {
		header('Location: commandes.php');
	}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Confirmation Commandes</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>

				<h1 class="text-center">Récapitulatif de la commande</h1>
				<hr class="d-md-none d-block">
				<div class="border border-white rounded p-3">
					<div class="row">
						<div class="col-xl-2 col-lg-12 border-bottom border-light ml-xl-5">
							<address class="m-0">
								<ul class="list-unstyled m-0 p-3">
									<li><?= $nom. " " .$prenom ?></li>
									<li><?= $adresse ?></li>
									<li><?= $codeP . " " .$ville ?></li>
									<li><?= $pays ?></li>
								</ul>
							</address>
						</div>
						<div class="col-xl-3 col-lg-12 border-bottom border-light">
							<ul class="list-unstyled m-0 p-3" >
								<li><?= $email ?></li>
								<li><?= $tel ?></li>
							</ul>
						</div>
					</div>
					
					<table class="table table-striped mt-3">

						<thead>
							<tr>
								<th scope="col">Nom de la bière</th>
								<th scope="col">Prix unitaire HT</th>
								<th scope="col">Prix unitaire TTC</th>
								<th scope="col">Quantité</th>
								<th scope="col">Total TTC</th>
							</tr>
						</thead>

						<tbody>
							<?php  ?>
							<?php foreach ($bieres as $biere) :

								if ($_POST['beerName'.$biere['id']] > 0) :
									
									$result = ($_POST['beerName'.$biere['id']]*$biere['prix']*1.2);

									array_push($arrayTotalAmount, $result);
							?>
							<tr>
								<td><?= $biere['titre']; ?></td>
								<td><?= '€ '.number_format($biere['prix'], '2', ',', '.'); ?></td>
								<td><?= '€ '.number_format($biere['prix']*1.2, '2', ',', '.'); ?></td>
								<td><?= $_POST['beerName'.$biere['id']]; ?></td>
								<td><?= '€ '.number_format(($_POST['beerName'.$biere['id']]*$biere['prix'])*1.2, '2', ',', '.'); ?></td>
							</tr>
							<?php
								endif;
							endforeach;
							?>
							<tfoot>
								<tr>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col">Totaux</th>
									<th scope="col">€ <?= number_format(array_sum($arrayTotalAmount), '2', ',', '.'); ?></th>
								</tr>
							</tfoot>
						</tbody>
					</table>
				</div><!-- fin border -->

			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="assets/js/table_ttc.js"></script>
		<?php include('scripts.php'); ?>
	</body>
</html>