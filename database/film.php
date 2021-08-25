<?php

  include "../database.php";

  class film extends database {

    public function __construct() {
      $this->table = "film";
    }

    public function getFilms() {
      $query = $this->connect()->query("SELECT * FROM {$this->table}");
      $query->execute();
      return $query->fetchAll();
    }

    public function getFilm($id) {
      $query = $this->connect()->query("SELECT * FROM {$this->table} WHERE film_id = {$id}");
      $query->execute();
      return $query->fetch();
    }

  }