<?php
// include('../../views/index.html');
class LoginForm
{
    public string $Email;
    public string $password;

    public function __construct() {}

    public function __call($name, $arguments)
    {
        if ($name = "instance") {

            if (count($arguments) == 2) {
                $this->Email = $arguments[0];
                $this->password = $arguments[1];
            }
        }
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->Email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
