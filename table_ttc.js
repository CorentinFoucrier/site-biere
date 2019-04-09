function pomme(id) {
	prixInitial = Number(document.getElementById(id).childNodes[7].childNodes[3].value);
	quantite = Number(document.getElementById(id).childNodes[7].childNodes[1].value);

	resultatHt = quantite * prixInitial;
	resultatTtc = resultatHt*1.2;

	document.getElementById(id).childNodes[3].innerHTML = resultatHt.toFixed(2).replace('.', ',');
	document.getElementById(id).childNodes[5].innerHTML = resultatTtc.toFixed(2).replace('.', ',');

}