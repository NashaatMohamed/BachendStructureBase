<?php

namespace App\Auth\CleanArchitecture\Interfaces;

class PasswordHasher implements PasswordHasherInterface
{

    public function hash(string $password): string
    {
        // TODO: Implement hash() method.
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
