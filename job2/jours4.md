# Job 2 : Serveur Apache PHP avec Docker

## Structure du projet
```
.
├── Dockerfile
└── index.php
```

## Contenu des fichiers

### 1. index.php
```php
<?php phpinfo(); ?>
```
Ce fichier contient exactement 10 caractères de code PHP et affiche toutes les informations du serveur Apache.

### 2. Dockerfile
```dockerfile
FROM php:8.2-apache
COPY index.php /var/www/html/
EXPOSE 80
```
- `FROM php:8.2-apache` : Utilise l'image officielle PHP avec Apache
- `COPY index.php /var/www/html/` : Copie notre fichier PHP dans le répertoire web
- `EXPOSE 80` : Expose le port 80 pour Apache

## Étapes de déploiement

### 1. Construction de l'image
```bash
docker build -t php-apache-app .
```
Cette commande crée une image nommée 'php-apache-app' à partir du Dockerfile.

### 2. Création et démarrage du conteneur
```bash
docker run -d -p 8080:80 --name php-server php-apache-app
```
Options utilisées :
- `-d` : Mode détaché (background)
- `-p 8080:80` : Mapping du port 8080 (hôte) vers le port 80 (conteneur)
- `--name php-server` : Nom du conteneur
- `php-apache-app` : Nom de l'image à utiliser

### 3. Arrêt du conteneur
```bash
docker stop php-server
```

## Accès à l'application
Quand le conteneur est en marche, l'application est accessible via :
```
http://localhost:8080
```

## Résumé des fonctionnalités
- ✅ Serveur Apache avec PHP
- ✅ Page PHP minimale (10 caractères)
- ✅ Port interne : 80
- ✅ Port externe : 8080
- ✅ Conteneur nommé : php-server
- ✅ Image nommée : php-apache-app
