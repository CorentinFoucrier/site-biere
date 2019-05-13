<?php 
	require_once 'includes/function.php';
?>
<header class="">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Bread Bear Shop</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php"><i class="fas fa-home"></i> Acceuil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="boutique.php"><i class="fas fa-store"></i> Boutique</a>
				</li>
				<?php if (isConnect(true)) : ?>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fas fa-receipt"></i> Bon de commande</a>
				</li>
				<?php endif ?>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="<?php echo (isConnect(true)) ? 'd-none' : '' ?> nav-item">
					<a class="nav-link" href="login.php"><i class="fas fa-user"></i> Connexion/ Inscription</a>
				</li>
				<?php if (isConnect(true)) : ?>
				<li class="nav-item">
					<a class="nav-link" href="mon_compte.php"><i class="fas fa-id-card"></i> Profil</a></a>
				</li>
				<?php endif ?>
				<?php if (isConnect(true)) : ?>
				<li class="nav-item">
					<a class="nav-link" href="deconnexion.php"><i class="fas fa-power-off"></i> Deconnexion</a></a>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</nav>

</header>