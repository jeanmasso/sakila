<?php

include "database.php";

class Login extends Database {

  public function login() {
    try {
      $login = trim($_POST["user"]);
      $password = trim($_POST["password"]);

      $query = $this->query("SELECT * FROM staff WHERE email = '{$login}'");
      $user = $query->fetch();

      if ($login == $user["email"] && $password == $user["password"]) {
        $_SESSION["user"] = true;
        return true;
      }
    } catch (PDOException $e) {
      echo "Exception reçue : ",  $e->getMessage(), "\n";
    }
  }

  public function is_logged() {
    if (isset($_SESSION["user"]))
      return true;
  }

  public function logout() {
    try {
      session_destroy();
      unset($_SESSION["user"]);
      return true;
    } catch (PDOException $e) {
      echo "Exception reçue : ",  $e->getMessage(), "\n";
    }
  }
}