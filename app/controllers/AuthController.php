<?php
require_once('../app/models/Usuario/MUsuario.php');

class AuthController
{
    private $user;
    function __construct()
    {
        $this->user =  new MUsuario();
    }
    public function login($email,$password)
    { 
                
         if ($this->user->login($email, $password)) {

            header('Location: /home');
            exit;
        } else {
            echo 'Invalid email or password';
        }

     }

    public function logout($id)
    {   
        $this->user->logout($id);
        header('Location: /');
        exit;
    }
}
