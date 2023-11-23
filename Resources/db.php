<?php

class Database
{
    private static $instance;
    private $db;
    private function __construct() {
        $this->db = new SQLite3('Resources/ranking.db');
        $this->initializeDatabase();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }

    private function initializeDatabase() {
        // Création de la table si elle n'existe pas déjà
        $sql = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, username TEXT, ca DOUBLE, rank INTEGER)";
        $this->db->exec($sql);
    }
}
