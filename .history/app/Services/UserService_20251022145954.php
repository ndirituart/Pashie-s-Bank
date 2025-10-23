<?php

namespace App\Services;

use App\DTOs\UserDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new user record in the database.
     *
     * @param UserDto $userDto
     * @return User
     */
    public function createUser(UserDto $userDto): User
    {
        // Creates the user using the data from the DTO.
        // The password must be hashed before saving to the database.
        return User::query()->create([
            'name' => $userDto->getName(), // Assuming you add 'name' to the UserDto
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(), //p
            'phone_number' => $userDto->getPhoneNumber(),
        ]);
    }
}
