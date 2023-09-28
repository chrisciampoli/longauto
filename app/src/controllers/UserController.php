<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;
use LongAuto\Services\UserService;

class UserController extends AbstractController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Route(path: '/register', method: 'GET')]
    public function showRegisterAction(): string
    {
        // Simply render the registration form view.
        return $this->render('register');
    }

    #[Route(path: '/registerPost', method: 'POST')]
    public function registerAction()
    {
        $username = htmlentities($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8');
        $password = htmlentities($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8');

        if (empty($username) || empty($password)) {
            // Render an error view or add logic to display an error message
            return $this->render('register', ['error' => "Required fields missing!"]);
        }

        $user = $this->userService->register($username, $password);
        
        // Redirect to /login after registration
        header('Location: /login');
        exit();
    }

    #[Route(path: '/login', method: 'POST')]
    public function loginAction()
    {
        $username = htmlentities($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8');
        $password = htmlentities($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8');

        if (empty($username) || empty($password)) {
            // Render an error view or add logic to display an error message
            return $this->render('login', ['error' => "Required fields missing!"]);
        }

        $user = $this->userService->authenticate($username, $password);

        if ($user) {
            header('Location: /');
            exit();
        } else {
            // Render an error view or add logic to display an error message
            return $this->render('login', ['error' => "Invalid credentials!"]);
        }
    }

    #[Route(path: '/logout', method: 'POST')]
    public function logoutAction()
    {
        $this->userService->logout();
        header('Location: /login');
        exit();
    }

    // Other controller methods as needed
}
