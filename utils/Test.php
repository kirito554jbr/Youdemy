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
include './../app/Services/RoleService.php';
include './../app/Services/UserService.php';
include './../app/Repositories/Implementations/UserRepositiry.php';
include './../app/Repositories/Implementations/RoleRepository.php';
include './../app/DAOs/UserDao.php';
include './../app/DAOs/RoleDao.php';



class Test
{
    private Role $role;
    private Utilisateur $user;
    private UserController $controle;
    private RoleController $Rcontrole;

    public function __construct()
    {
        $this->controle = new UserController();
        $this->Rcontrole = new RoleController();
        $this->user = new Utilisateur();
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
            

            $this->role->BuildRole("Admin", "");
            $role = $this->role;
        
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



        // $this->controle->createUtilisateur();


        $this->controle->findAll();
        // var_dump($this->controle);
        // $this->controle->findById($this->user);

        
        // $this->controle->update($this->user);
        // var_dump($this->controle);
        // die($this->controle);


        $this->display($this->controle);


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
        $this->display($this->role);

        

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
