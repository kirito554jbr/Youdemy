<?php
// include './Role.php';


class Utilisateur
{
    private int $id = 0;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $phone;
    private string $photo;
    private Role $role;
    private $cour = [];
    private int $role_id;

    public function __construct()
    {
        $this->role = new Role();
    }




    public function __call($name, $arguments)
    {
        if ($name == "BuildUser"){

       
        if (count($arguments) == 3){
            $this->firstname = $arguments[0];
            $this->lastname = $arguments[1];
            $this->photo = $arguments[2];
        }

        if (count($arguments) == 2){
            $this->email = $arguments[0];
            $this->password = $arguments[1];
        }
        if (count($arguments) == 7){
            $this->firstname = $arguments[0];
            $this->lastname = $arguments[1];
            $this->email = $arguments[2];
            $this->password = $arguments[3];
            $this->phone = $arguments[4];
            $this->photo = $arguments[5];
            $this->cour = $arguments[6];

           
        }

        if (count($arguments) == 8){
            $this->firstname = $arguments[0];
            $this->lastname = $arguments[1];
            $this->email = $arguments[2];
            $this->password = $arguments[3];
            $this->phone = $arguments[4];
            $this->photo = $arguments[5];
            $this->role = $arguments[6];
            $this->cour = $arguments[7];

           
        }
        if (count($arguments) == 9){
            $this->id = $arguments[0];
            $this->firstname = $arguments[1];
            $this->lastname = $arguments[2];
            $this->email = $arguments[3];
            $this->password = $arguments[4];
            $this->phone = $arguments[5];
            $this->photo = $arguments[6];
            $this->role = $arguments[7];
            $this->cour = $arguments[8];
            
            
           
        }
        // foreach()
        // var_dump($arguments);
        // return $arguments;
    }
}




    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function setReservations(array $cour): void
    {
        $this->cour = $cour;
    }

    public function setRoleId ($role_id){
        $this->role_id = $role_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getReservations(): array
    {
        return $this->cour;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    // public function setRoleId($id)

    public function toStringWithFirstnameAndLastname()
    {
        $id = $this->id ?? 0;
        $firstname = $this->firstname ?? "";
        $lastname = $this->lastname ?? "";
        return "(Utilisateur) => id : " . $id . " , firstname : " . $firstname . " , lastname : " . $lastname;
    }


    public function __toString()
    {
        $phone = $this->phone ?? 0;
        $email = $this->email ?? 0;
        $password = $this->password ?? 0;
        $photo = $this->photo ?? 0;
        $role = $this->role ?? 0;
        $role_id = $this->role_id ?? 0;

        return $this->toStringWithFirstnameAndLastname() .
            " , phone : " . $phone . " , email : " . $email  . " , password : " . $password . " photo : " . $photo . " , Role : " . $role . " , cour : [" . implode(",", $this->cour) . "] , Role_ID : " . $role_id . "";
    }
}
