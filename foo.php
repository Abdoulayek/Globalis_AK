<?php

function foo($intervals) {
    // Trier les intervalles
    usort($intervals, function($a, $b) {
        return $a[0] - $b[0];
    });
    
    $tab_merged = [];
    
    foreach ($intervals as $interval) {
        if (empty($tab_merged) || $interval[0] > $tab_merged[count($tab_merged) - 1][1]) {
            // Aucun chevauchement
            $tab_merged[] = $interval;
        } else {
            // Il y a un chevauchement, fusionner les intervalles
            $tab_merged[count($tab_merged) - 1][1] = max($tab_merged[count($tab_merged) - 1][1], $interval[1]);
        }
    }
    
    return $tab_merged;
}

// Appel de la fonction avec un jeu de test en entrée
$input_data = [[0, 3], [6, 10]];
$result = foo($input_data);

// Affichage du résultat en sortie
print_r($result);

?>