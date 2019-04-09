<?php 
$beerArray = [
		[
			'La Chouffe',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/la-chouffe-blonde-d-ardenne_opt.png?h=500&rev=899257661',
			'Bière dorée légèrement trouble à mousse dense, avec un parfum épicé aux notes d’agrumes et de coriandre qui ressortent également au goût.',
			1.91
		],
		[
			'Duvel',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/duvel_opt.png?h=500&rev=899257661',
			'Robe jaune pâle, légèrement trouble, avec une mousse blanche incroyablement riche. L’arôme associe le citron jaune, le citron vert et les épices. La saveur incorpore des agrumes frais, le sucre de l’alcool et une note épicée due au houblon qui tire sur le poivre. En dépit de son taux d’alcool, c’est une bière fraîche qui se déguste facilement. ',
			1.66
		],
		[
			'Duvel Tripel Hop',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/duvel-tripel-hop-citra.png?h=500&rev=39990364',
			'Une variété supplémentaire de houblon est ajoutée à cette Duvel traditionnelle. Le HBC 291 lui procure un caractère légèrement plus épicé et poivré. Cette bière présente un fort taux d’alcool mais reste très facile à déguster grâce à ses arômes d’agrumes frais et acides, entre autres.',
			2.24
		],
		[
			'Delirium Tremens',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/blond/delirium_tremens_2.png?h=500&rev=204392068',
			'Bière dorée, claire à la mousse blanche pleine. Bière belge classique fortement gazéifiée et alcoolisée à la levure fruitée, arrière-goût doux.',
			2.08
		],
		[
			'Delirium Nocturnum',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/delirium_nocturnum.png?h=500&rev=1038477262',
			'Une bière rouge foncée brassée selon la tradition belge: à la fois forte et accessible. Des saveurs de fruits secs, de caramel et chocolat. Légèrement sucrée avec une touche épicée (réglisse et coriandre). La finale en bouche est chaude et agréable.',
			2.24
		],
		[
			'Cuvée des Trolls',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/cuvee_des_trolls_2.png?h=500&rev=923839745',
			'Bière brumeuse jaune paille à la mousse blanche consistante. Full body aux arômes fruités d’agrumes et de fruits jaunes. Grande douceur et petite touche acide rafraîchissante, levure. ',
			1.29
		],
		[
			'Chimay Rouge',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/chimay---rood_v2.png?h=500&rev=420719671',
			'Bière brune à la robe cuivrée avec une mousse durable, délicate et généreuse. Elle présente des arômes fruités de banane. D’autres parfums comme le caramel sucré, le pain frais, le pain grillé et même une touche d’amande sont aussi présents. Les mêmes arômes sucrés se retrouvent au goût et conduisent à une fin de bouche douce et légèrement amère. ',
			1.49
		],
		[
			'Chimay Bleue',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/chimay---blauw_v2.png?h=500&rev=420719671',
			'La Chimay Blauw, aussi connue sous le nom de Grande Réserve, est une bière trappiste reconnue. Il s’agissait au départ d’une bière de Noël, mais elle est disponible toute l’année depuis 1954. Une bière puissante et chaleureuse aux arômes de caramel et de fruits secs.',
			1.74
		],
		[
			'Chimay Triple',
			'https://www.beerwulf.com/globalassets/catalog/beerwulf/beers/chimay---wit_v2.png?h=500&rev=420719671',
			'Robe de couleur doré clair, légèrement trouble avec une belle mousse blanche qui fera saliver les amateurs. Le nez et la bouche sont chargés de fruits comme le raisin et de levure. Une amertume ronde se dégage en fin de bouche.',
			1.57
		]
	];

?>

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

			<table class="table table-striped mt-5">
				<thead>
					<tr>
						<th scope="col">Nom de la bière</th>
						<th scope="col">Prix HT</th>
						<th scope="col">Prix TTC</th>
						<th scope="col">Quantité</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < count($beerArray); $i++) { ?>
					<tr id="<?= ($i+1) ?>">
						<th scope="row"><?= $beerArray[$i][0] ?></th>
						<td><?= number_format($beerArray[$i][3], 2, ',', '.'); ?></td>
						<td><?= number_format($beerArray[$i][3]*1.2, 2, ',', '.'); ?></td>
						<td><input class="form-control" type="number" value="0" name="Qte"></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="table_ttc.js"></script>
		<?php include('scripts.php'); ?>
	</body>
</html>