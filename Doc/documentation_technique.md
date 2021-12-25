# Documentation technique du projet (Exercise looper)

Cette documentation a pour but de fournir toutes les informations techniques nécessaires à un-e développeur-se qui rejoindrait l'équipe.  
Il se présente donc en bonne partie sous forme de questions: les questions que poserait un-e nouvel-le arrivant-e.



### A quoi sert le site ? A qui est-il destiné et dans quel but ?

Ce site permet de créer des exercices pour que les élèves puissent y répondre et vérifier leur connaissance. Il est destiné aux professeurs et aux élèves.

### Dans quel contexte (technique) ce site est-il destiné à fonctionner ?

Le site est hébérgé chez swisscenter. Une connexion internet est donc nécessaire pour accèder au site.
Celui-ci est accessible uniquement depuis un pc.

### Quelles sont les données / informations que ce site manipule ?

#### MCD
![MCD](https://raw.githubusercontent.com/TGACPNV/The_Looper/main/Doc/DB/MCD/MCD.png)

#### MLD
![MLD](https://raw.githubusercontent.com/TGACPNV/The_Looper/main/Doc/DB/MLD/MLD.png)

#### Diagramme de classes
![Classes](https://github.com/TGACPNV/The_Looper/blob/develop/Doc/Class_diagram/Class_diagram.png?raw=true)


### De quels composants le site est-il fait ? Comment interagissent-ils ?

Notre site utilise une structure MVC.

### Quelles technologies est-ce que je dois connaître pour pouvoir développer ce site ? 
- PHP
- SQL

### Qu'est-ce que je dois installer sur mon poste de travail pour pouvoir commencer à bosser sur ce site ?

- Un IDE adapté
- php 8.0
- MySQL Workbench / HeidiSQL
- git
- composer

## Quelles astuces avez-vous employés ?

### Astuce #1: 
Quand un retour à la page précédente est requis mais que cette page prenais des paramètres en GET pour arriver sur par exemple lon bon exercice, nous utilisons `$_SERVER['HTTP_REFERER']` qui donne l'adresse où le navigateur était avant de faire la requête en cours. Nous utilisons avons donc la ligne suivante pour le rediriger vers la page précédente:

```php
header('Location: ' . $_SERVER['HTTP_REFERER']);
```