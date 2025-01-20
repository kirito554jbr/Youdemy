<?php

class AuthController
{
    private AuthService $authService;
    private RegisterForm $registerForm;
    private LoginForm $logInForm;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->registerForm = new RegisterForm();
        $this->logInForm = new LoginForm();
    }

    public function register($Fname, $LName, $Email, $password, $passwordConfirmation, $phone, $photo)
    {
        $this->registerForm->instance(
            $Fname,
            $LName,
            $Email,
            $password,
            $passwordConfirmation,
            $phone,
            $photo
        );
        // var_dump($this->registerForm);
        // die();


        try {
            $user = $this->authService->register($this->registerForm);
        } catch (Exception $e) {
            echo "error:" . $e;
        }
    }

    public function login($Email, $password)
    {

        // Start session
        session_start();
        require_once './../utils/utils.php';
        // Redirect to profile if logged in
        if (Utils::isLoggedIn()) {
            Utils::redirect('index.php');
        }
        
        $this->logInForm->instance($Email, $password);

        // var_dump($this->logInForm);
        // die();



        try {
            $user = $this->authService->login($this->logInForm);
            // var_dump($user);
            // die();
        } catch (Exception $e) {
            echo "error!:" . $e;
        }
        header('location: dashboard');
    }
}
