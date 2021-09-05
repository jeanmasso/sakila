<?php
  $user = new login();

  if (isset($_SESSION["staff"]) && isset($_POST["logout"])) {
    if ($user->logout())
      $user->redirect("../index.php");
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="home.php">Sakila</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if ($user->is_logged()): ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="films.php">Films</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
              <i class="fas fa-user-circle" style="font-size: 27px;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="profil.php">Profil</a>
              </li>
              <hr class="dropdown-divider">
              <li>
                <form method="POST">
                  <button class="dropdown-item" type="submit" name="logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</nav>