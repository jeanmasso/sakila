# Sakila

## Récupération du repositorie :
``` 
git clone https://github.com/jeanmasso/sakila
```


## Installation de la base de donnée MySQL :
Créer un nouvelle base de données nommée : ***Sakila*** dans MySql ou PhpMyAdmi.

Connection à la base de données :
- Nom de la base de données: sakila
- Utilisateur: root
- Mot de passe: password

## Installation du Projet :
``` 
npm install
``` 

## Lancement du Projet :
``` 
php -S localhost:8888 -t public 
```

## Utilisateur de l'application :

Staff 1: 
  - Identifiant: Mike
  - Mail: Mike.Hillyer@sakilastaff.com
  - Mot de passe: 8cb2237d0679ca88db6464eac60da96345513964
  
Staff 2: 
  - Identifiant: Jon
  - Mail: Jon.Stephens@sakilastaff.com
  - Mot de passe: test

## Technologies utilisées :
Front-End: 
 - HTML/CSS/JS
 - SASS
 - jQuery
 - Bootstrap 5
 - Bootstrap-table
 - Font-awesome (free version)

Back-End: 
 - PHP/SQL
 - MySQL Workbench
 - PhpMyAdmin
 - PDO


## Reste à faire :
* Débuguer l'ajout d'une location
* Intégrer le retour d'une location
* Gestion des urls par des routes (utilisation de composer)
* Vérification des données dans l'API avant l'envoi pour insertion dans la base de données
