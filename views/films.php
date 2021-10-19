<?php require "layout/header.php"; ?>

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
      <button type="button" class="btn btn-success" onclick="searchFilms()">Rechercher</button>
    </div>
  </div>

  <div id="contentListFilms" class="row">
    <div class="mb-5">
      <table id="listFilms"></table>
    </div>
  </div>

</div>
<!-- END PAGE CONTENT -->

<?php require 'layout/footer.php'; ?>