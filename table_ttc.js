function plus($count) {
	var prixHt = Number(document.getElementById($count).childNodes[3].innerHTML.replace( ',' , '.' ));
	var prixTtc = Number(document.getElementById($count).childNodes[5].innerHTML.replace( ',' , '.' ));
	var prixTotal = document.getElementById(1).childNodes[9].innerHTML;

	

	console.log(prixHt);

}

function moins($count) {
	var prixHt = document.getElementById($count).childNodes[3].innerHTML;
	var prixTtc = document.getElementById($count).childNodes[5].innerHTML;

	
	console.log(prixHt);
	console.log(prixTtc);

}