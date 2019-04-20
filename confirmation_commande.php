<?php
	session_start();
	require 'isNotLogged.php';
	require 'db.php';
	/* Recupération de la superglobal _POST plus verif que les champs ne sont pas vides */
	if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['tel'] &&  $_POST['email'] && $_POST['adresse'] && $_POST['ville'] && $_POST['pays'] && $_POST['codePostal'])) {
		/* Assignation des _POST à des variable classique + application du htmlentities (anti injection) */
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$tel = htmlentities($_POST['tel']);
		$email = htmlentities($_POST['email']);
		$adresse = htmlentities($_POST['adresse']);
		$ville = htmlentities($_POST['ville']);
		$pays = htmlentities($_POST['pays']);
		$codeP = htmlentities($_POST['codePostal']);
		/* Création de 2 variables qui contien un tableau vide pour plus tard */
		$arrayTotalAmount = array();
		$arrayIdBiere = array();
		/* Connexion bdd et SELECT tout la table biere */
		require_once 'db.php';
		$sql = "SELECT * FROM biere";
		$statement = $pdo->query($sql);
		$bieres = $statement->fetchAll(); // le résultat de la requête est dans $biere[] qui est un tableau.
	/* Si une variable _POST est vide on redirige vers commande.php */
	} else {
		header('Location: commandes.php'); //redirection http.
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
				<div class="border border-white rounded p-3"> <!-- bordure blanche arrondi et padding-3 -->

					<div class="row">
						<div class="col-xl-2 col-lg-12 border-bottom border-light ml-xl-5">
							<address class="m-0">
								<ul class="list-unstyled m-0 p-3"> <!-- list à puces sans puces, marges et padding-3 -->
									<!-- Affichage des inputs _POST transmis par l'utilisateur dans le form à la page commandes.php -->
									<li><?= $nom. " " .$prenom ?></li>
									<li><?= $adresse ?></li>
									<li><?= $codeP . " " .$ville ?></li>
									<li><?= $pays ?></li>
								</ul>
							</address>
						</div><!-- Fin col -->
						<div class="col-xl-3 col-lg-12 border-bottom border-light">
							<ul class="list-unstyled m-0 p-3" >
								<!-- Affichage inputs _POST -->
								<li><?= $email ?></li>
								<li><?= $tel ?></li>
							</ul>
						</div><!-- Fin col -->
					</div><!-- Fin row -->
					
					<!-- Tableau HTML-bootstrap -->
					<table class="table table-striped mt-3">
						<!-- En-tête tableau -->
						<thead>
							<tr>
								<th scope="col">Nom de la bière</th>
								<th scope="col">Prix unitaire HT</th>
								<th scope="col">Prix unitaire TTC</th>
								<th scope="col">Quantité</th>
								<th scope="col">Total TTC</th>
							</tr>
						</thead>
						<!-- Corps tableau -->
						<tbody>
							<!-- Boucle sur $bieres[] qui est un tableau sortie de SQL -->
							<?php foreach ($bieres as $biere) : //foreach $key as $value
								/*
									A chaque tour de boucle Si $_POST['beerName1'] puis $_POST['beerName2']...
									est supérieur à 0 on l'affiche. 
									($_POST['beerName'.$biere['id']] correspond à la quantité)
								*/
								if ($_POST['beerName'.$biere['id']] > 0) :
									/*
										$_POST['beerName'.$biere['id']] retourne le float de l'input number,
										sui se trouve sur la page commande.php puis il est multiplier par le prixHT
										de la bière en bdd puis multiplier par la TVA. On place le resultat dans $result
									*/
									$result = ($_POST['beerName'.$biere['id']]*$biere['prix']*1.2);
									/* array_push dépose dans le tableau vide en haut, le résultat en INT) */
									array_push($arrayTotalAmount, $result);

									array_push($arrayIdBiere, $biere['id']);
							?>
							<tr>
								<?php /* titre en bdd */ ?>
								<td><?= $biere['titre']; ?></td>
								<?php /* prixHT en bdd puis formatage en STRING avec virgule et 2 chiffre après "," */ ?>
								<td><?= '€ '.number_format($biere['prix'], '2', ',', '.'); ?></td>
								<?php /* prixHT bdd x1.2 puis formatage ... */ ?>
								<td><?= '€ '.number_format($biere['prix']*1.2, '2', ',', '.'); ?></td>
								<?php /* Quantité.s */ ?>
								<td><?= $_POST['beerName'.$biere['id']]; ?></td>
								<?php /* Total ttc calculé ci-dessous puis formatage */ ?>
								<td><?= '€ '.number_format(($_POST['beerName'.$biere['id']]*$biere['prix'])*1.2, '2', ',', '.'); ?></td>
							</tr>
							<?php
								endif;
							endforeach;
							$serialized = serialize($arrayIdBiere);
							$totauxTTC = array_sum($arrayTotalAmount);
							require_once 'db.php';
							$reqCommande = "INSERT INTO `commandes` (`id_client`, `id_products`, `prix_ttc`) VALUES (:id_client, :id_products, :prix_ttc)";
							$statement = $pdo->prepare($reqCommande);
							$result = $statement->execute([
								':id_client' 	=> $_SESSION['id'],
								':id_products'	=> $serialized,
								':prix_ttc' 	=> $totauxTTC
							]);
							if (!$result) {
								die('Erreur SQL');
							}
							?>
							<!-- Bas de tableau -->
							<tfoot>
								<tr>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col">Totaux</th>
									<!--
									array_sum calcule la somme du tableau $arrayTotalAmount
									et formate le resultat obtenu pour l'afficher avec ','
									-->
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