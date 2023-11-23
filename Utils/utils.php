<?php
// Fonctions utiles pour le programme

/**
 * Tri d'un tableau de manière descendante
 * @param array $array Tableau à trier
 * @param string $key Nom de la colonne
 * @return array Tableau trie
 */
function sortDesc($array, $key) {
    usort($array, function ($item1, $item2) use ($key) {
        return $item2[$key] <=> $item1[$key]; // on inverse pour avoir le tri descendant
    });
    return $array;
}

/**
 * Lire un fichier CSV et le renvoyer sous forme de tableau
 * @param string $filename Nom du fichier
 * @param string $delimiter Séparateur
 * @return array Tableau
 */
function readCSV($filename, $delimiter = ';') {
    // Vérification de l'existance du fichier
    if (!file_exists($filename)) {
        die("Le fichier CSV n'existe pas.");
    }

    // Transformer le fichier CSV en un tableau
    $csvData = array_map(function ($line) use ($delimiter) {
        return explode($delimiter, $line);
    }, file($filename, FILE_IGNORE_NEW_LINES));

    // Créer un tableau associatif pour chaque ligne
    $csvToArray = array_map(function ($row) {
        return [
            'username' => $row[0],
            'ca' => floatval($row[1]),
        ];
    }, $csvData);

    return $csvToArray;
}