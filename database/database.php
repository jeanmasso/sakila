<?php

class Database {
  private $servername = 'localhost:3306';
  private $database = 'sakila';
  private $username = 'root';
  private $password = 'password';

  public function connect() {
    try {
      $connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
      $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connection;
    } catch (PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }

  public function query($sql) {
    try {
      $query = $this->connect()->prepare($sql);
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query;
    } catch(PDOException $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
  }

  public function redirect($url) {
    header('Location: '.$url);
  }
}