<?php
include_once '../Utils/utils.php';
require_once '../Resources/db.php';
include_once '../Model/UserModel.php';

/**
 * Trier les données par chiffres d'affaire de manière decroissante
 * @param array $data Donnees
 * @return array Donnees triees
 */
function calculateRank($data) {
  $dataSorted = sortDesc($data, 'ca');
  $rank = 1;
  foreach ($dataSorted as $key => $value) {
    $dataSorted[$key]['rank'] = $rank;
    $rank++;
  }

  return $dataSorted;
}

/**
 * Importation des données d'un fichier csv et les classer par chiffres d'affaire puis les enregistrer dans la base de donnees
 * @param string $path Chemin du fichier csv
 * @return void
 */
function importAndRank($path) {
  $data = readCsv($path);
  $rankedData = calculateRank($data);

  // Sauver=garde des données dans la BDD
  $db = Database::getInstance()->getConnection();

  // Suppression des données existantes dans la table
  $db->exec('DELETE FROM users WHERE 1=1');

  // Insértion des nouvelles données
  foreach ($rankedData as $entry) {
    $query = "INSERT INTO users (username, ca, rank) VALUES ('{$entry['username']}', {$entry['ca']}, {$entry['rank']})";
    $result = $db->exec($query);

    if ($result === false) {
        die("Error executing query: $query\n");
    }
  }
}

/**
 * Obtenir les données de la base de données
 * @return array
 */
function getAllUserData() {
  $model = new UserModel();
  $data = $model->getAllUserData();

  return $data;
}