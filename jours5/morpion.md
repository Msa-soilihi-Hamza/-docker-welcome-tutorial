# Projet Tic Tac Toe (Morpion) avec Docker

Ce projet est une implémentation d'un jeu de Tic Tac Toe (Morpion) avec une interface web, utilisant Docker pour le déploiement et la persistance des données.

## Table des matières
1. [Structure du projet](#structure-du-projet)
2. [Technologies utilisées](#technologies-utilisées)
3. [Installation et démarrage](#installation-et-démarrage)
4. [Fonctionnalités](#fonctionnalités)
5. [Gestion des scores](#gestion-des-scores)
6. [Commandes utiles](#commandes-utiles)

## Structure du projet

```
jours5/
├── Dockerfile           # Configuration Docker
├── index.html          # Interface du jeu
├── scores.php          # Page des statistiques
├── save.php           # API de sauvegarde des scores
├── check-scores.sh    # Script de vérification des scores
├── data/              # Dossier de persistance des données
│   └── results.json   # Fichier de stockage des scores
└── morpion.md         # Documentation (ce fichier)
```

## Technologies utilisées

- **Frontend** : HTML5, CSS3, JavaScript vanilla
- **Backend** : PHP 8.2, Apache
- **Conteneurisation** : Docker
- **Persistance** : Système de fichiers (JSON)
- **Serveur** : Apache avec mod_rewrite

## Installation et démarrage

1. **Construction de l'image Docker** :
```bash
docker build -t tic-tac-toe .
```

2. **Lancement du conteneur** :
```bash
docker run -d -p 8081:80 -v "$(pwd)/data":/var/www/html/data --name tic-tac-toe-game tic-tac-toe
```

3. **Accès au jeu** :
- Ouvrez votre navigateur
- Accédez à `http://localhost:8081`

## Fonctionnalités

### Interface de jeu
- Grille de jeu 3x3 interactive
- Alternance automatique entre les joueurs X et O
- Détection automatique des victoires
- Détection des matchs nuls
- Bouton de nouvelle partie
- Historique des parties en temps réel

### Page de statistiques
- Nombre total de parties jouées
- Statistiques de victoires pour X et O
- Pourcentage de victoires
- Historique des 10 dernières parties
- Mise à jour automatique des statistiques

### Système de sauvegarde
- Sauvegarde automatique après chaque partie
- Stockage persistant grâce aux volumes Docker
- Format JSON pour les données
- Permissions correctement configurées

## Gestion des scores

### Structure du fichier results.json
```json
[
  {
    "winner": "X",
    "date": "2024-02-13T14:30:00.000Z"
  },
  {
    "winner": "O",
    "date": "2024-02-13T14:35:00.000Z"
  }
]
```

### Vérification des scores via terminal
Utilisez le script `check-scores.sh` :
```bash
./check-scores.sh
```

Ce script affiche :
- Le nombre total de parties
- Les victoires par joueur
- Les matchs nuls
- Les 5 dernières parties

## Commandes utiles

### Docker
```bash
# Arrêter le conteneur
docker stop tic-tac-toe-game

# Redémarrer le conteneur
docker start tic-tac-toe-game

# Voir les logs
docker logs tic-tac-toe-game

# Reconstruire l'image
docker build --no-cache -t tic-tac-toe .
```

### Gestion des scores
```bash
# Voir les scores bruts
cat data/results.json

# Surveiller les scores en temps réel
watch -n 2 ./check-scores.sh
```

## Sécurité

- Les permissions des fichiers sont correctement configurées
- Le volume Docker assure la persistance des données
- Les en-têtes CORS sont configurés pour la sécurité
- Les données sont validées côté serveur

## Maintenance

Pour mettre à jour le jeu :
1. Modifiez les fichiers nécessaires
2. Reconstruisez l'image Docker
3. Redémarrez le conteneur

Les scores seront conservés grâce au volume Docker.
