#!/bin/sh
echo "Veuillez entrer le mot de passe du root";
mysqldump -u root -p --host=127.0.0.1 bde-lyon > ./docker/mysql/init.sql;