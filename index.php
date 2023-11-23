<?php
include_once 'Controller/GeneralController.php';
importAndRank('Resources/data.csv');
$data = getAllUserData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Data</title>
</head>

<body>
    <h1>Ranking Data</h1>

    <?php
    // Obtenez les données de la base de données
    $db = Database::getInstance()->getConnection();
    

    // Affichage des données dans un tableau HTML
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Username</th><th>Chiffre d\'Affaires</th><th>Rank</th></tr>';
    foreach ($data as $entry) {
        echo "<tr><td>{$entry['id']}</td><td>{$entry['username']}</td><td>{$entry['ca']}</td><td>{$entry['rank']}</td></tr>";
    }
    echo '</table>';
    ?>
</body>

</html>