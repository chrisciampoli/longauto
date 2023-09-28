<?php

namespace LongAuto\Models;

class User
{
    private ?int $id = null;
    private string $username;
    private string $password;  // This will store the hashed password

    public function __construct(string $username, string $password, ?int $id = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    // Other setters and getters as needed
}
