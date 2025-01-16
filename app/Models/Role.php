<?php

class Role {
    private int $id = 0;
    private string $role_name;
    private string $role_description = "";
    

    public function __construct () {}

    
    public   function __call($name, $arguments)
    {
        if ($name == "BuildRole"){
            if(count($arguments) == 1){
                $this->role_name = $arguments[0];
            }
            if(count($arguments) == 2){
                
                $this->role_name = $arguments[0];
                $this->role_description = $arguments[1];
            }
        }

        // var_dump($arguments);
        // return $arguments;
    }


    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $role_name) : void {
        $this->role_name = $role_name;
    }

    public function setDescription(string $description) : void {
        $this->role_description = $description;
    }

    

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->role_name;
    }

    public function getDescription(): string {
        return $this->role_description;
    }

  

    public function __toString() {
        $id = $this->id ?? 0;
        $name = $this->role_name ?? "";
        $description = $this->role_description ?? "";

        return "(Role) => id : " . $id . " , name : " . $name . " , description : " . $description;
    }

    
}