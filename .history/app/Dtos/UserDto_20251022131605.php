<?php

namespace App\Interface;

class UserDto
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public ?string $created_at;
    public ?string $updated_at;
}