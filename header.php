<?php
	
	$uri = "$_SERVER[REQUEST_URI]";

	$short_uri = basename($uri, ".php");

	$index = "";
	$produit = "";
	$autreProduits = "";
	$commandes = "";

	switch ($short_uri) {
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
					<li class="nav-item <?= $commandes ?>">
						<a class="nav-link" href="commandes.php">Commandes</a>
					</li>
				</ul>
				<form class="form-inline">
					<input class="form-control mr-sm-2 my-2 my-md-0" type="text" placeholder="Username" aria-label="Username">
					<input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password">
					<button class="btn btn-light my-2 my-sm-0" type="submit">Login</button>
					<a href="inscription.php"><button class="btn btn-light my-2 my-sm-0 ml-1">S'inscrire</button></a>
				</form>
			</div>
			
		</nav>

</header>