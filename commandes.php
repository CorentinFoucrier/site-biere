<!DOCTYPE html>
<html>
	<head>
		<title>Commandes</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>

			<form method="get" class="border border-white rounded p-5">
				<fieldset>
					<legend>Formulaire de commande</legend>

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
						<div class="form-group col-3">
							<label for="tel">Téléphone</label>
							<input type="text" class="form-control" name="tel">
						</div>
						<div class="form-group col">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" name="adresse">
						</div>
						<div class="form-group col-3">
							<label for="ville">Ville</label>
							<input type="text" class="form-control" name="ville">
						</div>
						<div class="form-group col-2">
							<label for="pays">Pays</label>
							<input type="text" class="form-control" name="pays">
						</div>
						<div class="form-group col-2">
							<label for="codePostal">Code postale</label>
							<input type="text" class="form-control" name="codePostal">
						</div>
					</div>



					<button type="submit" class="btn btn-light float-left">Envoyer</button>
				</fieldset>
			</form>

			<table class="table mt-5">
				<thead class="">
					<tr>
						<th scope="col">#</th>
						<th scope="col">First</th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
				</tbody>
			</table>

			<?php include('footer.php'); ?>
		</div>
		<?php include('scripts.php'); ?>
	</body>
</html>