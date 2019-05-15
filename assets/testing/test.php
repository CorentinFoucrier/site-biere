<?php 
/*
include 'beerArray.php';
include 'db.php';

$sql = 'INSERT INTO biere (titre, img, description, prix) VALUES (:titre, :img, :description, :prix)';

foreach ($beerArray as $element) { 
$statement = $pdo->prepare($sql);
$result = $statement->execute([
	':titre' 		=> $element[0],
	':img'			=> $element[1],
	':description' 	=> $element[2],
	':prix' 		=> $element[3]
]);
}
*/
/*
if (!empty($_POST['sendForm1'])) {
	$nom = htmlentities($_POST['nom']);
	if (!empty($nom)) {
		echo "FORM 1 ".$_POST['nom'];
	}else{
		echo 'le FORM1 est vide !';
	}
}

if (!empty($_POST['sendForm2'])) {
	$nom = htmlentities($_POST['age']);
	if (!empty($nom)) {
		echo "FORM 2 ".$_POST['age'];
	}else{
		echo 'le FORM 2 est vide !';
	}
}
*/

//$notes = array(7,3,8,9); // Formation d'un array pour la forme
//echo serialize($notes); // echo du résultat de serialize() sur cet array

require 'db.php';

$idClientSimuler = 1; //en prod on utilisera l'id passé en _SESSION
$sql = 'SELECT `id_products`, `prix_ttc`, `id` FROM `commandes` WHERE `id_client` = ?';
$state = $pdo->prepare($sql);
$state->execute([$idClientSimuler]);
$user = $state->fetchAll();
// var_dump($user);die();


?>

<style type="text/css">
table,
td {
    border: 1px solid #333;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}
</style>
<table>
	<thead>
        <tr>
            <th>Numero de commande</th>
            <th>Vos produis</th>
            <th>Total TTC</th>
        </tr>
    </thead>
    <tbody>
	<?php for ($i=0; $i < count($user) ; $i++) : 

		$unserialize = unserialize($user[$i][0]);
		// var_dump($unserialize);die();
		$prixTTC = $user[$i][1];
	?>
		<tr>
			<td><?= $user[$i][2] ?></td>
			<td>
			<?php foreach ($unserialize as $id_products => $quantite) : 

			$reqBiere = "SELECT `titre` FROM biere WHERE id = :id";
			$statement = $pdo->prepare($reqBiere);
			$statement->execute([
				':id' => $id_products
			]);
			$bieres = $statement->fetch(); 
			
			echo $quantite.", ".$bieres['titre']." <br />";?>
			<?php endforeach; ?>
			</td>
			<td><?= $prixTTC ?></td>
		</tr>
	<?php endfor; ?>
	</tbody>
</table>

<!--
<h2>Form 1</h2>
<form method="post" action="" name="form1">
	<input type="text" name="nom" value="Corentin">
	<button type="submit" name="sendForm1" value="sendForm1" for="form1">Envoyer</button>
</form>
<h2>Form 2</h2>
<form method="post" action="" name="form2">
	<input type="text" name="age" value="Age: 22">
	<button type="submit" name="sendForm2" value="sendForm2" for="form2">Envoyer</button>
</form>
-->