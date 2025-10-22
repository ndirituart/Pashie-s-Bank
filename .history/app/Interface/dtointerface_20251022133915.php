<?php

namespace App\Interface;

use Illuminate\Foundation\Http\FormRequest;

interface DtoInterface
{
    // Method to create the DTO from a form request
    public static function fromAPIFormRequest(FormRequest $RE): self;

    // Method to create the DTO from an Eloquent Model
    public static function fromModel(Model $model): self;
    
    // Method to convert the DTO to an array (often for saving to the database)
    public static function toArray(Model $model): array;
}