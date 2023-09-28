<?php

namespace LongAuto\Repositories;

use LongAuto\Models\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByUsername(string $username): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return new User($row['username'], $row['password'], (int) $row['id']);
    }

    public function save(User $user): void
    {
        if ($user->getId()) {
            // Update user if ID exists (not implemented here for brevity)
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->execute([
                'username' => $user->getUsername(),
                'password' => $user->getPassword()  // Make sure this is hashed before saving!
            ]);
        }
    }

    // Other repository methods as needed
}
