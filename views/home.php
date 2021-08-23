<?php
  include 'layout/header.php';

  $logout = new Login();
  if (isset($_POST["logout"])) {
    if ($logout->logout())
      header("Location: ../index.php");
  }
?>

  <!-- PAGE CONTENT - Contenu de la page -->
  <div class="container">

    <div class="title mt-5 mb-4">
      <h1 class="text-center">Bienvenue sur votre outil de gestion de location de DVD</h1>
    </div>

    <form method="POST">
      <button class="btn btn-danger" type="submit" name="logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
    </form>

  </div>
  <!-- END PAGE CONTENT -->

<?php include 'layout/footer.php'; ?>

