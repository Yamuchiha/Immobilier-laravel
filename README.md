Quand vous cloner ce projet en local:
Pour le lancer, il faut une version de php 7.4.x (x est un nombre quelconque)
Ensuite, il faut aller dans le répertoire public et supprimer le répertoire "storage" car le lien entre le répertoire "storage" du répertoire "public" et celui du répertoire "storage" qui se trouve à la racine du projet.
Une fois cela terminer, refaire le lien en exécutant la commande "php artisan storage:link"