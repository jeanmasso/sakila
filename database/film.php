<?php

include "database.php";

class Film extends Database {
  protected $table = 'film';

  public function getFilms() {
    try {
      $result = $this->query('SELECT * FROM ' . $this->table);
      return $result->fetch();
    } catch (PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }

  public function getFilm($id) {
    try {
      $result = $this->query('SELECT * FROM ' . $this->table . ' WHERE film_id = '.$id);
      return $result->fetch();
    } catch (PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }

}