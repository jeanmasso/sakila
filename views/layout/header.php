<?php
  session_start();
  require '../db/autoloader.php';
  autoloader::register();

  $user = new login();

  if (!$user->is_logged())
    $user->redirect("../index.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sakila</title>
  <link rel="stylesheet" href="../ressources/styles/index.css"/>
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css"/>
</head>

<body>

  <!-- HEADER - Entête de la page -->
  <header>
    <?php include 'navbar.php'; ?>
  </header>
  <!-- END HEADER -->