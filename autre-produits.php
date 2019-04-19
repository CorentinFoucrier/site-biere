<?php 

	session_start();
	require 'db.php';

	function add3dots($string, $repl, $limit) 
	{
	  if(strlen($string) > $limit) 
	  {
	    return substr($string, 0, $limit) . $repl; 
	  }
	  else 
	  {
	    return $string;
	  }
	}

	$reqBiere = "SELECT * FROM biere";
	$statement = $pdo->query($reqBiere);
	$bieres = $statement->fetchAll();


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title id="titre">Nos autre produits</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<section class="row">
				<?php foreach ($bieres as $biere) { ?>
				<div class="col-md-4 offset-md-1 mb-5">
					<div class="row box">
						<!-- HEADER -->
						<div class="col-12">
							<h3 class="my-3 text-center text-uppercase"><?php echo $biere['titre']; ?></h3>
						</div>
						<!-- IMG -->
						<div class="col-12 box-borders">
							<img class="my-3 mx-auto d-block" src="<?php echo $biere['img']; ?>" height="250" />
						</div>
						<!-- Description -->
						<div class="col-12 ">
							<p class="my-1"><?php echo add3dots($biere['description'], "...", 100); ?></p>
						</div>
						<!-- Prix -->
						<div class="col-12">
							<h5 class="my-3 text-center"><?php echo number_format($biere['prix']*1.2, 2, ',', '.'); ?>€ TTC</h5>
						</div>
					</div>
				</div>
				<?php } ?>
			</section>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>