<?php
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
?>


<!DOCTYPE html>
<html>
<head>
	<title>un titre</title>
</head>
	<body>
		<h2 id="<?php echo "FORM 1" ?>"><?php echo "FORM 1" ?></h2>

		<form method="post" action="" name="form1">
			<input type="text" name="nom" value="Corentin">
			<button type="submit" name="sendForm1" value="sendForm1" for="form1">Envoyer</button>
		</form>

		<h2>Form 2</h2>

		<form method="post" action="" name="form2">
			<input type="text" name="age" value="Age: 22">
			<button type="submit" name="sendForm2" value="sendForm2" for="form2">Envoyer</button>
		</form>
	</body>
</html>
