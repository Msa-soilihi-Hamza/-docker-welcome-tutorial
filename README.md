# Projet Docker : Welcome-to-Docker

Ce projet documente l'utilisation et l'exploration de l'image Docker "welcome-to-docker".

## Table des matières

1. [Installation et Configuration](#installation-et-configuration)
2. [Exécution du conteneur](#exécution-du-conteneur)
3. [Exploration de l'interface](#exploration-de-linterface)
4. [Commandes Docker de Base](#commandes-docker-de-base)
5. [Gestion des Conteneurs et Images](#gestion-des-conteneurs-et-images)
6. [Nettoyage de l'environnement](#nettoyage-de-lenvironnement)

## Installation et Configuration

Pour commencer, nous devons télécharger et exécuter l'image Docker.

![Configuration initiale](images/Capture%20d'écran%202.png)

## Exécution du conteneur

La commande suivante permet de démarrer le conteneur :

```bash
docker run -d -p 8088:80 --name welcome-to-docker docker/welcome-to-docker
```

- `-d` : Mode détaché (background)
- `-p 8088:80` : Redirection du port 80 du conteneur vers le port 8088 de l'hôte
- `--name welcome-to-docker` : Nom attribué au conteneur
- `docker/welcome-to-docker` : Image utilisée

Résultat de l'exécution :
![Exécution du conteneur](images/Capture%20d'écran%203.png)

## Exploration de l'interface

Une fois le conteneur démarré, nous pouvons accéder à l'interface via notre navigateur sur `http://localhost:8088` :

![Interface d'accueil](images/Capture%20d'écran%204.png)

Navigation dans l'interface :
![Exploration](images/Capture%20d'écran%205.png)

## Commandes Docker de Base

### Vérification de l'installation

```bash
# Vérifier la version de Docker
docker --version

# Obtenir les informations détaillées sur Docker
docker info
```

### Commandes de base

```bash
# Lister les conteneurs en cours d'exécution
docker ps

# Lister toutes les images Docker
docker images

# Arrêter un conteneur
docker stop [CONTAINER_ID/NAME]

# Télécharger une image
docker pull [IMAGE_NAME]
```

### Construction et exécution du conteneur

```bash
# Exécuter un conteneur avec mappage de port
docker run -it --rm -p 8088:80 docker/welcome-to-docker

# Accès via le navigateur : http://localhost:8088
```

## Gestion des Conteneurs et Images

### Suppression des conteneurs

```bash
# Supprimer un conteneur spécifique
docker rm [CONTAINER_ID/NAME]

# Supprimer plusieurs conteneurs
docker rm [CONTAINER1_ID] [CONTAINER2_ID]

# Supprimer tous les conteneurs arrêtés
docker container prune

# Forcer la suppression d'un conteneur actif
docker rm -f [CONTAINER_ID/NAME]
```

### Suppression des images

```bash
# Supprimer une image spécifique
docker rmi [IMAGE_ID/NAME]

# Supprimer plusieurs images
docker rmi [IMAGE1_ID] [IMAGE2_ID]

# Supprimer toutes les images inutilisées
docker image prune

# Supprimer toutes les images non utilisées (incluant les images intermédiaires)
docker image prune -a

# Forcer la suppression d'une image
docker rmi -f [IMAGE_ID/NAME]
```

### Note importante
La commande `docker run` sans paramètres supplémentaires est incomplète. Il est nécessaire de spécifier au minimum :
- Une image à exécuter
- Les paramètres de configuration (ports, volumes, variables d'environnement, etc.) 

## Nettoyage de l'environnement

### État initial
```bash
PS C:\Users\Utilisateur> docker ps
CONTAINER ID   IMAGE                      COMMAND                  CREATED          STATUS          PORTS                  NAMES
07e31173c453   docker/welcome-to-docker   "/docker-entrypoint.…"   19 minutes ago   Up 19 minutes   0.0.0.0:8088->80/tcp   welcome-to-docker
```

### Procédure de nettoyage

1. Arrêt du conteneur :
```bash
docker stop welcome-to-docker
```

2. Suppression du conteneur :
```bash
docker rm welcome-to-docker
```

3. Suppression de l'image :
```bash
docker rmi docker/welcome-to-docker
```

### Vérification du nettoyage
Pour vérifier que tout a été correctement nettoyé, utilisez ces commandes :
```bash
# Vérifier qu'il n'y a plus de conteneurs en cours d'exécution
docker ps

# Vérifier qu'il n'y a plus de conteneurs arrêtés
docker ps -a

# Vérifier que l'image a été supprimée
docker images
``` 