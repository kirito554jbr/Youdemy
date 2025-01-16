<?php


class UserDao
{


    public function create(Utilisateur $user): Utilisateur
    {
        $query = "INSERT INTO Utilisateur (first_name, last_name, email, password, photo, phone, role_id ) VALUES ( '" . $user->getFirstname() . "' , '" . $user->getLastname() . "' , '" . $user->getEmail() . "' , '" . $user->getPassword() . "', '" . $user->getPhoto() . "' , '" . $user->getPhone() . "' ," . $user->getRole()->getId() .  ");";



        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        // var_dump($query);

        $user->setId(Database::getInstance()
            ->getConnection()
            ->lastInsertId());

        // var_dump($user);
        die($user);
        return $user;
    }

    public function findById(int $id): ?Utilisateur
    {
        $query = "SELECT * FROM Utilisateur WHERE id = '" . $id . "';";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $user = new Utilisateur();
        $user->setId($result['id']);
        $user->setFirstname($result['first_name']);
        $user->setLastname($result['last_name']);
        $user->setEmail($result['email']);
        $user->setPassword($result['password']);
        $user->setPhone($result['phone']);
        $user->setPhoto($result['photo']);

        // Get role separately
        $roleQuery = "SELECT * FROM roles WHERE id = '" . $result['role_id'] . "';";
        $roleStmt = Database::getInstance()->getConnection()->prepare($roleQuery);
        $roleStmt->execute();
        $roleResult = $roleStmt->fetch(PDO::FETCH_ASSOC);

        if ($roleResult) {
            $role = new Role();
            $role->setId($roleResult['id']);
            $role->setName($roleResult['role_name']);
            $user->setRole($role);
        }

        return $user;
    }



    public function findAll(): array
    {
        $query = "SELECT * FROM Utilisateur;";


        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $users = [];
        // die($users);

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new Utilisateur();
            $user->setId($result['id']);
            $user->setFirstname($result['first_name']);
            $user->setLastname($result['last_name']);
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
            $user->setPhone($result['phone']);
            $user->setPhoto($result['photo']);
            $user->setRoleId($result['role_id']);

            // Get role separately
            $roleQuery = "SELECT * FROM roles WHERE id = '" . $result['role_id'] . "';";
            // die($roleQuery);
            $roleStmt = Database::getInstance()->getConnection()->prepare($roleQuery);
            $roleStmt->execute();
            $roleResult = $roleStmt->fetch(PDO::FETCH_ASSOC);
            // var_dump($roleResult);

            if ($roleResult) {
                $role = new Role();
                $role->setId($roleResult['id']);
                $role->setRoleName($roleResult['role_name']);
                $user->setRole($role);
            }
            // die($role);
            // die($user);
            $users[] = $user;
        }

        // var_dump($users);


        // var_dump($user);


        return $users;
    }





    public function update(Utilisateur $user): Utilisateur
    {

        $query = "UPDATE Utilisateur SET first_name = '" . $user->getFirstname() . "', 
                                        last_name = '" . $user->getLastname() . "', 
                                        email = '" . $user->getEmail() . "', 
                                        password = '" . $user->getPassword() . "', 
                                        photo = '" . $user->getPhoto() . "', 
                                        phone = '" . $user->getPhone() . "' 
                 WHERE id = " . $user->getId() . ";";
        //  die($query);

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();


        return $user;
    }









    public function delete(int $id): bool
    {

        $query = "DELETE FROM Utilisateur WHERE id = '" . $id . "';";
        // die($query);
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }
}


// $userDao = new UserDao();

// // Find user by ID
// $user = $userDao->findById(1);

// // Get all users
// $allUsers = $userDao->findAll();

// // Update user
// $user->setEmail("newemail@example.com");
// $success = $userDao->update($user);

// // Delete user
// $success = $userDao->delete(1);

// // Find by email
// $user = $userDao->findByEmail("user@example.com");