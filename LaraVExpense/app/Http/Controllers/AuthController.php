<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\UserRegisterResource;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}
    
    public function register(UserRegisterRequest $request)
    {
        $userData = $request->toDTO();

        $registeredUser = $this->authService->register($userData);

        return $registeredUser;
        
    }

    public function login(UserLoginRequest $request) {

    }
}
