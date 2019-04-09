// var prixHt = Number(document.getElementById($count).childNodes[3].innerHTML.replace( ',' , '.' ));
// var prixTtc = Number(document.getElementById($count).childNodes[5].innerHTML.replace( ',' , '.' ));
// var quantite = 0;

// for (var i = 1; i > 9; i++) {
// 	Number(document.getElementById(i).childNodes[3].innerHTML.replace( ',' , '.' )); //= Prix HT
// }


// Number(document.getElementById(1).childNodes[7].childNodes[0].value);

function pomme(id) {
	prixHt = Number(document.getElementById(id).childNodes[3].innerHTML.replace( ',' , '.' ));
	prixHt1 = 

	quantite = Number(document.getElementById(id).childNodes[7].childNodes[0].value);

	resultat = quantite * prixHt;

	document.getElementById(id).childNodes[3].innerHTML = resultat;
	console.log(resultat);

}