<?php

namespace App\Services;

use App\Models\User;

class RegistrationService
{
    public function registerUser(array $data): User
    {
        $newUser = User::create([
            User::NAME_ATTRIBUTE => $data[User::NAME_ATTRIBUTE],
            User::PHONE_ATTRIBUTE => $data[User::PHONE_ATTRIBUTE],
        ]);

        return $newUser;
    }
}
