<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Présentation entreprise</title>
		<?php require 'includes/head.php'; ?>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<div class="container-fluid">
			<section class="row">
				<div class="col-12 col-md-12">
					<h1 class="text-center">Qui somme nous ?</h1>
					<hr class="d-none d-lg-block" />
					<p class="m-2">Entreprise a été créée de 2 formateurs, Julien et Kévin. Cette entreprise élabore de façon artisanale de la bière.<br />
					Elle est située en Allemagne, à Stuttgart. L'entreprise s'est spécialisée dans la production de bière aromatisée au pain.</p>
				</div>
			</section>

			<section class="row">
				<div id="contact" class="col-12">
					<p class="h1 text-center">Où somme nous ?</p>
					<hr />
				</div>
			</section>

			<section class="row">
				<div class="col-12 col-md-6">
					<img class="img-fluid" src="assets/img/plan_stuttgart.jpg" alt="Plan Stuttgart" />
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

			<section class="row">
				<div id="contact" class="col-12">
					<p class="h1 lg text-center">Contactez nous !</p>
					<hr />
				</div>
				<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
					<form class="p-4">
						<div class="form-group">
							<label for="text">Votre email de contact</label> 
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-at"></i>
									</div>
								</div> 
								<input id="text" name="text" placeholder="example@example.com" type="text" class="form-control" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="emailMsg">Votre message</label> 
							<textarea id="emailMsg" name="emailMsg" cols="40" rows="5" class="form-control" required="required"></textarea>
						</div> 
						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-primary">Envoyer</button>
						</div>
					</form>
				</div>
			</section>
		<?php require 'includes/footer.php'; ?>
		</div>
	<?php require 'includes/scripts.php'; ?>
	</body>
</html>
