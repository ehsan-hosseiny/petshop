<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function register(string $name, string $email, string $password)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param integer $role
     * @return User
     */
    public function create(string $name, string $email, string $password, int $role, $mobile): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
            'mobile' => $mobile
        ]);
    }


    public function login(string $email, string $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $user->tokens()->delete();
            $data['user'] = $user;
            $data['token'] = $user->createToken('PetShop')->accessToken;
            return $data;
        }
        return false;
    }


}
