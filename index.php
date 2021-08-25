<?php
  session_start();
  require 'database/autoloader.php';
  autoloader::register();

  $user = new login();

  if ($user->is_logged())
    $user->redirect("views/home.php");

  if (!$user->is_logged() && isset($_POST["login"])) {
    $login = trim($_POST["user"]);
    $password = trim($_POST["password"]);
    if ($user->login($login, $password))
      $user->redirect("views/home.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sakila</title>
  <link rel="stylesheet" href="ressources/styles/index.css"/>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css"/>
</head>

<body>

  <!-- HEADER - Entête de la page -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Sakila</a>
      </div>
    </nav>
  </header>
  <!-- END HEADER -->

  <!-- PAGE CONTENT - Contenu de la page -->
  <div class="container">

    <div class="title mt-4">
      <h1 class="text-center">Sakila</h1>
    </div>

    <div class="container-form m-auto border rounded py-4 px-3" style="width: 35%;">
      <div class="form-title text-center px-4 pb-3">
        <h5>Connexion à votre outil de gestion de location de DVD</h5>
      </div>
      <form class="row g-4 justify-content-center" method="POST">
        <div class="col-9">
          <label for="user" class="form-label">Nom d'utilisateur ou email</label>
          <input type="text" class="form-control" id="user" name="user" placeholder="Nom d'utilisateur ou email" required>
        </div>
        <div class="col-9">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" >
        </div>
        <div class="col-9 text-center">
          <button class="btn btn-primary" type="submit" name="login">Se connecter</button>
        </div>
        <div class="col-9 text-center">
          <a href="#">Mot de passe oublié ?</a>
        </div>
      </form>
    </div>

  </div>
  <!-- END PAGE CONTENT -->

  <!-- FOOTER - Bas de la page -->
  <footer>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Politique de confidentialité</a>
        </li>
        <li class="nav-item m-auto"><span class="navbar-text">-</span></li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Mentions légales</a>
        </li>
      </ul>
    </nav>
  </footer>
  <!-- END FOOTER -->

  <script rel="script" src="node_modules/jquery/dist/jquery.js"></script>
  <script rel="script" src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script rel="script" src="ressources/scripts/index.js"></script>
</body>
</html>