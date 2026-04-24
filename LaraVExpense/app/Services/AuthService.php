<?php

namespace App\Services;

use App\Dtos\User\UserLoginDTO;
use App\Dtos\User\UserRegisterDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function register(UserRegisterDTO $userDTO) {
        $user = User::query()->create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => Hash::make($userDTO->password),
            'role' => $userDTO->role,
        ]);

        if (! $user) {
            return response()->json([
                'message' => 'Unable To Create User',
                'success' => false,
            ], 402);
        }

        $token = $user->createToken('user')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=> $token,
            'message' => 'User Created Successfully',
            'success'=> true,
        ]);
        
    }

    public function login(UserLoginDTO $userDTO) {
       
        try {
            $user = User::query()->where('email', $userDTO->email)->select(['email', 'name', 'role', 'id'])->firstOrFail();

            $credentials = [
                'email' => $userDTO->email,
                'password' => $userDTO->password,
            ];

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message'=> 'Invalid Credentials',
                    'success'=> false,
                ], 402);
            }

            $token = $user->createToken('user')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token'=> $token,
                'message' => 'User Successfully Logged In',
                'success'=> true,
            ]);

        } catch (ModelNotFoundException $th) {
            return response()->json([
                'message' => 'Invalid Credentials',
                'success'=> false,
            ], 404);
        }
    }

    public function logout(Request $request) {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
        }

        return response()->json([
            'message'=> 'Successfully Loggout',
            'success'=> true,
        ], 200);
    }
}
