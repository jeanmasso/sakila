<?php

  include_once 'Autoloader.php';
  Autoloader::register();

  class Login extends Database {

    public function __construct() {
      $this->table = "staff";
    }

    public function Login($login, $password) {
      $query = $this->query("SELECT username, email, password FROM {$this->table} WHERE email = '{$login}' OR username = '{$login}'");
      $query->execute();
      $user = $query->fetch();

      if ((!empty($login) || !empty($password)) && ($login == $user["email"] || $login == $user["username"]) && $password == $user["password"]) {
        $_SESSION["staff"] = true;
        return true;
      }
    }

    public function is_logged() {
      if (isset($_SESSION["staff"]))
        return true;
    }

    public function logout() {
      unset($_SESSION["staff"]);
      session_destroy();
      return true;
    }
  }