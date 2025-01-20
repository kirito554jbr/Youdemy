<?php
// include("./../app/Repositories/Respositorie.php");
class RoleService
{
    // public roleRepository $roleRespository;
    public Repository $Repository;
    private Role $role;

    public function __construct()
    {
        $this->role = new Role();
        // $this->roleRespository = new RoleRepository();
        $this->Repository = new Repository();
    }


    //    public function getRoleByName(string $name){

    //         if (empty($name)) {
    //             return false;
    //         }
    //         $role = $this->roleRespository->findByName($name);
    //     }

    public function createRole(Role $role)
    {
        $tablename = 'roles';

        if (empty($role->getDescription()) || $role->getDescription() == null) {
            $role->setDescription("default Description");
        }

        $params = [
            'role_name' => $role->getRoleName(),
            'role_description' => $role->getDescription()
        ];
        $this->Repository->create($tablename, $params);
    }


    public function deleteRole(Role $role)
    {
        $tablename = 'roles';
        $RoleName = $role->getRoleName();
        $this->Repository->getbyname($tablename, $RoleName);
        
        $id = $this->Repository->getbyname($tablename, $RoleName)->getId();
        $this->Repository->delete($tablename, $id);
    }


    public function updateRole(Role $role , Role $second)
    {
        $tablename = 'roles';
        if (empty($role->getDescription()) || $role->getDescription() == null) {
            $role->setDescription("default Description");
        }

        $params = [
            'role_name' => $second->getRoleName(),
            'role_description' => $second->getDescription()
        ];
        $RoleName = $role->getRoleName();
        // die($RoleName);
        $this->Repository->getbyname($tablename, $RoleName);
        $id = $this->Repository->getbyname($tablename, $RoleName)->getId();
        
        $this->Repository->update($tablename, $id, $params);
    }

    public function getAll(){
        $tablename = 'roles';
        $result = $this->Repository->getAll($tablename);
        // var_dump($result);

        return $result;

    }

    public function getById(Role $role){
        $tablename = 'roles';
        $RoleName = $role->getRoleName();
        $this->Repository->getbynameById($tablename, $RoleName);
        
        // $id = $this->Repository->getbyname($tablename, $RoleName)->getId();

    //    $result = $this->Repository->getById($tablename, $id);
        $result = $this->Repository->getbynameById($tablename, $RoleName);
       return $result;
    }
}
