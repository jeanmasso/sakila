<?php
  include_once 'autoloader.php';
  autoloader::register();

  class film extends database {

    public function __construct() {
      $this->table = "film";
    }

    public function getFilms() {
      $query = $this->connect()->query("SELECT * FROM {$this->table}");
      $query->execute();
      return $query->fetchAll();
    }

    public function searchFilm($request) {
      $query = $this->connect()->prepare("SELECT film_id, title FROM film WHERE title LIKE :request");
      $query->bindParam(':request', $request, PDO::PARAM_STR);
      $query->execute();
      return $query->fetchAll();

//      $query = $this->connect()->query("SELECT * FROM {$this->table} WHERE film_id = {$id}");
//      $query->execute();
//      return $query->fetch();
    }

  }