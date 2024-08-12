<?php

namespace App\Auth\CleanArchitecture\UseCases;

use App\Auth\CleanArchitecture\Entities\UserEntity;
use App\Auth\CleanArchitecture\Interfaces\PasswordHasherInterface;
use App\Auth\CleanArchitecture\Interfaces\UserRepositoryInterface;
use App\Auth\Dtos\RegisterDto;

class RegisterUseCase
{
    public function __construct(public UserRepositoryInterface $userRepository, public PasswordHasherInterface $passwordHasher)
    {
    }

    public function execute(array $registerDto): void
    {
        $hashedPassword = $this->passwordHasher->hash($registerDto['password']);
        $user = new UserEntity(name: $registerDto['name'], email: $registerDto['email'],
            password: $hashedPassword, phone: $registerDto['phone'] , UsedModel: $registerDto['UsedModel']);
        $this->userRepository->save($user);
    }
}
