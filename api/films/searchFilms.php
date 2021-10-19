<?php

include_once '../../db/Autoloader.php';
Autoloader::register();

$request = json_encode($_GET, JSON_PRETTY_PRINT);
return var_dump($request);

if ($request == "")
  echo "[]";
else {
  header("Content-Type: application/json");
  $films = new Film();
  $films = $films->searchFilm($request);
  return json_encode($films, JSON_PRETTY_PRINT);
}