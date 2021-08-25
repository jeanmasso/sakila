<?php
  include_once 'autoloader.php';
  autoloader::register();

  $request = "";
  if (isset($_GET["requete"])) {
    $request = "%".$_GET["requete"]."%";
  }

  if ($request == "")
    echo "[]";
  else {
    header("Content-Type: application/json");
    $films = new film();
    $films = $films->searchFilm($request);
    echo json_encode($films, JSON_PRETTY_PRINT);
  }