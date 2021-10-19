<?php
  include_once 'Autoloader.php';
  Autoloader::register();

  class Rental extends Database {

    public function getRentals() {
      $sql = "SELECT rental.rental_id, rental.rental_date, rental.return_date, 
                     staff.first_name as staff_firstname, staff.last_name as staff_lastname,
                     customer.first_name as customer_firstname, customer.last_name as customer_lastname, 
                     film.title as film_title
              FROM rental
              INNER JOIN inventory ON rental.inventory_id = inventory.inventory_id
              INNER JOIN film ON inventory.film_id = film.film_id
              INNER JOIN customer ON rental.customer_id = customer.customer_id 
              INNER JOIN staff ON rental.staff_id = staff.staff_id
              ORDER BY rental.rental_date ASC";
      $query = $this->connect()->query($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function searchRental($request) {
      $sql = "SELECT rental_id, title FROM rental WHERE title LIKE :request";
      $query = $this->connect()->prepare($sql);
      $query->bindParam(':request', $request, PDO::PARAM_STR);
      $query->execute();
      return $query->fetchAll();
    }

    public function addRental(array $recordData) {
      $sql = "INSERT INTO rental (rental_date, inventory_id, customer_id, return_date, staff_id) VALUES (:rental_date, :inventory_id, :customer_id, null, :staff_id);";
      $query = $this->connect()->prepare($sql);
      $query->bindParam(':rental_date', $recordData["rental_date"], PDO::PARAM_STR);
      $query->bindParam(':inventory_id', $recordData["inventory_id"], PDO::PARAM_INT);
      $query->bindParam(':customer_id', $recordData["customer_id"], PDO::PARAM_INT);
      $query->bindParam(':staff_id', $recordData["staff_id"], PDO::PARAM_INT);
      $query->execute();
      return $query->fetchAll();
    }

  }