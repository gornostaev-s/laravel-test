<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function login(LoginRequest $request): ?string
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Создание токена

            return $user->createToken('api-token')->plainTextToken;
        }

        throw ValidationException::withMessages(['Неверный логин или пароль']);
    }

    public function register(RegisterRequest $request): ?User
    {
        // Создание нового пользователя
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Хеширование пароля
        ]);
    }
}
