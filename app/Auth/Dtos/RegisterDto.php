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
        public ?string $image = null,
        public ?string $role = null,
        public ?string $status = null,
        public ?int $gender = null,
        public $UsedModel = User::class,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            "phone" => $this->phone,
            "image" => $this->image,
            "role" => $this->role,
            "status" => $this->status,
            "gender" => $this->gender,
            "UsedModel" => $this->UsedModel
        ];

        if ($data['name'] == null){
            unset($data['name']);
        }

        if ($data['email'] == null){
            unset($data['email']);
        }

        if ($data['password'] == null){
            unset($data['password']);
        }

        if ($data['phone'] == null){
            unset($data['phone']);
        }

        if ($data['UsedModel'] == null){
            unset($data['UsedModel']);
        }

        if ($data['image'] == null){
            unset($data['image']);
        }

        if ($data['role'] == null){
            unset($data['role']);
        }

        if ($data['status'] == null){
            unset($data['status']);
        }

        if ($data['gender'] == null){
            unset($data['gender']);
        }

        return $data;
    }

    public function buildBody($request) : RegisterDto
    {
        return new RegisterDto(
            name:  $request->get('name') ?? null,
            email: $request->get('email') ?? null,
            password:$request->get('password') ?? null,
            phone: $request->get("phone") ?? null,
            image: $request->get("image") ?? null,
            role: $request->get("role") ?? null,
            status: $request->get("status") ?? null,
            gender: $request->get("gender") ?? null,
            UsedModel: $request->get("model") ?? $this->UsedModel
        );
    }
}
