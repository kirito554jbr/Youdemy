<?php


class UserController
{

    private Utilisateur $user;
    private Utilisateur $seconduser;
    // private RoleService $roleService;
    private RoleController $roleController;
    private UserService $userService;

    public function __construct()
    {
        $this->user = new Utilisateur();
        $this->seconduser = new Utilisateur();
        // $this->roleService = new RoleService();
        $this->userService = new UserService();
        $this->roleController = new RoleController();
    }

    public function createUtilisateur($firstname, $lastname, $email, $password, $phone, $photo, array $cour, $rolename)
    {

        $role = $this->roleController->getById($rolename);

        $this->user->BuildUser(
            $firstname,
            $lastname,
            $email,
            $password,
            $phone,
            $photo,
            $role,
            $cour
        );



        try {
            $user = $this->userService->create($this->user);
            return $user;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function delete($username)
    {
        $this->user->BuildUser($username);

        try {
            $user = $this->userService->delete($this->user);
            return $user;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function update($username, $firstname, $lastname, $email, $password, $phone, $photo, array $cour)
    {
        $this->user->BuildUser($username);

        // $role = $this->roleController->getById($rolename);

        $this->seconduser->BuildUser(
            $firstname,
            $lastname,
            $email,
            $password,
            $phone,
            $photo,
            $cour
        );

        try {
            $user = $this->userService->update($this->user, $this->seconduser);
            return $user;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $users = $this->userService->getAll();

            $ids = [];

            foreach($users as $key => $user){

                array_push($ids, $user['role_id']); 
            }
            // var_dump($ids);
            $role = [];
            
            foreach($ids as $value){
                // echo $value;

                array_push($role, $this->roleController->getById($value));

                // $role = $this->roleController->getById($value);
            }

            $user_final = [];
            // var_dump($role);
            // // die();

            // var_dump($users);
            // die($users);

            //  var_dump($users);

            return $users;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getByName($username)
    {
        $this->user->BuildUser($username);

        try {
            $result = $this->userService->getById($this->user);
            return $result;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }
}
