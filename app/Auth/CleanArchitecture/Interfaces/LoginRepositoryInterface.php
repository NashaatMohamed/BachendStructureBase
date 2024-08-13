<?php

namespace App\Auth\CleanArchitecture\Interfaces;


interface LoginRepositoryInterface
{

    public function login(array $loginDto): string;
}
