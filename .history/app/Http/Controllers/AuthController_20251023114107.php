<?php

namespace App\Http\Controllers;

use App\DTOs\UserDto;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Inject the UserService dependency
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    /**
     * Handle user registration.
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        // 1. Create the DTO from the request
        $userDto = UserDto::fromAPIFormRequest();

        // 2. Create the user record using the UserService
        $user = $this->userService->createUser($userDto);

        // 3. Return a successful response handled by ApiResponseTraits
        return $this->apiResponse(
            data: [
                'user' => $user,
                'success' => true,
                'message' => 'Registration successful'
            ],
            statusCode: 201 // Created
        );
    }
    // Add login method
    public function login(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        // Attempt to find the user by email
        $user = $this->userService->findByEmail($credentials['email'] ?? null);

        if (! $user || ! Hash::check($credentials['password'] ?? '', $user->password)) {
            return $this->apiResponse(
                data: [
                    'success' => false,
                    'message' => 'Invalid credentials'
                ],
                statusCode: 401
            );
        }

        // Issue a token if your User model supports it (e.g., Sanctum/Passport)
        $token = method_exists($user, 'createToken') ? $user->createToken('api-token')->plainTextToken : null;

        return $this->apiResponse(
            data: [
                'user' => $user,
                'token' => $token,
                'success' => true,
                'message' => 'Login successful'
            ],
            statusCode: 200
        );
    }
}
