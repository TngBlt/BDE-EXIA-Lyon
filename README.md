# SU-EXIA-Lyon

Y2 Project : BDE ("Bureau Des Eleves") Website that would facilitate the animation with a simple access to the different events/activities.

## Set Up

1. In the folder `src/app/config`, copy the `parameters.sample.yml` file under the name `parameters.yml`.
2. Fill the database parameters.
3. Install the dependencies with `php composer.phar install`in the `src` folder.
4. Using Docker : Launch `./dev.sh` and go to  [localhost:8080/app_dev.php](http://localhost:8080/app_dev.php).
5. Using Wamp : Launch wamp and start the integrated server with `php bin/console server:start` and go to [localhost:8000](http://localhost:8000).


---------------------------------------


//French

# BDE-EXIA-Lyon

Projet A2 de site web du BDE afin de faciliter l'animation du BDE avec un accès simple aux différentes activités.

## Installation

1. Dans le dossier `src/app/config`, copiez le fichier `parameters.sample.yml` sous le nom de `parameters.yml`
2. Remplissez les paramètres de la base de données
3. Installez les dépendances avec `php composer.phar install` dans le dossier `src`
4. **Si vous avez docker** lancez `./dev.sh` et rendez vous sur [localhost:8080/app_dev.php](http://localhost:8080/app_dev.php)
4. **Si vous avez wamp** lancez wamp et démarrez le serveur intégré avec `php bin/console server:start` et rendez vous sur [localhost:8000](http://localhost:8000)
