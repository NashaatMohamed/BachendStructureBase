<?php

namespace App\Auth\CleanArchitecture\Entities;

use App\Models\User;

class UserEntity
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhone() :string
    {
        return $this->phone;
    }

    public function getUsedModel()
    {
        return $this->UsedModel;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setPhone(string $phone) : void
    {
        $this->phone = $phone;
    }
    public function setUsedModel($usedModel) : void
    {
        $this->UsedModel = $usedModel;
    }

    public function toArray(): array
    {
        return [
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
    }

}
