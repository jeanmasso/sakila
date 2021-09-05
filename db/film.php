<?php
  include_once 'autoloader.php';
  autoloader::register();

  class film extends database {

    public function getFilms() {

      /*$sql = "SELECT film.film_id, film.title, film.rental_duration, film.rental_rate,
                     film.length, film.rating, category.name as category
              FROM film
              INNER JOIN film_category ON film.film_id = film_category.film_id
              INNER JOIN category ON film_category.category_id = category.category_id 
              ORDER BY film.film_id ASC";*/
      $sql = "SELECT film_id, title FROM film";
      $query = $this->connect()->query($sql);
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