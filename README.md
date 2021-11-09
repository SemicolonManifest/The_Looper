# The_Looper

## Prérequis
- Composer
- MariaDB
- PHP 8

## Configuration du projet
- Après avoir cloné le projet il faudra faire un **composer i**.
- Puis lancez le script **./Doc/SQL/Script.sql** dans votre moteur de base de donnée.

## Configuration de la connexion à la base de donnée
- Copiez le fichier **example.env.php** qui est dans le dossier **Config** et appelez le **.env.php**.
- Changez les informations qui sont représentées par des **XXX** par les informations de votre base de données.

## Lancement des tests
- Pour lancer les tests nous utilisons la commande suivante : **php ./vendor/phpunit/phpunit/phpunit ./**