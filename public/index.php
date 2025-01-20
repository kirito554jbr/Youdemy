<?php 

$route = $_SERVER['REQUEST_URI'];

echo $route;
// $page = $_GET['action'];

switch ($route) {

    case '/users':

        require_once "./indesx.php";
  
          break;

    case '/users':

      require_once "./indesx.php";

      header();

        break;
       
    case 'Logout':
        echo "<div class='content'>
    <h2>Déconnexion</h2>
    <p>Vous avez été déconnecté.</p>
</div>";
        break;
    case 'dashboard':
    default:
        break;
}

?>