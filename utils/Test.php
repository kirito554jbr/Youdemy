<?php

include './../app/Models/Utilisateur.php';
include './../app/Models/Cours.php';
include './../app/Models/Role.php';
include './../app/Models/Etiquette.php';
include './../app/Models/Categorie.php';
include './../app/Models/Tag.php';
include './../app/Models/Administrateur.php';
include './../app/Models/Enseignant.php';
include './../app/Models/Etudiant.php';
include './../app/Controllers/UserController.php';
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

// include './../public/index.php';

include './../app/Controllers/AuthController.php';
include './../app/http/LoginInForm.php';
include './../app/http/RgisterForm.php';
include './../app/Services/AuthService.php';




class Test
{
    private Role $role;
    private Utilisateur $user;
    private UserController $controle;
    private RoleController $Rcontrole;
    private CategorieController $categorieController;
    private TagController $tagController;
    private CourController $courController;
    private AuthController $authController;

    public function __construct()
    {
        $this->controle = new UserController();
        $this->Rcontrole = new RoleController();
        $this->user = new Utilisateur();
        $this->categorieController = new CategorieController();
        $this->tagController = new TagController();
        $this->courController = new CourController;
        $this->authController = new AuthController;
        // Message::in("Test Contructor");
    }

    public function testRole()
    {
        // echo "Role Test : ";
        $this->role = new Role();



        // $user->setFirstname("aymen");
        // $user->setLastname("jebrane");
        // $user->setEmail("aymen5jbr2023@gmail.com");
        // $user->setPassword("1234556");
        // $user->setPhone(066899875);
        // $user->setPhoto("logo.png");

        // $update->setEmail("newemail@example.com");


        // $this->role->BuildRole("Admin", "");
        // $role = $this->role;

        // $role = $this->role->BuildRole("Admin", "");
        // die($role);
        // $user->setRole($role);

        //    $this->user->BuildUser(

        //         "aymen",
        //        "jebrane",
        //         "aymen5jbr2023@gmail.com",
        //         "123456",
        //         "0655504956",
        //         "Logo.png",
        //         $role,
        //         []);

        // $this->user->BuildUser(
        //     1,
        //     "anouar",
        //     "soror",
        //     "aymen5jbr2023@gmail.com",
        //     "123456",
        //     "0655504956",
        //     "Logo.png",
        //     $role,
        //     []);

        //    var_dump($this->user);






        // $this->controle->findAll();
        // var_dump($this->controle);
        // $this->controle->findById($this->user);


        // $this->controle->update($this->user);
        // var_dump($this->controle);
        // die($this->controle);


        // $this->display($this->controle);


        // $this->controle->delete(2);




        // $user = new Utilisateur();
        // $user->setId(1); 
        // $user->setFirstname("Updated Name");
        // $user->setLastname("Updated Lastname");
        // $user->setEmail("updated@example.com");
        // $user->setPassword("updatedpass");
        // $user->setPhone("0655504956");
        // $user->setPhoto("UpdatedLogo.png");


        // $role = new Role();
        // $role->BuildRole("Admin", "");
        // $user->setRole($role);










        // $this->controle->update();



        // echo $this->role->getRoleName();
        // var_dump($role);
        // die($role);


        // $this->role->BuildRole("Admin");
        // $this->role->BuildRole("Etudiant");
        // $this->role->BuildRole("Enseignant");
        // $this->role->BuildRole("Visiteur");



        // $role = $this->role;
        //-----------------------------------------------------------------------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------------------------------------------------
        // $this->Rcontrole->createRole("Admin");
        // $this->Rcontrole->createRole("Etudiant");
        // $this->Rcontrole->createRole("Enseignant");
        // $this->Rcontrole->createRole("Visiteur");


        // $this->Rcontrole->deleteRole("Admin");
        // $this->Rcontrole->updateRole("Admin","etudiant");
        // $this->Rcontrole->getAll();
        // $this->Rcontrole->getById("Admin");


        // var_dump($this->Rcontrole->getById("Admin"));
        // $this->categorieController->createCategorie("ActiveLerning");
        // $this->categorieController->createCategorie("Magistrale");

        // $this->categorieController->deleteCategorie("Action");
        // $this->categorieController->updateCategorie("Romance", "Action");
        // $this->categorieController->getAll();

        // $this->categorieController->getById("ActiveLerning");
        // $this->categorieController->getById("Magistrale");




        // var_dump($this->categorieController->getById("Action"));
        // var_dump($this->categorieController->getAll());



        // $this->tagController->createTag("Future");
        // $this->tagController->createTag("ia");

        // $this->tagController->deleteTag("chawlin");
        // $this->tagController->updateTag("this tag", "this tag");
        // $this->tagController->getAll();
        // $this->tagController->getById("sinin");
        // var_dump($this->tagController->getById("sinin"));


        // $this->controle->createUtilisateur("mouad", "najjar", "mouad@gmail.com", "12458", "0696857412", "url.photo", ["IT", "philo"], 'Visiteur');
        // $this->controle->createUtilisateur("aymen", "jebrane", "aymenjaymen@gmail.com", "78459", "0669365193", "url.photo", ["IT", "philo"], 'Admin');
        // $this->controle->createUtilisateur("mourad", "kadiri", "mourad.kadiri@gmail.com", "7855", "0658421586", "url.photo", ["IT", "philo"], 'Visiteur');


        // $this->controle->createUtilisateur("anouar", "soror", "soror.anoua@gmail.com", "0635248697", "51112", "anouar.png", ["IT", "AR", "EN"], "Enseignant");

        // $this->controle->delete("anouar");
        // $this->controle->update("mouad", "Mouad", "najjar", "mouad@gmail.com", "0696857412", "125489", "url.photo", ["IT", "philo"]);
        // $this->controle->getAll();
        // $this->controle->getByName("aymen");

        // var_dump($this->controle->getAll());
        // var_dump($this->controle->getByName("aymen"));


        // $this->courController->createCour("AR", "This is description", "This is contenu", ["Future" , "ia"], "ActiveLerning", "2025-01-14", "anouar", ["mourad"]);
        // $this->courController->delete("AR");
        // $this->courController->update("IT", "Technologie", "This is description", "This is contenu", ["Future" , "ia"], "ActiveLerning", "2025-01-14", "anouar");
        // $this->display($this->role);


        // $this->authController->register("hamza", "lk7al", "hamza.lk7al@gmail.com", "1245", "1245", "0632569874", "hamza.png");

        // $this->authController->login("abkrim.harag@gmail.com", "15427");




        // $this->Rcontrole->deleteRole(21);
        // $this->Rcontrole->deleteRole(23);
        // $this->Rcontrole->deleteRole(24);

        // $this->user->BuildUser("Reda" , "Firoud", "", "", "", "", $role, ["r1", "r2"]);
        // $user = $this->user;
        // $user->setRole($role);
        // $this->display($user);






    }

    public function display($obj)
    {
        // var_dump($obj);

        echo $obj;
        echo "<br />";
        echo "===================================================================================";
        echo "<br />";
    }
}
