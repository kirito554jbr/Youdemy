<?php


class RoleRepository {
    private RoleDao $roleDao;

    public function __construct() {
        $this->roleDao = new RoleDao();
    }
    
    // public function findByName(string $name) {

    //     $query = "SELECT id, role_name, role_description, logo FROM roles WHERE role_name = '" . $name . "';";
    //     $stmt = Database::getInstance()->getConnection()->prepare($query);
    //     $stmt->execute();

    //     return $stmt->fetchObject(Role::class);
    // }

    public function create(Role $role) : Role {
        return $this->roleDao->create($role);
    }


    public function delete(int $id){
        return $this->roleDao->delete($id);
    }
    // public function getRoleById(int $id) {

    //     $query = "SELECT id, role_name, role_description, logo FROM roles WHERE id = '" . $id . "';";
    //     // die($query);
    //     $stmt = Database::getInstance()->getConnection()->prepare($query);
    //     die($stmt);
    //     $stmt->execute();

    //     return $stmt->fetchObject(Role::class);
    // }
}