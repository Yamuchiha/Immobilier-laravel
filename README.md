
# Guide pour lancer le projet

Pour lancer ce projet, nous avons besoins de php v7.4.x (x: est une nombre quelconque)


## Execution en Local

#### Clôner le projet

```bash
  git clone https://github.com/Yamuchiha/Immobilier-laravel.git
```

#### Aller dans le répertoire "Immobilier-laravel"

```bash
  cd Immobilier-laravel
```

#### Création de la base de donnée 

Créer la base de donnée "e-commerce" dans phpMyadmin

#### Faire une migration

```bash
  php artisan make:migration
```

#### Suppression du répertoire "storage"
Aller dans le répertoire "public" puis supprimer le répertoire "storage" qui s'y trouve

#### Linker le répertoire "storage"

```bash
  php artisan storage:link
```

#### Lancer le server

```bash
  php artisan serve
```

