<?php


include_once './../app/Models/Utilisateur.php';
include './../app/Models/Cours.php';
include './../app/Models/Role.php';
include './../app/Models/Etiquette.php';
include './../app/Models/Categorie.php';
include './../app/Models/Tag.php';
include './../app/Models/Administrateur.php';
include './../app/Models/Enseignant.php';
include './../app/Models/Etudiant.php';
include_once './../app/Controllers/UserController.php';
include './../app/Controllers/RoleController.php';
include './../app/Controllers/CategorieController.php';
include './../app/Controllers/TagController.php';
include './../app/Controllers/CourController.php';
include './../app/Services/RoleService.php';
include './../app/Services/UserService.php';
include './../app/Services/CategorieService.php';
include './../app/Services/TagService.php';
include './../app/Services/CourService.php';
include './../app/Repositories/Implementations/UserRepositiry.php';
include './../app/Repositories/Implementations/RoleRepository.php';
include './../app/Repositories/Repository.php';
include './../app/DAOs/UserDao.php';
include './../app/DAOs/RoleDao.php';
include './../app/DAOs/DAOs.php';


// require_once './Visiteur.php';
// include './AdminCour.php';

require_once './../app/http/config.php';

include './../utils/utils.php';
// include './Register.php';
// include './LogIn.php';

// include './indesx.php';

include './../app/Controllers/AuthController.php';
include './../app/http/LoginInForm.php';
include './../app/http/RgisterForm.php';
include './../app/Services/AuthService.php';
// include './../utils/Test.php';
$route = $_SERVER['REQUEST_URI'];


// Session start
// session_start();
// require_once './../utils/utils.php';
// // Redirect to profile page if user is already logged in
// if (Utils::isLoggedIn()) {
//   Utils::redirect('profile.php');
// }


// echo $route;
// $page = $_GET['action'];

switch ($route) {

    case '/createUser';
        $createUser = new UserController();

        // die($_POST["first_name"]);

        $cours = [];

        array_push($cours, $_POST["cour"]);


        $createUser->createUtilisateur($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["phone"], $_POST["photo"], $cours, $_POST["role"]);


        header("location: /users");
        break;
    case '/deleteUser';
        $deleteUser = new UserController();

        $deleteUser->delete($_POST["first_name"]);


        header("location: /users");
        break;

    case '/updateUser':

        $updateUser = new UserController();

        // $updateUser->update();

        break;

    case '/users':

        require_once "./indesx.php";


        //   header("location: /indesx");

        break;
    case '/VisiteurCours':

        require_once "./VisiteurCours.php";


        //   header("location: /indesx");

        break;

    case '/deleteCour';
        $deleteCour = new CourController();

        $deleteCour->delete($_POST["first_name"]);


        header("location: /AdminCour");
        break;



    case '/AdminCour':
        require_once './AdminCour.php';
        break;

    case '/createCour':
        $createCour = new CourController();

        $createCour->createCour($_POST["titre"], $_POST["description"], $_POST["contenu"], $_POST["categorie"], $_POST["created_at"]);

        header("location: /AdminCour");
        break;
    case '/LogInPage':
        require_once './LogIn.php';
        break;
    case '/Register':

        $register = new AuthController();

        $register->register($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["confirm_password"], $_POST["phone"], $_POST["photo"]);

        // $updateUser->update();
        header("location: /users");
        break;
    case '/login':

        $login = new AuthController();

        $login->login($_POST["email"], $_POST["password"]);

        // $updateUser->update();
        header("location: /users");
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
