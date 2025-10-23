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
        
        return User::query()->create([
            'name' => $userDto->getName(), 
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(), //password already hashed in User model
            'phone_number' => $userDto->getPhoneNumber(),
        ]);
    }
}
