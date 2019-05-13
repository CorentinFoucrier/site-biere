<?php 

	session_start();
	require 'db.php';
	/*
		fonction qui coup un text trop long en ...
		valeurs choisir par l'adminitrateur.
	*/
	function add3dots($string, $repl, $limit) {
		/* Si la taille de la chaîne est supérieur à $limite) */
		if (strlen($string) > $limit) {
			/*
				Alors retourne une chaîne coupé à partir du
				dernier caractère d'un $limite et remplace par $repl
			*/
			return substr($string, 0, $limit) . $repl; 
		}else{
			/* Sinon retourne la chaîne non modifier */
			return $string;
		}
	}
	/* Connexion bdd et SELECT tout la table biere */
	$reqBiere = "SELECT * FROM biere";
	$statement = $pdo->query($reqBiere);
	$bieres = $statement->fetchAll(); // le résultat de la requête est dans $biere[] qui est un tableau.


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Nos autre produits</title>
		<?php require 'includes/head.php'; ?>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<div id="oppacity-bg" class="container">
			<section class="row">
				<!-- Boucle sur $bieres[] qui est un tableau sortie de SQL -->
				<?php foreach ($bieres as $biere) : //foreach $key as $value ?>
				<div class="col-md-4 my-4">
					<div class="row box">
						<!-- HEADER -->
						<div class="col-12">
							<?php /* affiche titre qui est dans la value $biere[] */ ?>
							<h3 class="my-3 text-center text-uppercase"><?php echo $biere['titre']; ?></h3>
						</div>
						<!-- IMG -->
						<div class="col-12 box-borders">
							<?php /* affiche img qui est dans la value $biere[] */ ?>
							<img class="my-3 mx-auto d-block" src="<?php echo $biere['img']; ?>" height="250" />
						</div>
						<!-- Description -->
						<div class="col-12 ">
							<?php
								/* affiche description qui est dans la value $biere[] et formater avec la fonction
								add3dots($string, $repl, $limit) => add3dots($biere['description'], "...", 100)*/
							?>
							<p class="my-1"><?php echo add3dots($biere['description'], "...", 100); ?></p>
						</div>
						<!-- Prix -->
						<div class="col-12">
							<? /* affiche, calcule et formatage du prix qui est dans la value $biere[] */ ?>
							<h5 class="my-3 text-center"><?php echo number_format($biere['prix']*1.2, 2, ',', '.'); ?>€ TTC</h5>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</section>
			
		</div>
		<?php require 'includes/footer.php'; ?>
		<?php require 'includes/scripts.php'; ?>
	</body>
</html>