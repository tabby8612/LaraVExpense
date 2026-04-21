<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data)
    {

        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);

        if (! $user) {
            return response()->json([
                'message' => 'Unsuccessful',
                'success' => false,
            ], 402);
        }

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

            return response()->json([
                'message' => 'User Created',
                'success' => true,
                'user' => $user,
                'token' => $token,
            ], 201);
        }

        return response()->json([
            'message' => 'Unsuccessful',
            'success' => false,
        ], 402);

    }
}
