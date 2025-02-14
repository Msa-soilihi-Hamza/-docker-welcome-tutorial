<?php
$resultsFile = 'data/results.json';
$stats = [
    'total_games' => 0,
    'x_wins' => 0,
    'o_wins' => 0,
    'draws' => 0,
    'last_10_games' => [],
    'win_rate_x' => 0,
    'win_rate_o' => 0
];

if (file_exists($resultsFile)) {
    $results = json_decode(file_get_contents($resultsFile), true) ?? [];
    $stats['total_games'] = count($results);
    
    foreach ($results as $game) {
        if ($game['winner'] === 'X') {
            $stats['x_wins']++;
        } elseif ($game['winner'] === 'O') {
            $stats['o_wins']++;
        } elseif ($game['winner'] === 'draw') {
            $stats['draws']++;
        }
    }
    
    $stats['last_10_games'] = array_slice(array_reverse($results), 0, 10);
    
    // Calculer les pourcentages de victoire
    $stats['win_rate_x'] = $stats['total_games'] > 0 ? round(($stats['x_wins'] / $stats['total_games']) * 100, 1) : 0;
    $stats['win_rate_o'] = $stats['total_games'] > 0 ? round(($stats['o_wins'] / $stats['total_games']) * 100, 1) : 0;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Tic Tac Toe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .stats-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .stat-label {
            color: #666;
            margin-top: 5px;
        }
        .history-table {
            width: 100%;
            border-collapse: collapse;
        }
        .history-table th, .history-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .history-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        .progress-bar {
            height: 20px;
            background-color: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        .progress-fill {
            height: 100%;
            background-color: #007bff;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <a href="index.html" class="back-btn">Retour au jeu</a>
    
    <div class="stats-container">
        <h1>Statistiques des parties</h1>
        
        <div class="stats-grid">
            <div class="stat-box">
                <div class="stat-value"><?php echo $stats['total_games']; ?></div>
                <div class="stat-label">Parties jouées</div>
            </div>
            <div class="stat-box">
                <div class="stat-value"><?php echo $stats['x_wins']; ?></div>
                <div class="stat-label">Victoires X</div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $stats['win_rate_x']; ?>%"></div>
                </div>
                <div class="stat-label"><?php echo $stats['win_rate_x']; ?>% de victoires</div>
            </div>
            <div class="stat-box">
                <div class="stat-value"><?php echo $stats['o_wins']; ?></div>
                <div class="stat-label">Victoires O</div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $stats['win_rate_o']; ?>%"></div>
                </div>
                <div class="stat-label"><?php echo $stats['win_rate_o']; ?>% de victoires</div>
            </div>
            <div class="stat-box">
                <div class="stat-value"><?php echo $stats['draws']; ?></div>
                <div class="stat-label">Matchs nuls</div>
            </div>
        </div>
    </div>

    <div class="stats-container">
        <h2>Historique des 10 dernières parties</h2>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Résultat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats['last_10_games'] as $game): ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($game['date'])); ?></td>
                    <td>
                        <?php
                        if ($game['winner'] === 'draw') {
                            echo 'Match nul';
                        } else {
                            echo 'Victoire du joueur ' . $game['winner'];
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($stats['last_10_games'])): ?>
                <tr>
                    <td colspan="2" style="text-align: center;">Aucune partie jouée</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        // Rafraîchissement automatique toutes les 5 secondes
        setTimeout(function() {
            window.location.reload();
        }, 5000);
    </script>
</body>
</html> 