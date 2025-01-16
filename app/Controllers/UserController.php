<?php


class UserController
{

    private Utilisateur $user;
    // private RoleService $roleService;
    private RoleController $roleController;
    private UserService $userService;

    public function __construct()
    {
        $this->user = new Utilisateur();
        // $this->roleService = new RoleService();
        $this->userService = new UserService();
        $this->roleController = new RoleController();
    }

    public function createUtilisateur()
    {
        $firstname = "aymen";
        $lastname = "jebrane";
        $phone = "0669365193";
        $photo = "Logo.png";
        $email = "aymenjaymen@example.com";
        $password = "1212";
        $rolename = "etudiant";
        // echo "test";
        // die;
        // $this->roleController->
        //add an if
        
        $role =  $this->roleController->createRole($rolename);

        $this->user->BuildUser(
            $firstname,
            $lastname,
            $email,
            $password,
            $phone,
            $photo,
            $role,
            []
        );

       

        try {
            $user = $this->userService->create($this->user);
            return $user;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function delete(int $id){
        try {
            $user = $this->userService->delete($id);
            return $user;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function update(Utilisateur $user){
        try {
            $user = $this->userService->update($user);
            return $user;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function findAll(){
        try {
            $users = $this->userService->findAll();
            
            //  var_dump($users);
            return $users;

        }catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function findById(Utilisateur $user){
        try {
            $users = $this->userService->findById($user);
            return $users;

        }catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }
    


    // public function toStringWithFirstnameAndLastname()
    // {
    //     $id = $this->id ?? 0;
    //     $firstname = $this->firstname ?? "";
    //     $lastname = $this->lastname ?? "";
    //     return "(Utilisateur) => id : " . $id . " , firstname : " . $firstname . " , lastname : " . $lastname;
    // }


    // public function __toString()
    // {
    //     $phone = $this->phone ?? 0;
    //     $email = $this->email ?? 0;
    //     $password = $this->password ?? 0;
    //     $photo = $this->photo ?? 0;
    //     $role = $this->role ?? 0;
    //     $role_id = $this->role_id ?? 0;

    //     return $this->toStringWithFirstnameAndLastname() .
    //         " , phone : " . $phone . " , email : " . $email  . " , password : " . $password . " photo : " . $photo . " , Role : " . $role . " , cour : [" . implode(",", $this->cour) . "] , Role_ID : " . $role_id . "";
    // }

}
