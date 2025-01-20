<?php


class RoleController
{
    private RoleService $roleService;
    private Role $role;
    private Role $seconrRole;
    private UserController $userController;


    public function __construct()
    {
        $this->role = new Role();
        $this->seconrRole = new Role();
        $this->roleService = new RoleService();
    }


    public function createRole($rolename)
    {



        $this->role->BuildRole($rolename);



        try {
            $role = $this->roleService->createRole($this->role);
            // die($role);
            return $role;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function deleteRole($rolename){

        $this->role->BuildRole($rolename);

        try {
            $user = $this->roleService->deleteRole($this->role);
            return $user;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function updateRole($rolename, $object){
        $this->role->BuildRole($rolename);
        $this->seconrRole->BuildRole($object);

        // var_dump($this->role);
        // var_dump($this->seconrRole);


        try {
            $role = $this->roleService->updateRole($this->role, $this->seconrRole);
            return $role;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }

    }

    public function getAll(){
        try {
           $result = $this->roleService->getAll();
        //    var_dump($result);
            return $result;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function getById($rolename){
        $this->role->BuildRole($rolename);

        try {
            $result = $this->roleService->getById($this->role);
            // var_dump($result);
            // die($result);
            
            $id = $result[0]->getId();
            $name = $result[0]->getRoleName();
            $description = $result[0]->getDescription();


            $this->seconrRole->BuildRole($id, $name, $description);
            
            return $this->seconrRole;

            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }

    }

}
