<?php 
$beerArray = [
		[
			'La Chouffe Blonde D\'ardenne',
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
		<title>Nos autre produits</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="navbar.css" />
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<header class="row">
				<img id="bannière" src="images/brasseur.jpg" alt="brasseur" />
					<nav class="col-12 navbar navbar-expand-md navbar-dark">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbar01" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbar01">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="index.php">Présentation</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="produit.php">Produit</a>
								</li>
								<li class="nav-item active">
									<a class="nav-link" href="autre-produits.php">Autres produits <span class="sr-only">(current)</span></a>
								</li>
							</ul>
						</div>
					</nav>
			</header>

			<section class="row">
				<?php foreach ($beerArray as $element) { ?>
				<div class="col-md-4 offset-md-1 mb-5">
					<div class="row box">
						<!-- HEADER -->
						<div class="col-12">
							<h3 class="my-3 text-center text-uppercase"><?php echo $element[0]; ?></h3>
						</div>
						<!-- IMG -->
						<div class="col-12 box-borders">
							<img class="my-3 mx-auto d-block" src="<?php echo $element[1]; ?>" height="250" />
						</div>
						<!-- Description -->
						<div class="col-12 ">
							<p class="my-1 text-justify"><?php echo $element[2]; ?></p>
						</div>
						<hr>
						<!-- Prix -->
						<div class="col-12">
							<h5 class="my-3 text-center"><?php echo $element[3]; ?>€</h5>
						</div>
					</div>
				</div>
				<?php } ?>
			</section>

			<footer class="row text-center">
				<div class="col-12">
					<br />
					<p>© Copyright 2019 - La bière au pain | <a href="index.html">Présentation</a> \ <a href="produit.html">Notre produit</a><br />
					SAS au capital de 1.000€ - N°SIREN : 555 222 666</p>
				</div>
			</footer>
		</div>
	</body>
</html>