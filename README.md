# site-biere
Site vitrine et "e-commerce" en PHP + SGBD

## Tester

### Git
`git clone https://github.com/CorentinFoucrier/site-biere.git`

### Composer

Se positioner dans ../assets puis executer  

`composer require "swiftmailer/swiftmailer:5.4.12"`
  
### Importation PHPMyAdmin
1. Télécharger [structure.sql](https://mega.nz/#!q00HlKrS!RTg0qhA9qJa2UR0R7gDsWdDnPKYNJJL2_Hej-dnkELY) ([Gdrive](https://drive.google.com/file/d/1H4dvzPXjpsZBYJx9ep3TIlna-jxiyeaP/view)) ([DropBox](https://www.dropbox.com/s/2zbndhnivfahyl9/structure.sql))
3. Créer une nouvelle base de donnée avec n'importe quel nom ![Imgur](https://i.imgur.com/aYpJOhE.png)
4. Une fois la base créée cliquez dessus ![Imgur](https://i.imgur.com/hXgecZP.png)
5. Importer ![Imgur](https://i.imgur.com/j57qHRj.png)
6. Choisir un fichier -> structure.sql
7. Exécuter![Imgur](https://i.imgur.com/u3PTuyv.png)
8. Enjoy !
  
### Configuration de config.sample.php
1. Renommer config.sample.php en config.php
2. Changer les champs en fonction
```php
<?php
	/* DATABASE */
	$dbhost = 'localhost'; //Hôte de la base de données.
	$dbname = 'myDataBase'; //Nom de la base de données.
	$dbuser = 'root'; //Utilisateur de la base de données.
	$dbpass = 'root'; //Mot de passe de la base de données.
	/* SERVEUR MAIL */
	$mailFrom = 'example@example.com'; //Adresse mail qui envoie.
	$mailpassword = '****'; //Mot de passe de l'adresse mail d'envoie.
	$smtp = 'smtp.gmail.com'; //Serveur SMTP, exemple 'smtp.gmail.com'.
	$port = 586; // Port serveur SMTP (int).
	$cryptage = 'tls'; //Methode de cryptage du serveur SMTP tls ou ssl.
```
