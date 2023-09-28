<?php

namespace LongAuto\Services;

use LongAuto\Models\User;
use LongAuto\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(string $username, string $password): User
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($username, $hashedPassword);
        $this->userRepository->save($user);
        return $user;
    }

    public function authenticate(string $username, string $password): ?User
    {
        $user = $this->userRepository->findByUsername($username);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user_id'] = $user->getId(); // Set user ID in the session
            return $user;
        }
        return null;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }

    // Other service methods as needed
}
