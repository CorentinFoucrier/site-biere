function pomme(id)
{
	quantite = Number(document.getElementById(id).getElementsByClassName("quantite")[0].value);
	prixInitial = Number(document.getElementById(id).getElementsByClassName("prixInitial")[0].value);

	if (quantite > 0)
	{
		resultatHt = quantite * prixInitial;
		resultatTtc = resultatHt*1.2;

		resultatHt = resultatHt.toFixed(2).replace('.', ',');
		resultatHt = "€ " + resultatHt;

		resultatTtc = resultatTtc.toFixed(2).replace('.', ',');
		resultatTtc = "€ " + resultatTtc;

		document.getElementById(id).getElementsByClassName("prixHT")[0].innerHTML = resultatHt;
		document.getElementById(id).getElementsByClassName("prixTTC")[0].innerHTML = resultatTtc;
	}
	else
	{

		resultatTtc = prixInitial * 1.2;
		resultatTtc = resultatTtc.toFixed(2).replace('.', ',');
		resultatTtc = "€ " + resultatTtc;
		document.getElementById(id).getElementsByClassName("prixTTC")[0].innerHTML = resultatTtc;

		prixInitial = prixInitial.toFixed(2).replace('.', ',');
		prixInitial = "€ " + prixInitial;
		document.getElementById(id).getElementsByClassName("prixHT")[0].innerHTML = prixInitial;
	}
}