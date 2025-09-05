<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Validation\ValidationException;

class AuthController
{
    public function __construct(
        private readonly UserService $userService
    )
    {
    }

    /**
     * @param RegisterRequest $request
     * @return array|void
     */
    public function register(RegisterRequest $request)
    {
        if ($user = $this->userService->register($request)) {
            return [
                "success" => true,
                "message" => "Пользователь ($user->name) зарегистрирован"
            ];
        }
    }

    /**
     * @param LoginRequest $request
     * @return array
     * @throws ValidationException
     */
    public function login(LoginRequest $request): array
    {
        return [
            'token' => $this->userService->login($request)
        ];
    }
}
