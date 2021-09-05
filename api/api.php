<?php
  include_once '../db/autoloader.php';
  autoloader::register();

  $result = "";
  if (isset($_GET["requete"])) {
    $result = "%".$_GET["requete"]."%";
  }

  if ($result == "")
    echo "[]";
  else {
    header("Content-Type: application/json");
    $films = new film();
    $films = $films->searchFilm($result);
    echo json_encode($films, JSON_PRETTY_PRINT);
  }