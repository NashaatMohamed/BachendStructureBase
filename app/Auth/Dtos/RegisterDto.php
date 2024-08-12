<?php

namespace App\Auth\Dtos;

use App\Models\User;

class RegisterDto
{
    public function __construct(
        public ?string $name = null ,
        public ?string $email = null,
        public ?string $password = null,
        public ?string $phone = null,
        public $UsedModel = User::class,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            "phone" => $this->phone,
            "UsedModel" => $this->UsedModel
        ];
    }

    public function buildBody($request) : RegisterDto
    {
        return new RegisterDto(
            name:  $request->get('name'),
            email: $request->get('email'),
            password:$request->get('password'),
            phone: $request->get("phone"),
            UsedModel: $request->get("model") ?? $this->UsedModel
        );
    }
}
