<?php



class UserService
{

    public Repository $Repository;
    private RoleController $roleController;


    public function __construct()
    {

        $this->Repository = new Repository();
        $this->roleController = new RoleController();
    }

    public function create(Utilisateur $user)
    {
        if ($user->getId() != 0) {
            throw new Exception("invalide value (id)");
        }

        if (empty($user->getFirstname())) {
            throw new Exception("Firstname is empty");
        }

        if (empty($user->getLastname())) {
            throw new Exception("lastname is empty");
        }

        if (empty($user->getEmail())) {
            throw new Exception("email is empty");
        }

        if (empty($user->getPhone())) {
            throw new Exception("phone is empty");
        }

        if (empty($user->getPhoto())) {
            throw new Exception("Photo is empty");
        }

        // var_dump($user);
        // die();



        // $user->setRoleId($user->getRole()->getId());

        $tablename = 'Utilisateur';

        $params = [
            'first_name' => $user->getFirstname(),
            'last_name' => $user->getLastname(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'phone' => $user->getPhone(),
            'photo' => $user->getPhoto(),
            'role_id' => $user->getRole()->getId(),
        ];

        // var_dump($params);
        // die();




        $this->Repository->create($tablename, $params);
    }


    public function delete(Utilisateur $user)
    {

        $tablename = "Utilisateur";
        $userName = $user->getFirstname();
        // die($userName);
        $this->Repository->getUser($tablename, $userName);
        // var_dump($this->Repository->getUser($tablename, $userName));
        // die();

        $id = $this->Repository->getUser($tablename, $userName)->getId();
        $this->Repository->delete($tablename, $id);
    }

    public function update(Utilisateur $user, Utilisateur $second)
    {
        $tablename = "Utilisateur";

        // die($second);

        $params = [
            'first_name' => $second->getFirstname(),
            'last_name' => $second->getLastname(),
            'email' => $second->getEmail(),
            'phone' => $second->getPassword(),
            'password' => $second->getPhone(),
            'photo' => $second->getPhoto(),
            // 'role_id' => $second->getRole()->getId(),
        ];

        // var_dump($params);
        // die($params);

        $userName = $user->getFirstname();
        // die($userName);

        $this->Repository->getUser($tablename, $userName);
        // var_dump($this->Repository->getUser($tablename, $userName));
        // die();
        $id = $this->Repository->getUser($tablename, $userName)->getId();
        // var_dump($id);
        // die($id);
        // die($id);

        // die($this->userRepository->update($user));

        $this->Repository->update($tablename, $id, $params);
    }

    public function getAll()
    {

        // $params = ["first_name", "last_name", "email", "password", "phone", "photo"];
        $tablename = "Utilisateur";


        $result = $this->Repository->getAll($tablename);
        // var_dump($result);
        // die();

        // $result->setRole();

        // $values = [];
        // foreach($result as $key => $value){

        //     array_push($values, $value);
        //     $role = $this->roleController->getById($result[1]);


            
        // }

        // $result
        // var_dump($this->userRepository->findAll());

        // $tostring = implode(",", $this->userRepository->findAll());
        // var_dump($tostring);
        // var_dump($result);
        // die();

        return $result;
    }


    public function getById(Utilisateur $user)
    {

        $tablename = "Utilisateur";
        $userName = $user->getFirstname();
        $this->Repository->getUser($tablename, $userName);

        $id = $this->Repository->getUser($tablename, $userName)->getId();


        $result = $this->Repository->getById($tablename, $id);
        return $result;
    }

    // public function checkEmailifExist(string $email)
    // {
    //     $user = $this->userRepository->findByEmail($email);

    //     if ($user != null) {
    //         return true;
    //     }

    //     return false;
    // }




    public function findByEmailAndPassword(LoginForm $user)
    {
        // var_dump($user);
        // die();
        $email = $user->getEmail();
        $password = $user->getPassword();

        // die($password);

        $result = $this->Repository->findByEmailAndPassword($email, $password);

        //    var_dump($result);
        //    die();
        // $this->user->setRole($this->roleService->getRoleById($this->user->getRoleId()));
        // var_dump($this->user);
        // die();
        return $result;
    }



    // public function findByEmailAndPassword(Utilisateur $user): Utilisateur
    // {
    //     // Message::in("la méthode findByEmailAndPassword dans la classe UserService");
    //     // var_dump($user);
    //     $user = $this->userRepository->findByEmailAndPassword($user);

    //     // Message::in("L'utilisateur avec ces attr : ");
    //     // var_dump($user);
    //     if (!$user) {
    //         // Message::in("l'utilisateur est null");
    //         return new Utilisateur();
    //     }

    //     // Message::in("L'ajout du role a l'instance de la classe user");

    //     //TODO implémentation de cette fonction .......
    //     // --------------------------------------------
    //     $user->setRole(
    //         $this->roleService->getRoleById($user->getRole_ID())
    //     );

    //         // Message::in("L'utilisateur avec leur rôle ");
    //         // var_dump($user);
    //         return $user;
    //     }



    //     public function delete() {}

    //     public function findAll() {}

    //     public function findById() {}

    //     public function update() {}
}
