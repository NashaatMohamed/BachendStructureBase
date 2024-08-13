<?php

namespace App\Auth\CleanArchitecture\Interfaces;

use App\Auth\CleanArchitecture\Entities\UserEntity;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function save(UserEntity $user): void
    {
        // TODO: Implement save() method.
        $model = $user->getUsedModel();
        $eloquentUser = resolve($model); // other way $eloquentUser = new User();
       $eloquentUser->create($user->toArray());
    }

    public function findByEmail(string $email,$model = null): ?UserEntity
    {
        // TODO: Implement findByEmail() method.

        $UserModel = new User();
        if (filled($model)) {
            $UserModel = $model->getModel();
        }
        $eloquentUser = $UserModel::where('email', $email)->first();
        if ($eloquentUser === null) {
            return null;
        }
        return new UserEntity(
            name: $eloquentUser->name,
            email: $eloquentUser->email,
            password: $eloquentUser->password,
            phone: $eloquentUser->phone
        );
    }

    public function findById(int $id, $model = null): ?UserEntity
    {
        // TODO: Implement findById() method.
        $UserModel = new User();
        if (filled($model)) {
            $UserModel = $model->getModel();
        }
        $eloquentUser = $UserModel::find($id);
        if ($eloquentUser === null) {
            return null;
        }
        return new UserEntity(
            name: $eloquentUser->name,
            email: $eloquentUser->email,
            password: $eloquentUser->password,
            phone: $eloquentUser->phone
        );
    }
}
