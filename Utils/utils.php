<?php
// Fonctions utiles pour le programme

/**
 * Tri d'un tableau de manière descendante
 * @param array $array Tableau à trier
 * @return array Tableau trie
 */
function sortDesc($array) {
    rsort($array);
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
  $csvData = array_map(function($line) {
      return explode($delimiter, $line);
  }, file($filename, FILE_IGNORE_NEW_LINES));

  // Créer un tableau associatif pour chaque ligne
  $csvToArray = array_map(function($row) {
      return [
          'username' => $row[0],
          'ca' => floatval($row[1]),
      ];
  }, $csvData);

  return $csvToArray;
}