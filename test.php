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

$notes = array(7,3,8,9); // Formation d'un array pour la forme
echo serialize($notes); // echo du résultat de serialize() sur cet array




?>
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