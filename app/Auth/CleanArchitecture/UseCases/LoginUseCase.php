<?php

namespace App\Auth\CleanArchitecture\UseCases;

use App\Auth\CleanArchitecture\Interfaces\LoginRepositoryInterface;

class LoginUseCase
{

    public function __construct(public LoginRepositoryInterface $loginRepository)
    {
    }

    public function execute(array $loginDto): string
    {
        return $this->loginRepository->login($loginDto);
    }

}
