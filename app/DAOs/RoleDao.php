<?php 
include './../app/Core/Database.php';

class RoleDao {
    public function create(Role $role): Role{
        
        if (empty($role->getDescription()) || $role->getDescription() == null) {
            $role->setDescription("default Description");
        }
        // die($role);
       

        $query = "INSERT INTO roles (role_name , role_description) VALUES ( '" . $role->getRoleName() . "', '" . $role->getDescription() . "');";

        // die($query);

        // die($query);

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $role->setId(Database::getInstance()
            ->getConnection()
            ->lastInsertId());
// die($role);


        return $role;
    }


    public function delete(int $id): bool {

        $query = "DELETE FROM roles WHERE id = '" . $id . "';" ;
// die($query);
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }
}
