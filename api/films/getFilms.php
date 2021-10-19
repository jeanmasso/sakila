<?php
  include_once '../../db/Autoloader.php';
  Autoloader::register();

  $returnData["data"] = [];

  header("Content-Type: application/json");
  $films = new Film();
  $films = $films->getFilms();

  foreach ($films as $film) {
    for ($i = 0; $i <= 12; $i++) {
      unset($film[$i]);
    }
    $returnData["data"][] = $film;
  }
  echo json_encode($returnData, JSON_PRETTY_PRINT);

  return true;