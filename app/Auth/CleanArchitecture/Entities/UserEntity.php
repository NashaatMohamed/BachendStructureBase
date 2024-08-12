<?php

namespace App\Auth\CleanArchitecture\Entities;

use App\Models\User;

class UserEntity
{

//    protected ?string $name = null;
//    protected ?string $email = null;
//
//    protected ?string $password =  null;
//    protected ?string $phone = null;
//
//    public function __construct(protected ?string $name = null, string $email, string $password , string $phone)
//    {
//        $this->name = $name;
//        $this->email = $email;
//        $this->password = $password;
//        $this->phone = $phone;
//    }

    public function __construct(
        public ?string $name = null ,
        public ?string $email = null,
        public ?string $password = null,
        public ?string $phone = null,
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
            "UsedModel" => $this->UsedModel
        ];
    }

}
