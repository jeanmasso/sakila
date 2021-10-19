<?php
include_once '../../db/Autoloader.php';
Autoloader::register();

header("Content-Type: application/json");
$rentals = new Rental();
$rentals = $rentals->getRentals();
return json_encode($rentals, JSON_PRETTY_PRINT);