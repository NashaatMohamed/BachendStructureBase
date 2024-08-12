<?php

namespace App\Auth\CleanArchitecture\Interfaces;

interface PasswordHasherInterface
{

    public function hash(string $password): string;
}
