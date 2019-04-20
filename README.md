# site-biere
Site vitrine et "e-commerce" en PHP + SGBD

## Tester

### Clone git
`git clone https://github.com/CorentinFoucrier/site-biere.git`
  
### Importation PHPMyAdmin
1. Télécharger [structure.sql](https://www.dropbox.com/s/ns1u03yk2pvyu2t/structure.sql?dl=0) ([mirroir](https://drive.google.com/file/d/1OlQ9Z3Njn-XbVqHAdakOeIuc6rlb3OVw/view))
2. Télécharger [biere.xml](https://www.dropbox.com/s/ip1gtt5kpjkuvex/biere.xml?dl=0) ([mirroir](https://drive.google.com/file/d/13g8swOLmL6ZtyQXbE_h2dTkxuXJtZ6jC/view))
3. Créer une nouvelle base de donnée avec n'importe quel nom ![Imgur](https://i.imgur.com/aYpJOhE.png)
4. Une fois la base créée cliquez dessus ![Imgur](https://i.imgur.com/hXgecZP.png)
5. Importer ![Imgur](https://i.imgur.com/j57qHRj.png)
6. Choisir un fichier -> structure.sql
7. Exécuter![Imgur](https://i.imgur.com/u3PTuyv.png)
    - Votre base à 2 tables: "commandes" et "users"
8. Toujours dans notre base Importer une nouvelle fois
9. Choisir un fichier -> biere.xml
  
### Configuration de config.sample.php
```php
<?php
	$dbhost = 'localhost'; //Adresse IP / DNS
	$dbname = 'test'; //Nom de la base que l'on utilise.
	$dbuser = 'root'; //Utilisateur de la base de données.
	$dbpass = ''; //MDP utilisateur, vide si WAMP 'root' si MAMP/LAMP
?>
```
