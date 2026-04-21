<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function register(array $data) {
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

        return $user;
    }
}
