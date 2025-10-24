<?php

namespace App\Http\Controllers;

use App\DTOs\UserDto;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller; 

class AuthController extends Controller
{
    // Inject the UserService dependency
    public function __construct(
        private readonly UserService $userService 
    ) {}

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
        return $this->apiRessponse(
            data: [
                'results' => $user,
                'message' => 'Registration successful',
            ],
            statusCode: 201 // Created
        );
    }

    // TODO: Add login method (e.g., public function login(LoginUserRequest $request): JsonResponse)
}
