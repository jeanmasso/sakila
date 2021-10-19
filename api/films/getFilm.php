<?php
  include_once '../../db/Autoloader.php';
  Autoloader::register();

  $id = $_GET['id'];

  if (!isset($id) || empty($id))
    return false;

  header("Content-Type: application/json");
  $film = new Film();

  $detailsFilm = $film->getFilm($id);
  foreach ($detailsFilm as $data) {
    for ($key = 0; $key <= 13; $key++) {
      unset($data[$key]);
    }
    $returnData["data"] = $data;
  }

  $actors = $film->getActorsFilm($id);
  foreach ($actors as $actor) {
    for ($i = 0; $i <= 4; $i++) {
      unset($actor[$i]);
    }
    $returnData["data"]["actors"][] = $actor["first_name"] . ' ' . $actor["last_name"];
  }

  echo json_encode($returnData, JSON_PRETTY_PRINT);
  return true;