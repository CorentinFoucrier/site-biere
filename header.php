<?php

	$uri = "$_SERVER[REQUEST_URI]";

	$short_uri = basename($uri, ".php");

	$index = "";
	$produit = "";
	$autreProduits = "";
	$commandes = "";
	$displayNone = "";
	$decoButton = "";
	$displayNoneDeco = "";

	if (isset($_SESSION['id'])) {
		$displayNone = 'd-none';
		$decoButton = '
		<a href="deconnexion.php" class="float-left"><button class="btn btn-light my-2 my-sm-0" type="submit">Déconexion</button></a>
		';
	} else {
		$displayNoneDeco = 'd-none';
	}

	if ($short_uri === "") {
		$index = "active";
	}

	switch ($short_uri) {
	case "site-biere":
    case "index":
        $index = "active";
        break;
    case "produit":
        $produit = "active";
        break;
    case "autre-produits":
        $autreProduits = "active";
        break;
    case "commandes":
        $commandes = "active";
        break;
    $index = "active";
	}
	if (isset($_SESSION['id'])) {
		require_once 'db.php';
		$reqUsers = 'SELECT * FROM users WHERE id = ?';
		$state = $pdo->prepare($reqUsers);
		$state->execute([$_SESSION['id']]);
		$user = $state->fetch();
	}
?>

<header class="row mb-3">

	<img id="bannière" src="assets/img/brasseur.jpg" alt="brasseur" class="d-none d-lg-block" />

		<nav class="col-12 navbar navbar-expand-md navbar-dark justify-content-between">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbar01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar01">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?= $index ?>">
						<a class="nav-link" href="index.php">Présentation</a>
					</li>
					<li class="nav-item <?= $produit ?>">
						<a class="nav-link" href="produit.php">Produit</a>
					</li>
					<li class="nav-item <?= $autreProduits ?>">
						<a class="nav-link" href="autre-produits.php">Autres produits</a>
					</li>
					<li class="nav-item <?= $commandes ?> <?= $displayNoneDeco ?>">
						<a class="nav-link" href="commandes.php">Commandes</a>
					</li>
				</ul>
				<form method="post" action="connexion.php" class="form-inline <?= $displayNone ?>">
					<input class="form-control mr-sm-2 my-2 my-md-0" type="text" name="username" required="required" placeholder="Username" aria-label="Username">
					<input class="form-control mr-sm-2" type="password" name="password" required="required" placeholder="Password" aria-label="Password">
					<button class="btn btn-light my-2 my-sm-0" type="submit">Login</button>
					
				</form>
				<a class="<?= $displayNone ?>" href="inscription.php"><button class="btn btn-light my-2 my-sm-0 ml-1">S'inscrire</button></a>
				<span class="<?= $displayNoneDeco ?>">Bonjour, <strong> <?= $user['prenom'] ?> </strong> !</span>
				<a class="<?= $displayNoneDeco ?>" href="mon_compte.php"><button class="btn btn-light my-2 my-sm-0 mx-1">Mon compte</button></a>
				<?= $decoButton ?>
			</div>
			
		</nav>

</header>