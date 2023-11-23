<?php
include_once '../Resources/utils.php';
require_once '../Resources/db.php';

/**
 * Trier les données par chiffres d'affaire de manière decroissante
 * @param array $data Donnees
 * @return array Donnees triees
 */
function calculateRank($data)
{
  $dataSorted = sortDesc($data);
  $rank = 1;
  foreach ($dataSorted as $key => $value) {
    $data[$key]['ca'] = $rank;
    $rank++;
  }

  return $data;
}

/**
 * Importation des données d'un fichier csv et les classer par chiffres d'affaire puis les enregistrer dans la base de donnees
 * @param string $path Chemin du fichier csv
 * @return void
 */
function importAndRank($path)
{
  $data = readCsv($path);
  $rankedData = calculateRank($data);

  // Sauver=garde des données dans la BDD
  $db = Database::getInstance()->getConnection();

  // Suppression des données existantes dans la table
  $db->exec('DELETE FROM users WHERE 1=1');

  // Insértion des nouvelles données
  foreach ($rankedData as $entry) {
    $db->exec("INSERT INTO users (username, ca, rank) VALUES ('{$entry['username']}', {$entry['ca']}, {$entry['rank']})");
  }

  // Retourner les données au format JSON
  header('Content-Type: application/json');
  echo json_encode($rankedData);
}