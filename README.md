# Classement de Chiffre d'Affaires (CA)

Ce projet vise à créer un outil simple permettant d'importer des données depuis un fichier CSV, de calculer un classement basé sur le chiffre d'affaires (CA) et de persister ces données en base de données. De plus, une page web est fournie pour consulter le classement de manière conviviale.

## Fonctionnalités
- **Importation CSV :** Le programme analyse un fichier CSV contenant des informations sur les utilisateurs et leur chiffre d'affaires, calculant ensuite un classement basé sur le CA.

- **Persistance en BDD :** Les données du classement sont stockées localement dans une base de données SQLite pour une consultation ultérieure.

- **Page Web de Consultation :** Une page web (index.php) est fournie pour consulter facilement le classement sous forme de tableau.

## Pour lancer le projet
Cloner cette repo sur votre PC et ouvrez le terminal à la racine du projet et exécutez la commande : **docker-compose up --build** vous pouvew ensuite vous connecter sur **localhost:8080**

***NB. Une fois lancée la page web, le programme va créer et persister dans la BDD les utilisateurs avec leurs CA et leurs classement calculé. Ceci va créer une BDD (fichier .db) dans le dossier Resources***

## Stack
- PHP 7.4
- SQLite3

***Auteur : Mustapha KHALOUK***