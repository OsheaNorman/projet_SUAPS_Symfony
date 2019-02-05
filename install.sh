#!/bin/bash
composer require symfony/http-foundation
composer require symfony/http-kernel
composer require api

#Dump de la base
mysql --user=root --password=root SUAPS < SUAPS.sql

#Creation de l'utilisateur
mysql --user="root" --password="root" --execute="GRANT ALL PRIVILEGES ON SUAPS.* TO 'user'@'localhost' IDENTIFIED BY 'password'";
#Remplace la connection pour la base de donnée
sed -i -e 's/DATABASE_URL=mysql:\/\/db_user:db_password@127.0.0.1:3306\/db_name/DATABASE_URL=mysql:\/\/user:password@127.0.0.1:3306\/SUAPS/g' .env
