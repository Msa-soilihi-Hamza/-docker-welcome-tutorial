#!/bin/bash

echo "=== Statistiques du Tic Tac Toe ==="
echo

if [ -f "data/results.json" ]; then
    echo "Nombre total de parties : $(grep -o '"winner"' data/results.json | wc -l)"
    echo "Victoires X : $(grep -o '"winner":"X"' data/results.json | wc -l)"
    echo "Victoires O : $(grep -o '"winner":"O"' data/results.json | wc -l)"
    echo "Matchs nuls : $(grep -o '"winner":"draw"' data/results.json | wc -l)"
    echo
    echo "=== 5 dernières parties ==="
    tail -n 20 data/results.json | grep -A 1 "winner" | sed 's/\"winner\"://g' | sed 's/\"//g' | sed 's/,//g' | sed 's/{//g' | sed 's/}//g' | sed 's/date:/Le/g' | grep -v "^--$"
else
    echo "Aucun fichier de scores trouvé."
fi 