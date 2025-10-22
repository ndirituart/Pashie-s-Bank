<?php

namespace App\DTOs;

use App\Interface\DtoInterface;
use Carbon\Carbon;
use App\Interface\Model;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\RegisterUserRequest;

class UserDto implements DtoInterface
{
    // Class properties are declared with their types (PHP 8.1+ syntax)
    private int $id;
    private string $email;

    private string $name;
    private string $phone_number;
    private string $pin;
    private string $password;
    private Carbon $created_at;
    private Carbon $updated_at;

    // --- DtoInterface Methods (Implementations) ---

    public static function fromAPIFormRequest( FormRequest $request): DtoInterface
   
    {
        $userdata = new UserDto();
        $userdata->setName($request->input('name'));
        $userdata->setEmail($request->input('email'));
        $userdata->setPassword($request->input('password'));
        $userdata->setPhoneNumber($request->input('phone_number'));
        return $userdata;
    }
    public static function fromModel(Model $model): self
    {
        $userDto = new UserDto();
        $userDto->setId($model->id);
    }

    public static function toArray(Model $model): array
    {
        // TODO: Implement toArray() method.
    }

    // --- Accessors (Getters) ---

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function getPin(): ?string
    {
        return $this->pin;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    // --- Mutators (Setters) ---

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone_number = $phoneNumber;
    }

    public function setPin(?string $pin): void
    {
        $this->pin = $pin;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->created_at = $createdAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updated_at = $updatedAt;
    }
    

}
