# Projet_SUAPS_Symfony
Cette application va de paire avec le projet suivant : [Projet SUAPS Android](https://github.com/jderamaix/Projet_SUAPS_Android)
L'objectif de ce serveur est de recevoir des informations de cette application pour permettre l'enregistrement des élèves et les afficher sur un écran. Il met aussi à disposition une page web regroupant des statistiques sur ces badgeages.

## Installation
Le lancement du serveur demande l'installation d'autres technologies:
* Python 2.7
* PHP 7.2.14
* Composer
* Mysql 5.7

Puis lancer le install.sh qui va s'occuper d'installer les composants du projet Symphony et de configurer la connexion à la base de données. Il est important de noter qu'il faut   **changer les identifiants nécessaires pour la connexion à la base dans ce script**.
## Lancement du serveur
Le lancement du serveur se fait grâce à l'execution du script.sh qui va lancer le script python pour la connexion de l'application Android, puis va lancer le serveur symfony.

## Dépendance utilisées
* [Api-platform](https://api-platform.com)
* [Doctrine ORM](https://symfony.com/doc/4.1/doctrine.html)
* [HttpFoundation](https://symfony.com/doc/current/components/http_foundation.html)
