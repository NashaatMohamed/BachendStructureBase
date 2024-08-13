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
        $user = new UserEntity(name: $registerDto['name'] ?? null, email: $registerDto['email'] ?? null,
            password: $hashedPassword, phone: $registerDto['phone'] ?? null, image: $registerDto['image'] ?? null,
            role: $registerDto['role'] ?? null, status: $registerDto['status'] ?? null, gender: $registerDto['gender'] ?? null, UsedModel: $registerDto['UsedModel'] ?? null);
        $this->userRepository->save($user);
    }
}
