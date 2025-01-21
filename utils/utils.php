<?php

class Utils {
  // method to sanitize data
  public static function sanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
  }
  // method to redirect to a page
  public static function redirect($page) {
    // $home_url = BASE_URL;
    header('location: /' . $page);
  }
  // method to set a flash message
  public static function setFlash($name, $message) {
    if (!empty($_SESSION[$name])) {
      unset($_SESSION[$name]);
    }
    $_SESSION[$name] = $message;
  }
  // method to display a flash message
  public static function displayFlash($name, $type) {
    if (isset($_SESSION[$name])) {
      echo '<div class="alert alert-' . $type . '">' . $_SESSION[$name] . '</div>';
      unset($_SESSION[$name]);
    }
  }
  // method to check if user is logged in
  public static function isLoggedIn() {
    if (isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }
  
}