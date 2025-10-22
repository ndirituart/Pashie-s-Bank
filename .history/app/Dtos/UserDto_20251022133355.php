<?php

namespace App\DTOs;

use App\Interface\DtoInterface;
use Carbon\Carbon;
use App\Interface\Model;

class UserDto implements DtoInterface
{
    // Class properties are declared with their types (PHP 8.1+ syntax)
    private int $id;
    private string $email;
    private string $phone_number;
    private string $pin;
    private string $password;
    private Carbon $created_at;
    private Carbon $updated_at;

    // --- DtoInterface Methods (Implementations) ---

    public static function fromAPIFormRequest(): self
    {
        // TODO: Implement fromAPIFormRequest() method.
    }

    public static function fromModel(Model $model): self
    {
        // TODO: Implement fromModel() method.
    }

    public static function toArray(Model $model): array
    {
        // TODO: Implement toArray() method.
    }

    //getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    
}
