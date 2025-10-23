<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;


class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::query()->create($validatedData);

        return response()->json(['user' => $user], 201);
    }
}
