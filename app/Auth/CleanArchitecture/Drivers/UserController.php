<?php

namespace App\Auth\CleanArchitecture\Drivers;

use App\Auth\CleanArchitecture\UseCases\RegisterUseCase;
use App\Auth\Dtos\RegisterDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\RegisterRequest;
use Exception;
use Illuminate\Http\Request;
use traits\ApiTrait;

class UserController extends Controller
{

    use ApiTrait;

    public function __construct(public RegisterUseCase $registerUseCase, public RegisterDto $registerDto)
    {
    }

    public function Register(RegisterRequest $request)
    {
        try {
            $userData = $this->registerDto->buildBody($request);
            $userDataArray = $userData->toArray();
            return $userDataArray;
            $this->registerUseCase->execute($userDataArray);
            $msg = "register Successfully";
            return $this->successResponse($msg, 200);
        } catch (Exception $e) {
            return $this->returnException($e->getMessage() . " in the file" . $e->getFile() . " the line :  " . $e->getLine(), 500);
        }
    }

}
