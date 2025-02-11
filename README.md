# Projet Docker : Welcome-to-Docker

Ce projet documente l'utilisation et l'exploration de l'image Docker "welcome-to-docker".

## Table des matières

1. [Installation et Configuration](#installation-et-configuration)
2. [Exécution du conteneur](#exécution-du-conteneur)
3. [Exploration de l'interface](#exploration-de-linterface)

## Installation et Configuration

*Documentation en cours...*

## Exécution du conteneur

La commande suivante permet de démarrer le conteneur :

```bash
docker run -d -p 8088:80 --name welcome-to-docker docker/welcome-to-docker
```

- `-d` : Mode détaché (background)
- `-p 8088:80` : Redirection du port 80 du conteneur vers le port 8088 de l'hôte
- `--name welcome-to-docker` : Nom attribué au conteneur
- `docker/welcome-to-docker` : Image utilisée

## Exploration de l'interface

*Documentation en cours...* 