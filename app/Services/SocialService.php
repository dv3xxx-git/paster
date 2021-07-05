<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SocialService
{
    public static function socailNet($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();
        $password = Hash::make(123456);
        $data = [
            'email' => $email,
            'name' => $name,
            'password' => $password
        ];
        $db_user = User::whereEmail($email)->first();

        if ($db_user) {
            return $db_user->fill(['name' => $name]);
        }

        return User::create($data);
    }
}
