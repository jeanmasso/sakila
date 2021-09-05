<?php
  require "layout/header.php";

  $query = new film();
  $films = $query->getFilms();

  /*
  $ch = curl_init("www.example.com/curl.php?option=test");
  $ch = curl_init("http://localhost:8888/sakila/api/api.php?requete=academy");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_PUT, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  echo $output;
  */

?>

<!-- PAGE CONTENT - Contenu de la page -->
<div class="container">

  <div class="title mt-5 mb-4">
    <h1 class="text-center">Liste de tous les films</h1>
  </div>

  <div class="row mb-4 justify-content-center">
    <div class="col-9">
      <input type="text" id="test" class="form-control" placeholder="Rechercher un film..."/>
    </div>
    <div class="col-2">
      <button type="button" class="btn btn-success" onclick="searchFilm()">Rechercher</button>
    </div>
  </div>

  <div class="row g-3">
  <?php foreach ($films as $film): ?>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $film['title']; ?></h5>
          <p class="card-text"><?php echo $film['description']; ?></p>
          <a href="film.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

</div>
<!-- END PAGE CONTENT -->

<?php require 'layout/footer.php'; ?>