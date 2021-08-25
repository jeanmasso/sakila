<?php
  require "layout/header.php";

  $query = new film();
  $films = $query->getFilms();
?>

<!-- PAGE CONTENT - Contenu de la page -->
<div class="container">

  <div class="title mt-5 mb-4">
    <h1 class="text-center">Liste de tous les films</h1>
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