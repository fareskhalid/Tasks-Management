<?php

namespace TaskManagementSystem\Controllers;

use TaskManagementSystem\Core\Controller;
use TaskManagementSystem\Core\Validate;
use TaskManagementSystem\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (User::authenticated()) {
            $this->redirect('/');
        }

        view('login');
    }

    public function login()
    {
        $user = new User();
        $error_message = '';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $valid_input = Validate::email($email) && Validate::password($password);
        
        // validate email and password
        if (! ($valid_input && $user->authenticate($email, $password))) {
            $error_message = 'Email address or password is wrong!';
            view('login', ['error_message' => $error_message, 'email' => $email]);
            exit;
        }

        $this->redirect('/');
    }

    public function register()
    {
        if (User::authenticated()) {
            $this->redirect('/');
        }

        view('register');
    }

    public function create()
    {
        $user = new User();
        $error_message = '';

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $valid_input = Validate::username($username) && Validate::email($email) && Validate::password($password);
        
        // validate email and password
        if (! $valid_input) {
            $error_message = 'Invalid Information!';
        }

        // check if the user already exists
        if ($user->getUserByEmail($email)) {
            $error_message = 'Email address is already taken by another user';
        }

        if ($error_message) {

            view('register', [
                'error_message' => $error_message,
                'username' => $username,
                'email' => $email,
            ]);

            exit;
        }

        $user->add([
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
        ]);

        $user->authenticate($email, $password);

        $this->redirect('/');
    }

    public function logout()
    {
        session_regenerate_id();
        session_destroy();

        $this->redirect('/login');
    }
}