<?php

class UserModel {
  public function getAllUserData() {
    $db = Database::getInstance()->getConnection();
    $result = $db->query('SELECT * FROM users');
    $data = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
      $data[] = $row;
    }
    return $data;
  }
}
