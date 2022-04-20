
# Projet du groupe hôtelier hypnos

Ce site web a été créé pour le group hôtelier hypnos afin d'avoir son propore site de réservation.




## Authors

- [@Nadia EPIVENT](https://github.com/Nadia-ready/hypnos)


## Documentation

Toutes la documentation est disponibles dans le dossier ANNEXES (charte graphique, manuel d'utilisation, spécifications techniques).




## Installation en local

Pour récupérer le projet vous devez utiliser git clone
```
git clone https://github.com/Nadia-ready/hypnos
```


#### Puis se placer dans le dossier:
```
cd hypnos
```
#### Installer les dépendances:
```
composer install
```
#### Création de la base de données:
```
php bin/console doctrine:database:create
```
#### Création des tables (solution 1):
```
php bin/console doctrine:migrations:migrate
```
#### Création des tables (solution 2) avec insertion des jeux de données:
```
Importer le fichier backup.sql dans la base de données
```
Un fichier.env.local nous permet de déployer le site en local, vous devez configurer ce fichier en fonction de votre serveur et de votre base de données.



    
## Utilisation

#### Deux possibilités pour lancer le développement PHP:
1 Si vous avez installé Symfony:
```
symfony server:start
```

2 Si vous avez installé Composer, il faut installer le Web Server Bundle
```
composer require symfony/web-server
php bin/console server:start
```




## Deploiement

Pour déployer le projet, j'ai utilisé Heroku et l'add-ons 'JawsDb'.

https://hotelhypnos-app.herokuapp.com



