<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\UserRegisterResource;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $userLoginData = $request->toDTO();

        return $this->authService->login($userLoginData);
    }

    public function logout(Request $request) {

        return $this->authService->logout($request);
    }
}
