<?php

include "database.php";

class Film extends Database {

  public function getFilms() {
    try {
      $result = $this->query("SELECT * FROM film");
      $result = $result->fetch();
      die(var_dump($result));
      return $result;
    } catch (PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }

  /*public function getFilm() {
    try {
      $result = $this->query("SELECT * FROM film WHERE film_id = 1");
      return $result->fetch();
    } catch (PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }*/

}