

<?php 


class RoleService {
    private RoleRepository $roleRepository;
    private Role $role;
    

    public function __construct() {
        $this->roleRepository = new RoleRepository();
    }

    // public function getRoleByName(string $name) {
    
    //     if (empty($name)) {
    //         return false;
    //     }

    //     $role = $this->roleRepository->findByName($name);

    //     $role = $this->roleRepository->create($role);


    //     // $isTrue = false;
    //     // $isTrue = !$isTrue;

    //     // if ($role == null) {
    //     //     if ($isTrue) { 
    //     //         $newRole = new Role();
    //     //         $newRole->setRoleName($name);
    //     //         return $this->roleRepository->create($newRole);
    //     //     } else {
    //     //         throw new Exception("Role Not Found in database");
    //     //     }
    //     // }

    //     return $role;
    // }

    public function create($role) : Role{

        return $this->roleRepository->create($role);

    }

    public function delete(int $id){
        return $this->roleRepository->delete($id);
    }


    // public function getRoleById(int $id)
    // {
    //     if (empty($id)){
    //         return false;
    //     }

    //     $role = $this->roleRepository->getRoleById($id);

    //     return $role;

    // }
}