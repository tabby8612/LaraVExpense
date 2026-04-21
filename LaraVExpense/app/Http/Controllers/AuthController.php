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
        $validated = $request->validated();

        $user = $this->authService->register($validated);
        
        return new UserRegisterResource($user);
        
    }

    public function login(UserLoginRequest $request) {

    }
}
