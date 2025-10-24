<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(): JsonResponse
    {
        return response()->json(['message' => 'Route working!']);
    }

    public function login(): JsonResponse
    {
        return response()->json(['message' => 'Login working!']);
    }
}
