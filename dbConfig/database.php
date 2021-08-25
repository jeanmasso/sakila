<?php

class database {
  protected $table;

  private $servername = 'localhost:3306';
  private $database = 'sakila';
  private $username = 'root';
  private $password = 'password';

  public function connect() {
    $connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
  }

  public function query($sql) {
    return $this->connect()->prepare($sql);
  }

  public function redirect($url) {
    header('Location: '.$url);
  }
}