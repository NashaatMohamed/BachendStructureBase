<?php

namespace App\Auth\CleanArchitecture\Interfaces;

use App\Auth\CleanArchitecture\Entities\UserEntity;

interface UserRepositoryInterface
{


    public function save(UserEntity $user): void;


    public function findByEmail(string $email): ?UserEntity;


    public function findById(int $id): ?UserEntity;

}
