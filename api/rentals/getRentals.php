<?php
include_once '../../db/Autoloader.php';
Autoloader::register();

$returnData["data"] = [];

header("Content-Type: application/json");
$rentals = new Rental();
$rentals = $rentals->getRentals();

foreach ($rentals as $rental) {
  for ($i = 0; $i <= 7; $i++) {
    unset($rental[$i]);
  }
  $returnData["data"][] = $rental;
}
echo json_encode($returnData, JSON_PRETTY_PRINT);

return true;