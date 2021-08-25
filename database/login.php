<?php

  include_once 'autoloader.php';
  autoloader::register();

  class login extends database {

    public function __construct() {
      $this->table = "staff";
    }

    public function login($login, $password) {
      $query = $this->query("SELECT username, email, password FROM {$this->table} WHERE email = '{$login}' OR username = '{$login}'");
      $query->execute();
      //$user = $query->setFetchMode(PDO::FETCH_ASSOC);
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