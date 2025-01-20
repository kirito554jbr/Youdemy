<?php
// include './Role.php';


class Utilisateur
{
    private int $id = 0;
    private string $first_name;
    private string $last_name;
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

        if(count($arguments) == 1){
            $this->first_name = $arguments[0];
        }

       
        if (count($arguments) == 3){
            $this->first_name = $arguments[0];
            $this->last_name = $arguments[1];
            $this->photo = $arguments[2];
        }

        if (count($arguments) == 2){
            $this->email = $arguments[0];
            $this->password = $arguments[1];
        }
        if (count($arguments) == 7){
            $this->id = $arguments[0];
            $this->first_name = $arguments[1];
            $this->last_name = $arguments[2];
            $this->email = $arguments[3];
            $this->password = $arguments[4];
            $this->phone = $arguments[5];
            $this->photo = $arguments[6];

           
        }

        if (count($arguments) == 8){
            $this->first_name = $arguments[0];
            $this->last_name = $arguments[1];
            $this->email = $arguments[2];
            $this->password = $arguments[3];
            $this->phone = $arguments[4];
            $this->photo = $arguments[5];
            $this->role = $arguments[6];
            $this->cour = $arguments[7];

           
        }
        if (count($arguments) == 9){
            $this->first_name = $arguments[0];
            $this->last_name = $arguments[1];
            $this->email = $arguments[2];
            $this->password = $arguments[3];
            $this->phone = $arguments[4];
            $this->photo = $arguments[5];
            $this->role = $arguments[6];
            $this->cour = $arguments[7];
            $this->role_id = $arguments[8];
            
            
           
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

    public function setFirstname(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function setLastname(string $last_name): void
    {
        $this->last_name = $last_name;
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

    

    public function setRoleId ($role_id){
        $this->role_id = $role_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->first_name;
    }

    public function getLastname(): string
    {
        return $this->last_name;
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

    

    public function getPhoto(): string
    {
        return $this->photo;
    }

    
    public function getRoleId (){
        $this->role_id;
    }

    // public function setRoleId($id)

    public function toStringWithfirst_nameAndlast_name()
    {
        $id = $this->id ?? 0;
        $first_name = $this->first_name ?? "";
        $last_name = $this->last_name ?? "";
        return "(Utilisateur) => id : " . $id . " , first_name : " . $first_name . " , last_name : " . $last_name;
    }


    public function __toString()
    {
        $phone = $this->phone ?? 0;
        $email = $this->email ?? 0;
        $password = $this->password ?? 0;
        $photo = $this->photo ?? 0;
        $role = $this->role ?? 0;
        $role_id = $this->role_id ?? 0;

        return $this->toStringWithfirst_nameAndlast_name() .
            " , phone : " . $phone . " , email : " . $email  . " , password : " . $password . " photo : " . $photo . " , Role : " . $role . " , cour : [" . implode(",", $this->cour) . "] , Role_ID : " . $role_id . "";
    }
}
