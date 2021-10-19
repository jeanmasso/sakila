<?php
  include_once 'Autoloader.php';
  Autoloader::register();

  class Film extends Database {

    public function getFilms() {
      $sql = "SELECT film.film_id, film.title, film.rental_duration, film.rental_rate,
                     film.length, film.rating, category.name as category
              FROM film
              INNER JOIN film_category ON film.film_id = film_category.film_id
              INNER JOIN category ON film_category.category_id = category.category_id 
              ORDER BY film.film_id ASC";
      $query = $this->connect()->query($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function getFilm($id) {
      $sql = "SELECT film.*, category.name as category
              FROM film
              INNER JOIN film_category ON film.film_id = film_category.film_id
              INNER JOIN category ON film_category.category_id = category.category_id 
              WHERE film.film_id = :id;";
      $query = $this->connect()->prepare($sql);
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
      return $query->fetchAll();;
    }

    public function getActorsFilm($filmId) {
      $sql = "SELECT actor.*, film.film_id
              FROM actor
              INNER JOIN film_actor ON film_actor.actor_id = actor.actor_id
              INNER JOIN film ON film.film_id = film_actor.film_id 
              WHERE film.film_id = :id;";
      $query = $this->connect()->prepare($sql);
      $query->bindParam(':id', $filmId, PDO::PARAM_INT);
      $query->execute();
      return $query->fetchAll();
    }

    public function searchFilm($request) {
      $sql = "SELECT film_id, title FROM film WHERE title LIKE :request";
      $query = $this->connect()->prepare($sql);
      $query->bindParam(':request', $request, PDO::PARAM_STR);
      $query->execute();
      return $query->fetchAll();
    }

  }