<?php


class RoleController
{
    private RoleService $roleService;
    private Role $role;
    private UserController $userController;


    public function __construct()
    {
        $this->role = new Role();
        $this->roleService = new RoleService();
    }


    public function createRole($rolename)
    {



        $this->role->BuildRole($rolename);



        try {
            $role = $this->roleService->create($this->role);
            return $role;
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }

    public function deleteRole($id){
        try {
            $user = $this->roleService->delete($id);
            return $user;
            
        } catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }
    }
}
