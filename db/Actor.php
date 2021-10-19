<?php
  include_once 'Autoloader.php';
  Autoloader::register();

  class Actor extends Database {

    public function getActors() {
      $sql = "SELECT * FROM actor
              ORDER BY first_name ASC";
      $query = $this->connect()->query($sql);
      $query->execute();
      return $query->fetchAll();
    }

  }