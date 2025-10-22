<?php

namespace App\Interface;

interface DtoInterface
{
    // Method to create the DTO from a form request
    public static function fromAPIFormRequest(): self;

    // Method to create the DTO from an Eloquent Model
    public static function fromModel(Model $model): self;
    
    // Method to convert the DTO to an array (often for saving to the database)
    public static function toArray(Model $model): arra;
}