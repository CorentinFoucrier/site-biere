<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Présentation entreprise</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<section class="row">
				<div class="col-12 col-md-12">
					<h1 class="text-center">Qui somme nous ?</h1>
					<hr class="d-none d-lg-block" />
					<p class="m--2">Entreprise créée par l'association de 2 formateurs, Julien et Kévin. Cette entreprise élabore de façon artisanale de la bière.<br />
					Elle est située en Allemagne, à Stuttgart. L'entreprise s'est spécialisée dans l'élaboration d'une bière aromatisée au pain.</p>
				</div>
			</section>

			<section class="row">
				<div id="contact" class="col-12">
					<h2 class="text-center">Contactez-nous !</h2>
					<hr />
				</div>
			</section>

			<section class="row">
				<div class="col-12 col-md-6">
					<img src="images\plan_stuttgart.jpg" alt="Plan Stuttgart" />
				</div>
				<div class="col-md-6">
					<div class="contact-list">
						<address>
							<ul class="p-0 list-unstyled">
								<p class="m-0">Par voie postale:</p>
								<li>51 rue de la bière</li>
								<li>70173 Stuttgart</li>
								<li>ALLEMAGNE</li>
							</ul>
						</address>
						<p>Par email:<br />
						<a href="mailto:biere@apprendre.co">biere@apprendre.co</a>
						</p>
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>
