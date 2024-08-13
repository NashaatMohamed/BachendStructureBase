<?php

namespace App\Auth\CleanArchitecture\Interfaces;

class LoginRepository implements LoginRepositoryInterface
{

    public function login(array $loginDto): string
    {
        // TODO: Implement login() method.
        $model = $loginDto['UsedModel'];
        $eloquentUser = resolve($model); // other way $eloquentUser = new User();
        $user = $eloquentUser->where('email', $loginDto['email'])->first();
        if (!password_verify($loginDto['password'], $user->password)) {
            throw new \Exception("password not found");
        }
        // the random_bytes is make a random string the length of 64
        // the bin2hex is convert the random string to hex
        $user->api_token = bin2hex(random_bytes(64));
        $user->save();
        return $user;
    }
}
