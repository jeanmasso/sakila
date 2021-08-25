<?php

class autoloader {

  static function register() {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  static function autoload($className) {
    require $className.'.php';
  }

}