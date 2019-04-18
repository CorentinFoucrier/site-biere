<?php 



?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Présentation entreprise</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<form method="post" action="" class="border border-white rounded p-5">
						<fieldset>
							<legend>Formulaire d'inscription</legend>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="nom">Nom d'utilisateur</label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="form-group col-12">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Mot de passe</label>
									<input type="text" class="form-control" name="password">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Confirmation mot de passe</label>
									<input type="text" class="form-control" name="passwordConfirmed">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="adresse">Adresse</label>
									<input type="text" class="form-control" name="adresse">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="pays">Pays</label>
									<input type="text" class="form-control" name="pays">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="codePostal">Code postale</label>
									<input type="text" class="form-control" name="codePostal">
								</div>
							</div>
							<button type="submit" class="btn btn-light float-left">Envoyer</button>
						</fieldset>
					</form>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>