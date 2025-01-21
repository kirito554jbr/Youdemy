<?php

class AuthService
{
    private UserService $userService;
    private Utilisateur $user;
    private RoleController $roleController;
    public function __construct()
    {
        $this->userService = new UserService();
        $this->user = new Utilisateur();
        $this->roleController = new RoleController();
    }




    public function register(RegisterForm $registerForm)
    {
        // var_dump($registerForm);
        // die();
        $this->validation($registerForm);

        $role = $this->roleController->getName("Utilisateur");
        // var_dump($role);
        // die();

        $this->user->BuildUser(
            $registerForm->Fname,
            $registerForm->lName,
            $registerForm->Email,
            $registerForm->password,
            $registerForm->phone,
            $registerForm->photo,
            $role,
            [],
            $role->getId()
        );

        // var_dump($this->roleController->getById("Utilisateur"));
        // die();


        // $this->user->setRoleId($this->roleController->getById("Utilisateur"));

        // $this->user->getRole()->setRoleName("Utilisateur");
        // var_dump($this->user);
        // die();

        $this->userService->create($this->user);

        return $this->user;
    }




    public function login(LoginForm $loginForm)
    {
        // $this->user->instance($loginForm->Email, $loginForm->password);
        // var_dump($this->user->instance($loginForm->Email, $loginForm->password));
        // die();

        $this->userService->findByEmailAndPassword($loginForm);
        // var_dump($this->userService->findByEmailAndPassword($loginForm)->getId());
        // die();
        if ($this->userService->findByEmailAndPassword($loginForm)->getId() == 0) {
            throw new Exception("Email ou le mot de passe incorrect");
        }

        if ($this->userService->findByEmailAndPassword($loginForm)) {
            // unset($user['password']);

            $_SESSION['user'] = $this->userService->findByEmailAndPassword($loginForm);
            Utils::redirect('./../public/index.php');
          } else {
            Utils::setFlash('login_error', 'Invalid credentials!');
            Utils::redirect('./');
          }
        // var_dump($this->userService->findByEmailAndPassword($loginForm)->getId());
        // die();
        // return $this->userService->findByEmailAndPassword($loginForm);
    }



    private function validation($forms)
    {
        foreach ($forms as $key => $value) {
            if (!$this->validationString($value)) {
                throw new Exception($key . " is not valide ");
            }
        }
        if (isset($forms->password) && isset($forms->passwordConfirmation)) {
            $this->passwordValidation($forms->password, $forms->passwordConfirmation);
        }
    }



    private function validationString(string $string)
    {
        if (empty($string) || $string == null || is_null($string)) {
            return false;
        }
        return true;
    }
    public function passwordValidation(string $password, string $passwordConfirmation)
    {
        if ($password != $passwordConfirmation) {
            throw new Exception("les mots de passe sont pas les mêmes");
        }
        return true;
    }
}
